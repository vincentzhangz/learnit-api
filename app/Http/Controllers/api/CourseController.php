<?php

namespace App\Http\Controllers\api;

use App\Course;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function register(){
        
    }

    public function getCourse(){
        return Course::all();
    }

    public function getCourseById(Request $request){

    }



}
