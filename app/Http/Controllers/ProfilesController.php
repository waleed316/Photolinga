<?php

namespace App\Http\Controllers;

use App\User;

class ProfilesController extends Controller {

	public function show( User $user ) {
		return view( 'profiles.show', [
			'profileUser' => $user
		] );
	}

	public function update( User $user ) {

		$user->update( request()->validate( [
			'description' => 'required',
		] ) );
	}
}
