<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Member extends Controller
{
    public function index(){
        return view('dashboard.members.list');
    }

}
