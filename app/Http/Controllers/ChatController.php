<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Job;
use App\User;
// use App\Chat;
use Chat;
use Auth;
// use Illuminate\Support\Facades\Input;


class ChatController extends Controller
{
    //
  //   public function index(Request $request)
  //   {
  //   	$message=Chat::create([
  //                       'jobId'=>$request->params['jobid'],
  //                       'receiverId'=>$request->params['userid'],
  //                       'senderId'=>auth()->id(),
  //                       'message'=>$request->params['message']
  //                               ]);
  //   		// $abc=$request->params['message'];
  //   		return response()->json($message);
  //   }

  //   public function chat(Request $request)
  //   {
  //   	$Contractor=Job::find($request->jobid);
		// $ContractorId=$Contractor->contractor_id;
		// // $user1=User::find($ContractorId);
		// // $user2=User::find($userid); 
		// $abc=array();   	
  //   	$query=DB::table('chats')
  //   			->where([
  //  						 ['senderid', '=', $request->userid],
  //  						 ['receiverid', '=', $ContractorId],
  //  						 ['jobId','=',$request->jobid]
		// 			])
  //   			->orWhere([
  //  						 ['senderid', '=',$ContractorId],
  //  						 ['receiverid', '=',$request->userid],
  //  						 ['jobId','=',$request->jobid]
		// 			])
  //   			->orderBy('created_at','asc')
  //   			->get();
  //   			$i=0;
  //   			foreach ($query as $chat) {

  //   				$abc[$i]['message']=$chat->message;
  //   				$abc[$i]['title']=$Contractor->title;
  //   				// $abc[]['receiver']=$chat->receiverid;
  //   				if($chat->senderId == auth()->id())
  //   				{
  //   					$abc[$i]['sender']='Me';
  //   					$user2=User::find($chat->receiverId);
  //   					$abc[$i]['receiver']=$user2->name;
  //   					$abc[$i]['class']="user2";
  //   					$abc[$i]['id']="user";
  //   				}
  //   				if($chat->receiverId == auth()->id())
  //   				{
  //   					$abc[$i]['receiver']='Me';
  //   					$user1=User::find($chat->senderId);
  //   					$abc[$i]['sender']=$user1->name;
  //   					$abc[$i]['class']="user1";
  //   					$abc[$i]['id']="reply";

  //   				}
  //   				$abc[$i]['time']=date('h:i:s a m/d/Y', strtotime($chat->created_at));
  //   				$i++;
  //   			}


  //   			return response()->json($abc);
  //   }

    // public function sendMessage(Request $request)
    // {
    //         // $userId=User::find();
    //        $userId2=User::find($request->params['userid']);
    //        $Contractor=Job::find($request->params['jobid']);
    //        $userId=$Contractor->contractor_id;
    //        $proposalConvoId=db::table('proposals')
    //                         ->select('conversation_id')
    //                         ->where('user_id',$request->params['userid'])
    //                         ->where('job_id',$request->params['jobid'])
    //                         ->get();
    //                         // return response()->json($proposalConvoId);
    //         if($proposalConvoId[0]->conversation_id == null)
    //         {
    //        // $conversation=Chat::getConversationBetween($userId, $userId2);
    //        // return response()->json($conversation);
    //        // if($conversation == null)
    //        // {
    //             $participants = [$userId, $userId2];
               
    //             $conversation = Chat::createConversation($participants);
    //         $proposalConvoId1=db::table('proposals')
    //                         ->where('user_id',$request->params['userid'])
    //                         ->where('job_id',$request->params['jobid'])
    //                         ->update(['conversation_id'=>$conversation->id])
    //                         ;
    //             // return response()->json(['Status'=>'Conversation is null']);
    //         }
    //         else
    //         {
    //            $conversation=Chat::getConversationBetween($userId, $userId2);
    //             // return response()->json(['Status'=>'Conversation is not null']);
           
    //         }
    //        if($userId == auth()->id())
    //        {
    //         $message = Chat::message($request->params['message'])
    //                     ->from($userId)
    //                     ->to($conversation)
    //                     ->send();
    //        return response()->json($message);
    //    }
    //    if($userId2 == auth()->id())
    //    {
    //     $message = Chat::message($request->params['message'])
    //                     ->from($userId2)
    //                     ->to($conversation)
    //                     ->send();
    //        return response()->json($message);
    //    }
    // }

     public function sendMessage(Request $request)
    {
            $Abc='App\Proposal'::find($request->params['id']);
           $userId2=User::find($Abc->user_id);
           $user=$userId2->id;
           $Contractor=Job::find($Abc->job_id);
           $userId=$Contractor->contractor_id;
           $proposalConvoId=db::table('proposals')
                            ->select('conversation_id')
                            ->where('id',$request->params['id'])
                            ->get();
                            // return response()->json($proposalConvoId);
            if($proposalConvoId[0]->conversation_id == null)
            {
                $participants = [$userId, $userId2];
                $conversation = Chat::createConversation($participants);
                $proposalConvoId1=db::table('proposals')
                            ->where('id',$request->params['id'])
                            ->update(['conversation_id'=>$conversation->id])
                            ;
            }
            else
            {
               // $conversation=Chat::getConversationBetween($userId, $userId2);
            $conversation=Chat::conversation($proposalConvoId[0]->conversation_id);

           
            }
           if($userId == auth()->id())
           {
            $message = Chat::message($request->params['message'])
                        ->from($userId)
                        ->to($conversation)
                        ->send();
           return response()->json($message);
       }
       if($user == auth()->id())
       {
        $message = Chat::message($request->params['message'])
                        ->from($user)
                        ->to($conversation)
                        ->send();
           return response()->json($message);
       }
   }

