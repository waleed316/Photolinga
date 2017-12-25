<?php

namespace App\Http\Controllers;

use App\Rules\CurrentUserPassword;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
    }

    public function changePassword( Request $request )
    {
        $user = auth()->user();
        $user->password = bcrypt($request['new-password']);
        $user->save();
    }
}
