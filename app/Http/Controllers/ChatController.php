<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Job;
use App\User;
// use App\Chat;
use Chat;
use Auth;
use Carbon\Carbon;

// use Illuminate\Support\Facades\Input;


class ChatController extends Controller
{

    public function sendMessage( Request $request )
    {
        $Abc = 'App\Proposal'::find($request->params['id']);
           $userId2 = User::find($Abc->user_id);
           $user = $userId2->id;
           $Contractor = Job::find($Abc->job_id);
           $userId = $Contractor->contractor_id;
           $proposalConvoId = db::table('proposals')
               ->select('conversation_id')
               ->where('id', $request->params['id'])
               ->get();
                            // return response()->json($proposalConvoId);
            if ( $proposalConvoId[0]->conversation_id == null ) {
                $participants = [ $userId, $userId2 ];
                $conversation = Chat::createConversation($participants);
                $proposalConvoId1 = db::table('proposals')
                    ->where('id', $request->params['id'])
                    ->update([ 'conversation_id' => $conversation->id ]);
            } else {
                // $conversation=Chat::getConversationBetween($userId, $userId2);
                $conversation = Chat::conversation($proposalConvoId[0]->conversation_id);


            }
           if ( $userId == auth()->id() ) {
               $message = Chat::message($request->params['message'])
                   ->from($userId)
                   ->to($conversation)
                   ->send();
               return response()->json($message);
           }
       if ( $user == auth()->id() ) {
           $message = Chat::message($request->params['message'])
               ->from($user)
               ->to($conversation)
               ->send();
           return response()->json($message);
       }
   }

    public function chatMessage( Request $request )
    {
        $xyz = [];
        $userId2 = User::find($request->userid);
        $Contractor = Job::find($request->jobid);
        $userId = User::find($Contractor->contractor_id);
        $proposalConvoId = db::table('proposals')
            ->select('conversation_id')
            ->where('user_id', $request->userid)
            ->where('job_id', $request->jobid)
            ->get();
        if ( $proposalConvoId[0]->conversation_id != null ) {
            $convo = Chat::conversation($proposalConvoId[0]->conversation_id);
            $messages = Chat::conversations($convo)->for($userId)->getMessages(100, 1);
            $i = 0;
            foreach ( $messages as $message ) {
                $xyz[$i]['message'] = $message->body;
                $xyz[$i]['sender'] = $message->user_id;
                if ( $xyz[$i]['sender'] == auth()->id() ) {
                    $xyz[$i]['class'] = 'user2';
                    $xyz[$i]['id'] = 'user';
                } else {
                    $xyz[$i]['class'] = 'user1';
                    $xyz[$i]['id'] = 'reply';
                }
                $i++;
            }
        }
        $xyz[0]['name'] = $userId2->name;
        $xyz[0]['project'] = $Contractor->title;
        return response()->json($xyz);
    }

    public function chatWithId( Request $request )
    {
        $xyz = [];
        $i = 0;
        $userId = User::find(auth()->id());
        $Contractor = db::table('proposals')
            ->select('job_id', 'conversation_id', 'user_id')
            ->where('id', $request->id)
            ->get();
        $job = Job::find($Contractor[0]->job_id);
        $userId2 = User::find($job->contractor_id);
        if ( !( is_null($Contractor[0]->conversation_id) ) ) {
            $convo = Chat::conversation($Contractor[0]->conversation_id);

            $users = $convo->users;
            foreach ( $users as $user ) {
                if ( $user->id != auth()->id() ) {
                    $userId2 = User::find($user->id);
                }
            }
            $messages = Chat::conversations($convo)->for($userId)->getMessages(100, 1);

            foreach ( $messages as $message ) {
                $xyz[$i]['message'] = $message->body;
                $xyz[$i]['sender'] = $message->user_id;
                if ( $xyz[$i]['sender'] == auth()->id() ) {
                    $xyz[$i]['class'] = 'user2';
                    $xyz[$i]['id'] = 'user';
                    $xyz[$i]['avatar'] = $userId->avatar_path;
                } else {
                    $xyz[$i]['class'] = 'user1';
                    $xyz[$i]['id'] = 'reply';
                    $xyz[$i]['avatar'] = $userId2->avatar_path;
                }
                $i++;
            }

            $xyz[0]['name'] = $userId2->name;

            $xyz[0]['project'] = $job->title;
        } else {
            $userId2 = User::find($Contractor[0]->user_id);
            $xyz[0]['name'] = $userId2->name;
            $xyz[0]['avatar'] = $userId2->avatar_path;
            $xyz[0]['project'] = $job->title;

        }
        return response()->json($xyz);

    }

    public function markRead( Request $request )
    {
        $ConvoId = db::table('proposals')
            ->select('conversation_id')
            ->where('id', $request->id)
            ->get();
        if ( !( is_null($ConvoId[0]->conversation_id) ) ) {
            $conversation1 = Chat::conversation($ConvoId[0]->conversation_id);
            $User = User::find(auth()->id());
            $conversation = Chat::conversations($conversation1)->for($User)->readAll();
        }
        return response()->json([ 'status' => 'true' ]);
    }

    public function navComp()
    {
        $navList = [];
        $convoList = Chat::commonConversations([ auth()->id() ]);
        $i = 0;
        // dd($convoList);

        $authUser = User::find(auth()->id());
     

        $UnreadAll = Chat::for ($authUser)->unreadCount();
        // dd($navList[0]); 

        foreach ( $convoList as $convo ) {
       $Conversa = Chat::conversation($convo->id);

            $chatName = Chat::conversation($convo->id)->users;
             
        $messages = Chat::conversations($Conversa)->for($authUser)->getMessages(100, 1);

            foreach ( $messages as $message ) {
                $navList[$i]['message'] = $message->body;
                $navList[$i]['time'] = $message->created_at;
                $navList[$i]['messageId'] = $message->id;
            }
            $unread = DB::table('mc_message_notification')
                ->where([
                    [ 'conversation_id', $convo->id ],
                    [ 'is_sender', 0 ],
                    [ 'is_seen', 0 ],
                    [ 'user_id', Auth()->id() ]
                ])
                ->count();
            $navList[$i]['unread'] = $unread;
            $navList[$i]['allUnread'] = $UnreadAll;
            


            foreach ( $chatName as $Uname ) {
                $abc = DB::table('proposals')->select('id')->where('conversation_id', $convo->id)->get();
                if ( $Uname->name != Auth::user()->name ) {
                    $navList[$i]['name'] = $Uname->name;
                    $navList[$i]['id'] = $abc[0]->id;
                    $navList[$i]['avatar'] = $Uname->avatar_path;
                    $i++;
                }
            }
            
        }

        foreach ($navList as $key => $value) {
            $time[$key] = $value['time'];
        }
        array_multisort($time,SORT_DESC,$navList);
        $now=Carbon::now();
        $i=0;
        foreach ($navList as $nav) {
            $navList[$i]['time']=$nav['time']->diffForHumans();
            $i++;
            # code...
        }
        return response()->json($navList);
    }

}
