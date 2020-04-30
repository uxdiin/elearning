<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Http\Resources\AnnouncementResources;
use Exception;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AnnouncementResources::collection(Announcement::where('class_id',$request->class_id)->get());
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
        try{
            $new_Announcement = new Announcement();
            $new_Announcement->name = $request->get('name');
            $new_Announcement->date = $request->get('date');
            $new_Announcement->text = $request->get('text');
            $new_Announcement->class_id = $request->get('class_id');
            $new_Announcement->save();
            $message = [
                'status'=>200,
                'message'=>'sukses membuat pengumuman',
                'announcement'=>$new_Announcement
            ];
            return response()->json($message);
        }catch(Exception $e){
            $message = [
                'status'=>500,
                'message'=>'gagal membuat pengumuman',
                'e'=>$e
            ];
            return response()->json($message);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
