<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_Model_Task_Model extends Model
{
    protected $table = 'user_task'; 
    protected $fillable = ['user_id', 'task_id', 'worked_hours'];
}
