<?php
namespace App\Controllers;
use App\Validation\ClientIDValidation;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\PayModel;
use App\Statuses\Statuses;
use App\Models\GeneralModel;
use App\Config\Auth;

class PayController
{
	// const OUTPUT_FORMAT = "xml"; 
	// const OUTPUT_FORMAT_JSON = "json";
	
	protected $container;
 	
 	public function __construct($container)
 	{
    	$this->container = $container;
        $this->output_format = (new Auth)->output_format;
    	$this->method_names = (new GeneralModel)->get_model_methods("PayModel");
   	}

//   	private function getSubscriber(Request $request)  // get subscriber data from loan manager
//   	{
//   		$headers = $request->getHeaders();
//        $client_ids = new ClientIDValidation();
//        $get_result['error'] = $client_ids->getHeader($headers);
//        $get_result['client_id'] = $client_ids->getClientID($get_result['error']);
//
//   		return $get_result;
//   	}

   	public function getBanks(Request $request, Response $response, $args)
   	{
        $req_res = [$request, $response];
   		$method_identity = $this->method_names;
   		if($method_identity['status'] == true) {
			$resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 0, $this->output_format);
			return $resp;
		} elseif($method_identity['status'] == false) {
			return $response->withHeader('Content-Type', 'application/json')
                            ->withJson($method_identity)
                            ->withStatus(400);
		}
   	}

   	public function getToken(Request $request, Response $response, $args)
   	{
   	    $req_res = [$request, $response];
		$resp = (new GeneralModel)->try_get($req_res, $this->method_names['message'], 1, $this->output_format, $args);
		return $resp;
   	}

   	public function cardToAccount(Request $request, Response $response, $args)
   	{
   		$resp = (new GeneralModel)->try_get($request, $response, $this->method_names, 2, self::OUTPUT_FORMAT);
		return $resp;
   	}

   	public function cardToWallet(Request $request, Response $response, $args)
   	{
   		$resp = (new GeneralModel)->try_get($request, $response, $this->method_names, 3, self::OUTPUT_FORMAT);
		return $resp;
   	}

   	public function totalChargeToCard(Request $request, Response $response, $args)
   	{
   		$resp = (new GeneralModel)->try_get($request, $response, $this->method_names, 4, self::OUTPUT_FORMAT);
		return $resp;
   	}

   	public function walletToAccountSingle(Request $request, Response $response, $args)
   	{
   		$resp = (new GeneralModel)->try_get($request, $response, $this->method_names, 5, self::OUTPUT_FORMAT);
		return $resp;
   	}

   	public function walletToAccountBulk(Request $request, Response $response, $args)
   	{
   		$resp = (new GeneralModel)->try_get($request, $response, $this->method_names, 6, self::OUTPUT_FORMAT);
		return $resp;
   	}

   	public function accountNumberValidate(Request $request, Response $response, $args)
   	{
   		$resp = (new GeneralModel)->try_get($request, $response, $this->method_names, 7, self::OUTPUT_FORMAT);
		return $resp;
   	}

   	public function failedTransactionRetry(Request $request, Response $response, $args)
   	{
   		$resp = (new GeneralModel)->try_get($request, $response, $this->method_names, 8, self::OUTPUT_FORMAT);
		return $resp;
   	}

   	public function transCardToAccount(Request $request, Response $response, $args)
   	{
   		$resp = (new GeneralModel)->try_get($request, $response, $this->method_names, 9, self::OUTPUT_FORMAT);
		return $resp;
   	}

   	public function transWalletToAccount(Request $request, Response $response, $args)
   	{
   		$resp = (new GeneralModel)->try_get($request, $response, $this->method_names, 10, self::OUTPUT_FORMAT);
		return $resp;
   	}

   	public function walletBalance(Request $request, Response $response, $args)
   	{
   		$resp = (new GeneralModel)->try_get($request, $response, $this->method_names, 11, self::OUTPUT_FORMAT);
		return $resp;
   	}

}