<?php

namespace App\Config;

class Auth
{
    public $token;
    public $moneywave_staging_url;

    public function __construct()
    {
        $this->token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MzgzLCJuYW1lIjoiRmV0Y2hyIiwiYWNjb3VudE51bWJlciI6IiIsImJhbmtDb2RlIjoiOTk5IiwiaXNBY3RpdmUiOnRydWUsImNyZWF0ZWRBdCI6IjIwMTYtMTItMzFUMDM6MjE6NTMuMDAwWiIsInVwZGF0ZWRBdCI6IjIwMTYtMTItMzFUMDM6MjI6MzEuMDAwWiIsImRlbGV0ZWRBdCI6bnVsbCwiaWF0IjoxNDg2MDQ2NTQwLCJleHAiOjE0ODYwNTM3NDB9.timR6KlP_7CAAPk1TlclTcpLMFaltF97tKsGdi9LKmc";

        $this->moneywave_staging_url = 'http://moneywave.herokuapp.com/';
        $this->moneywave_test_url = 'https://moneywave.flutterwave.com/';
        $this->flutterwave_staging_url = 'http://staging1flutterwave.co:8080/';

        $this->output_format = "xml"; // json or xml
    }


    // to get token: save time into database after first request, then to make a request - call dis function to check the difference between time save in the db and server time, if

}
