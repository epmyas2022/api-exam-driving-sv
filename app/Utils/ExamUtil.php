<?php

namespace App\Utils;

use Carbon\Carbon;

class ExamUtil
{

    public  static function isMaxTimeExpired($time = 1)
    {

        if (!session()->has('max_time')) {
            session()->put('max_time', Carbon::now()->timestamp);
        }

        $max_time = session()->get('max_time');

        session()->put('max_time', Carbon::parse($max_time)->addMinutes($time)->timestamp);

        return self::getTimeMax() < time();
    }

    public static function  getTimeMax()
    {
        return session()->get('max_time');
    }

    public static function remainingTime()
    {

        $seconds = Carbon::parse(self::getTimeMax())->diffInSeconds(Carbon::now());

        return $seconds % 60;
    }
}
