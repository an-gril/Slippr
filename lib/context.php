<!-- Slippr - a Bootstrap based Framework -->
<!-- Slippr is (C) 2019, Andrew Grillet, Released under GPL2.0 


 Context processing using Bootstrap

 The Context determines the relevant subdirectory.
 Normally, it is normally set by the top level menu: if a new value of [ctxt]
 is posted, there is a change of context. This requires the Page to be set
 to "Home". But can also be changed programmatically, in which case, 
 the new Page should also be defined programatically. 

 This version relies on a static main menu, included from index.php.
 If you are going to use a procedure built menu, define the procedure
 here, and then include the menu from here too. Its logical, keeping
 the cause of the context change and the consequences in the same place,
 and also reduces the number of file-opens. 

-->

<?php
// Recover previous context by default
if(isset($_SESSION['Context']))
	$Context = $_SESSION['Context'];

// The Default should be overwritten with the same content as /home by
// the install script - but contains developer docs if you don't.
if(!isset($Context) || ($Context == ""))
	{
	$Context = "Default";
	$Page = "Home";
	};

// Allow programmatic context change
if(isset($_POST['Context'])) 
   $Context = $_POST['Context'];

// Requested Page changes are applied regardless of context change. 
if(isset($_POST['Page']))
   $Page = $_POST['Page'];

// Context change by menu ($_POST['ctxt']) takes precidence over programmatic
if(isset($_POST['ctxt']))
   {
   $ctxt = $_POST['ctxt'];

   if($debug > 1)
    	print ("<p>Context = $Context, ctxt = $ctxt</p>");

// Process special case Section options ...
   switch ($ctxt) {
// debug does not actually change the context, but always sets the page to Home
      case "Debug":
          $_SESSION['debug'] += 1;
          if($_SESSION['debug'] > 5)
                $_SESSION['debug'] = 5;
          $Page = "Home";
           break;
      case "NoDebug":
          $_SESSION['debug'] -= 1;
          if($_SESSION['debug'] < 0)      // less than 0 is no good!
                $_SESSION['debug'] = 0;
          $Page = "Home";
          break;
      case "Files" :
          $Page = "Files";
          $Context = "/";
          break;
      default:
          $Context = $ctxt;
          $Page = "Home";
      }; // end switch
   }; // end of context change

// preserve for next time
$_SESSION['Context'] = $Context;

// handle undefined page (eg on first access to site, or after error).
if((!isset($Page)) || ($Page == ""))
	$Page = "Home";
?>

