<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrum\UserStoryModel;
use App\Models\Scrum\TaskModel;
use App\Models\Scrum\User_Model_Task_Model;
use App\Models\Scrum\User_Model_User_Story_Model;

class Task extends Controller
{
    public function index($story){
        $user = auth()->user()->id;
        $data = UserStoryModel::getDetails($story);
        $tasks = TaskModel::getDetailsTasks($story, $user, $data->sprint_id);
        return view('admin.dashboard.task.work', ['tasks' => $tasks]);
    }

    public function register_work_hours(Request $request){
        //dd($request->all());
        $user = auth()->user()->id;
        $story = $request->input('user_story_id');

        // Consulta todas las tareas correspondientes a un usuario en una historia determinada
        $tasks = TaskModel::getTasks($story,$user);

        foreach ($tasks as $t){
            $hours = $request->input('work_hours_'.$t->user_task_id);
            //dd($hours);
            if($hours != null){
                $user_task_id = $request->input('task_id_'.$t->user_task_id);

                // Busca el registro que coincida con ese id en la tabla user_task
                $option = $request->input('workRadio_id_'.$t->user_task_id);
                // Realiza el proceso de actualización
                $item = User_Model_Task_Model::findOrFail($user_task_id);
                $item->worked_hours= $item->worked_hours + $hours;
                $item->finished_task = $request->input('workRadio_id_'.$t->user_task_id);
                $item->save();
            }
        }      
        
        $state = TaskModel::getStateTasks($story,$user);
        
        if($state == 1){
            // Si el usuario ya finalizo todas las tareas asignadas en esa historia se le debe actualizar
            // el estado en el modelo User_User_Story
            $record = User_Model_User_Story_Model::getRecord($story, $user);
            $item2 = User_Model_User_Story_Model::findOrFail($record->id);
            $item2->state = 1;
            $item2->save();
        }
        //dd($states);
        
        $data = UserStoryModel::getDetails($story);
        $tasks = TaskModel::getDetailsTasks($story, $user, $data->sprint_id);
        return view('admin.dashboard.task.work', ['tasks' => $tasks]);   
    }
}
