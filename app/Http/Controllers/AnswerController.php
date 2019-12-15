<?php

namespace App\Http\Controllers;

use App\Answer;
use App\User;
use App\Http\Resources\AnswerResources;
use Illuminate\Http\Request;
use Exception;

class AnswerController extends Controller
{
    public function indexByProblem(Request $request){
        $answers = Answer::where('problem_id',$request->get('problem_id'))->get();
        $answerObj = [];
        $index = 0;
        foreach($answers as $key){
            $user = User::findOrFail($answers[$index]->user_id);
            $name = $user->name;
            $email = $user->email;
            $user_id = $user->id;
            $answerObj[] = [
                'id'=>$answers[$index]->id,
                'name'=>$name,
                'user_id'=>$user_id,
                'email'=>$email,
            ];
            $index++;
        }
        return AnswerResources::collection(collect($answerObj));
        // return $answerObj;
    }
    public function store(Request $request){
        try{
            $new_answer = new Answer();
            $new_answer->problem_id = $request->get('problem_id');
            $new_answer->user_id = $request->get('user_id');
            $new_answer->save();
            $answer_id = $new_answer->id;
            $answerNumberController = new AnswerNumberController();
            $answerNumberController->store($request,$answer_id);
            $message = [
                'status' =>200,
                'message'=> "berhasil menambah jawaban"
            ];
            return response()->json($message);
        }catch(Exception $e){
            $message = [
                'status' =>500,
                'message'=> "gagal menambah jawaban"
            ];
            return response()->json($message);
        }

    }
    public function nilai(Request $request){
        $answer = Answer::findOrFail($request->id);
        $answer->nilai = $request->get('nilai');
        $answer->save();
    }
}
