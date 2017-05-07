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
        $this->setReCaptchaValidator();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {        
        $this->setPackageConfigurationFile();
        $this->bindReCaptcha();
    }
    
    /**
     * Bind the package to Laravel
     */
    protected function bindReCaptcha()
    {
        $this->app->bind('reCaptcha', function() {
            return new ReCaptcha(config('recaptcha'));
        });
    }
    
    /**
     * Set the recaptcha validation rule. Now you can validate the recaptcha field in the same way you validate 
     * other fields using the laravel validation functionalities.
     * 
     * 'g-recaptcha-response' => 'required|recaptcha'
     * 
     */
    protected function setReCaptchaValidator()
    {
        $reCaptcha = $this->app['reCaptcha'];
        $this->app
            ->validator
            ->extendImplicit('recaptcha', function ($attribute, $value, $parameters) use ($reCaptcha) {
                $result = $reCaptcha->verify($value);

                return $result;
        }, 'Please ensure that you are not a robot!');
    }
    
    /**
     * Set package config file
     */
    protected function setPackageConfigurationFile()
    {
        $config = __DIR__ . '/Config/recaptcha.php';
        $path = config_path('recaptcha.php');
        
        $this->publishes([$config => $path], 'config');
        
        $this->mergeConfigFrom( $config, 'recaptcha');
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
