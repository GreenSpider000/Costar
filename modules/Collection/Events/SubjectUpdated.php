<?php

namespace Modules\Collection\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Collection\Models\Subject;

class SubjectUpdated
{
    use SerializesModels;

    public $subject;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
