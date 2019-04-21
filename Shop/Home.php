<!-- Shop Home
 Slippr - Bootstrap based Framework
 (C) 2019, Andrew Grillet
 
This should include the shop window, and process according to the pay stage. 

Actual Stripe processing MUST take place in cart.php because of dependencies.

-->
<?php
include "lib/stock-control.php";

// find out how far we have got with it.
if(isset($_POST['Paystage']))
	{
	$Paystage = $_POST['Paystage'];
	}
else
	{
	$Paystage = "new";
	};

// Create empty cart if undefined or clear the cart if requested.
if((!isset($_SESSION['cart'])) ||  (isset($_POST['Clear'])))
	{                        
	$Paystage = "new";
	};

// populate the inventory (session variable) if undefined
if(!isset($_SESSION['inventory']))
	populate_inventory();

if($debug > 2)
	var_dump($_SESSION['inventory']);

// Must have inventory and cart before we ...
// Now we show the show window or checkout
print("<DIV class=\"container\">");

switch ($Paystage) {
case "new":
	$_SESSION['cart'] = array( );
case "shopping" :
// Add items to cart if requested: 
	if(isset($_POST['Add']))   
		{
		add_to_cart($_POST['sku'], $_POST['qty']);
        $Paystage = "shopping";
		};
case "complete":
case "paid" :
// Cart wont show buttons because you can't buy anything, but it changes
// the Paystage to shopping - so you can next time.
	break;

case "committed":
	print("<h2 align=center>Processing using Stripe.</h2>");
	break;


default:
		print("<br>Trouble at t' mill, son. This is a job for t' gnomes!<br>");

};
print("<h2 align=center>All prices include shipping and VAT</h2>");
include "lib/shop_window.php";

include "local/notes.php";

print("</DIV>");
?>


