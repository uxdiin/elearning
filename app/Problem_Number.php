<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem_Number extends Model
{
    protected $table = 'problem_numbers';
    protected $fillable = ['number','pertanyaan','jawaban','problem_id'];
    function problem(){
        return $this->belongsTo(Problem::class);
    }
}
