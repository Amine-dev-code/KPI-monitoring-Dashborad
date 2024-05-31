<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailmarkdown;
use App\Mail\Financemarkdown;

class DailyMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $users=User::all();
        foreach($users as $user){
            
        }
            $users=User::all();
            foreach($users as $user){
                if($user->role=='user' && $user->email){
                    $kpiglbs=$user->kpi_glob;
                    if($kpiglbs->count()!=0){
                        Mail::to($user->email)->send(new Mailmarkdown($user));
                    }
                    $kpifins=$user->kpi_fin;
                    if($kpifins->count()!=0){
                        Mail::to($user->email)->send(new Financemarkdown($user));
                    }
                }
            }
           
            
    }
}
