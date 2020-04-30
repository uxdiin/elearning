<?php

namespace App\Http\Controllers;

use App\Auth;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Class_Member;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\GuzzleResponseParser;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getStudentByClass(Request $request){
        $students = $this->getAllUser();
        // dd($students);
        $students = json_decode($students);
        $students = $students->data;
        $studentsInClass = [];
        foreach($students as $student){
            $exits = Class_Member::where('class_id',$request->class_id)->where('user_id',$student->id)->get();
            if(count($exits)!=0){            
                $studentsInClass[] = [
                    'Nama'=>$student->Nama,
                    'Email'=>$student->Email,
                    'Password'=>$student->Password,
                    'id'=>$student->id,
                ];
            }
        }
        
        return UserResource::collection(collect($studentsInClass));
    }
    public function getAllUser()
    {
        $curl = curl_init();
        $prov = "http://".Auth::$ip."/api/Akademik";

        curl_setopt_array($curl, array(
        CURLOPT_URL => $prov,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".Auth::$apiKey,
        ),
        ));

        $response = curl_exec($curl);
        return $response;
    }

    public function getAllTeacher(){
        $curl = curl_init();
        $prov = "http://".Auth::$ip."/api/Dosen";

        curl_setopt_array($curl, array(
        CURLOPT_URL => $prov,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".Auth::$apiKey,
        ),
        ));

        $response = curl_exec($curl);
        return $response;
    }


    public function index()
    {
        return UserResource::collection(User::All());
    }
    public function indexApi(){
        return $this->getAllUser();
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
