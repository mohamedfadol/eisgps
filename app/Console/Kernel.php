<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Spatie\ShortSchedule\ShortSchedule;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\MovingVehicles::class,
        Commands\ParkingEngineOffVehicles::class,
        Commands\ParkingEngineOnVehicles::class,
        Commands\LiveTracking::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('wasl:moving')
            ->everyTwoMinutes();
        $schedule->command('wasl:parked_off')
            ->hourly();
        $schedule->command('wasl:parked_on')
            ->everyTwoMinutes();
    }

    protected function shortSchedule(ShortSchedule $shortSchedule)
    {

        $shortSchedule->command('wasl:live')
            ->everySecond(30);

    }

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
