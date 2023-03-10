<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();\
        // 毎分実行
        $schedule->command('sample-command')->everyMinute()
            ->emailOutputTo('hello@example.com');
        $schedule->command('mail:send-daily-tweet-count-mail')->everyMinute()
            ->emailOutputTo('hello@example.com');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
