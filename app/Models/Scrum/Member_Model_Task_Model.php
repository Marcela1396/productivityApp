<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_Model_Task_Model extends Model
{
    protected $table = 'member_task'; 
    protected $fillable = ['member_id', 'task_id', 'worked_hours'];
}
