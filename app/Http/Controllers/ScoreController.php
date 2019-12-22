<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Score;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function calculateAvgScore($user_id){
        $avgScore = DB::select("select avg(nilai) as avg from answers where user_id = $user_id");
        $avgScore = $avgScore[0]->avg;
        return $avgScore;
    }
    public function search(Request $request){
        $userController = new UserController();
        $found = false;
        $users = $userController->getAllUser();
        $users = json_decode($users);
        $users = $users->data;
        $user ="{}";
        $user = json_decode($user);
        foreach($users as $key){
            if($key->Nama==$request->Nama){
                $user->id = $key->id;
                $user->Nama = $key->Nama;
                $found = true;
                break;
            }
        }
        if($found){
            $user->score = $this->calculateAvgScore($user->id);
            return response()->json($user);
        }{
            return response()->json();
        }
        
    }
    
}
