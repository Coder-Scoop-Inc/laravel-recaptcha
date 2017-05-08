Feature: Recaptcha class
    In order to intereact with Recaptcha class
    As a tester
    I want to use the Recaptcha api

    Scenario: New ReCaptcha Class
        Given I have an instance of ReCaptcha class with the configuration
        Then All the defaults should be defined

    Scenario: Set and get global configuration
        Given I have an instance of ReCaptcha class without the configuration
        When I set the global configuration
        Then I should be able to get the global configuration

    Scenario: Set and get private key
        Given I have an instance of ReCaptcha class without the configuration
        When I set the private key as "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe"
        Then I should be able to get the private key

    Scenario: Set and get public key
        Given I have an instance of ReCaptcha class without the configuration
        When I set the public key as "6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"
        Then I should be able to get the public key

    Scenario: Set and get google api url with lang set to false
        Given I have an instance of ReCaptcha class with the configuration
        When I set the url api as "https://www.google.com/recaptcha/api.js"
        Then I should be able to get the url api

    Scenario: Set and get google url verify
        Given I have an instance of ReCaptcha class with the configuration
        When I set the url verify as "https://www.google.com/recaptcha/api/siteverify"
        Then I should be able to get the url verify

    Scenario: Set and get lang as true
        Given I have an instance of ReCaptcha class with the configuration
        When I set the lang as true
        Then I should be able to get the lang as true

    Scenario: Set and get lang as false
        Given I have an instance of ReCaptcha class with the configuration
        When I set the lang as false
        Then I should be able to get the lang as false

    Scenario: Url script with language set to true
        Given I have an instance of ReCaptcha class with the configuration
        When I set the lang as true
        Then The url api should have the language

    Scenario: Url script with a different language
        Given I have an instance of ReCaptcha class with the configuration
        When I set the language to "fr"
        And I set the lang as true
        Then The url api should have the language
