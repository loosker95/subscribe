<?php

namespace App\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use DB;
use App\Mail\subscribe;
use Illuminate\Support\Facades\Mail;
use Str;
use App\Models\Subscriber;


class EventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        
        $delay = now()->addSeconds(30);
        DB::table('subscribers')->insert($event->e);
        $taks = Mail::to($event->e['email'])->send(new subscribe($event->e));
        $taks->delay($delay);
    }
}


