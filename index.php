<?php
/* Slippr Version 2 - A Bootstrap based skeleton framework
 * (C) 2019, Andrew Grillet, released under GPL 2.0
 *  
 * This file completely determines the flow of control in the basis of the
 * selected Context. Context may chosen by the main menu, but can also
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


// we have to access the session variables first ...
session_start();

print("<HTML> <HEAD>");
include "local/title.php";

print("<meta name="viewport" content="width=device-width, initial-scale=1.0">");

print("</HEAD>");

print("<BODY id=master>");

// method of recovering if sesson variables are messed up
if(isset($_GET['clear']))
     {
     print("Trying to clear session variables.<br>");
     session_destroy();
     };

// this is where Google Analytics goes (with your ID site tag).
if(file_exists("local/analytics.php"))
        include "local/analytics.php";

// Begin the formatting of the screen ...
   $root_path = __DIR__ ;

// local contains branding stuff which is initialised by copying the contents of
// lib/local to local at install time, and thereafter maintained by you (in your
// private version control).
include "local/header.php";

// Main menu manages the context ...
include "local/main_menu.php";
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

// The LHS div is opened and closed at this level.
print("\n<div id=\"LHS\" class=\"col-sm-9\">");
include $Screen;
print("\n</DIV>"); // end LHS (screen)

// RHS is normally the page_menu, but
// because the DIV has an ID, we can update it programmatically

// we can do this the new way, or the old way
    print("\n<div id=\"RHS\" class=\"col-sm-3\">");
	if(file_exists($Context . "/page_menu.php"))
		{
		include "lib/menu_tools.php";
        $Menu =  $Context . "/page_menu.php";
        include $Menu;
		};

// Optional context-independent panel below the menu
//    - typically used for affiliate advertising.
	if(file_exists("local/sub_menu.php"))
		{
        include "local/sub_menu.php";
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
