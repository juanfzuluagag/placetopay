<?php  

	/**
	 * 
	 */
	class REST	{
		

		private function building_json($conf, $args){
			$sended_json = json_encode(
  							array(
	  							"auth" => array(
	  								"login" => $conf['login'],
	  								"seed" => $conf['seed'],
	  								"nonce" => $conf['nonceBase64'],
	  								"tranKey" => $conf['tranKey']
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
	  							"expiration" => date('c', strtotime("+30 minute", strtotime($conf['seed']))),
	  							"returnUrl" => $args['returnUrl'],
	  							"ipAddress" => $args['ipAddress'],
	  							"userAgent" => "PlacetoPay SandBox"
	  						)
						);
		}

		public function base_payment($json_data){
			
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://test.placetopay.com/redirection/api/session",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $json_data,
			  CURLOPT_HTTPHEADER => array(
			    "Content-Type: application/json",
			    "cache-control: no-cache"
			  ),
			));
		}
	}

?>