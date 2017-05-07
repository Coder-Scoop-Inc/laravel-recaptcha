<?php

namespace Coderscoop\LaravelReCaptcha;

/**
 * Description of ReCaptcha
 *
 * @author samyoteroglez
 */
class ReCaptcha 
{
    /**
     * Store the public key
     * 
     * @var string 
     */
    protected $publicKey;
    
    /**
     * Store the private key
     * 
     * @var string 
     */
    protected $privateKey;
    
    /**
     * Store the global configuration array. This is the global configuration for the recaptcha.
     * 
     * @var array 
     */
    protected $globalConfig;
    
    /**
     * Constructor
     */
    public function __construct($globalConfig = null) 
    {
        if ($globalConfig) {
            $this->setGlobalConfiguration($globalConfig)
                ->setPrivateKey($this->globalConfig['privateKey'])
                ->setPublicKey($this->globalConfig['publicKey']);
        }
        else {
            $this->setGlobalConfiguration(['privateKey' => '', 'publicKey' => '']);
        }
    }
    
    /**
     * New instance
     * 
     * @return \Coderscoop\LaravelReCaptcha\ReCaptcha
     */
    public static function newInstance()
    {
        return new ReCaptcha;
    }
    
    /**
     * Set the global configuration array. This is the global configuration for the recaptcha.
     * 
     * @param array $globalConfig
     * @return $this
     */
    public function setGlobalConfiguration($globalConfig)
    {
        $this->globalConfig = $globalConfig;
        $this->privateAndPublicKeyBasedOnGlobalConfig();
        
        return $this;
    }
    
    /**
     * Get the global configuration array. This is the global configuration for the recaptcha.
     * 
     * @return type
     */
    public function getGlobalConfiguration()
    {
        return $this->globalConfig;
    }
    
    /**
     * Set the private and public key based on the global configuration
     * 
     * @return $this
     */
    protected function privateAndPublicKeyBasedOnGlobalConfig()
    {
        $this->setPrivateAndPublicKey($this->globalConfig['privateKey'], $this->globalConfig['publicKey']);
        
        return $this;
    }
    
    /**
     * Set the private and public key
     * 
     * @param string $privateKey
     * @param string $publicKey
     * @return $this
     */
    public function setPrivateAndPublicKey($privateKey, $publicKey)
    {
        $this->setPrivateKey($privateKey)
            ->setPublicKey($publicKey);
        
        return $this;
    }
    
    /**
     * Set the public key
     * 
     * @param string $publicKey
     * @return $this
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
        
        return $this;
    }
    
    /**
     * Get the public key
     * 
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }
    
    /**
     * Set the private key
     * 
     * @param string $privateKey
     * @return $this
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
        
        return $this;
    }
    
    /**
     * Get the private key
     * 
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }
    
    /**
     * Dummy test. Please remove later.
     * 
     * @return string
     */
    public function dummy()
    {
        return "Hello World in a dummy way!";
    }
}
