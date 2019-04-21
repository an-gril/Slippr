<!-- Success
Slippr Version 2 - a Bootstrap based Framework
(C) 2019, Andrew Grillet, Released under GPL2.0 

You come here from Stripe after card processing succeeds.

-->
<?php
//print("<h2 align=center>Gadzooks - We've done it!</h2>");
// At this point, we are supposed to retrieve the customer's data from
// stripe and save it, but its not essential, as you can get all
// required data from the Stripe Dashboard.

// Restart the cart
$_POST['Paystage'] = "complete"; 
include "index.php";
?>
