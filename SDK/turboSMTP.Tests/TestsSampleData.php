<?php

namespace TurboSMTPTests;

class TestsSampleData
{
    //Enter your Consumer Key information
    const ConsumerKey = '';
    //Enter your Consumer Secret information
    const ConsumerSecret = '';
    //Set European user if you live in USA to true
    const EuropeanUser = false;

    //Set email address to be used as mail sender for mail sender tests.
    const EmailSender = 'sergio@gmail.com';

    //Enter an array of VALID email address that will be used mainly for email validation tests.
    const ValidEmailAddresses = [
        "valid.email.1@gmail.com",
        "valid.email.2@gmail.com",
    ];
    //Enter an array of INVALID email address that will be used mainly for email validation tests.
    const InValidEmailAddresses = [
        "invalid.email.1@gmail.com",
        "invalid.email.2"
    ];    
}