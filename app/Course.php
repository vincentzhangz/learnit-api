<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
        protected $table = 'course';
        protected $primaryKey = 'course_id';
        protected $hidden = array('coursedetail','category','created_at','updated_at','user','user_id','category_id');
        protected $appends = [
            'teacher','course_category','detail'
        ];
        protected $casts = [
            'course_id' => 'string',
        ];


        public function getTeacherAttribute(){
            return $this->user;
        }

        public function getCourseCategoryAttribute(){
            return $this->category;
        }

        public function getDetailAttribute(){
            return $this->coursedetail;
        }

        public function coursedetail(){
            return $this->hasMany(CourseDetail::class,'course_id');
        }

        public function user(){
            return $this->belongsTo(User::class,'user_id');
        }
        public function category(){
            return $this->belongsTo(Category::class,'category_id');
        }
}
