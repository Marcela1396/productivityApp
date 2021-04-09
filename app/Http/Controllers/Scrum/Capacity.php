<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Capacity extends Controller
{
    public function index(){
        return view('dashboard.capacity.results');
    }
}
