<!-- Slippr - a Bootstrap based Framework -->
<!-- Slippr is (C) 2019, Andrew Grillet, Released under GPL2.0 
     You should copy this file to your own 'local' directory and edit it to 
     your needs. -->

<title>Slippr</title>


<!-- These scripts are used by reCaptcha, whihc is used on the contact form.  
You can delete them in your copy if you will not be needing a reCaptcha. 
-->
<script src='https://www.google.com/recaptcha/api.js' async defer'>
</script>
<script>
<!-- assumes form has a submit button, and the form's ID is "Contact" -->
	function captchaSubmit(data) {
		document.getElementById("Contact").submit();
	}
</script>
