<?php  
	
	require_once('conf/conf.rest.php');
	require_once('Rest.php');

	$_REQUEST['ipAddress'] = getRealIP();

	$rest_method = new REST($conf, $_REQUEST);

	echo "Vamos bien".print_r($rest_method->base_payment(), true);





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