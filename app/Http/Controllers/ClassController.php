<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CClass;
use App\Http\Resources\ClassResources;

class ClassController extends Controller
{
    public function index(){
        return ClassResources::collection(CClass::all());
    }
    
    public function store(Request $request){
        try{        
            $newClass = new CClass();
            $newClass->name = $request->get("name");
            $newClass->code = $request->get("code");
            $newClass->teacher_id = $request->get("teacher_id");
            $newClass->save();   
            return response()->json(['status'=>200,'message'=>'berhasil menambah kelas','data'=>$newClass]);
        }catch(Exception $e){
            return response()->json(['status'=>500,'message'=>'gagal menambah kelas']);
        }
    }
}
