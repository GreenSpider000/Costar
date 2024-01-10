<?php

namespace Modules\Collection\Listeners\SubjectCreated;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\Collection\Events\SubjectCreated;

class CreateSubjectData implements ShouldQueue
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
    public function handle(SubjectCreated $event)
    {
        $subject = $event->subject;

        Log::debug('Listeners: CreateSubjectData');
    }
}
