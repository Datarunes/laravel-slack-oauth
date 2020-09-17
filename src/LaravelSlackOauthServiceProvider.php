<?php

namespace Datarunes\LaravelSlackOauth;

use Illuminate\Support\ServiceProvider;

class LaravelSlackOauthServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'datarunes');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'datarunes');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-slack-oauth.php', 'laravel-slack-oauth');

        // Register the service the package provides.
        $this->app->singleton('laravel-slack-oauth', function ($app) {
            return new LaravelSlackOauth;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-slack-oauth'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-slack-oauth.php' => config_path('laravel-slack-oauth.php'),
        ], 'laravel-slack-oauth.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/datarunes'),
        ], 'laravel-slack-oauth.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/datarunes'),
        ], 'laravel-slack-oauth.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/datarunes'),
        ], 'laravel-slack-oauth.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
