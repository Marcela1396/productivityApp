<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Model_User_Story_Model extends Model
{
    protected $table = 'user_user_story'; 
    protected $fillable = ['user_id', 'user_story_id', 'state'];

    // Funciones estaticas
    public static function getRecord($story,$user){
        // Funcion que retorna el id de un registro de la tabla user_user_story
        // que coincida con un usuario especifico y una historia de usuario
        $id = DB::table('user_user_story AS uus') 
        ->select('uus.id')
        ->where('uus.user_story_id', '=', $story)
        ->where('uus.user_id', '=', $user)
        ->first();
        return $id;
    }

    public static function getStateStories($sprint, $user){
        /* 
       Funcion que retorna el estado de las historias de usuario finalizadas en un sprint
       Parametro: id del sprint y el usuario
       */
       $states = DB::table('user_user_story AS uus') 
       ->join('user_story as us', 'uus.user_story_id', 'us.id')
       ->join('sprint as s', 'us.sprint_id', 's.id')
       ->join('users as u', 'u.id', 'uus.user_id')
       ->select('uus.state')
       ->where('s.id', '=', $sprint)
       ->where('u.id', '=', $user)
       ->where('uus.state','=', 0)
       ->get();

       if(sizeof($states) == 0){
           return 1;
       }
       else{
            return 0;
       }
   }



   public static function getWorkHoursSprint($sprint, $user){
        /*
       Funcion que retorna la sumatoria de horas trabajadas por el usuario en un sprint  
       */
    $hours = DB::table('user_user_story AS uus') 
    ->join('user_story as us', 'uus.user_story_id', 'us.id')
    ->join('sprint as s', 'us.sprint_id', 's.id')
    ->join('users as u', 'u.id', 'uus.user_id')
    ->select(DB::raw('SUM(uus.worked_hours) as hours'))
    ->where('s.id', '=', $sprint)
    ->where('u.id', '=', $user)
    ->where('uus.state','=',1)
    ->first(); 
    return $hours;
    }



}
