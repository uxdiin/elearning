<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CClass;
use App\Class_Member;
use App\Http\Resources\ClassResources;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function indexByTeacher(Request $request){
        return ClassResources::collection(CClass::where('teacher_id',$request->teacher_id));
    }
    public function indexByStudent(Request $request){
        $class_member = Class_Member::findOrFail($request->user_id);
        return ClassResources::collection($class_member->cclass()->get());
    }
    
    public function store(Request $request){
        try{        
            $newClass = new CClass();
            $newClass->name = $request->get("name");
            $newClass->code = $request->get("code");
            $newClass->teacher_id = $request->get("teacher_id");
            $newClass->description = $request->get("description");
            $newClass->save();   
            return response()->json(['status'=>200,'message'=>'berhasil menambah kelas','data'=>$newClass]);
        }catch(Exception $e){
            return response()->json(['status'=>500,'message'=>'gagal menambah kelas']);
        }
    }
}
