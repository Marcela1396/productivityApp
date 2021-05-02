<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrum\UserModel;

class Administracion extends Controller
{
    public function index(){
        return view('layouts.inicio');
    }

    public function dashboard(){
        $user = UserModel::getUser(auth()->user()->id);
        return view('admin.dashboard.dashboard', ['user' =>$user]);
    }

    public function about(){
        return view('admin.dashboard.about');
    }
}
