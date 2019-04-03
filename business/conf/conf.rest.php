<?php  

	$conf = array(); //variable contenedora de credenciales;

	$login = "6dd490faf9cb87a9862245da41170ff2"; //Dato suministrados por placetopay para la prueba
	$secretKey = "024h1IlD"; //Dato suministrados por placetopay para la prueba


	$seed = date('c');


	if (function_exists('random_bytes')) {
	    $nonce = bin2hex(random_bytes(16));
	} elseif (function_exists('openssl_random_pseudo_bytes')) {
	    $nonce = bin2hex(openssl_random_pseudo_bytes(16));
	} else {
	    $nonce = mt_rand();
	}

	$nonceBase64 = base64_encode($nonce);

	$tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));

	$conf['rest'] = array(
		'login' => '6dd490faf9cb87a9862245da41170ff2',
		'secret' => '024h1IlD',
		'seed' => $seed,
		'nonceBase64' => $nonceBase64,
		'tranKey' => $tranKey,
		'url_base' => 'https://test.placetopay.com/redirection',
	);


?>