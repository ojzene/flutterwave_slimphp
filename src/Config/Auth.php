<?php

namespace App\Config;

class Auth
{
    public $token;
    public $moneywave_staging_url;

    public function __construct()
    {
        $this->apiKey = "put_api_key_here";
        $this->secret = "put_secret_key_here";
        $this->token = "put_generated_token_here";

        $this->moneywave_staging_url = 'http://moneywave.herokuapp.com/';
        $this->moneywave_test_url = 'https://moneywave.flutterwave.com/';
        $this->flutterwave_staging_url = 'http://staging1flutterwave.co:8080/';

        $this->output_format = "xml"; // json or xml
    }


    // to get token: save time into database after first request, then to make a request - call dis function to check the difference between time save in the db and server time, if

}
