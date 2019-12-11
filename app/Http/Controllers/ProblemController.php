<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProblemReadyResources;
use App\Http\Resources\ProblemResources;
use Illuminate\Support\Facades\DB;
use App\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProblemResources::Collection(Problem::All());
    }
    public function indexReady(){
        return ProblemReadyResources::Collection(Problem::where('start_date','<=',DB::raw('curdate()'))
                                                        ->where('end_date','>=',DB::raw('curdate()'))
                                                        ->where('start_time','<=',DB::raw('curtime()'))
                                                        ->where('end_time','>=',DB::raw('curtime()'))
                                                        ->orwhere(function($query){
                                                             $query->where('end_date','!=',DB::raw('curdate()'))
                                                             ->where('start_date','<=',DB::raw('curdate()'))
                                                             ->where('end_date','>=',DB::raw('curdate()'));

                                                        })
                                                        ->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_problem = new Problem();
        $new_problem->title = $request->get('title');
        $new_problem->start_time = $request->get('start_time');
        $new_problem->start_date = $request->get('start_date');
        $new_problem->end_time = $request->get('end_time');
        $new_problem->end_date = $request->get('end_date');
        $new_problem->save();
        $problem_id = $new_problem->id;
        $problemNumberController = new ProblemNumberController();
        $problemNumberController->store($request,$problem_id);
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function show(Problem $problem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function edit(Problem $problem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problem $problem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem $problem)
    {
        //
    }
}
