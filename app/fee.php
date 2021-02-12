<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fee extends Model
{
    public $fillable = array("fee","student_id");
}
