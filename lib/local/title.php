<!-- Slippr - a Bootstrap based Framework -->
<!-- Slippr is (C) 2019, Andrew Grillet, Released under GPL2.0 
     You should copy this file to your own 'local' directory and edit it to 
     your needs. 

Title contains the title - which appears in the browser tab - and any
scripts which you need everywhere. (If they are slow to load, you may
want to put them in the footer instead, or do async loading or something).
-->

<title>Slippr</title>


<!-- These scripts are used by reCaptcha, which is used on the contact form.  
You can delete them in your copy if you will not be needing a reCaptcha. 
(They probably are not good for privacy).
-->
<script src='https://www.google.com/recaptcha/api.js' async defer'>
</script>
<script>
<!-- assumes form has a submit button, and the form's ID is "Contact" -->
	function captchaSubmit(data) {
		document.getElementById("Contact").submit();
	}
</script>
<?php
// you can manually set the debug level by using ssh to edit the setting here.
// If you have copied this to your own local and have that under version
// control, then you could set a different default there while debugging.
// Debug levels
// debug 1 - parameter passing (done in index.php)
// debug 2 - flow of control (done  in index.php and include files)
// debug 3 - WTF? (use when desperate :-)
$debug = 0;
?>
<!-- Get this stuff from CDN and google cos its faster than hosting yourself, 
and should be cached by your browser for other websites anyway! -->
     
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library (used by Modals) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<!-- Slippr bootstrap theme CSS code - Needs to be on your website so you
	can customise it -->
<link rel="stylesheet" href="/css/bootstrap-extras.css">

<!-- Create these icons and put them in the images directory -->

<link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="v/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="css/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

