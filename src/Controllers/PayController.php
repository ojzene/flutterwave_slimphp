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
	protected $container;
 	
 	public function __construct($container)
 	{
    	$this->container = $container;
        $this->output_format = (new Auth)->output_format;
    	$this->method_names = (new GeneralModel)->get_model_methods("PayModel");
   	}

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
        $req_res = [$request, $response];
        $method_identity = $this->method_names;
        if($method_identity['status'] == true) {
            $resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 2, $this->output_format, $args);
            return $resp;
        } elseif($method_identity['status'] == false) {
            return $response->withHeader('Content-Type', 'application/json')
                ->withJson($method_identity)
                ->withStatus(400);
        }
   	}

   	public function cardToWallet(Request $request, Response $response, $args)
   	{
        $req_res = [$request, $response];
        $method_identity = $this->method_names;
        if($method_identity['status'] == true) {
            $resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 3, $this->output_format, $args);
            return $resp;
        } elseif($method_identity['status'] == false) {
            return $response->withHeader('Content-Type', 'application/json')
                ->withJson($method_identity)
                ->withStatus(400);
        }
   	}

   	public function totalChargeToCard(Request $request, Response $response, $args)
   	{
        $req_res = [$request, $response];
        $method_identity = $this->method_names;
        if($method_identity['status'] == true) {
            $resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 4, $this->output_format, $args);
            return $resp;
        } elseif($method_identity['status'] == false) {
            return $response->withHeader('Content-Type', 'application/json')
                ->withJson($method_identity)
                ->withStatus(400);
        }
   	}

   	public function walletToAccountSingle(Request $request, Response $response, $args)
   	{
        $req_res = [$request, $response];
        $method_identity = $this->method_names;
        if($method_identity['status'] == true) {
            $resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 5, $this->output_format, $args);
            return $resp;
        } elseif($method_identity['status'] == false) {
            return $response->withHeader('Content-Type', 'application/json')
                ->withJson($method_identity)
                ->withStatus(400);
        }
   	}

   	public function walletToAccountBulk(Request $request, Response $response, $args)
   	{
        $req_res = [$request, $response];
        $method_identity = $this->method_names;
        if($method_identity['status'] == true) {
            $resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 6, $this->output_format, $args);
            return $resp;
        } elseif($method_identity['status'] == false) {
            return $response->withHeader('Content-Type', 'application/json')
                ->withJson($method_identity)
                ->withStatus(400);
        }
   	}

   	public function accountNumberValidate(Request $request, Response $response, $args)
   	{
        $req_res = [$request, $response];
        $method_identity = $this->method_names;
        if($method_identity['status'] == true) {
            $resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 7, $this->output_format, $args);
            return $resp;
        } elseif($method_identity['status'] == false) {
            return $response->withHeader('Content-Type', 'application/json')
                ->withJson($method_identity)
                ->withStatus(400);
        }
   	}

   	public function failedTransactionRetry(Request $request, Response $response, $args)
   	{
        $req_res = [$request, $response];
        $method_identity = $this->method_names;
        if($method_identity['status'] == true) {
            $resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 8, $this->output_format, $args);
            return $resp;
        } elseif($method_identity['status'] == false) {
            return $response->withHeader('Content-Type', 'application/json')
                ->withJson($method_identity)
                ->withStatus(400);
        }
   	}

   	public function transCardToAccount(Request $request, Response $response, $args)
   	{
        $req_res = [$request, $response];
        $method_identity = $this->method_names;
        if($method_identity['status'] == true) {
            $resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 9, $this->output_format, $args);
            return $resp;
        } elseif($method_identity['status'] == false) {
            return $response->withHeader('Content-Type', 'application/json')
                ->withJson($method_identity)
                ->withStatus(400);
        }
   	}

   	public function transWalletToAccount(Request $request, Response $response, $args)
   	{
        $req_res = [$request, $response];
        $method_identity = $this->method_names;
        if($method_identity['status'] == true) {
            $resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 10, $this->output_format, $args);
            return $resp;
        } elseif($method_identity['status'] == false) {
            return $response->withHeader('Content-Type', 'application/json')
                ->withJson($method_identity)
                ->withStatus(400);
        }
   	}

   	public function walletBalance(Request $request, Response $response, $args)
   	{
        $req_res = [$request, $response];
        $method_identity = $this->method_names;
        if($method_identity['status'] == true) {
            $resp = (new GeneralModel)->try_get($req_res, $method_identity['message'], 11, $this->output_format, $args);
            return $resp;
        } elseif($method_identity['status'] == false) {
            return $response->withHeader('Content-Type', 'application/json')
                ->withJson($method_identity)
                ->withStatus(400);
        }
   	}

}
