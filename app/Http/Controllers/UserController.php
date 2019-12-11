<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('users.index');
        return UserResource::collection(User::All());
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
        $new_user = new User();
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->role = $request->get('role');
        $new_user->password = Hash::make($request->get('password'));
        $new_user->save();
        $message = [
            'status'=>200,
            'message'=>'menambah murid sukses',
            'user'=>$new_user,
        ];

        }catch(Exception $e){
            $message = [
                'status'=>500,
                'message'=>'internal server error',
            ];
            return response()->json($message);
        }
        return response()->json($message);
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
    public function update(Request $request)
    {
        try{
            $update_user = User::findOrFail($request->get('id'));
            $update_user->name = $request->get('name');
            $update_user->email = $request->get('email');
            $update_user->password = $request->get('password');
            $update_user->save();
            $message = [
                'status'=>200,
                'message'=>'mengedit murid sukses',
                'user'=>$update_user,
            ];

            }catch(Exception $e){
                $message = [
                    'status'=>500,
                    'message'=>'internal server error',
                ];
                return response()->json($message);
            }
            return response()->json($message);
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
