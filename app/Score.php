<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = "scores";
    protected $fillable = ['score'];

    public function user(){
        return $this->hasOne(User::class);
    }
}
