<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
      protected $table = 'user';
      protected $fillable = array('user_name', 'user_image');
      protected $guarded = array('user_id', 'user_email');
      protected $hidden = array('user_password','user_id','created_at','updated_at','api_token');
   }
