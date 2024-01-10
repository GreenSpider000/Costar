<?php

namespace Modules\Collection\Listeners\SubjectUpdated;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\Collection\Events\SubjectUpdated;

class UpdateSubjectData implements ShouldQueue
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
    public function handle(SubjectUpdated $event)
    {
        $subject = $event->subject;

        Log::debug('Listeners: UpdateSubjectData');
    }
}
