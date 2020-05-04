<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer_Number extends Model
{
    protected $table = 'answer_numbers';
    protected $fillable = ['text','answer_id'];

    public function answer(){
        return $this->belongsTo(Answer::class,'answer_id','id');
    }
}
