<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Input;
use Illuminate\Support\Facades\Input;
use App\Skill;
use App\User;
use App\UserSkill;
use DB;

class SkillController extends Controller
{
    //
    public function Search()
    {
    	 $query = Input::get('query');
    	 $abc=array();
    	$UserSkill=DB::table('skill_user')
    				->join('skills','skills.id','=','skill_user.skill_id')
    				->select('skills.name')
					->where('skills.name','LIKE','%'.$query.'%')
					->where('skill_user.user_id','=',auth()->id())
					->get();
				foreach ($UserSkill as $skill) {
					$abc[] =$skill->name;
				}
 		 $users = Skill::where('name','LIKE','%'.$query.'%')
 		 		  ->whereNotIn('name',$abc)
 				  ->get();
 				  // dd($users);
 		return response()->json($users);
    }

    public function Store(Request $request)
    {
		  $skills=UserSkill::create([
        	'user_id'=>auth()->id(),
       	 	'skill_id'=>$request->skill
     		 ]);
				$skillSet[]=$request->skillname;	
    	return response()->json(['skill'=>$skillSet]);
		  		
    	// return response()->json(['name'=>$request->skillname]);
    }

    public function list()
    {
        $skillSet=array();
              $UserSkill= DB::table('skill_user')
                        ->join('skills','skills.id','=','skill_user.skill_id')
                        ->select('skills.name')
                        ->where('skill_user.user_id','=',auth()->id())
                        ->get();
          foreach ($UserSkill as $skill)
           {
            $skillSet[]=$skill->name;
           }
           return response()->json($skillSet);
    }

    public function delete(Request $request,$skill)
    {
        // $sName=$request->deleteskill;
        // return response()->json($skill);
    			$UserSkill=DB::table('skill_user')
    				->join('skills','skills.id','=','skill_user.skill_id')
    				->select('skill_user.id as id')
					->where('skills.name','LIKE',$skill)
					->where('skill_user.user_id','=',auth()->id())
					->get();
					
				$deleteSkill=UserSkill::find($UserSkill[0]->id);
				$deleteSkill->delete();
    		return response()->json($UserSkill[0]->id);
    }

    public function PSearch()
    {
         $query = Input::get('query');
         $abc=array();
         $users = Skill::where('name','LIKE','%'.$query.'%')
                  ->get();
                  // dd($users);
        return response()->json($users);
       
    }

    public function browse(Request $request)
    {
            $Photographers=DB::table('users')
                    ->join('contact_informations','contact_informations.user_id','=','users.id')
                    ->join('skill_user','skill_user.user_id','=','users.id')
                    ->join('skills','skills.id','=','skill_user.skill_id')
                    ->distinct()
                    ->select('users.id as id')
                    ->whereIn('skills.name',$request->keyword)
                    ->where('contact_informations.city','LIKE',$request->city)
                    ->where('contact_informations.country','LIKE',$request->country)
                    ->get();

                    // $i=0;
                    // foreach ($Photographers as $Photographer) {
                        
                    //     $User=User::find($Photographer->id);
                    //     $PhotographerInfo[$i]['User_id']=$Photographer->id;
                    //     $PhotographerInfo[$i]['contact_info']=$User->contactInformation()->get();
                    //     $PhotographerInfo[$i]['skills']=$User->skills()->get(['name']);
                    //     $i++;
                    // }
                    $Photographer1=array();
                    foreach ($Photographers as $Photographer) {
                            $Photographer1[]=$Photographer->id;
                    }
                    return response()->json($Photographer1);
    }
}

