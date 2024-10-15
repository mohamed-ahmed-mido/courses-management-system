<?php

namespace App\Models;

use App\Models\Course_round;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    public $table = 'courses';
    protected $guarded= [];

    public function course_round(){
        return $this->belongsTo(Course_round::class);
    }
}
