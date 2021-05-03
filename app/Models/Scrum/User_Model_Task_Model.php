<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Model_Task_Model extends Model
{
    protected $table = 'user_task'; 
    protected $fillable = ['user_id', 'task_id', 'worked_hours'];


     // ******************************************************************************************
    // Funciones estaticas 
    public static function getStateTasks($story,$user){
        /* 
       Funcion que retorna el estado de las las tareas que pertenecen una historia de usuario
       y que fueron asignados a un integrante
       Parametro: id de la historia, id del usuario,
       */
       $states = DB::table('project AS p')
       ->join('sprint AS  s', 'p.id', 's.project_id')
       ->join('user_story AS us', 's.id', 'us.sprint_id')
       ->join('task AS t', 'us.id', 't.user_story_id')
       ->join('definition_of_done AS d', 't.dod_id', 'd.id')
       ->join('user_task AS ut', 't.id', 'ut.task_id')
       ->join('users AS u', 'ut.user_id', 'u.id')
       ->select('ut.finished_task as user_task_state')
       ->where('us.id', '=', $story)
       ->where('u.id', '=', $user)
       ->where('ut.finished_task','=',0)
       ->get();

       if(sizeof($states) == 0){
           return 1;
       }
       else{
            return 0;
       }
   }

   public static function getWorkHoursStory($story,$user){
       /*
       Funcion que retorna la sumatoria de horas trabajadas por el usuario en una historia de usuario  
       */
    $hours = DB::table('project AS p')
    ->join('sprint AS  s', 'p.id', 's.project_id')
    ->join('user_story AS us', 's.id', 'us.sprint_id')
    ->join('task AS t', 'us.id', 't.user_story_id')
    ->join('definition_of_done AS d', 't.dod_id', 'd.id')
    ->join('user_task AS ut', 't.id', 'ut.task_id')
    ->join('users AS u', 'ut.user_id', 'u.id')
    ->select(DB::raw('SUM(ut.worked_hours) as hours'))
    ->where('us.id', '=', $story)
    ->where('u.id', '=', $user)
    ->where('ut.finished_task','=',1)
    ->first(); 

    return $hours;
    }
}
