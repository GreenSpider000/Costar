<?php

namespace Modules\Collection\Listeners\SubjectViewed;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\Collection\Events\SubjectViewed;

class IncrementHitCount implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SubjectViewed $event)
    {
        $subject = $event->subject;

        $subject->increment('hits');

        $subject->view_counter += 1;

        Log::debug('Listeners: IncrementHitCount');
    }
}
