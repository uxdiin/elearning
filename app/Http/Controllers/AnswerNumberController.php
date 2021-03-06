<?php

namespace App\Http\Controllers;

use App\Answer_Number;
use Exception;
use Illuminate\Http\Request;

class AnswerNumberController extends Controller
{
    public function indexByAnswers(Request $request)
    {
        $answer_numbers = Answer_Number::where('answer_id',$request->get('answer_id'));
        return $answer_numbers;
    }
    public function store(Request $request, $answer_id){
        try{
            $answer_numbersold = Answer_Number::where('answer_id',$answer_id)->get(); 
            // dump($answer_numberOld);
            if(count($answer_numbersold)!=0){
                $i=0;
                $answer_numbers = $request->get('answer_numbers');
                foreach ($answer_numbers as $key)
                {
                    $answer_numbersold[$i]->text = $key['text'];
                    $answer_numbersold[$i]->save();
                    $i++;
                }
            }else{
                $answer_numbers = $request->get('answer_numbers');
                foreach($answer_numbers as $key){
                    $new_answerNumber = new Answer_Number();
                    $new_answerNumber->text = $key['text'];
                    $new_answerNumber->answer_id= $answer_id;
                    $new_answerNumber->save();
                }
            }
        }catch(Exception $e){
            return response();
        }

    }
}
