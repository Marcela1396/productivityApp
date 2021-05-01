<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserStoryModel extends Model
{
    protected $table = 'user_story'; 
    protected $fillable = ['sprint_id', 'name', 'description','state', 'priority'];

    // User Story belongs to SprintBacklog
    public function backlog()
    {
        return $this->belongsTo(SprintModel::class, 'sprint_id', 'id');
    }

    // User Story has many Task
    public function tasks()    {
        return $this->hasMany(TaskModel::class,'user_story_id', 'id');
    }


    //Funciones estaticas
    public static function getDetails($story){
        /* 
        Funcion que retorna el id del sprint y del proyecto
        al cual pertenece una historia de usuario
        Parametro: id de la historia
        */
        $data = DB::table('project AS p')
        ->join('sprint AS  s', 'p.id', 's.project_id')
        ->join('user_story AS u', 's.id', 'u.sprint_id')
        ->select('p.id as project_id', 's.id as sprint_id')
        ->where('u.id', '=', $story)
        ->first();

        return $data;

    }

    public static function getTasks($story,$user){
         /* 
        Funcion que retorna las tareas que pertenecen una historia de usuario
        y que fueron asignados a un integrante
        Parametro: id de la historia
        */
        $task = DB::table('project AS p')
        ->join('sprint AS  s', 'p.id', 's.project_id')
        ->join('user_story AS us', 's.id', 'us.sprint_id')
        ->join('task AS t', 'us.id', 't.user_story_id')
        ->join('definition_of_done AS d', 't.dod_id', 'd.id')
        ->join('user_task AS ut', 't.id', 'ut.task_id')
        ->join('users AS u', 'ut.user_id', 'u.id')
        ->select('t.id as task_id','d.name as task_name')
        ->where('us.id', '=', $story)
        ->where('u.id', '=', $user)
        ->get();

        return $task;


    }



}
