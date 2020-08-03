<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Resources\ProjectResources;

class ProjectController extends Controller
{
    public function index(){
        return ProjectResources::collection(Project::All());
    }

    public function indexByImplementor(Request $request){
        return ProjectResources::collection(Project::where('tim_support',$request->implementor))
    }
}
