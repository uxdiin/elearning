<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request){
        $new_answer = new Answer();
        $new_answer->problem_id = $request->get('problem_id');
        $new_answer->user_id = $request->get('user_id');
        $new_answer->save();
        $answer_id = $new_answer->id;
        $answerNumberController = new AnswerNumberController();
        $answerNumberController->store($request,$answer_id);
    }
}
