<?php

declare(strict_types=1);

namespace Costar\Support\Providers;

/**
 * Class     CommandServiceProvider

 */
abstract class CommandServiceProvider extends ServiceProvider
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->commands($this->commands);
    }

    /**
     * Get the provided commands.
     *
     * @return array
     */
    public function provides()
    {
        return $this->commands;
    }
}
