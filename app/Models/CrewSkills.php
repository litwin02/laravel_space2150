<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewSkills extends Model
{
    // use HasFactory;
    public $timestamps = false;
    protected $table = 'crew_skills';
    protected $primaryKey = 'id';
    protected $fillable = [
        'moudle_crew_id',
        'name',
    ];
    
}
