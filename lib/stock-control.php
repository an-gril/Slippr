<!-- Stock-control
 Slippr Version 2 - Bootstrap based Framework
 (C) 2019, Andrew Grillet

Format of inventory.csv: 
Stock items in inventory have 
	SKU Number,
	description, 
	a picture of item (reference to file in images),
	price, 
	notes (typically dimensions, colour etc)
	qoh (quantity on hand, optional)
-->
<?php

function populate_inventory() // this reads the inventory from the file to
{							// the session variable
	ini_set("auto_detect_line_endings", true);  // otherwise it won't detect eol properly!
	$csvfile = fopen("inventory.csv", "r")	
		or die("<br>Trouble at t' mill, son. Best get Adam Woodstock down there quick!<br>");

	fgetcsv($csvfile, 1024);  // skip the headers
	$rec = 0;
	while (!feof($csvfile))
		{
		$record  = fgetcsv($csvfile, 1024);
	// enter the entire record, with sku as the index 
		$_SESSION['inventory'][$record[0]] = $record;
		};
	fclose($csvfile);
}


// add an item to the cart - this will add the number ordered for the sku
// if already on order, else add just an entry for the sku. (Cart must already exist)

function add_to_cart($sku, $qty) 
{
	if(!isset($_SESSION['cart']))
		{ 
		die("<br>Trouble at t' mill, son. Best get Ben Woodstock down there quick!<br>");
		};

// how many types of SKU in cart?
	$cart_items = count($_SESSION['cart']);
// what is the latest addition?
	$purchase = $_SESSION['inventory'][$sku];

// we need to find if there is a cart entry with the same sku. 
 	for ($f = 0, $c = 0; $c < $cart_items; $c++)
		{
// if so, we add qty to the number.
		if($_SESSION['cart'][$c]['sku'] == $sku)
			{	
			$_SESSION['cart'][$c]['qty'] += $qty ;
			$f = 1;
			};
		};

// if not found, we add an entry to the cart. 
    	if($f == 0)
			{
			$_SESSION['cart'][$cart_items] =  array(
				"sku" => $purchase[0],
				"description" => $purchase[1],
				"price" => $purchase[2],
				"qty" => $qty);
			};
}

// Currently not used, because Stripe integration is combined with
// cart display in the live version. The process may change later.
function display_cart() 
{
	if(!isset($_SESSION['cart']))
		{ 
		die("<br>Trouble at t' mill, son. Best get Charlie Woodstock down there quick!<br>");
		};
$i = 0;
$ptt = 0;
$qtt = 0;

$line_items = array();

foreach ($cart as $p) {
	$sku = $p['sku'];
	$qty = $p['qty'];
	$price = $p['price'];
	$image = $p['image'];
    $description = $p['description'];

	$cost = $qty * $price;
	$qtt += $qty;
	$ptt += $cost;
	$fp = number_format($price, 2);
	$fc = number_format($cost, 2);

if ($qty > 0)
	print("<tr><td/>$sku&nbsp;<td/>$qty&nbsp;<td/>$fp&nbsp;<td/>$fc&nbsp;</tr>");

};  // end foreach cart item

$fct = number_format($ptt, 2);
print("<tr><th />TOTALS&nbsp;<th/>$qtt&nbsp;<th/>&nbsp;<th/>$fct&nbsp;</tr>");

}

// Slippr does not support full stock control (requires database).
// qoh field is there to restrict the maximimum amount that can be ordered
// if the item might become out of stock. (not implemented yet).
// Real qoh update would take place when dispatched (not part of Slippr).

?>

