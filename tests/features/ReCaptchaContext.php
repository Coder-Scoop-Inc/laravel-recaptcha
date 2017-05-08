<?php

use Behat\Behat\Context\Context;
use Coderscoop\LaravelReCaptcha\ReCaptcha;
use PHPUnit_Framework_TestCase as PHPUnit;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Description of ReCaptchaContext
 *
 * @author samyoteroglez
 */
class ReCaptchaContext implements Context, SnippetAcceptingContext
{    
    /**
     * Will store a ReCaptcha class instance
     * 
     * @var type 
     */
    protected $reCaptcha;
    
    /**
     * Will store the configuration
     * 
     * @var type 
     */
    protected $reCaptchaConfig;
    
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->reCaptchaConfig = [
            'publicKey' => "6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI",
            'privateKey' => "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe",
            'urlApi' => 'https://www.google.com/recaptcha/api.js',
            'urlVerify' => 'https://www.google.com/recaptcha/api/siteverify'
        ];
    }
    
    /**
     * Set a new instance of the ReCaptcha class
     */
    protected function reCaptchaNewInstance($config = null)
    {
        $this->reCaptcha = new ReCaptcha($config);
    }
    
    /**
     * @Given I have an instance of ReCaptcha class with the configuration
     */
    public function iHaveAnInstanceOfRecaptchaClassWithTheConfiguration()
    {
        $this->reCaptchaNewInstance($this->reCaptchaConfig);
    }
    
    /**
     * @Then The private and public key should be defined
     */
    public function thePrivateAndPublicKeyShouldBeDefined()
    {
        $this->iShouldBeAbleToGetThePrivateKey();
        $this->iShouldBeAbleToGetThePublicKey();
    }
    
    /**
     * @When I set the global configuration
     */
    public function iSetTheGlobalConfiguration()
    {
        $this->reCaptcha->setGlobalConfiguration([
            'publicKey' => "fakePublicKey",
            'privateKey' => "fakePrivateKey",
        ]);
        
        PHPUnit::assertEquals("fakePrivateKey", $this->reCaptcha->getPrivateKey());
        PHPUnit::assertEquals("fakePublicKey", $this->reCaptcha->getPublicKey());
    }

    /**
     * @Then I should be able to get the global configuration
     */
    public function iShouldBeAbleToGetTheGlobalConfiguration()
    {
        PHPUnit::assertEquals("fakePrivateKey", $this->reCaptcha->getPrivateKey());
        PHPUnit::assertEquals("fakePublicKey", $this->reCaptcha->getPublicKey());
    }
    
    /**
     * @Given I have an instance of ReCaptcha class without the configuration
     */
    public function iHaveAnInstanceOfRecaptchaClassWithoutTheConfiguration()
    {
        $this->reCaptchaNewInstance();
    }
    
    /**
     * @When I set the private key as :privateKey
     */
    public function iSetThePrivateKeyAs($privateKey)
    {
        $this->reCaptcha->setPrivateKey($privateKey);
    }

    /**
     * @Then I should be able to get the private key
     */
    public function iShouldBeAbleToGetThePrivateKey()
    {
        PHPUnit::assertEquals("6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe", $this->reCaptcha->getPrivateKey());
    }
    
    /**
     * @When I set the public key as :publicKey
     */
    public function iSetThePublicKeyAs($publicKey)
    {
        $this->reCaptcha->setPublicKey($publicKey);
    }

    /**
     * @Then I should be able to get the public key
     */
    public function iShouldBeAbleToGetThePublicKey()
    {
        PHPUnit::assertEquals("6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI", $this->reCaptcha->getPublicKey());
    }
    
    /**
     * @When I set the url api as :urlApi
     */
    public function iSetTheUrlApiAs($urlApi)
    {
        $this->reCaptcha->setUrlApi($urlApi);
    }

    /**
     * @Then I should be able to get the url api
     */
    public function iShouldBeAbleToGetTheUrlApi()
    {
        PHPUnit::assertEquals("https://www.google.com/recaptcha/api.js", $this->reCaptcha->getUrlApi());
    }

    /**
     * @When I set the url verify as :urlVerify
     */
    public function iSetTheUrlVerifyAs($urlVerify)
    {
        $this->reCaptcha->setUrlVerify($urlVerify);
    }

    /**
     * @Then I should be able to get the url verify
     */
    public function iShouldBeAbleToGetTheUrlVerify()
    {
        PHPUnit::assertEquals("https://www.google.com/recaptcha/api/siteverify", $this->reCaptcha->getUrlVerify());
    }

}
