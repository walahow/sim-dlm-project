<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
Schedule::command('dlm:archive-bookings')->weeklyOn(5, '19:10');
Schedule::command('dlm:delete-archived')->daily();
