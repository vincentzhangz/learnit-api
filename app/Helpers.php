<?php

namespace App;

use DateTime;
use DateTimeZone;

class Helpers 
{
    public static function getCurrentDate(){
        $time = new DateTime(null,new DateTimeZone('Asia/Jakarta'));
        return $time->format('Y-m-d H:i:s');
    }
}
