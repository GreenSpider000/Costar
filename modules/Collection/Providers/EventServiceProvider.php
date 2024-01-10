<?php

namespace Modules\Collection\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'Modules\Collection\Events\SubjectCreated' => [
            'Modules\Collection\Listeners\SubjectCreated\CreateSubjectData',
        ],
        'Modules\Collection\Events\SubjectUpdated' => [
            'Modules\Collection\Listeners\SubjectUpdated\UpdateSubjectData',
        ],
        'Modules\Collection\Events\SubjectViewed' => [
            'Modules\Collection\Listeners\SubjectViewed\IncrementHitCount',
        ],
    ];
}
