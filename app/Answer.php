<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['problem_id','user_id','nilai'];

    public function answerNumber(){
        return $this->hasMany(Answer_Number::class,'answer_id','id');
    }
}
