<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CClass extends Model
{
    protected $table="class";
    public function class_member(){
        return $this->hasMany(Class_Member::class);
    }
}
