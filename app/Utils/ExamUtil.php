<?php
namespace App\Utils;

use Carbon\Carbon;

class ExamUtil
{

    public  static function isMaxTimeExpired($time = 60)
    {

        if(!session()->has('max_time')) {
            session()->put('max_time', Carbon::now()->timestamp);
        }

        $max_time = session()->get('max_time');

        return $max_time + $time < time();

    }

    public static function  getTimeMax()
    {
        return session()->get('max_time');
    }

    public static function remainingTime()
    {
        return self::getTimeMax() - time();
    }
}
