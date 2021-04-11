<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'member'; 

     // Member belongs to Role
     public function role()
    {
         return $this->belongsTo(RoleModel::class, 'role_id', 'id');
    }

    // Pendiente
    // Relation Member hast Many to Many Task
    public function tasks(){
        return $this->belongsToMany(TaskModel::class);
    }

    // Pendiente
    // Relation Team has Many to Many Members
    public function teams(){
        return $this->belongsToMany(TeamModel::class, 'team_id', 'member_id');
    }

}
