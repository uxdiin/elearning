<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    function ProblemNumbers(){
        return $this->hasMany(Problem_Number::class);
    }
}
