<?php

namespace App\Listeners;

use App\Mail\NewArticleMail;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CreateArticleEvent;
use Illuminate\Support\Facades\Mail;

class CreateArticleListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(CreateArticleEvent $event)
    {
        Mail::to($event->email)->send(new NewArticleMail($event->name, $event->description, $event->sitename));
    }

}
