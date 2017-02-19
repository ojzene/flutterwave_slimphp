<?php

namespace App\Config;

class Auth
{
    public $token;
    public $moneywave_staging_url;

    public function __construct()
    {
        $this->apiKey = "ts_AXQS7B8FE8OMT4QN8PX7";
        $this->secret = "ts_QOY2S2C8M3RNQ75O94UD39QM37Z2MN";
        $this->token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MzgzLCJuYW1lIjoiRmV0Y2hyIiwiYWNjb3VudE51bWJlciI6IiIsImJhbmtDb2RlIjoiOTk5IiwiaXNBY3RpdmUiOnRydWUsImNyZWF0ZWRBdCI6IjIwMTYtMTItMzFUMDM6MjE6NTMuMDAwWiIsInVwZGF0ZWRBdCI6IjIwMTYtMTItMzFUMDM6MjI6MzEuMDAwWiIsImRlbGV0ZWRBdCI6bnVsbCwiaWF0IjoxNDg3NTIzMTIyLCJleHAiOjE0ODc1MzAzMjJ9.VHGpmH29yu6oqPPbdi8rD4zni5IB-P7xMqvSkTYTXeg";

        $this->moneywave_staging_url = 'http://moneywave.herokuapp.com/';
        $this->moneywave_test_url = 'https://moneywave.flutterwave.com/';
        $this->flutterwave_staging_url = 'http://staging1flutterwave.co:8080/';

        $this->output_format = "xml"; // json or xml
    }


    // to get token: save time into database after first request, then to make a request - call dis function to check the difference between time save in the db and server time, if

}
