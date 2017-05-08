<?php

/**
 * ReCaptcha configuration file
 */

return [
    
    /**
     * Public Key
     * 
     * Use this in the HTML code your site serves to users.
     */
    'publicKey' => env('RECAPTCHA_PUBLIC_KEY'),
    
    /**
     * Private Key
     * 
     * Use this for communication between your site and Google. 
     * Be sure to keep it a secret.
     */
    'privateKey' => env('RECAPTCHA_PRIVATE_KEY'),
    
    /**
     * Google script to include in order to use google recaptcha api
     */
    'urlApi' => 'https://www.google.com/recaptcha/api.js',
    
    /**
     * Google url to verfy the google recaptcha
     */
    'urlVerify' => 'https://www.google.com/recaptcha/api/siteverify'
];

