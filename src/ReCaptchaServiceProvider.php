<?php

namespace Coderscoop\LaravelReCaptcha;

use Illuminate\Support\ServiceProvider;

/**
 * Description of ReCaptchaServiceProvider
 *
 * @author samyoteroglez
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
        $this->loadViewsFrom(__DIR__ . '/Views', 'recaptcha');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindReCaptcha();
        $this->setPackageConfigFile();
    }
    
    protected function bindReCaptcha()
    {
        $this->app->bind('reCaptcha', function() {
            return new ReCaptcha(app('config')->get('recaptcha'));
        });
    }
    
    /**
     * Set package config file
     */
    protected function setPackageConfigFile()
    {
        $config = __DIR__ . '/Config/recaptcha.php';
        $path = config_path('recaptcha.php');
        $this->publishes([
            $config => $path,
        ]);
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
