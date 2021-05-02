<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class UserModel extends Model
{
    protected $table = 'users'; 

    

    // ******************************************************************************************
     // Funciones estaticas

     public static function getUser($id){
        /*
        Obtiene la información especifica de un usuario
        Recibe el id del usuario
        */
        $user = DB::table('users')
        ->where('id', '=', $id)
        ->first();
        return $user;
     }
     

    

}
