<?php

/*
 * This file is part of the Vegvisir's Laravel EmailLabs package.
 * It provides a Laravel wrapper for EmailLabs Library.
 *
 * @copyright 2019 Vegvisir Sp. z o.o. <vegvisir.for.all@gmail.com>
 * @license MIT
 */

namespace Vegvisir\EmailLabs;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class EmailLabsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/emaillabs.php', 'emaillabs');
        $this->publishes([
            __DIR__.'/../config/emaillabs.php' => config_path('emaillabs.php'),
        ], 'emaillabs');
    }

    public function register()
    {
        $this->app->bind('emaillabs', function () {
            return new EmailLabs(Config::get('emaillabs'));
        });
        $this->app->alias('emaillabs', '\Vegvisir\EmailLabs\EmailLabs');
    }
}
