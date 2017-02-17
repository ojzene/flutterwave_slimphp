<?php
namespace App\Models;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use GuzzleHttp\Client;
use GuzzleHttp\Stream\Stream;
use \GuzzleHttp\Exception\ConnectException as ce;
use \GuzzleHttp\Exception\RequestException as re;

class GeneralModel {

    // needed in the model to make http request
	public function make_guzzle_request($url, $method, $token=null, $body=null, $query=null)
    {
		if(!empty($url) || !empty($token) || !empty($method)) {
			try
            {
                $client = new Client();
                if ($query !== null)
                    $request = $client->createRequest($method, $url, $query);
                else
                    $request = $client->createRequest($method, $url);

                $request->setHeader('Content-type', 'application/json');
                if($token==null || empty($token)){} else { $request->setHeader('Authorization', $token); }

                if ($method == "POST" || $method == "PUT") {
                    if ($body==null || empty($body)){} else { $request->setBody(Stream::factory($body)); }
                } elseif ($method == "GET") {
                    goto sendrequest;
                }
                sendrequest:    $response = $client->send($request);
                                $json = $response->json();
                                return $json;
			}
			catch (ce $e)
            {
				$error = 8081;
				return $error;
			} 
			catch (re $e)
            {
                $error = 8082;
		        return $error;
		    }

     	} else {
     		$error = 5005;
			return $error;
     	}
	}

    // needed in the controller
    public function try_get($req_res, $model_method_array, $i, $output_format, $input=null)
    {
        try{
            $request = $req_res[0];
            $response = $req_res[1];

            $body = $request->getBody();
            $input = json_decode($body, true);

            $get_model_name = array_keys($model_method_array)[0];
            $get_model_value = $model_method_array[$get_model_name];

            $class_name = "App\\Models\\".$get_model_name; 
            $my_obj = new $class_name();

            $get_model_single = $get_model_value[$i];

            if(empty($input))
                $output_data = ($my_obj)->$get_model_single();
            else
                $output_data = ($my_obj)->$get_model_single($input);

            if ($output_data['status'] == "success") { $httpstatus = 200; } else { $httpstatus = 400; }

            if ($output_format == "xml") {
                $xml_result = $this->output_xml($output_data, new \SimpleXMLElement('<root/>'))->asXML();
                return $response->withHeader('Content-Type', 'application/xml')
                                ->write($xml_result)
                                ->withStatus($httpstatus);
            } elseif ($output_format == "json") {
                return $response->withHeader('Content-Type', 'application/json')
                                ->withJson($output_data)
                                ->withStatus($httpstatus);
            }
            else {
                $result = [ 'status' => 'failed', 'message' => 'invalid output response specified' ];
                return $response->withHeader('Content-Type', 'application/json')
                                ->withJson($result)
                                ->withStatus(400);
            }

        } catch (ResourceNotFoundException $e) {
               return $response->withStatus(404);

        } catch(Exception $e){
                return $response->withStatus(400)
                                ->withHeader('X-Statuses-Reason', $e->getMessage());
        }
    }


    public function output_xml(array $arr, \SimpleXMLElement $xml)
    {
        foreach ($arr as $k => $v) {
            is_array($v)
                ? $this->output_xml($v, $xml->addChild($k))
                : $xml->addChild($k, $v);
        }
        return $xml;
    }

    public function get_model_methods($model_name)
    {
        $class_name = 'App\\Models\\'.$model_name; 

        if(class_exists($class_name)) {
            $my_obj = new $class_name();
            $class_methods = get_class_methods($my_obj);

            $array_method = []; $i = 0;
            foreach ($class_methods as $method_name) {
                $array_method[$model_name][$i] = $method_name;
                $i++;
            }
            $result = [ 'status' => true, 'message' => $array_method ];
        }
        elseif(!class_exists($class_name)) {
            $result = [ 'status' => false, 'message' => "Model Name does not exist" ];
        } 

        return $result;
    }

}