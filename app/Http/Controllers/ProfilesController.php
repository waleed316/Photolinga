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
        // $city='App\ContactInformation'::all()->get(['city']);
        $cities=DB::table('contact_informations')
                ->select('city')
                ->distinct()
                ->get();
                // dd($cities);
        return view('profiles.index',compact('cities'));
    }

    public function show( User $user )
    {
        $skillSet=array();
        $skillSet=User::find($user->id)->skills()->get();
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
