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
     * ReCaptcha field name
     * 
     * This is the reacptcha field key in the request
     */
    'fieldName' => 'g-recaptcha-response'
];