    public function chatMessage(Request $request)
    {
        $xyz=[];
          $userId2=User::find($request->userid);
           $Contractor=Job::find($request->jobid);
           $userId=User::find($Contractor->contractor_id);
            $proposalConvoId=db::table('proposals')
                                ->select('conversation_id')
                            ->where('user_id',$request->userid)
                            ->where('job_id',$request->jobid)
                            ->get();
            if($proposalConvoId[0]->conversation_id != null)
            {
            $convo=Chat::conversation($proposalConvoId[0]->conversation_id);
           $messages=Chat::conversations($convo)->for($userId)->getMessages(100,1);
           $i=0;
         foreach ($messages as $message) 
        {
            $xyz[$i]['message']=$message->body;
            $xyz[$i]['sender']=$message->user_id;
            if($xyz[$i]['sender'] == auth()->id())
            {
                $xyz[$i]['class']='user2';
                $xyz[$i]['id']='user';
            }
            else
            {
                $xyz[$i]['class']='user1';
                $xyz[$i]['id']='reply';
            }
            $i++;
        }
        }
        $xyz[0]['name']=$userId2->name;
        $xyz[0]['project']=$Contractor->title;
        return response()->json($xyz);
    }

    public function chatWithId(Request $request)
    {
        $xyz=[];
        $i=0;
        $userId=User::find(auth()->id());
        $Contractor=db::table('proposals')
                    ->select('job_id','conversation_id','user_id')
                    ->where('id',$request->id)
                    ->get();
        $job=Job::find($Contractor[0]->job_id);
        $userId2=User::find($job->contractor_id);
        if(!(is_null($Contractor[0]->conversation_id)))
        {
        $convo=Chat::conversation($Contractor[0]->conversation_id);

        $users = $convo->users;
        foreach ($users as $user) 
        {
            if($user->id != auth()->id())  
            {
                $userId2=User::find($user->id);
            } 
        }
         $messages=Chat::conversations($convo)->for($userId)->getMessages(100,1);
           
         foreach ($messages as $message) 
        {
            $xyz[$i]['message']=$message->body;
            $xyz[$i]['sender']=$message->user_id;
            if($xyz[$i]['sender'] == auth()->id())
            {
                $xyz[$i]['class']='user2';
                $xyz[$i]['id']='user';             
                $xyz[$i]['avatar']=$userId->avatar_path;
            }
            else
            {
                $xyz[$i]['class']='user1';
                $xyz[$i]['id']='reply';
                $xyz[$i]['avatar']=$userId2->avatar_path;

            }
            $i++;
        }
        
        $xyz[0]['name']=$userId2->name;
      
        $xyz[0]['project']=$job->title;
      }
      else
      {
        $userId2=User::find($Contractor[0]->user_id);
        $xyz[0]['name']=$userId2->name;
        $xyz[0]['avatar']=$userId2->avatar_path;
        $xyz[0]['project']=$job->title;
           
      }    
          return response()->json($xyz); 

    }

    public function markRead(Request $request)
    {
       $ConvoId=db::table('proposals')
                    ->select('conversation_id')
                    ->where('id',$request->id)
                    ->get();
      if(!(is_null($ConvoId[0]->conversation_id)))
      {
      $conversation1 = Chat::conversation($ConvoId[0]->conversation_id);
      $User=User::find(auth()->id());
      $conversation=Chat::conversations($conversation1)->for($User)->readAll();
      }
      return response()->json(['status'=>'true']);
    }

    public function navComp()
    {
            $navList=[];
            $convoList=Chat::commonConversations([auth()->id()]);
            $i=0;
            $authUser=User::find(auth()->id());
            $UnreadAll=Chat::for($authUser)->unreadCount();
            $navList[0]['allUnread']=$UnreadAll;
            foreach ($convoList as $convo) {
              $chatName=Chat::conversation($convo->id)->users;
               $unread=DB::table('mc_message_notification')
            ->where([
              ['conversation_id',$convo->id],
              ['is_sender',0],
            ['is_seen',0],
              ['user_id',Auth()->id()]
            ])
            ->count();
            $navList[$i]['unread']=$unread;
              foreach($chatName as $Uname){
                $abc=DB::table('proposals')->select('id')->where('conversation_id',$convo->id)->get();
              if($Uname->name != Auth::user()->name)
              { 
                    $navList[$i]['name']=$Uname->name;
                    $navList[$i]['id']=$abc[0]->id;
                    $i++;
              }
             }
            }
            return response()->json($navList);
    }

}
