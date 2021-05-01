<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrum\UserStoryModel;
use Illuminate\Support\Facades\DB;

class Task extends Controller
{
    public function index($story){
        $user = auth()->user()->id;
        //dd($story);
        $tasks = UserStoryModel::getTasks($story, $user);
        return view('admin.dashboard.tasks.addWork', ['tasks' => $tasks]);
    }
}
