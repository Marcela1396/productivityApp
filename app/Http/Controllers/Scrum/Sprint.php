<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Scrum\ProjectModel;
use App\Models\Scrum\SprintModel;
use App\Models\Scrum\Member_Model_Sprint_Model;
use Illuminate\Support\Facades\DB;

class Sprint extends Controller
{
    public function index($id){
        //$project = ProjectModel::findOrFail($id);
        //$quantity = $project->sprint_quantity;

        $sprints = DB::table('project AS p')
        ->join('sprint AS  s', 'p.id', 's.project_id')
        ->select('p.id as project_id','p.name as project_name','p.sprint_quantity','p.state as project_state',
         's.id as sprint_id', 's.name as sprint_name', 's.duration', 's.start_date', 's.end_date', 's.state as sprint_state')
        ->where('p.id', '=', $id)
        ->get();
        return view('dashboard.sprints.list',['sprints' => $sprints, 'project' => $id]);
    }

    public function form_create_sprint($project){
        $members = DB::table('project as p')
        ->join('project_team AS  pt', 'p.id', 'pt.project_id')
        ->join('team as t' , 'pt.team_id', 't.id')
        ->join('member_team as mt','t.id', 'mt.team_id')
        ->join('member as m' , 'mt.member_id', 'm.id')
        ->join('role as r', 'm.role_id', 'r.id')
        ->select('p.id as project_id','t.id as team_id', 'm.id as member_id', 'm.name as member_name', 'r.name as role_name')
        ->where('p.id', '=', $project)
        ->get();

        return view('dashboard.sprints.create', ['project' =>$project, 'members' => $members]);
    }

    public function register_sprint(Request $request){

        $item = new SprintModel();
        $item->name = $request->input('sprint_name');
        $item->description = $request->input('sprint_description');
        $item->start_date = $request->input('sprint_start_date');
        $item->duration = $request->input('sprint_duration');
        $item->project_id = $request->input('project');
        $item->save();

        $params = $request->all();
        if($item){
            $params['sprint_id']  = $item->id;
            $item2 = Member_Model_Sprint_Model::create($params);
        }
        return redirect()->route('sprints', $item->project_id);   
    }



    
}
