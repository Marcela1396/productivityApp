<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TaskModel extends Model
{
    protected $table = 'task'; 
    protected $fillable = ['dod_id', 'user_story_id', 'description'];

    //  Task belongs to User Story
    public function story()
    {
        return $this->belongsTo(UserStoryModel::class, 'user_story_id', 'id');
    }

     // Task belongs to Definition of done
    public function ddone()
    {
         return $this->belongsTo(DoDModel::class, 'dod_id', 'id');
    }
    
    // Pendiente
     // Relation Task has Many to Many User
    public function users(){
        return $this->belongsToMany(UserModel::class, 'user_id', 'task_id');
    }


    // FUNCIONES ESTATICAS
    public static function getTasks($story,$user){
        /* 
       Funcion que retorna las tareas que pertenecen una historia de usuario
       y que fueron asignados a un integrante
       Parametro: id de la historia, id del usuario,
       */
       $task = DB::table('project AS p')
       ->join('sprint AS  s', 'p.id', 's.project_id')
       ->join('user_story AS us', 's.id', 'us.sprint_id')
       ->join('task AS t', 'us.id', 't.user_story_id')
       ->join('definition_of_done AS d', 't.dod_id', 'd.id')
       ->join('user_task AS ut', 't.id', 'ut.task_id')
       ->join('users AS u', 'ut.user_id', 'u.id')
       ->select('t.id as task_id','d.name as task_name', 'ut.id as user_task_id' )
       ->where('us.id', '=', $story)
       ->where('u.id', '=', $user)
       ->get();

       return $task;
   }

   public static function getDetailsTasks($story,$user, $sprint){
       /* 
      Funcion que retorna las tareas que pertenecen una historia de usuario,
      la historia de usuario que arroja dichas tareas,  el sprint al cual pertenece la historia
      y la informacion de las horas asignadas a un usuario por sprint con la información
      de dicho usuario
      Parametro: id de la historia, id del usuario, id del sprint
      */
      $task = DB::table('project AS p')
      ->join('sprint AS  s', 'p.id', 's.project_id')
      ->join('user_story AS us', 's.id', 'us.sprint_id')
      ->join('task AS t', 'us.id', 't.user_story_id')
      ->join('definition_of_done AS d', 't.dod_id', 'd.id')
      ->join('user_task AS ut', 't.id', 'ut.task_id')
      ->join('users AS u', 'ut.user_id', 'u.id')
      ->join('user_sprint as usp', 'u.id','usp.user_id' )
      ->join('project_team as pt', 'p.id', 'pt.project_id')
      ->select('t.id as task_id','d.name as task_name', 
      'u.id as user_id', 'u.name as user_name',
      'us.id as user_story_id','us.name as user_story_name', 
      's.id as sprint_id', 's.name as sprint_name',
      'usp.total_assigned_hours', 
      'ut.id as user_task_id', 'ut.worked_hours', 'ut.finished_task',
      'pt.team_id as team_id')
      ->where('us.id', '=', $story)
      ->where('u.id', '=', $user)
      ->where('usp.sprint_id', '=', $sprint)
      ->get();

      return $task;
    }


    

  


 
}
