<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public $fillable = array('student_id','sname','fname','class','phnum','email','course_id','branch_id','image');
}
