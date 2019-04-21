<!-- Shop Window
 Slippr Version 2 - Bootstrap based Framework
 (C) 2019, Andrew Grillet, Released under GPL2.0

The stock items are defined in a file (inventory.txt) and 
fetched into a system variable for processing elsewhere. 

Here, they are displayed for buying. 

This should create a sequence of rows, each with a picture of an SKU,
its name, description, SKU number and price. 
There is a numeric field with up/down arrows, and an "add to cart" submit 
button to say how many are wanted. 
-->
<?php

print("<table align=center class=\"table\">");

foreach ($_SESSION['inventory'] as $item) 
	{
//	print_r($item);
//	print("<br>");
	if(count($item) > 2)   // Image and notes are optional)
		{
		print("<form method=post action=\"index.php\">");
		print("<input type=hidden name=\"Action\" value=\"Add\"/>");
		$sku = $item[0];
		$description = $item[1];
		$price = $item[2];
		$image = $item[3];
		$showas = "images/" . $image;
		$notes = $item[4];

		print("<tr><td /><img src=\"$showas\"</img>
		<td /><br><br>$description &nbsp;&nbsp;&nbsp;&pound;$price
				<br>(SKU: $sku) <input type=hidden name=\"sku\" value=\"$sku\"/>
				<br>$notes
				<br>
			  <br><label for=\"qty\">Quantity (1-10):</label>
			  <br><input type=\"number\" id=\"qty\" name=\"qty\" value=\"1\"  
				min=\"1\" max=\"10\">
		      &nbsp;<input type=submit name=\"Add\" value=\"Add to cart\"/></tr>");
		print("</form>");
		}; // end if enough fields
	}; // end inventory

print("</table>");


?>

