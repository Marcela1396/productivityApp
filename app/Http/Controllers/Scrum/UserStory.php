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
use App\Models\Scrum\User_Model_Task_Model;
use App\Models\Scrum\User_Model_User_Story_Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserStory extends Controller
{
    public function index($id){
        // Recibe el id del sprint
        
        $team = SprintModel::getTeam($id);
        $user = User::find(auth()->user()->id);
        if($user){
            if($user->hasAnyRole(['super-admin'])){
                $stories = SprintModel::getStories($id);
            }
            else{
                
                $stories = SprintModel::getStories2($id, $user->id);
            }   
        }
        $sprint = SprintModel::detailSprint($id);

        return view('admin.dashboard.stories.list',
                                                    [
                                                    'stories' => $stories, 
                                                    'team' => $team,
                                                    'sprint_name' => $sprint->name
                                                    ] );  
    }

    public function form_create_story($team, $project, $sprint){

        $team_name = TeamModel::getTeam($team);
        // Aqui estaban los miembros de un equipo = projecto
        $members = ProjectModel::getUsers($project);
        $done = ProjectModel::getDoD($project);
        return view('admin.dashboard.stories.create', ['team' => $team_name, 'done' => $done , 'members' => $members , 'sprint' =>$sprint] );
    
    }

    public function register_story(Request $request){
        //dd($request->all());
        // Agrega la información respectiva en el modelo UserStory
        $item = new UserStoryModel();
        $item->name = $request->input('story_name');
        $item->description = $request->input('story_description');
        $item->priority = $request->input('story_priority');
        $item->sprint_id = $request->input('sprint');
        $item->save();

        $project = $request->input('project_id');
        $done = ProjectModel::getDoD($project);

        $list = []; // Lista que guardara los id de los usuarios que tienen tareas en esa historia

        if($item){
            foreach($done as $d){
                //Si se registro la historia de usuario agrega las tareas por cada criterio de definition of done establecido en el proyecto
                $item2 = new TaskModel();
                $item2->dod_id = $request->input('dod_id_'.$d->dod_id);
                $item2->user_story_id = $item->id;
                $item2->description = $request->input('task_description_'.$d->dod_id);
                $item2->save();


                if($item2){
                // Y agrega al modelo UserTask la tarea con el responsable de ella
                $item3 = new User_Model_Task_Model();
                $item3->task_id  = $item2->id;
                $item3->user_id = $request->input('member_id_'.$d->dod_id);
                $item3->save();
                }

                $user = $request->input('member_id_'.$d->dod_id); 
                array_push($list, $user); // Aqui guarda en el arreglo el id de los usuario que se les asignaron tareas en esa historia
            }

            // Luego se filtra la Lista que guardara los id de los usuarios que se les asignaron tareas y 
            // se deja sin repetidos
            $users = array_values(array_unique($list));

            foreach($users as $u){
                // Agrega al modelo User_User_Story el id del usuario y la historia donde al menos tiene una tarea
                $item4 = new User_Model_User_Story_Model();
                $item4->user_id = $u;
                $item4->user_story_id = $item->id;
                $item4->save();
            }

        }
        return redirect()->route('stories', $item->sprint_id);   
    }


    public function start_story($id){
        $story = UserStoryModel::findOrFail($id);
        $story->state ='S';
        $story->save();

        $item = UserStoryModel::getDetails($id);
        $sprint_id = $item->sprint_id;
        $project_id = $item->project_id;

        $sprint = SprintModel::findOrFail($sprint_id);
        
        if($sprint->state == 'C'){
            //dd($sprint->state);
            $item2 = SprintModel::findOrFail($sprint_id);
            $item2->state = 'S';
            $item2->save();   
        }

        
        $project = ProjectModel::find($project_id);
        if($project->state == 'C'){
            $item3 = ProjectModel::findOrFail($project_id);
            $item3->state = 'S';
            $item3->save();
        }

        return redirect()->route('stories', $sprint_id );   
    }
}
