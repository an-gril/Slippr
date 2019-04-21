<!-- page_menu
 Slippr Version 2 - Bootstrap based Framework
 (C) 2019, Andrew Grillet, Released under GPL2.0

The Shop does not use a page menu. The Shopping cart goes here.

-->

<div class="container">
<?php
if($debug > 2)
	{
	print_r($_POST);
	print("<br>Paystage: " . $Paystage . "<br>");
	};
?>

<?php

// if it exists, show the cart contents 
if(isset($_SESSION['cart']))
	{
	print("<div class=\"row\"> ");
	print("<h2 align=center>Shopping Cart</h2>");
	include "Shop/cart.php";
	print("</div>"); 
	};
?>

<div class="row">  <!-- last row -->
<?php
include "local/privacy.php";
?>

</div> <!-- Here endeth the last row -->

</div> <!-- Here endeth the container -->
