<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'task'; 

    //  Task belongs to User Story
    public function story()
    {
        return $this->belongsTo(UserStoryModel::class, 'user_story_id', 'id');
    }

     // Task belongs to Definition of done
    public function ddone()
    {
         return $this->belongsTo(DoDModel::class, 'id', 'id');
    }
    
    // Pendiente
     // Relation Task has Many to Many Member
    public function members(){
        return $this->belongsToMany(MemberModel::class, 'member_id', 'task_id');
    }
}
