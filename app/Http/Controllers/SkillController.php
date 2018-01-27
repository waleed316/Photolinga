<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Input;
use Illuminate\Support\Facades\Input;
use App\Skill;
use App\UserSkill;
use DB;

class SkillController extends Controller
{
    //
    public function Search()
    {
    	 $query = Input::get('query');
    	 $abc=array();
    	$UserSkill=DB::table('user_skills')
    				->join('skills','skills.id','=','user_skills.skill_id')
    				->select('skills.name')
					->where('skills.name','LIKE','%'.$query.'%')
					->where('user_skills.user_id','=',auth()->id())
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
              $UserSkill= DB::table('user_skills')
                        ->join('skills','skills.id','=','user_skills.skill_id')
                        ->select('skills.name')
                        ->where('user_skills.user_id','=',auth()->id())
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
    			$UserSkill=DB::table('user_skills')
    				->join('skills','skills.id','=','user_skills.skill_id')
    				->select('user_skills.id as id')
					->where('skills.name','LIKE',$skill)
					->where('user_skills.user_id','=',auth()->id())
					->get();
					
				$deleteSkill=UserSkill::find($UserSkill[0]->id);
				$deleteSkill->delete();
    		return response()->json($UserSkill[0]->id);
    }
}

