<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    public function store()
    {
        request()->validate( [
            'title' => 'required',
            'user_id' => 'required|exists:users,id'
        ] );
        Portfolio::create( [
            'title' => request( 'title' ),
            'user_id' => auth()->id()
        ] );
    }

}
