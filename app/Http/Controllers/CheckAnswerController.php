<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem_Number;
use App\Answer_Number;

class CheckAnswerController extends Controller
{
    public function check(Request $request){
        $answerNumbers = Answer_Number::where('answer_id',$request->get('answer_id'))->get();
        $problemNumbers = Problem_Number::where('problem_id',$request->get('problem_id'))->get();
        $data ="{}";
        $data = json_decode($data);
        $data->problem_numbers = $problemNumbers;
        $data->answer_numbers = $answerNumbers;
        return response()->json($data);
    }
}
