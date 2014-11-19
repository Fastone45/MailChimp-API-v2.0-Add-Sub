<?php

// MailChimp API integration

		$apikey = '********************************-***';
		$id = '**********';
		$subscriber_email = "*****@*****.***";
		$your_email = "*****@*****.***";
		$your_server_email = "*****@*****.***";
		$your_sugar = "***";
		
		$emailstruct = array('email'=>$subscriber_email); 
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

		$submit_url = "https://$your_sugar.api.mailchimp.com/2.0/lists/subscribe.json";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $submit_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
 
		$result = curl_exec($ch);
		curl_close ($ch);

		$data = json_decode($result);
		if ($data->error){
			$mailsubject = $data->code .' : '.$data->error."\n $subscriber_email";
			mail($your_email, "MailChimp Subscribe Failed", $mailsubject, "From: <$your_server_email>");
		}
		
		//
				

?>
