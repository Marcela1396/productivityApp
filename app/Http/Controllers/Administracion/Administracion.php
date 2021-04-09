<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Administracion extends Controller
{
    public function index(){
        return view('layouts.inicio');
    }

    public function dashboard(){
        return view('dashboard.dashboard');
    }
}
