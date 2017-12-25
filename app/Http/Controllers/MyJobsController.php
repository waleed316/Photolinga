<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobsController extends Controller
{
    public function index()
    {
        return view('my-jobs.index');
    }
}
