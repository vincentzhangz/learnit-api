<?php

namespace App\Http\Controllers\api;

use App\CourseEnroll;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CourseEnrollController extends Controller
{
    public function getCourse(Request $request){
        $user = User::where('user_id',$request->user_id)->first();
        if(!$user)
            return json_encode(array('error'=>'Wrong user Id'));
        
        $listCourse = CourseEnroll::where('user_id',$request->user_id)->get();
        return $listCourse;
    }
}
