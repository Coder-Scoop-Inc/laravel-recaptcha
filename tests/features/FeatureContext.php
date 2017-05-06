<?php

use Behat\Behat\Context\Context;
use Coderscoop\LaravelReCaptcha\ReCaptcha;
use PHPUnit_Framework_TestCase as PHPUnit;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;


/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Will store a ReCaptcha class instance
     * 
     * @var type 
     */
    protected $reCaptcha;
    
    /**
     * Will store the result from the dummy function
     * 
     * @var type 
     */
    protected $message;
    
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }
    
    /**
     * @Given I run this step
     */
    public function iRunThisStep()
    {
        var_dump("Step pass");
    }

    /**
     * @Then There is no fails
     */
    public function thereIsNoFails()
    {
        var_dump("No fails");
    }

    /**
     * @Given I have an instance of ReCaptcha class
     */
    public function iHaveAnInstanceOfRecaptchaClass()
    {
        $this->reCaptcha = new ReCaptcha;
    }
    
    /**
     * @When I call the dummy function
     */
    public function iCallTheDummyFunction()
    {
        $this->message = $this->reCaptcha->dummy();
    }

    /**
     * @Then The result should be :message
     */
    public function theResultShouldBe($message)
    {
        PHPUnit::assertEquals($message, $this->message);
    }

}
