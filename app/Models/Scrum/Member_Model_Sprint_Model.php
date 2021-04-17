<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_Model_Sprint_Model extends Model
{
    protected $table = 'member_sprint'; 
    protected $fillable = ['member_id', 'sprint_id', 'assigned_hours', 'capacity'];
}
