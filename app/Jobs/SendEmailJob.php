<?php

namespace App\Jobs;

use App\Mail\SendEmailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailJob implements ShouldQueue
{
    use Queueable;
    
    protected $url;
    protected $user;
    /**pr
     * Create a new job instance.
     */
    public function __construct($url, $user)
    {
        $this->url=$url;
        $this->user=$user;
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
    Mail::to($this->user->email)->send(new SendEmailNotification($this->url,$this->user));
        
    }
}
