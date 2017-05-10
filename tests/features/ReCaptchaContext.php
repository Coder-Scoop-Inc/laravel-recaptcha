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
     * @var class 
     */
    protected $reCaptcha;
    
    /**
     * Will store the configuration
     * 
     * @var array 
     */
    protected $reCaptchaConfig;
    
    /**
     * Will store the recaptcha field attributes
     * 
     * @var array 
     */
    protected $reCpatchaAttributes;
    
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->setReCaptchaConfigForTest();
        $this->setReCaptchaAttributesForTest();
    }
    
    /**
     * Set the recaptcha configuration array for test
     */
    protected function setReCaptchaConfigForTest()
    {
        $this->reCaptchaConfig = [
            'publicKey' => "6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI",
            'privateKey' => "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe",
            'urlApi' => 'https://www.google.com/recaptcha/api.js',
            'urlVerify' => 'https://www.google.com/recaptcha/api/siteverify',
            'lang' => false,
            'locale' => 'en'
        ];
    }
    
    /**
     * Set the recaptcha field attributes for test
     */
    protected function setReCaptchaAttributesForTest()
    {
        $this->reCpatchaAttributes = [
            'class' => '',
            'dataTheme' => 'light',
            'includeScript' => true,
            'responsive' => true
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
     * @Then All the defaults should be defined
     */
    public function allTheDefaultsShouldBeDefined()
    {
        $this->iShouldBeAbleToGetThePrivateKey();
        $this->iShouldBeAbleToGetThePublicKey();
        $this->iShouldBeAbleToGetTheUrlApi();
        $this->iShouldBeAbleToGetTheUrlVerify();
        $this->iSetTheLangAsFalse();
        $this->iShouldBeAbleToGetTheSameAttributes();
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
    
    /**
     * @When I set the lang as True
     */
    public function iSetTheLangAsTrue()
    {
        $this->reCaptcha->setLang(true);
    }

    /**
     * @Then I should be able to get the lang as True
     */
    public function iShouldBeAbleToGetTheLangAsTrue()
    {
        PHPUnit::assertTrue($this->reCaptcha->getLang());
    }
    
    /**
     * @When I set the lang as false
     */
    public function iSetTheLangAsFalse()
    {
        $this->reCaptcha->setLang(false);
    }

    /**
     * @Then I should be able to get the lang as false
     */
    public function iShouldBeAbleToGetTheLangAsFalse()
    {
        PHPUnit::assertFalse($this->reCaptcha->getLang());
    }

    /**
     * @Then The url api should have the language
     */
    public function theUrlApiShouldHaveTheLanguage()
    {
        $parent = $this->reCaptcha->getUrlApi() . '?hl=' . $this->reCaptcha->getLocale();
        $son = $this->reCaptcha->getScript();
        PHPUnit::assertContains($parent, $son);
    }

    /**
     * @When I set the language to :locale
     */
    public function iSetTheLanguageTo($locale)
    {
        $this->reCaptcha->setLocale($locale);
    }
    
    /**
     * @When I set the attributes as :cssClass, :dataTheme, :includeScript and :responsive
     */
    public function iSetTheAttributesAsAnd($cssClass, $dataTheme, $includeScript, $responsive)
    {
        $this->reCpatchaAttributes = [
            'class' => $cssClass,
            'dataTheme' => $dataTheme,
            'incudeScript' => $includeScript,
            'responsive' => $responsive
        ];
        
        $this->reCaptcha->setAttributes($this->reCpatchaAttributes);
    }

    /**
     * @Then I should be able to get the same attributes
     */
    public function iShouldBeAbleToGetTheSameAttributes()
    {
        PHPUnit::assertArraySubset($this->reCaptcha->getAttributes(), $this->reCpatchaAttributes);
    }
    
    /**
     * @When I set the includeScript attribute to false
     */
    public function iSetTheIncludescriptAttributeToFalse()
    {
        $this->reCpatchaAttributes['includeScript'] = false;
        $this->reCaptcha->setAttributes($this->reCpatchaAttributes);
    }

    /**
     * @Then The google recaptcha script sould not be include
     */
    public function theGoogleRecaptchaScriptSouldNotBeInclude()
    {
        $html = $this->reCaptcha->getFieldHtml();
        PHPUnit::assertNotContains("<script src='{$this->reCaptcha->getUrlApi()}'", $html);
    }
    
}
