<?php

namespace App\Models;

use App\Models\Reply;
use App\Models\Instructor;
use App\Models\Course_round;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    public $table = 'projects';
    protected $guarded= [];
    public function course_round(){
        return $this->belongsTo(Course_round::class);
    }
    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }
    public function reply (){
        return $this->hasMany(Reply::class);
    }

}
