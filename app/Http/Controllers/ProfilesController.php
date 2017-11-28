<?php

namespace App\Http\Controllers;

use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'profileUser' => $user
        ]);
    }

    public function update(User $user)
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
