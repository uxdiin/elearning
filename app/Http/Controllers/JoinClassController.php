<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CClass;
use App\Class_Member;

class JoinClassController extends Controller
{
    public function join(Request $request){
        $class = CClass::where('code',$request->get('code'))->get();
        Class_Member::create([
            'class_id'=>$class->id,
            'user_id'=>$request->get('user_id'),
        ]);
    }
}
