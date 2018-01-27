<?php

namespace App\Http\Controllers;

use App\User;
use DB;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except([ 'show', 'index' ]);
    }

    public function index()
    {
        $profiles = User::latest()->get();
        return view('profiles.index',compact('profiles'));
    }

    public function show( User $user )
    {
        $skillSet=array();
              $UserSkill= DB::table('user_skills')
                        ->join('skills','skills.id','=','user_skills.skill_id')
                        ->select('skills.name')
                        ->where('user_skills.user_id','=',$user->id)
                        ->get();
          foreach ($UserSkill as $skill)
           {
            $skillSet[]=$skill->name;
           }
        return view('profiles.show', [
            'profileUser' => $user,
            'skillSet' => $skillSet
        ]);
    }

    public function edit( User $user )
    {
        $this->authorize('update', $user);
        return view('profiles.edit', [
            'profileUser' => $user
        ]);
    }

    public function update( User $user )
    {
        $this->authorize('update', $user);

        request()->validate([
            'description' => 'required'
        ]);
        $user->update([
            'description' => request('description'),
        ]);

        return $user;
    }
}
