<!-- Shopping cart
Slippr Version 2 - a Bootstrap based Framework
(C) 2019, Andrew Grillet, Released under GPL2.0 

This displays the cart content and a submit button which selects 
what to do about with the contents.

It is designed to be included in the page_menu area to support Ecommerce
using Stripe. All stripe related processing should be confined to this
file.

While designed and tested on a single page site, it should eventually also
work on sites with multiple pages. 

 *******  KEYS SHOULD BE READ FROM ELSEWHERE   *********

If no cart, don't display (or even include). 
-->
<DIV class="row">  <!-- This is the cart content -->
<h2 align=center>&nbsp;</h2>
<table align=center class="table">

<script src="https://js.stripe.com/v3/"></script>

<?php
// for stripe integration, you need this ...
require_once ("stripe-php-6.31.5/init.php");

include "local/configure.php";

// Stripe needs to know where this is!
$here = "https://" . $_SERVER['HTTP_HOST'] . "/" ; 

$debug=0;

if($debug > 2)
	{
	print_r($_POST);
	print("<br>");	
	print("<tr><td colspan=4/>$here&nbsp;</tr>");
	};

$cart = $_SESSION['cart'];

if($debug > 3)
	{
	$rc = http_response_code();
	print("<tr><td colspan=4/>HTML Response = " . $rc . "&nbsp;</tr>");
	};

print("<tr><th/>SKU&nbsp;<th/>Quantity&nbsp;<th/>Price&nbsp;<th/>Cost&nbsp;</tr>");

$i = 0;
$ptt = 0;
$qtt = 0;

$line_items = array();

foreach ($cart as $p) {
	$sku = $p['sku'];
	$qty = $p['qty'];
	$price = $p['price'];
//	$image = $p['image'];
    $description = $p['description'];

	$cost = $qty * $price;
	$qtt += $qty;
	$ptt += $cost;
	$fp = number_format($price, 2);
	$fc = number_format($cost, 2);

if ($qty > 0)
	print("<tr><td/>$sku&nbsp;<td/>$qty&nbsp;<td/>$fp&nbsp;<td/>$fc&nbsp;</tr>");


// Stripe integration .. 
$items['amount'] = $price * 100 ;
$items['currency'] = 'gbp';
$items['name'] = "SKU" . $sku;
$items['description'] = $description;
$items['quantity'] = $qty;

$line_items[] = $items;
};  // end foreach cart item


$fct = number_format($ptt, 2);
//print("<tr><td colspan=4/><hr></tr>");
print("<tr><th />TOTALS&nbsp;<th/>$qtt&nbsp;<th/>&nbsp;<th/>$fct&nbsp;</tr>");

print("<input type=hidden name=\"qtt\" value=\"$qtt\"/>");
print("<input type=hidden name=\"ptt\" value=\"$ptt\"/>");

print("<tr><td colspan=4/>&nbsp;</tr>");

// form has different contents at each pay stage:
print("<form method=post action=\"index.php\">");

switch($Paystage) {

  case "shopping" :       // No attempt to pay yet - show buttons
		print("<tr><td colspan=2 /><input type=submit name=\"Clear\" 
			class=\"btn btn-warning\" value=\"Clear cart\"/>");

		print("<input type=hidden name=\"Paystage\" value=\"committed\"/>");
		print("<td colspan=1 /><td colspan=2 /><input type=submit name=\"Pay\" 
			class=\"btn btn-success\" value=\"Pay by card\"/></tr>");

	   case "new" :       // nothing in cart, can't buy
	  		$Paystage = "new";

		break;

  case "committed" :  // Asked to pay now - create session

	if($debug == 3)
		print("<tr><td> Line Items = <td colspan=4  />" . $line_items . "</tr>");

	// set the API Key in its own address space ...
	\Stripe\Stripe::setApiKey($stripe_api_key);

	$piglet = array(
		  'success_url' => $here . '/success.php',
		  'cancel_url' => $here . '/cancel.php',
		  'payment_method_types' => ['card'],
	 );
	$piglet['line_items'] = $line_items;

	if($debug > 3)
		var_dump($piglet);

		try { 
		$ssess = \Stripe\Checkout\Session::create( $piglet); 
		$ssid = $ssess->id;
	if($debug > 3)
		print("<tr><td>Ssid = <td colspan=4  />" . $ssid . "</tr>");


		} catch ( Stripe_CardError $e ) {
			print($e->getmessage() . "<br>");
		} catch ( Stripe_InvalidRequestError $e ) {
			print($e->getmessage() . "<br>");
		} catch ( Stripe_AuthenticationError $e ) {
			print($e->getmessage() . "<br>");
		} catch ( Stripe_ApiConnectionError $e ) {
			print($e->getmessage() . "<br>");
		} catch ( Stripe_Error $e ) {
			print($e->getmessage() . "<br>");
		} catch ( Exception $e ) {
			print($e->getmessage() . "<br>");
		};

	if($debug > 3)
		var_dump($ssess) ;

		print("<input type=hidden name=\"Paystage\" value=\"paid\"/>");

	if ($ssid)
		print("<script>
	 	var stripe = Stripe('" . $stripe_public_key . "');
	 	stripe.redirectToCheckout({sessionId: '" . $ssid . "'
			}).then(function (result) { alert(result.error.message); });
		</script>");
	else
		{
		print("<tr><td/></tr>");
		print("<input type=hidden name=\"Paystage\" value=\"new\"/>");
		print("<tr><td colspan=2 />Your data corrupted before it got to Stripe!
				<td/><input type=submit name=\"Pay\" value=\"Bummer!\"/>");
		print("</tr>");
		};

	break;

  case "complete" :  // Success may have cleared your cart.
	print("<tr><th colspan=4 align=center />Your goods will be delivered shortly.</tr>");
	print("<tr><th colspan=4 align=center />Feel free to place another order now.</tr>");
	print("<br><br>");
	print("<input type=hidden name=\"Paystage\" value=\"new\"/>");
	print("<tr><td colspan=2 /><td colspan=2 /><input class=\"btn btn-primary\"  
			type=submit name=\"Pay\" value=\"Thanks\"/>");
	print("</tr>");
	
	break;


  default:     // Paystage is trashed
	print("<br>I'm sorry Dave, I can't do that! ($paystage)<br>");
	print("<input type=hidden name=\"Paystage\" value=\"new\"/>");
	print("<tr><td colspan=2 /><td/><input type=submit name=\"Pay\" value=\"Oh Shit!\"/>");
	print("</tr>");

};  // End of switch
	
print("</form></table>");


?>
<h2 align=center>&nbsp;</h2>
</DIV>   <!-- End of the cart content -->


