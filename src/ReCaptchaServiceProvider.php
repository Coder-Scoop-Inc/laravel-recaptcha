<?php

namespace Coderscoop\LaravelReCaptcha;

use Illuminate\Support\ServiceProvider;

/**
 * Description of ReCaptchaServiceProvider
 *
 * @author tesa
 */
class ReCaptchaServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('reCaptcha', function() {
            return new ReCaptcha;
        });
    }
    
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['reCaptcha'];
    }
}
