<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CClass;
use App\Class_Member;
use App\Http\Resources\ClassResources;

class JoinClassController extends Controller
{
    public function index(Request $request){
        $class = CClass::where('code',$request->get('code'))->get();
        if(count($class)==0){
            $message = "kelas tidak ada";
            return response()->json(['status'=>200,'message'=>$message]);
        }else{
            return ClassResources::collection($class);
        }
        
    }
    public function join(Request $request){
        try{
            $class = CClass::where('code',$request->get('code'))->first();
            $classMember = Class_Member::where('user_id',$request->get('user_id'))->get();
            $message = "";
            if(count($classMember)==0){
                $classMember = Class_Member::create([
                    'class_id'=>$class->id,
                    'user_id'=>$request->get('user_id'),
                ]);
                $message = 'sukses join kelas';
            }else{
                $message = 'anda sudah terdaftar';
            }
            return response()->json(['status'=>200,'message'=>$message,'data'=>$classMember]);
        }catch(Exception $e){
            return response()->json(['status'=>500,'message'=>'gagal join kelas']);
        }
    }
}
