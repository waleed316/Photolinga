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
        $UserSkill=User::find(auth()->id())->skills()
                    ->where('name','LIKE','%'.$query.'%')
                    ->get(['name']);
				foreach ($UserSkill as $skill) {
					$abc[] =$skill->name;
				}
 		 $users = Skill::where('name','LIKE','%'.$query.'%')
 		 		  ->whereNotIn('name',$abc)
 				  ->get();
 		return response()->json($users);
    }

    public function Store(Request $request)
    {
		  $skills=UserSkill::create([
        	'user_id'=>auth()->id(),
       	 	'skill_id'=>$request->skill
     		 ]);
				$skillSet['name']=$request->skillname;	
    	return response()->json(['skill'=>$skillSet]);
    }

    public function list()
    {
        $UserSkill=User::find(auth()->id())->skills()->get(['name']);
           return response()->json($UserSkill);
    }

    public function delete(Request $request,$skill)
    {
    			$UserSkill=DB::table('skill_user')
    				->join('skills','skills.id','=','skill_user.skill_id')
    				->select('skill_user.id as id')
					->where('skills.name','LIKE',$skill)
					->where('skill_user.user_id','=',auth()->id())
					->get();
        // $UserSkill=User::find(auth()->id())->skills()
        //             ->where('name','LIKE',$skill)
        //             ->get();
					
				$deleteSkill=UserSkill::find($UserSkill[0]->id);
				$deleteSkill->delete();
    		return response()->json($UserSkill);
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
        if(!(empty($request->keyword)))
            {
                $All=in_array("All", $request->keyword);
            }
            if((empty($request->keyword)) || $All)
            {

            $Photographers=DB::table('users')
                    ->join('contact_informations','contact_informations.user_id','=','users.id')
                    ->join('skill_user','skill_user.user_id','=','users.id')
                    ->join('skills','skills.id','=','skill_user.skill_id')
                    ->select('users.id as id')
                    ->distinct()
                    ->where('contact_informations.city','LIKE',$request->city)
                    ->where('contact_informations.country','LIKE',$request->country)
                    ->where('users.rating','>=',$request->rating)
                    ->get();
                }
                else 
                {
                   $Photographers=DB::table('users')
                    ->join('contact_informations','contact_informations.user_id','=','users.id')
                    ->join('skill_user','skill_user.user_id','=','users.id')
                    ->join('skills','skills.id','=','skill_user.skill_id')
                    ->select('users.id as id')
                    ->distinct()
                    ->whereIn('skills.name',$request->keyword)
                    ->where('contact_informations.city','LIKE',$request->city)
                    ->where('contact_informations.country','LIKE',$request->country)
                    ->where('users.rating','>=',$request->rating)
                    ->get();
                }

                    $Photographer1=array();
                    foreach ($Photographers as $Photographer) {
                            $Photographer1[]=User::find($Photographer->id);
                    }
                    return response()->json($Photographer1);


    }

    public function AllPhotographers()
    {
        $Photographers=User::all();
        return response()->json($Photographers);
    }
}

