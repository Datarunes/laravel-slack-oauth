<?php

namespace Datarunes\LaravelSlackOauth\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelSlackOauth extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-slack-oauth';
    }
}
