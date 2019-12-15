<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = ['title','start_time','start_date','end_time','end_date'];
    function ProblemNumbers(){
        return $this->hasMany(Problem_Number::class);
    }
}
