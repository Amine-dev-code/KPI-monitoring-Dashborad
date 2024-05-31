<?php

namespace App\Http\Controllers;
use App\Jobs\DailyMail;
use App\Mail\Financemarkdown;
use App\Mail\Mailmarkdown;
use App\Mail\ReportMail;
use App\Models\Unite;
use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;



class MailsendingController extends Controller
{
    public function sendmail(){
        DailyMail::dispatch();
        return 'mail sended';
    
    }

}
