<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Scrum\SprintModel;
use Illuminate\Support\Facades\DB;
class Sprint extends Controller
{
    public function index(){
        $sprints = SprintModel::all();  
        return view('dashboard.sprints.list',['sprints' => $sprints] );
    }

    public function DoD(){
        return view('dashboard.DoD.list');
    }
}
