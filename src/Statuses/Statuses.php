<?php
    namespace App\Statuses;

    class Statuses
    {
        public function errorCodes()
        {
            $code_array =
                [
                    8050 => "We're currently undergoing maintenance, be back with you shortly",
                    6099 => "date is required",
                    6088 => "date not properly formatted, the proper formate is ",
                    6040 => "bpu order already cancelled",
                    6037 => "nothing to update",
                    6038 => "updated",
                    6035 => "no timeslot data available",
                    6036 => "no vehicle data available",
                    6030 => "no bpu found for this client id",
                    6060 => "no order found for this client id",
                    6005 => "bpu not found",
                    6020 => "order not found",
                    6003 => "tracking number does not exist",
                    6006 => "Some keys or fields are missing",
                    7005 => "Client id required",
                    7006 => "field cannot be empty",
                    5000 => "sku creation successful",
                    5001 => "sku creation failed",
                    5002 => "no such sku found",
                    5003 => "product/sku already existed",
                    5004 => "product/sku does not exist",
                    5005 => "bad request/field sent or one of the fields empty",
                    5006 => "no such sku or client found",
                    5007 => "sku as request is not allowed",
                    5008 => "request(s) not allowed",
                    5009 => "deletion successful",
                    5010 => "operation successful",
                    5011 => "operation failed",
                    6010 => "product stock low",
                    7000 => "shipment was created successfully",
                    7001 => "shipment creation failed",
                    7002 => "sku does not belong to the current user",
                    7003 => "client has no incoming shipment",
                    7004 => "This shipment has been confirmed",
                    7010 => "operation successful",
                    7011 => "operation failed",
                    8000 => "Client Address created successfully",
                    8001 => "Client Address creation failed",
                    8002 => "Client not verified",
                    8003 => "Address Type is valid",
                    8004 => "Invalid Address Type, You must select from either ['business', 'office', 'residence', 'hotel']",
                    8005 => "Client Address Details cannot be found",
                    8006 => "Empty Body",
                    8007 => "Client Address Details successfully updated",
                    8008 => "Client Address Details update failed",
                    8009 => "Client Address ID and your request Address id does not match",
                    8010 => "operation successful",
                    8011 => "operation failed",
                    8012 => "Oops this is embarrassing, for some reason we're unable to process your request.",
                    8013 => "page not found",
                    8080 => "method not allowed",
                    8081 => "Error! Please check your internet connection",
                    8082 => "Error! Invalid Request",
                ];
            return $code_array;
        }

        public function getStatusError()
        {
            $status_array =
                [
                    6000 => true,
                    6001 => false
                ];

            return $status_array;
        }

        public function getStatus($code, $object_response=null)
        {
            $code_array = $this->getStatusError();
            $status = $code_array[$code];
            $statusHandler = [ 'code' => $code,'success' => $status, 'data' => $object_response];
            return $statusHandler;
        }

        public function addrStatus($code, $object_response=null)
        {
            $code_array = $this->errorCodes();
            $status = $code_array[$code];
            $statusHandler = [ 'code' => $code,'success' => $status, 'data' => $object_response];
            return $statusHandler;
        }

        public function pageListStatus($statuses, $page=null, $limit=null, $object_response=null)
        {
            $status_array = $this->getStatusError();
            $status = $status_array[$statuses];
            $statusHandler = [ 'success' => $status, 'code' => $statuses, 'page' => $page, 'items_per_page' => $limit, 'data' => $object_response];
            return $statusHandler;
        }

        public function getStatusWithError($statuses, $code)
        {
            $status_array = $this->getStatusError();
            $status = $status_array[$statuses];
            $code_array = $this->errorCodes();
            $status_code = $code_array[$code];
            $statusHandler = [ 'success' => $status, 'code' => $code, 'data' => $status_code ];
            return $statusHandler;
        }

        public function getStatusWithErrors($statuses, $code, $error)
        {
            $status_array = $this->getStatusError();
            $status = $status_array[$statuses];
            $code_array = $this->errorCodes();
            $status_code = $code_array[$code];
            $statusHandler = [ 'success' => $status, 'code' => $code, 'data' => $error];
            return $statusHandler;
        }

        public function getStatusWithErrorAndData($statuses, $code, $format)
        {
            $status_array = $this->getStatusError();
            $status = $status_array[$statuses];
            $code_array = $this->errorCodes();
            $status_code = $code_array[$code];
            $statusHandler = [ 'success' => $status, 'code' => $code, 'data' => $status_code.$format];
            return $statusHandler;
        }
    }