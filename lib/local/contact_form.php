<!-- Contact_form is part of: 
 Slippr Version 2 - Bootstrap based Framework
 (C) 2019, Andrew Grillet

This is normally uses as a replacement for the content of a page menu.
-->
<?php
if($debug > 1)
	{
	print_r($_POST);
	print("<BR>");
	};
// these are site specific - you have to have them for your own fqdn. 
include "captcha_keys.php";

if(isset($_POST['Contact']))
    {
	include "lib/form_response.php";
	}
else
	{
?>
<form id="Contact" method=post action="index.php" class="form" >

<?php
// Record what page we are invoked from 
print("<input type=hidden name=\"Contact\"  value=\"Yes\" />");
?>
<input type=hidden name="Page"  value="Home" />

<!-- Your name -->

  <DIV class="row">
    <DIV class="form-group  col-sm-9 col-sm-offset-1">
    <label for="name" class="control-label" >Your Name</label>
	<input type=text name="name"  class="form-control"  placeholder="Mr Big Boss">
	</DIV>
  </DIV>

<!-- Organisation-->

  <DIV class="row">
    <DIV class="form-group  col-sm-9  col-sm-offset-1">
    <label for="organisation" class="control-label" >Your Organisation</label>
	<input type=text name="organisation"  class="form-control"  placeholder="Mega Corp plc">
	</DIV>
  </DIV>

<!-- phone -->
  <DIV class="row">
	<DIV class="form-group  col-sm-9  col-sm-offset-1">
	<label for="phone" class="control-label" >phone</label>
	<input type=text name="phone"  id="phone" class="form-control"  placeholder="+44 (0) 7555 818818">
	</DIV>
  </DIV>

<!-- email -->
  <DIV class="row">
	<DIV class="form-group  col-sm-9  col-sm-offset-1">
	<label for="email" class="control-label" >Email</label>
	<input type=email name="email"  id="email" class="form-control"  placeholder="boss@megacorp.com">
	</DIV>
  </DIV>

<!-- Message -->
  <DIV class="row">
    <DIV class="form-group  col-sm-9  col-sm-offset-1">
	<label for="message"  class="control-label" >Message</label>
	<textarea rows=4 cols=20 id="message" class="form-control" 
		name="message" ></textarea>	
	</DIV>
  </DIV>


<!-- Submit -->
  <DIV class="row">
      <nav class="btn-group navbar col-sm-2  col-sm-offset-4">
      <span class "navbar-text">&nbsp;</span> 
<?php
	print("<button class=\"g-recaptcha\" data-sitekey=$sitekey  
		data-callback=\"captchaSubmit\" data-badge=\"inline\" >Send</button>");
?>
      </nav>
  </DIV>

</form> 
<?php
};
?>

