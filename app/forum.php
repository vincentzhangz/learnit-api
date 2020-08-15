<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $primaryKey = 'forum_id';
    protected  $casts = [
        'forum_id' => 'string',
        'course_id' => 'string'
    ];

    public function thread(){
        return $this->hasMany(Thread::class,'forum_id');
    }

}
