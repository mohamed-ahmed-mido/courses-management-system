<?php

namespace App\Models;

use App\Models\User;
use App\Models\Round;
use App\Models\Course;
use App\Models\Project;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course_round extends Model
{
    use HasFactory;
    public $table = 'course_rounds';
    protected $guarded= [];

    public function course (){
       return $this->belongsTo(Course::class);
    }
    public function round (){
        return $this->belongsTo(Round::class);
    }
    public function user (){
        return $this->hasMany(User::class);
    }
    public function instructor (){
        return $this->belongsTo(Instructor::class);
    }
    public function project (){
        return $this->hasMany(Project::class);
    }

}
