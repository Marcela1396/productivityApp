<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserStory extends Controller
{
    public function index($id){
     
        $stories = DB::table('project AS p')
        ->join('sprint AS  s', 'p.id', 's.project_id')
        ->join('user_story AS u', 's.id', 'u.sprint_id')
        ->select('p.id as project_id', 's.id as sprint_id', 's.name as sprint_name', 's.duration', 's.state as sprint_state',
        'u.id as story_id', 'u.name as story_name', 'u.state as story_state', 'u.priority')
        ->where('s.id', '=', $id)
        ->orderby('u.priority', 'desc')
        ->get();

        
        $team = DB::table('sprint AS  s')
        ->join('project AS p', 's.project_id', 'p.id')
        ->join('project_team AS  t', 'p.id', 't.project_id')
        ->select('t.team_id', 'p.id as project_id')
        ->where('s.id', '=', $id)
        ->first();

        return view('dashboard.stories.list',['stories' => $stories, 'team' => $team] );
    }

    public function form_create_story($id, $project){
        $team_name = DB::table('team')
        ->select('name')
        ->where('id', '=', $id)
        ->first();

        $members = DB::table('team as t')
        ->join('member_team as mt','t.id', 'mt.team_id')
        ->join('member as m' , 'mt.member_id', 'm.id')
        ->join('role as r', 'm.role_id', 'r.id')
        ->select('t.id as team_id', 'm.id as member_id', 'm.name as member_name', 'r.name as role_name')
        ->where('t.id', '=', $id)
        ->get();

        $critery = DB::table('definition_of_done as d')
        ->join('project as p', 'd.project_id','p.id')
        ->select('d.id', 'p.id', 'd.name')
        ->where('d.project_id', '=', $project)
        ->get();

        return view('dashboard.stories.create', ['team' => $team_name, 'done' => $critery , 'members' => $members] );
    
    }

    public function create_story(){

    }
}
