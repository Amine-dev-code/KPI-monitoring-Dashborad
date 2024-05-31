<?php

namespace App\Console;

use App\Jobs\DailyMail;
use App\Jobs\MiseAjour;
use App\Models\Time;
use Illuminate\Console\Scheduling\Schedule;
use Carbon\Carbon;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    
    protected function schedule(Schedule $schedule): void
    {

       // Schedule the closure to run daily
       $time=Time::find(1);
       if($time){
        $hourly=$time->time;
        $schedule->job(new MiseAjour)->dailyAt($hourly);
       }
       
            // Format the retrieved time as a string 
        $schedule->job(new DailyMail)->dailyAt('08:00');
    }
    //vous devez configurez ces jobs la avec cron job a travers supervisor

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
