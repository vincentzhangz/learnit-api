<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private  $allEntity = [
    'user_id',
    'user_name',
    'user_email',
    'user_gender',
    'user_image',
    'user_role',
    'created_at'
    ];

    public function getUser(){
        return DB::table('user')->get($this->allEntity);
    }

    public  function getUserByEmail(Request $request){
        $email = $request->email;
        return DB::table('user')->get($this->allEntity)->where('user_email',$email);
    }

    public function login(Request $request){
        $result = DB::table('user')->where('user_email',$request->email)->first();
        if($result !== null){
            if(password_verify($request->password,$result->user_password)){
                unset($result->user_password);
                return json_encode($result);
            }
        }else
            return 'wrong';
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
            return $validate->errors();
        }

        if(DB::table('user')->insert([
            'user_id'=>uniqid(),
            'user_name'=>$username,
            'user_email'=>$email,
            'user_gender'=>$gender,
            'user_image'=>null,
            'user_role'=>$role,
            'user_password'=>password_hash($password,PASSWORD_BCRYPT),
            'created_at'=>Helpers::getCurrentDate()
        ]))
        return 'success';
        return 'error-server';
    }
}
