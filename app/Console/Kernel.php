<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('balance:deduct')->everyMinute();
        $schedule->command('balance:add')->everyMinute();
        $schedule->command('balance:deduct')->everyMinute();
    }

    protected $commands = [
        'App\Console\Commands\AddBalanceCommand',
        'App\Console\Commands\DeductBalanceCommand',

    ];

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');


    }
}
