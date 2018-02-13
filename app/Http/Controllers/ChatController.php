<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Job;
use App\User;
// use App\Chat;
use Chat;
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

    public function sendMessage(Request $request)
    {
            // $userId=User::find();
           $userId2=User::find($request->params['userid']);
           $Contractor=Job::find($request->params['jobid']);
           $userId=$Contractor->contractor_id;
           $proposalConvoId=db::table('proposals')
                            ->select('conversation_id')
                            ->where('user_id',$request->params['userid'])
                            ->where('job_id',$request->params['jobid'])
                            ->get();
                            // return response()->json($proposalConvoId);
            if($proposalConvoId[0]->conversation_id == null)
            {
           // $conversation=Chat::getConversationBetween($userId, $userId2);
           // return response()->json($conversation);
           // if($conversation == null)
           // {
                $participants = [$userId, $userId2];
               
                $conversation = Chat::createConversation($participants);
            $proposalConvoId1=db::table('proposals')
                            ->where('user_id',$request->params['userid'])
                            ->where('job_id',$request->params['jobid'])
                            ->update(['conversation_id'=>$conversation->id])
                            ;
                // return response()->json(['Status'=>'Conversation is null']);
            }
            else
            {
               $conversation=Chat::getConversationBetween($userId, $userId2);
                // return response()->json(['Status'=>'Conversation is not null']);
           
            }
           if($userId == auth()->id())
           {
            $message = Chat::message($request->params['message'])
                        ->from($userId)
                        ->to($conversation)
                        ->send();
           return response()->json($message);
       }
       if($userId2 == auth()->id())
       {
        $message = Chat::message($request->params['message'])
                        ->from($userId2)
                        ->to($conversation)
                        ->send();
           return response()->json($message);
       }
    }

    // public function sendM(Request $request)
    // {

    // }

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
                             // return response()->json($proposalConvoId[0]);
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
}
