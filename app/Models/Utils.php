<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Utils extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    public static function dateTimeUsToDateFr($date)
    {
        if ($date == NULL) return '';
        $date_time = Utils::dateTimeUsToFr($date, 0);
        $expl = explode(' ', $date_time);
        return $expl[0];
    }


    public static function dateTimeUsToFr($date_format_us, $heure=1)
    {
        $temp_date = explode(' ', $date_format_us);
        $temp_date2 = explode('-', $temp_date[0]);
        if ($temp_date2['2'] != '' && $date_format_us != '0000-00-00 00:00:00' )
        {
            if ($heure == 1)
                return $temp_date2['2'] . '/' . $temp_date2['1'] . '/' . $temp_date2['0'] . ' ' . $temp_date['1'];
            else
                return $temp_date2['2'] . '/' . $temp_date2['1'] . '/' . $temp_date2['0'];
        }
        else
        {
            // pas correct
            return '';
        }
    }
}
