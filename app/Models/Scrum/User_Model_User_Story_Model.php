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
        $id = DB::table('user_user_story AS uup') 
        ->select('uup.id')
        ->where('uup.user_story_id', '=', $story)
        ->where('uup.user_id', '=', $user)
        ->first();
        return $id;
    }

}
