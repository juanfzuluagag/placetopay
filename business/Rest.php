<?php  

	/**
	 * 
	 */
	class REST	{
		public $json_auth;
		public $json_data;
		private $url_base;

		function __construct($conf, $args, $method){
			$this->url_base = $conf['rest']['url_base'];
			$this->building_json($conf, $args, $method);
		}


		private function building_json($conf, $args, $method){
			if($method == "create_payment"){
				$sended_json = json_encode(
  							array(
	  							"auth" => array(
	  								"login" => $conf['rest']['login'],
	  								"seed" => $conf['rest']['seed'],
	  								"nonce" => $conf['rest']['nonceBase64'],
	  								"tranKey" => $conf['rest']['tranKey']
	  							),
	  							"buyer" => array(
	  								"document" => $args['document'],
	  								"documentType" => $args['documentType'],
	  								"name" => $args['name'],
	  								"surname" => $args['surname'],
	  								"email" => $args['email'],
	  								"mobile" => $args['mobile'],
	  								"address" => array(
	  									"street" => $args['street'],
	  									"city" => $args['city'],
	  									"country" => $args['country']
	  								),
	  							),
	  							"payment" => array(
	  								"reference" => $args['reference'],
	  								"desciption" => $args['description'],
	  								"amount" => array(
	  									"currency" => $args['currency'],
	  									"total" => $args['total']
	  								),
	  							),
	  							"expiration" => date('c', strtotime("+30 minute", strtotime($conf['rest']['seed']))),
	  							"returnUrl" => $args['returnUrl'],
	  							"ipAddress" => $args['ipAddress'],
	  							"userAgent" => "PlacetoPay SandBox"
	  						)
						);
				$this->json_data = $sended_json;
			}else{
			
			$this->json_auth = json_encode(
		  							array(
			  							"auth" => array(
			  								"login" => $conf['rest']['login'],
			  								"seed" => $conf['rest']['seed'],
			  								"nonce" => $conf['rest']['nonceBase64'],
			  								"tranKey" => $conf['rest']['tranKey']
			  							),
			  						)
		  						);
			}
			
		}

		public function base_payment($request_id){
			
			$completed_url = ($request_id == null) ? $this->url_base."/api/session" : $completed_url = $this->url_base."/api/session/".$request_id;
			$json = ($request_id == null) ? $this->json_data : $this->json_auth;
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => $completed_url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $json,
			  CURLOPT_HTTPHEADER => array(
			    "Content-Type: application/json",
			    "cache-control: no-cache"
			  ),
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				return array("band" => false, "message" => $err);
			} else {
				return array("band" => true, "message" => $response);
				
			}
		}
	}

?>