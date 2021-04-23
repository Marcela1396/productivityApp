<?php

namespace App\Http\Controllers\Scrum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Adicionales 

use App\Models\Scrum\ProjectModel;
use App\Models\Scrum\TeamModel;
use App\Models\Scrum\RoleModel;
use App\Models\Scrum\Member_Model_Role_Model;
use App\Models\Scrum\Project_Model_Team_Model;
use Illuminate\Support\Facades\DB;

class Project extends Controller
{
    public function index(){
        $projects= ProjectModel::getProjects();
        return view('dashboard.projects.list', ['projects' => $projects]);
    }

    public function form_create_project(){
        $teams = TeamModel::getTeams();
        return view('dashboard.projects.create', ['team' =>$teams]);
    }

    public function getMembers($team){
        $members = TeamModel::getMembers($team);
        $roles = RoleModel::all();
        return response()->json([$members]); 
    }

    public function register_project(Request $request){
        $item = new ProjectModel();
        $item->name = $request->input('project_name');
        $item->description = $request->input('project_description');
        $item->start_date = $request->input('project_start_date');
        $item->duration = $request->input('project_duration');
        $item->sprint_quantity = $request->input('sprint_quantity');
        $item->save();

        $item2 = new Project_Model_Team_Model();
        $item2->project_id = $item->id;
        $item2->team_id = $request->input('team_id_project');
        $item2->save();
        
        // Falta DOD
        return redirect()->route('projects');  
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
