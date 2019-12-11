<?php

namespace App\Http\Controllers;

use App\Answer_Number;
use Illuminate\Http\Request;

class AnswerNumberController extends Controller
{
    public function store(Request $request, $problem_id){

        $answer_numbers = $request->get('answer_numbers');
        foreach($answer_numbers as $key){
            $new_answerNumber = new Answer_Number();
            $new_answerNumber->text = $key['text'];
            $new_answerNumber->answer_id= $key['answer_id'];
            $new_answerNumber->save();
        }

    }
}
