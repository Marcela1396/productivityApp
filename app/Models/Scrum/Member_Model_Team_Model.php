<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_Model_Team_Model extends Model
{
    protected $table = 'member_team'; 
    protected $fillable = ['team_id', 'member_id'];
}
