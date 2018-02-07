<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Job;
use App\User;
// use Illuminate\Support\Facades\Input;


class ChatController extends Controller
{
    //
    public function index(Request $request)
    {
    		$abc=$request->params['message'];
    		return response()->json($abc);
    }

    public function chat(Request $request)
    {
    	$Contractor=Job::find($request->jobid);
		$ContractorId=$Contractor->contractor_id;
		// $user1=User::find($ContractorId);
		// $user2=User::find($userid);    	
    	$query=DB::table('chats')
    			->where([
   						 ['senderid', '=', $request->userid],
   						 ['receiverid', '=', $ContractorId],
   						 ['jobId','=',$request->jobid]
					])
    			->orWhere([
   						 ['senderid', '=',$ContractorId],
   						 ['receiverid', '=',$request->userid],
   						 ['jobId','=',$request->jobid]
					])
    			->orderBy('created_at','asc')
    			->get();
    			$i=0;
    			foreach ($query as $chat) {

    				$abc[$i]['message']=$chat->message;
    				// $abc[]['receiver']=$chat->receiverid;
    				if($chat->senderId == auth()->id())
    				{
    					$abc[$i]['sender']='Me';
    					$user2=User::find($chat->receiverId);
    					$abc[$i]['receiver']=$user2->name;
    					$abc[$i]['class']="right";
    				}
    				if($chat->receiverId == auth()->id())
    				{
    					$abc[$i]['receiver']='Me';
    					$user1=User::find($chat->receiverId);
    					$abc[$i]['sender']=$user1->name;
    					$abc[$i]['class']="left";
    				}
    				$abc[$i]['time']=$chat->created_at;
    				$i++;
    			}
    			return response()->json($abc);
    }
}
