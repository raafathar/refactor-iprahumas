<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/**
 * @see https://www.itsolutionstuff.com/post/laravel-11-cron-job-task-scheduling-tutorialexample.html
 */
Schedule::command("check:changeStatusTraining")->everyMinute();
