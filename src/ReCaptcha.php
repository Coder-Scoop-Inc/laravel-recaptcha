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
     * Store the google script to include in order to use google recaptcha api
     * 
     * @var string 
     */
    protected $urlApi;
    
    /**
     * Store the google url to verfy the google recaptcha
     * 
     * @var string 
     */
    protected $urlVerify;
    
    /**
     * Store the result of the recaptcha check
     * 
     * @var json 
     */
    protected $verifyRecaptcha;
    
    /**
     * Use language support
     * 
     * @var bool 
     */
    protected $lang;
    
    /**
     * Store the laravel language
     * 
     * @var string 
     */
    protected $locale;
    
    /**
     * Store the defaults attributes for the recaptcha field
     * 
     * @var array 
     */
    protected $attributes;
    
    /**
     * Store the field html
     * 
     * @var string 
     */
    protected $fieldHtml;
    
    /**
     * Constructor
     */
    public function __construct($globalConfig = null) 
    {
        if ($globalConfig) {
            $this->setGlobalConfiguration($globalConfig)
                ->setPrivateKey($this->globalConfig['privateKey'])
                ->setPublicKey($this->globalConfig['publicKey'])
                ->setUrlApi($this->globalConfig['urlApi'])
                ->setUrlVerify($this->globalConfig['urlVerify'])
                ->setLang($this->globalConfig['lang'])
                ->setLocale($this->globalConfig['locale']);
        }
        
        $this->defineDefaultsAttributes();
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
     * Define the defaults attributes for the recaptcha field
     * 
     * @return $this
     */
    protected function defineDefaultsAttributes()
    {
        $this->attributes = [
            'theme' => 'light',
            'includeScript' => true,
            'responsive' => true
        ];
        
        $this->fieldHtml = '';
        
        return $this;
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
     * Set the google url to verfy the google recaptcha
     *  
     * @param string $urlApi
     * @return $this
     */
    public function setUrlApi($urlApi)
    {
        $this->urlApi = $urlApi;
        
        return $this;
    }
    
    /**
     * Get the google url to verfy the google recaptcha
     * 
     * @return type
     */
    public function getUrlApi()
    {
        return $this->urlApi;
    }
    
    /**
     * Set the google url to verfy the google recaptcha
     * 
     * @param string $urlVerify
     * @return $this
     */
    public function setUrlVerify($urlVerify)
    {
        $this->urlVerify = $urlVerify;
        
        return $this;
    }
    
    /**
     * Get the google url to verfy the google recaptcha
     * 
     * @return type
     */
    public function getUrlVerify()
    {
        return $this->urlVerify;
    }
    
    /**
     * Set the lang. This value tells if add or no the language to the google recaptcha url
     * 
     * @param bool $lang
     * @return $this
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
        
        return $this;
    }
    
    /**
     * Get the lang. This value tells if add or no the language to the google recaptcha url.
     * 
     * @return bool
     */
    public function getLang()
    {
        return $this->lang;
    }
    
    /**
     * Set the locale, the used language
     * 
     * @param string $locale
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        
        return $this;
    }
    
    /**
     * Get locale, the used language
     * 
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }
    
    /**
     * Set the attributes used in the recaptcha field
     * 
     * @param array $attributes
     * @return $this
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        
        return $this;
    }
    
    /**
     * Get the attributes used in the recaptcha field
     * 
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
    
    /**
     * Render recaptcha field
     * 
     * @param array $attr 
     *      The recaptcha attributes array:
     *      [
     *          'dataTheme' => 'light',
     *          'includeScript' => true,
     *          'responsive' => true
     *      ]
     */
    public function render($attr = null)
    {
        if ($attr) {
            $this->setAttributes($attr);
        }
        
        echo $this->getFieldHtml();
    }
    
    /**
     * Get the recaptcha field html as a string
     * 
     * @return string
     */
    public function getFieldHtml()
    {
        $this->includeScript()->createFieldHtml();        
        
        return $this->fieldHtml;
    }
    
    /**
     * Include or no the google recaptcha script
     * 
     * @return $this
     */
    protected function includeScript()
    {
        if ($this->attributes['includeScript']) {
            $this->fieldHtml .= $this->getScript();
        }
        
        return $this;
    }
    
    /**
     * Creates the field html
     * 
     * @return $this
     */
    protected function createFieldHtml()
    {
        $this->fieldHtml .= "<div ";
        $this->fieldHtml .= "class='g-recaptcha}' ";
        $this->fieldHtml .= "data-theme='{$this->attributes['theme']}' ";
        $this->fieldHtml .= "data-sitekey='{$this->publicKey}' ";
        
        if ($this->attributes['responsive']) {
            $this->fieldHtml .= $this->addResponsiveness();
        }
        
        $this->fieldHtml .= "></div>";
        
        return $this;
    }
    
    /**
     * Return the styles for responsive as a string
     * 
     * @return string
     */
    protected function addResponsiveness()
    {
        $style = "style='transform:scale(0.77); " .
                    "-webkit-transform:scale(0.77); " .
                    "transform-origin:0 0; " .
                    "-webkit-transform-origin:0 0;'";
        
        return $style;
    }
    
    /**
     * Get the google recaptcha script
     * 
     * @return string
     */
    public function getScript()
    {
        $url = $this->urlApi;
        
        if (true == $this->lang) {
            $url = $url . '?hl=' . $this->locale;
        }
        
        return "<script src='$url'></script>"; 
    }
    
    /**
     * Check the recaptcha value against google
     * 
     * @param string $responseField
     * @return $this
     */
    public function check($responseField, $remoteIp)
    {
        $postData = http_build_query([
                'secret' => $this->privateKey,
                'response' => $responseField,
                'remoteip' => $remoteIp
            ]);
        
        $options = [
                'http' => [
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postData
                ]
            ];
        
        $context  = stream_context_create($options);
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
        $this->verifyRecaptcha = json_decode($response);
        
        return $this;
    }
    
    /**
     * Verify if the validation pass or no
     * 
     * @return bool
     */
    public function verify()
    {
        return (true === $this->verifyRecaptcha->success);
    }
    
}
