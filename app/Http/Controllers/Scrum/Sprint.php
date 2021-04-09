<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Sprint extends Controller
{
    public function index(){
        return view('dashboard.sprints.list');
    }

    public function DoD(){
        return view('dashboard.DoD.list');
    }
}
