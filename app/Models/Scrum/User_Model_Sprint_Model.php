<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Model_Sprint_Model extends Model
{
    protected $table = 'user_sprint'; 
    protected $fillable = ['user_id', 'sprint_id', 'assigned_hours', 'capacity'];


     // Funciones estaticas
     public static function getRecord($sprint,$user){
        // Funcion que retorna el id de un registro de la tabla user_sprint
        // que coincida con un usuario especifico y un sprint
        $id = DB::table('user_sprint AS us') 
        ->select('us.id')
        ->where('us.sprint_id', '=', $sprint)
        ->where('us.user_id', '=', $user)
        ->first();
        return $id;
    }

    public static function getStateSprint($sprint){
        /* 
       Funcion que retorna si el estado de un sprint fue finalizado completamente
       Parametro: id del sprint 
       */
       $states = DB::table('user_sprint AS usp')
       ->join('sprint as s', 'usp.sprint_id', 's.id')
       ->join('users as u', 'u.id', 'usp.user_id')
       ->select('usp.state')
       ->where('s.id', '=', $sprint)
       ->where('usp.state','=', 0)
       ->get();

       if(sizeof($states) == 0){
           return 1;
       }
       else{
            return 0;
       }
    }

    public static function getWorkHoursSprint($sprint){
        /*
       Funcion que retorna la sumatoria de horas trabajadas por el equipo en un sprint  
       */
        $hours = DB::table('user_sprint AS usp')
        ->join('sprint as s', 'usp.sprint_id', 's.id')
        ->join('users as u', 'u.id', 'usp.user_id')
        ->select(DB::raw('SUM(usp.worked_hours) as hours'))
        ->where('s.id', '=', $sprint)
        ->where('usp.state','=',1)
        ->first(); 
        return $hours;
    }

}
