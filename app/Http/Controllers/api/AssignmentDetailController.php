<?php

namespace App\Http\Controllers\api;

use App\AssignmentDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignmentDetailController extends Controller
{
    public function register(Request $request){
        if(!$request->user_id||!$request->assignment_upload_file){
            //
        }
    }

    public function getAnswer(){
        return AssignmentDetail::all();
    }

    public function getAnswerByUser(Request $request){
        return AssignmentDetail::where('user_id',$request->user_id)->get();
    }
    
    public function getAnswerByAssignmentId(Request $request){
        return AssignmentDetail::where('assignment_id',$request->assignment_id)->get();
    }
}
