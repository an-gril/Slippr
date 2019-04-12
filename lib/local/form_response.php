<!-- Form_response is part of: 
 Slippr - Bootstrap based Framework
 (C) 2019, Andrew Grillet
 Sani-t.uk - website
 (C) 2019, Sani-t 

This is included in place of the form if context is involed after submit.
It must process the response to the capture.
-->
<?php
// reCaptcha info
include "local/captcha_keys.php";
// Our secret key
// Who the client actually i
$remoteip = $_SERVER["REMOTE_ADDR"];
$url = "https://www.google.com/recaptcha/api/siteverify";

// Form info
$name = $_POST["name"];
$organisation = $_POST["organisation"];
$email = $_POST["email"];
$message = $_POST["message"];
// what recaptcha says
$response = $_POST["g-recaptcha-response"];

// we need to know what captcha found out
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, array(
	'secret' => $secret,
	'response' => $response,
	'remoteip' => $remoteip
	));
$curlData = curl_exec($curl);
curl_close($curl);

// Parse data from cURL
$recaptcha = json_decode($curlData, true);

if ($recaptcha["success"])
	echo "Success at reCapcha!";
else
	echo "Failure! He's a fake!";
