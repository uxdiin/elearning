<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            if(Auth::user()->api_token == null){
                $user = Auth::user();
                $user->api_token = Str::random(88);
                $user->save();
            }
            return Auth::user();
        }else{
            return response()->json(['message'=>'password or email invalid','status'=>403]);
        }
    }
    public function loginApi(Request $request){
        $curl = curl_init();
        $prov = "http://".Auth::$ip."/api/login-api";

        curl_setopt_array($curl, array(
        CURLOPT_URL => $prov,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "password=".$request->get('password')."&email=".$request->get("email"),
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".Auth::$apiKey,
        ),
        ));

        $response = curl_exec($curl);
        return $response;
        // $userController = new UserController();
        // $login = false;
        // if($login==false){
        //     $userJson = $userController->getAllTeacher();
        //     $userJson = json_decode($userJson);
        //     $userJson = $userJson->data;
        //     $email = $request->get('email');
        //     $password = $request->get('password');
        //     $i = 0;
        //     foreach($userJson as $key){
        //         if($key->Email == $email && Hash::check($password, $key->Password)){
        //             $login = true;
        //             $userJson[$i]->role = "teacher";
        //             break;
        //         }
        //         $i++;
        //     }
        // }
        // if($login == false){
        //     $userJson = $userController->getAllUser();
        //     $userJson = json_decode($userJson);
        //     $userJson = $userJson->data;
        //     $email = $request->get('email');
        //     $password = $request->get('password');
        //     $userArray = [];
        //     $i = 0;
        //     foreach($userJson as $key){
        //         if($key->Email == $email && Hash::check($password, $key->Password)){
        //             $login = true;
        //             $userJson[$i]->role = "student";
        //             break;
        //         }
        //         $i++;
        //     }
        // }
        // if($login){
        //     return response()->json($userJson[$i]);
        // }else{
        //     return response()->json(['message'=>'password or email invalid','status'=>403]);
        // }
    }
}

