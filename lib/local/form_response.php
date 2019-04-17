<!-- Form_response is part of: 
 Slippr - Bootstrap based Framework
 (C) 2019, Andrew Grillet

This is included in place of the form if context is invoked after submit.
It must process the response to the reCaptcha.
-->
<?php

$remoteip = $_SERVER["REMOTE_ADDR"];

$url = "https://www.google.com/recaptcha/api/siteverify";

// what recaptcha says
$response = $_POST["g-recaptcha-response"];

// we need to know what captcha found out
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
	'secret' => $sitesecret,
	'response' => $response,
	'remoteip' => $remoteip
	));

if( ! $curlData = curl_exec($ch))
    {
    trigger_error(curl_error($ch));
    } 
curl_close($ch);

// Parse data from cURL
$recaptcha = json_decode($curlData, true);
	if ($debug > 2)
		print_r($curlData) . "<br>";

if ($recaptcha["success"] == false)
	{

	if ($debug > 0)
		{
  	    print($recaptcha["error-codes"] . "<br>");
		};
	return;
	};


// Form info - minimalist gets most replies
$record[1] = $_POST["name"];
$record[2] = $_POST["organisation"];
$record[3] = $_POST["phone"];
$record[4] = $_POST["email"];
$record[5] = $_POST["message"];

$csvfile = fopen("tmp/contacts.csv", "a")	
	or die("<br>Tell the system administrator his contacts file is missing.<br>");

fputcsv($csvfile, $record);

fclose($csvfile);
?>
<h2 align=center>Thanks for getting in touch. 
<br>You should hear from us very soon.</h2>

