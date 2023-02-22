<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    

    public function index() 
    {
        return view("movies.index");
    }
}
