<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use App\Jobs\SendReminderEmail;
use Illuminate\Support\Facades\Mail;

class SendEventReminders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
      
      
    }
    /**
     * Execute the job.
     */
    public function handle()
    {
        \Log::info('SendEventReminders job is executing.');
        //Schedule 1 fois par jour donc timeframe au lieu de == now->addDay()
        $timeFrameStart = Carbon::now()->startOfDay();
        $timeFrameEnd = Carbon::now()->endOfDay()->addDay(); 
        $events = Event::whereBetween('start_date', [$timeFrameStart, $timeFrameEnd])->get();
        foreach ($events as $event) {
            foreach ($event->users as $user) {
                Mail::raw('Dont forget the event', function ($message) {
                    $message->to($user->email)
                            ->subject('Reminder event');
                });
            }
        }
    }
}
