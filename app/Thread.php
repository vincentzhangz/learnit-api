<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'thread';
    protected $primaryKey = 'thread_id';
    protected $hidden = ['user'];
    protected  $casts = [
        'thread_id' => 'string',
        'forum_id' => 'string',
        'user_id' => 'string'
    ];
    protected $appends = [
        'user-thread'
    ];

    public function forum(){
        return $this->belongsTo(Forum::class,'forum_id');
    }
    public function getUserThreadAttribute(){
        return $this->user;
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
