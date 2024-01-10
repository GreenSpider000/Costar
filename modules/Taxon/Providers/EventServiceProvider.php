<?php

namespace Modules\Taxon\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [

        /**
         * Backend.
         */
        'Modules\Taxon\Events\Backend\NewCreated' => [
            'Modules\Taxon\Listeners\Backend\NewCreated\UpdateAllOnNewCreated',
        ],

    /**
     * Frontend.
     */
    ];
}
