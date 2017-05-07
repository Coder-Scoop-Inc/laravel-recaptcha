# laravel-recaptcha
Google Recaptcha - Laravel integration

### Install

 - Add the package to your composer.jon file

```

"require-dev": {
    "coderscoop/laravel-recaptcha": "*"
},
"repositories": [
    {
        "type": "git",
        "url": "git@github.com:Coder-Scoop-Inc/laravel-recaptcha.git"
    }
]

```

 - Run `composer install` or `composer update`

 - Add `Coderscoop\LaravelReCaptcha\ReCaptchaServiceProvider::class`, to the providers array in config\app.php.

 - Add 'ReCaptcha' => Coderscoop\LaravelReCaptcha\Facade\ReCaptchaFacade::class, to the aliases array in config\app.php.

 - Include `use ReCaptcha;` to any class you want.
