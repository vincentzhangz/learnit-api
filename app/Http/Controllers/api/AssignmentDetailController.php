<?php

namespace App\Http\Controllers\api;

use App\AssignmentDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignmentDetailController extends Controller
{
    public function register(Request $request){
        if(!$request->user_id||!$request->assignment_upload_file){
            if(!$request->user_id||!$request->assignment_upload_file){
                return json_encode(array("error"=>'invalid form data'));
            }
            $register_id = uniqid();
            $detail = new AssignmentDetail;
            $detail->assignment_id = $register_id;
            $detail->user_id = $request->user_id;
            $detail->user_id = $request->assignment_upload_file;
            $detail->save();
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
