<?php
/* Slippr - A Bootstrap based skeleton framework
 * (C) 2019, Andrew Grillet, released under GPL 2.0
 *  
 * This file completely determines the flow of control in the basis of the
 * selected Context. Context is chosen by the main menu, but can also
 * be changed programamtically.
 *
 * Context defines the subdirectory for table specific Task code.
 * Tasks change as the user submits screens.
 *
 * Creation of new menu options is reasonably simple, and there are standard 
 * procedures and naming conventions. 
 *
 * Login and Database access are not supported - use Noof for that 
 */ 

// Debug levels
// debug 1 - parameter passing (done here)
// debug 2 - flow of control (done here and include files)
// debug 3 - WTF?

// we have to access the session variables first ...
session_start();

print("<HTML> <HEAD>");
include "local/title.php";
// Check if someone has set debug in the title
if(isset($_SESSION['debug']))
        $debug = $_SESSION['debug'];
else
        $debug = 0;

?>
 <!-- Get this stuff from CDN and google cos its faster than hosting myself, 
and should be cached from other websites anyway! 
External CSS should be loaded before External Javascript - to allow parallelism
-->
     
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- My own bootstrap theme CSS code - Needs to be on the target website -->
<link rel="stylesheet" href="/css/bootstrap-extras.css">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" async></script> 

<!-- jQuery library (used by Modals) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" async></script>

<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

</HEAD>

<body id=master>
<?php

// method of recovering if sesson variables are messed up
if(isset($_GET['clear']))
     {
     print("Trying to clear session variables.<br>");
     session_destroy();
     };

// Begin the formatting of the screen ...
   $root_path = __DIR__ ;

// local contains stuff which is initialised by copying from the library 
// at install time, but thereafter maintained locally.
include "local/header.php";

include "local/main_menu.php";
// Menu may change the context ...
include "lib/context.php";

// flow of control debug ...
   if($debug > 0)
      print("<br>Context: $Context, Page: $Page<br>");

$Screen = $Context . "/" . $Page . ".php";


if($debug > 1)
     print("Trying to include $Screen ...<br>");

// The main part of the screen is a jumbotron with a row of two columns:
// the context-dependent page and menu.
print("\n<div class=\"jumbotron\"><div class=\"container-fluid\">\n<div class=\"row\">");

// Screens includes stuff which starts with a heading (title bar), which
// is the context, by default, but should be updated later.

// -- Currently, this is out of favour ...
//print("\n<div class=\"col-sm-12\">");
//print("<h2 id=\"titlebar\" align=\"center\">$Context </h2>");
//  -- Now end status bar row
//print("\n</DIV>");


// The LHS div is always opened and closed at this level.
print("\n<div id=\"LHS\" class=\"col-sm-9\">");
include $Screen;
print("\n</DIV>"); // end left screen

// RHS is normally the local menu, but
// because the DIV has an ID, we can update it programmatically

// we can do this the new way, or the old way
    print("\n<div id=\"RHS\" class=\"col-sm-3\">");
	if(file_exists($Context . "/page_menu.php"))
		{
		include "lib/menu_tools.php";
        $Menu =  $Context . "/page_menu.php";
        include $Menu;
		}
	else
		{
        $Menu =  $Context . "/Menu.php";
        include $Menu;
		}

	if(file_exists($Context . "/sub_menu.php"))
		{
        $Menu =  $Context . "/sub_menu.php";
		}

    print("\n</DIV>"); // end help_right

// Now end row with the context page and menu
print("\n</DIV>");


// Now end jumbotron DIV and its container 
print("\n</DIV>\n</DIV>");

// End the entire screen
include "local/footer.php";
?>
</body>
</html>
