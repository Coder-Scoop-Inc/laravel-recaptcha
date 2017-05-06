<?php

namespace Coderscoop\LaravelReCaptcha\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Description of ReCaptchaFacade
 *
 * @author samyoteroglez
 */
class ReCaptchaFacade extends Facade
{
    public static function getFacadeAccessor() 
    {
        return 'reCaptcha';
    }
}
