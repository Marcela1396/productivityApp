<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Project extends Controller
{
    public function index(){
        return view('dashboard.projects.list');
    }
}
