<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $hidden = [];
    protected $appends = [
        'user-comment'
    ];
    protected $casts = [
        'thread_id' => 'string',
        'user_id' => 'string',
    ];

    // public function user(){
    //     return $this->hasOne(User::class,'user_id');    
    // }

}
