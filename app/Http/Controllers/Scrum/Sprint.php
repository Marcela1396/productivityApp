<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Scrum\ProjectModel;
use App\Models\Scrum\SprintModel;
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

        return view('dashboard.sprints.list',['sprints' => $sprints] );
    }

    public function create_sprint(){
        return view('dashboard.sprints.create');
    }

    
}
