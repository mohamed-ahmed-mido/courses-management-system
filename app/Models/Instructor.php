<?php

namespace App\Models;
use App\Models\User;
use App\Models\Project;
use App\Models\Course_round;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
    use HasFactory;
    public $table = 'instructors';
    protected $guarded= [];
    public function course_round(){
        return $this->hasMany(Course_round::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function project (){
        return $this->hasMany(Project::class);
    }
}
