<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Helpers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUser(){
        return User::all();
    }

    public function getCurrentUser(){
        return Auth::user();
    }

    public  function getUserByEmail(Request $request){
        $email = $request->email;
        return User::where('user_email', '=', $email)->first();
    }

    public function login(Request $request){
        $result = User::where('user_email', '=', $request->email)->first();
        if($result !== null){
            if(password_verify($request->password,$result->user_password)){
                
                return json_encode(
                    array('user_id' => $result->user_id,
                    'token' => $result->api_token
                    )
                );
            }else
                return json_encode(array("error"=>"Invalid Role"));
        }else
            return json_encode(array("error"=>"Invalid Role"));
    }

    public function register(Request $request){
        $username = $request->username;
        $email = $request->email;
        $gender = $request->gender;
        $role = $request->role;
        $password = $request->password;

        $validate = Validator::make($request->all(),[
        'username'=>'required|max:12|min:4',
        'email'=>'required|email',
        'gender'=>'required|in:male,female',
        'role'=>'required|in:student,lecturer',
        'password'=>'required|max:24|min:6|required_with:repassword|same:repassword',
        'repassword'=>'required|max:24|min:6'
        ]);

        if($validate->fails()){
            return json_encode(array("error"=>"Invalid validation"));
        }
        
        try {
            if(DB::table('user')->insert([
                'user_id'=>uniqid(),
                'user_name'=>$username,
                'user_email'=>$email,
                'user_gender'=>$gender,
                'user_image'=>null,
                'user_role'=>$role,
                'user_password'=>password_hash($password,PASSWORD_BCRYPT),
                'created_at'=>Helpers::getCurrentDate(),
                'api_token'=>Str::random(60)
            ]))
            return json_encode('success');
        } catch (\Throwable $th) {
            return json_encode(array("error"=>"error insert user"));
        }
    }
}
