<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        return view('landing');
    }

    public function dashboard()
    {

        $tasks = auth()->user()->tasks()->orderBy('created_at', 'desc')->whereDate('date', today())->get();

        return view('dashboard')->with('tasks', $tasks);
    }
}
