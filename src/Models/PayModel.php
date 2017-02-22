<?php

namespace App\Models;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Statuses\Statuses;
use Respect\Validation\Validator as v;
use RedBeanPHP\R;
use App\Config\Auth;
use App\Models\GeneralModel;

class PayModel 
{
	public function ListBanks()
	{
		$address_url = (new Auth)->moneywave_staging_url."banks";
		$json =  (new GeneralModel)->make_guzzle_request($address_url, "POST");

		if(is_int($json))
			$result = [ 'status' => 'error', 'message' => 'Error in request/response' ];
		else
			$result = $json;

		return $result;
	}

	public function ListToken($input)
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			$apikey = (string)$input['apiKey'];
			$secret = (string)$input['secret'];
			$data = ["apiKey" => $apikey, "secret" => $secret];
			$body = json_encode($data, JSON_UNESCAPED_UNICODE);

			$parsed_url = (new Auth)->moneywave_staging_url."v1/merchant/verify";
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "POST", "", $body);
			if(is_int($json)) {
				$result = [ 'status' => 'error', 'message' => 'Error in request/response' ];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}

	public function CardToAccount($input) 
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			$parsed_body = [
				"firstname" => (string)$input["firstname"],
				"lastname" => (string)$input["lastname"],
				"phonenumber" => (string)$input["phonenumber"],
				"email" => (string)$input["email"],
				"recipient_bank" => (string)$input["recipient_bank"],
				"recipient_account_number" => (string)$input["recipient_account_number"],
				"card_no" => (string)$input["card_no"],
				"cvv" => (string)$input["cvv"],
				"expiry_year" => (string)$input["expiry_year"],
				"expiry_month" => (string)$input["expiry_month"],
				"apiKey" => (string)$input["apiKey"],
				"amount" => (int)$input["amount"],
				"fee" => (int)$input["fee"],
				"redirecturl" => (string)$input["redirecturl"],
				"medium" =>  (string)$input["medium"]
			];
			$body = json_encode($parsed_body, JSON_UNESCAPED_UNICODE);

			$parsed_url = (new Auth)->moneywave_staging_url."v1/transfer";
			$token = (new Auth)->token;
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "POST", $token, $body);

            if(is_int($json)) {
				$result = ['status' => 'error', 'message' => 'Error in request/response'];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}

	public function CardToWallet($input)
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			$parsed_body = [
				"firstname" => (string)$input["firstname"],
				"lastname" => (string)$input["lastname"],
				"phonenumber" => (string)$input["phonenumber"],
				"email" => (string)$input["email"],
				"recipient" => (string)$input["recipient"],
				"card_no" => (string)$input["card_no"],
				"cvv" => (string)$input["cvv"],
				"expiry_year" => (string)$input["expiry_year"],
				"expiry_month" => (string)$input["expiry_month"],
				"apiKey" => (string)$input["apiKey"],
				"amount" => (string)$input["amount"],
				"fee" => (string)$input["fee"],
				"redirecturl" => (string)$input["redirecturl"],
				"medium" =>  (string)$input["medium"]
			];
			$body = json_encode($parsed_body, JSON_UNESCAPED_UNICODE);

			$parsed_url = (new Auth)->moneywave_staging_url."v1/transfer";
			$token = (new Auth)->token;
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "POST", $token, $body);
			if(is_int($json)) {
				$result = ['status' => 'error', 'message' => 'Error in request/response'];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}

	public function GetTotalChargeToCard($input)
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			$amount = (int)$input['amount'];
			$fee = (int)$input['fee'];
			$data = ["amount" => $amount, "fee" => $fee];
			$body = json_encode($data, JSON_UNESCAPED_UNICODE);

			$parsed_url = (new Auth)->moneywave_staging_url."v1/get-charge";
			$token = (new Auth)->token;
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "POST", $token, $body);
			if(is_int($json)) {
				$result = [ 'status' => 'error', 'message' => 'Error in request/response' ];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}

	public function TransfersFromWalletToAccountSingle($input)
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			$parsed_body = [
				"lock" => (string)$input["lock"],
				"amount" => (string)$input["amount"],
				"bankcode" => (string)$input["bankcode"],
				"accountNumber" => (string)$input["accountNumber"],
				"currency" => (string)$input["currency"],
				"senderName" => (string)$input["senderName"],
				"ref" => (string)$input["ref"]
			];
			$body = json_encode($parsed_body, JSON_UNESCAPED_UNICODE);

			$parsed_url = (new Auth)->moneywave_staging_url."v1/disburse";
			$token = (new Auth)->token;
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "POST", $token, $body);
			if(is_int($json)) {
				$result = [ 'status' => 'error', 'message' => 'Error in request/response' ];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}

	public function TransfersFromWalletToAccountBulk($input)
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			$parsed_body = [
				"lock" => (string)$input["lock"],
				"recipients" => [
					"amount" => (string)$input["amount"],
					"bankcode" => (string)$input["bankcode"],
					"accountNumber" => (string)$input["accountNumber"],
					"ref" => (string)$input["ref"]
				],
				"currency" => (string)$input["currency"],
				"senderName" => (string)$input["senderName"],
				"ref" => (string)$input["ref"]
			];

			 // {
		     //    "lock":"mypassword",
			 // "recipients": [
			 //     {
			 //        "amount":100,
			 //        "bankcode":"044",
			 //        "accountNumber":"0690000004",
			 //        "ref":"1"
			 //     },
			 //     {
			 //        "amount":200,
			 //        "bankcode":"011",
			 //        "accountNumber":"3095554344",
			 //        "ref":"8"
			 //     }
			 //    ],
			 //     "currency": "NGN",
			 //     "senderName": "Fetchr",
			 //     "ref":"46"
			 //    }

			$body = json_encode($parsed_body, JSON_UNESCAPED_UNICODE);

			$parsed_url = (new Auth)->moneywave_staging_url."v1/disburse/bulk";
			$token = (new Auth)->token;
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "POST", $token, $body);
			if(is_int($json)) {
				$result = [ 'status' => 'error', 'message' => 'Error in request/response' ];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}


	public function AccountNumberValidation($input)
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			$parsed_body = [
				"account_number" => (string)$input["account_number"],
				"bank_code" => (string)$input["bank_code"]
			];
			$body = json_encode($parsed_body, JSON_UNESCAPED_UNICODE);

			$parsed_url = (new Auth)->moneywave_staging_url."v1/resolve/account";
			$token = (new Auth)->token;
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "POST", $token, $body);
			if(is_int($json)) {
				$result = [ 'status' => 'error', 'message' => 'Error in request/response' ];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}


	public function FailedTransactionRetry($input)
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			$parsed_body = [
				"id" => (string)$input["id"],
				"recipient_account_number" => (string)$input["recipient_account_number"],
				"recipient_bank" => (string)$input["recipient_bank"]
			];
			$body = json_encode($parsed_body, JSON_UNESCAPED_UNICODE);

			$parsed_url = (new Auth)->moneywave_staging_url."v1/transfer/disburse/retry";
			$token = (new Auth)->token;
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "POST", $token, $body);
			if(is_int($json)) {
				$result = [ 'status' => 'error', 'message' => 'Error in request/response' ];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}


	public function PreviousTransactionsCA($input)
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			
			$parsed_url = (new Auth)->moneywave_staging_url."/v1/transfer/".$id;
			$token = (new Auth)->token;
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "POST", $token, "");
			if(is_int($json)) {
				$result = [ 'status' => 'error', 'message' => 'Error in request/response' ];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}


	public function PreviousTransactionsWA($input)
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			$parsed_body = [
				"ref" => (string)$input["ref"]
			];
			$body = json_encode($parsed_body, JSON_UNESCAPED_UNICODE);
			
			$parsed_url = (new Auth)->moneywave_staging_url."v1/disburse/status";
			$token = (new Auth)->token;
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "POST", $token, "");
			if(is_int($json)) {
				$result = [ 'status' => 'error', 'message' => 'Error in request/response' ];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}


	public function WalletBalance($input)
	{
		if (empty($input)) {
			$status = (new Statuses)->getStatusWithError(6001, 5005);
			$result = ['status'=> 'failed', 'message' => $status];
		} else {
			$parsed_body = [
				"ref" => (string)$input["ref"]
			];
			$body = json_encode($parsed_body, JSON_UNESCAPED_UNICODE);
			
			$parsed_url = (new Auth)->moneywave_staging_url."v1/wallet";
			$token = (new Auth)->token;
			$json =  (new GeneralModel)->make_guzzle_request($parsed_url, "GET", $token, "");
			if(is_int($json)) {
				$result = [ 'status' => 'error', 'message' => 'Error in request/response' ];
			} 
			else {
				$result = $json;
			}
		}
		return $result;
	}
}
