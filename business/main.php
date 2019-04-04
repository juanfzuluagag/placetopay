<?php  
	
	require_once('cache.php');
	require_once('conf/conf.rest.php');
	require_once('Rest.php');




	if($_REQUEST['method'] == "create_payment"){
		$_REQUEST['ipAddress'] = getRealIP();

		$rest_method = new REST($conf, $_REQUEST, $_REQUEST['method']);
		$respond = $rest_method->base_payment(null);
		if($respond['band']){
			$json = json_decode($respond['message']);
			if($json->status->status == "OK"){
				$cache = new Cache("payments");
				if($cache->exist_cache()){
					$all_records_payment = $cache->get_records();

					$all_records_payment[$_REQUEST['reference']] = $json;

					$cache->create_record($all_records_payment);

					echo json_encode($json);
				}else{
					$all_records_payment = array();
					$all_records_payment[$_REQUEST['reference']] = $json;
					$cache->create_record($all_records_payment);
					echo json_encode($json);
				}	
			}else{
				echo json_encode($json);
			}
		}else{
			echo json_encode(array("status" => array("status" => "ERROR", "reason" => "PC", "message" => "Hay problemas con el servidor de placetopay")));
		}
		
	}else if($_REQUEST['method'] == "get_my_payments"){
		$cache = new Cache("payments");
		$all_records_payment = $cache->get_records();
		$respond_array = array();
		if(!empty($all_records_payment)){
			$rest_method = new REST($conf, $_REQUEST, $_REQUEST['method']);
			foreach ($all_records_payment as $key => $record) {
				$item_payment = $rest_method->base_payment($record->requestId);
				if($item_payment['band']){
					$respond_array[] = $item_payment['message'];
				}
			}
		}
		echo print_r($respond_array, true);

	}


	




	function getRealIP(){
	    if (isset($_SERVER["HTTP_CLIENT_IP"])){
	        return $_SERVER["HTTP_CLIENT_IP"];
	    }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
	        return $_SERVER["HTTP_X_FORWARDED_FOR"];
	    }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
	        return $_SERVER["HTTP_X_FORWARDED"];
	    }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
	        return $_SERVER["HTTP_FORWARDED_FOR"];
	    }elseif (isset($_SERVER["HTTP_FORWARDED"])){
	        return $_SERVER["HTTP_FORWARDED"];
	    }else{
	        return $_SERVER["REMOTE_ADDR"];
	    }
	}

?>