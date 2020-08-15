<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    protected $table = 'course_detail';
    protected $primaryKey = 'material_id';
    protected $hidden = ['course_content'];
    protected $casts = [
        'course_id' => 'string',
        'material_id' =>'string'
    ];
    
    
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
