<?php

namespace App\Http\Controllers\Scrum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Adicionales 

use App\Models\Scrum\ProjectModel;
use App\Models\Scrum\TeamModel;
use App\Models\Scrum\Project_Model_Team_Model;
use Illuminate\Support\Facades\DB;

class Project extends Controller
{
    public function index(){
        $projects = DB::table('project AS p')
        ->join('project_team AS  pt', 'p.id', 'pt.project_id')
        ->join('team AS t', 'pt.team_id','t.id')
        ->select('p.id','p.name','p.start_date','p.end_date','p.sprint_quantity','p.state',
        't.name as team_name', 'pt.project_id', 'pt.team_id')
        ->get();
        return view('dashboard.projects.list', ['projects' => $projects]);
    }


    public function DoD(){
        return view('dashboard.DoD.list');
    }

    /*
    public function allocate_team(){
        $projects = ProjectModel::all();  
        $teams = TeamModel::all(); 
        return view('dashboard.projects.allocateTeam',['teams' => $teams, 'projects' => $projects] );
    }

    public function save_team(Request $request){
        $item = new Project_Model_Team_Model();
        $item->team_id = $request->input('team_id');
        $item->project_id = $request->input('project_id');
        $item->save();

        $project_id = $request->input('project_id');

        $project = ProjectModel::find($project_id);
        $project->state = $request->input('state');
        $project->save();

        return redirect()->route('allocate_team');
    }

    public function start_project(){
        
    }
    */
}
