<?php

// MailChimp API integration

		$apikey = '********************************-***';

		$id = '**********';
		$emailstruct = array('email'=>"*****@*****.***"); 
		$doubleoptin = "true";
		$sendwelcome = "false";     

		$data = array(
        'apikey'=>$apikey,
        'id' => $id,
        'email'=>$emailstruct,
        'double_optin'=>$doubleoptin,
        'send_welcome'=>$sendwelcome
    	);

		$payload = json_encode($data);

		$submit_url = "https://***.api.mailchimp.com/2.0/lists/subscribe.json";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $submit_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
 
		$result = curl_exec($ch);
		curl_close ($ch);
		

?>