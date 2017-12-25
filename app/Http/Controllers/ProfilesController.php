<?php

namespace App\Http\Controllers;

use App\User;

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
        return view('profiles.show', [
            'profileUser' => $user
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
