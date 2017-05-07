Feature: Recaptcha class
    In order to intereact with he Recaptcha
    As a tester
    I want to interact use the Recaptcha api

    Scenario: New ReCaptcha Class
        Given I have an instance of ReCaptcha class with the configuration
        Then The private and public key should be defined

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
