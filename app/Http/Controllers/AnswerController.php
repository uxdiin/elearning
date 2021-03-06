<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Answer;
use App\User;
use App\Http\Resources\AnswerResources;
use App\Http\Resources\AnswerNumberResources;
use Exception;

class AnswerController extends Controller
{
    public function indexByProblem(Request $request){
        $answers = Answer::where('problem_id',$request->get('problem_id'))->get();
        $answerObj = [];
        $index = 0;
        $userController = new UserController();
        foreach($answers as $answer){
            $users = $userController->getAllUser();
            $users = json_decode($users);
            $users = $users->data;
            foreach($users as $user){
                if($answer->user_id == $user->id){
                    $name = $user->Nama;
                    $email = $user->Email;
                    $user_id = $user->id;
                    break;
                }
            }
            $answerObj[] = [
                'id'=>$answers[$index]->id,
                'name'=>$name,
                'user_id'=>$user_id,
                'email'=>$email,
                'problem_id'=>$request->problem_id,
            ];
            $index++;
        }
        return AnswerResources::collection(collect($answerObj));
        // return $answerObj;
    }
    public function store(Request $request){
        try{
            $answer = Answer::where('problem_id',$request->problem_id)->where('user_id',$request->user_id)->first();
            // dump($answer);
            if($answer!=null){
                $answer_id = $answer->id;
                $answerNumberController = new AnswerNumberController();
                $answerNumberController->store($request,$answer_id);
                $message = [
                    'status' =>200,
                    'message'=> "berhasil menambah jawaban"
                ];
                return response()->json($message);    
            }else{
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
            }
            
        }catch(Exception $e){
            $message = [
                'status' =>500,
                'message'=> "gagal menambah jawaban"
            ];
            return response()->json($message);
        }

    }
    public function show(Request $request){
        $answer = Answer::where('user_id',$request->user_id)->where('problem_id',$request->problem_id)->with('answerNumber')->first();
        // dd($answer);
        if($answer!=null){
            $answerNumbers = $answer->answerNumber;
            return AnswerNumberResources::collection(collect($answerNumbers));
        }else{
            return AnswerNumberResources::collection(collect([]));
        }
    }
    public function showNilai(Request $request){
        $answer = Answer::where('user_id',$request->user_id)->where('problem_id',$request->problem_id)->get();
        // dd($answer);
        if(count($answer)!=0){
            return AnswerResources::collection($answer);
        }else{
            return AnswerResources::collection(collect([]));
        }
    }
    public function nilai(Request $request){
        try{
            $answer = Answer::findOrFail($request->answer_id);
            $answer->nilai = $request->get('nilai');
            $answer->save();
            return response()->json(['status'=>200,'message'=>"sukses menambah nilai"]);
        }catch(Exception $e){
            return response()->json(['status'=>500,'message'=>"gagal menambah nilai"]);
        }
        
    }
}
