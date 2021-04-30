<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
