<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function getPeriod($date_debut, $period)
    {
        $date = Carbon::createFromFormat('Y-m-d', $date_debut);
        $date->addMonths($period - 1);
        return $date->format('F Y');
    }
}
