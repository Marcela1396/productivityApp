<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrum\UserStoryModel;
use App\Models\Scrum\TaskModel;
use App\Models\Scrum\User_Model_Task_Model; 
use App\Models\Scrum\User_Model_User_Story_Model; 
use App\Models\Scrum\User_Model_Sprint_Model;
use App\Models\Scrum\SprintModel;
use App\Models\Scrum\Sprint_Model_Team_Model;

class Task extends Controller
{
    public function index($story){
        $user = auth()->user()->id;
        $data = UserStoryModel::getDetails($story);
        $tasks = TaskModel::getDetailsTasks($story, $user, $data->sprint_id);
        return view('admin.dashboard.task.work', ['tasks' => $tasks]);
    }

    public function register_work_hours(Request $request){
        // Registrar horas trabajadas

        //dd($request->all());
        $user = auth()->user()->id;
        $story = $request->input('user_story_id');
        $team = $request->input('team_id');
        $sprint = $request->input('sprint_id');

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
                $item->worked_hours = $item->worked_hours + $hours; // Horas trabajadas por tarea
                $item->finished_task = $request->input('workRadio_id_'.$t->user_task_id);
                $item->save();
            }
        }   

        // Obtiene el estado de las tareas finalizadas por un usuario en una historia de usuario
        // para cambiar el estado de la historia de usuario
        $state_tasks = User_Model_Task_Model::getStateTasks($story,$user);
        if($state_tasks == 1){
            // Si el usuario ya finalizo todas las tareas asignadas en esa historia se le debe actualizar
            // el estado en el modelo User_User_Story
            $result = User_Model_Task_Model::getWorkHoursStory($story,$user); // Obtiene el total de horas trabajadas por historia
            
            $record = User_Model_User_Story_Model::getRecord($story, $user);
            $item2 = User_Model_User_Story_Model::findOrFail($record->id);
            $item2->state = 1;
            $item2->worked_hours = $result->hours; // Asignar horas trabajadas por historias de usuario por ese usuario
            $item2->save();
        }


        // Obtiene el estado para saber si un usuario termino todas las historias de usuario asignadas en un sprint
        // para cambiar el estado del Modelo User_Sprint

      
        $state_stories = User_Model_User_Story_Model::getStateStories($sprint, $user);

        // Si todas las historias de usuario asignadas en un sprint a un usuario fueron finalizadas
        if($state_stories == 1){
            // Entonces actualice el estado del registro en User_Sprint para decir que ese usuario ya termino el sprint
            
            $result = User_Model_User_Story_Model::getWorkHoursSprint($sprint, $user); // Obtiene el total de horas trabajadas por sprint por ese usuario
    
            $record = User_Model_Sprint_Model::getRecord($sprint,$user);
            $item3 = User_Model_Sprint_Model::findOrFail($record->id);
            $item3->state = 1;
            $item3->worked_hours = $result->hours; // Asignar horas trabajadas por sprint por ese usuario
            $item3->capacity = ($item3->worked_hours/$item3->total_assigned_hours)*100;
            $item3->save();
        }

        // Obtiene el estado de User_Sprint para saber si un sprint fue finalizado
        // para cambiar el estado del Sprint

        $state_sprint = User_Model_Sprint_Model::getStateSprint($sprint);
        if($state_sprint == 1){
            // Entonces actualice el estado del sprint
            $item4 = SprintModel::findOrFail($sprint);
            $item4->state = 'F';
            $item4->save();

            // Pendiente
            /*
            $result = User_Model_Sprint_Model::getWorkHoursTeam($sprint); // Obtiene el total de horas trabajadas por ese equipo en un sprint
            $record = Sprint_Model_Team_Model::getRecord($sprint,$team);
            $item5 = Sprint_Model_Team_Model::findOrFail($record->id);
            $item5->state = 1;
            $item5->sprint_team_worked_hours = $result->hours; // Asignar horas trabajadas por sprint por ese equipo
            $item5->sprint_team_capacity = ($item5->worked_hours/$item5->total_assigned_hours)*100;
            $item5->save();
            */
        }
            
     
        $data = UserStoryModel::getDetails($story);
        $tasks = TaskModel::getDetailsTasks($story, $user, $data->sprint_id);
        return view('admin.dashboard.task.work', ['tasks' => $tasks]);   
    }
}
