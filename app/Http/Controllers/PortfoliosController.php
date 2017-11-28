<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    public function store()
    {
        Portfolio::create( [
            'title' => request( 'title' ),
            'user_id' => auth()->id()
        ] );
    }

}
