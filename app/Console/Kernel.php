<?php

namespace App\Console;

use App\Console\Commands\ListUsers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
    {
    protected $commands = [
        \App\Console\Commands\CustomCommand::class,
        ListUsers::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        //
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
