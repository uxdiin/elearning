<?php

namespace App\Http\Controllers;

use App\Problem_Number;
use Illuminate\Http\Request;

class ProblemNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$problem_id)
    {
        $problem_Number = $request->problem_number;
        foreach($problem_Number as $key){
            $new_problemNumber = new Problem_Number();
            $new_problemNumber->number = $key['number'];
            $new_problemNumber->pertanyaan = $key['pertanyaan'];
            $new_problemNumber->jawaban = $key['jawaban'];
            $new_problemNumber->problem_id = $problem_id;
            $new_problemNumber->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Problem_Number  $problem_Number
     * @return \Illuminate\Http\Response
     */
    public function show(Problem_Number $problem_Number)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Problem_Number  $problem_Number
     * @return \Illuminate\Http\Response
     */
    public function edit(Problem_Number $problem_Number)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Problem_Number  $problem_Number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problem_Number $problem_Number)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Problem_Number  $problem_Number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem_Number $problem_Number)
    {
        //
    }
}
