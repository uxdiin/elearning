<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_Member extends Model
{
    protected $table = "class_members";
    protected $fillable = ['class_id','user_id'];
}
