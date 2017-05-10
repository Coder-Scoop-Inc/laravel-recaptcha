# laravel-recaptcha
Google Recaptcha - Laravel integration

### Install

 - Add the package to your composer.jon file

```

"require": {
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

### Usage

 - Add `Coderscoop\LaravelReCaptcha\ReCaptchaServiceProvider::class`, to the providers array in config\app.php.

 - Add `'ReCaptcha' => Coderscoop\LaravelReCaptcha\Facade\ReCaptchaFacade::class`, to the aliases array in config\app.php.

 - Add `RECAPTCHA_PUBLIC_KEY` and `RECAPTCHA_PRIVATE_KEY` to your .env file with the public and private keys.

 - Add the recaptcha field to your form `{!! ReCaptcha::render() !!}`

 - Optionally you can pass the recaptcha attributes as an array
    ```
        {!! 
            ReCaptcha::render([
                'theme' => 'light',
                'includeScript' => true,
                'responsive' => true
            ]) 
        !!}
    ```
    - `theme`: The google recaptcha theme
    - `includeScript`: If includes or no the google recaptcha script
    - `responsive`: Makes the field responsive or no

 - Or you can interact directly with the class api in your controller by adding `use ReCaptcha;`.

 - Add the recaptcha validation rule `'g-recaptcha-response' => 'required|recaptcha'`

 - Enjoy it!


### ToDo

 - Add support for noscript
