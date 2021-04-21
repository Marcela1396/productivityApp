<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Scrum\SprintModel;
use App\Models\Scrum\TeamModel;
use App\Models\Scrum\ProjectModel;
use App\Models\Scrum\UserStoryModel;
use App\Models\Scrum\TaskModel;
use App\Models\Scrum\Member_Model_Task_Model;

class UserStory extends Controller
{
    public function index($id){
     
        $stories = SprintModel::getStories($id);
        $team = SprintModel::getTeam($id);
        return view('dashboard.stories.list',['stories' => $stories, 'team' => $team] );
    }

    public function form_create_story($team, $project, $sprint){

        $team_name = TeamModel::getTeam($team);
        // Aqui estaban los miembros de un equipo = projecto
        $members = ProjectModel::getMembers($project);
        $done = ProjectModel::getDoD($project);
        return view('dashboard.stories.create', ['team' => $team_name, 'done' => $done , 'members' => $members , 'sprint' =>$sprint] );
    
    }

    public function register_story(Request $request){
        //dd($request->all());
        $item = new UserStoryModel();
        $item->name = $request->input('story_name');
        $item->description = $request->input('story_description');
        $item->priority = $request->input('story_priority');
        $item->sprint_id = $request->input('sprint');
        $item->save();

        $project = $request->input('project_id');
        $done = ProjectModel::getDoD($project);

        if($item){
            foreach($done as $d){
                $item2 = new TaskModel();
                $item2->dod_id = $request->input('dod_id_'.$d->dod_id);
                $item2->user_story_id = $item->id;
                $item2->description = $request->input('task_description_'.$d->dod_id);
                $item2->save();


                if($item2){
                $item3 = new Member_Model_Task_Model();
                $item3->task_id  = $item2->id;
                $item3->member_id = $request->input('member_id_'.$d->dod_id);
                $item3->save();
                }
            }
        }
        return redirect()->route('stories', $item->sprint_id);   
    }
}
