<!-- Slippr - a Bootstrap based Framework -->
<!-- Slippr is (C) 2019, Andrew Grillet, Released under GPL2.0 -->
<?php
// A set of tools for creating the local (in context) menus and modals

// Used for Page menu items
function page_button($page, $descr)
{
print("<input class=\"nav-pills btn-primary\" type=\"submit\" name=\"Page\" value=\"");
print($page . "\" >&nbsp;&nbsp;&nbsp;$descr</input>");
}

// Make the Page menu dynamically  (from an array of entries)
// - this procedure should be called after defining the array.
// The menu can be dynamically replaced by text if you wish. 
function make_page_menu ($menu_definition, $menu_picture, $menu_caption)
{
global $context;

	print("<p align=center>$Context menu</p>");
	print("<DIV class=\"menu_class\"><form action=\"index.php\" method=\"post\">");
	print("<table align=center>");
	print("<tr><td/>&nbsp;</tr>");
	foreach ($menu_definition as $button => $help)
		{
		print("<tr><td/>");
		page_button($button, "&nbsp;<td/>" . $help);
		print("</tr>");

		print("<tr><td/>&nbsp;</tr>");
		};
	print("<tr><td/>&nbsp;</tr>");
	print("</table>");

	print("<p align=center><img src=\"$menu_picture\"/></p>");

    if(isset($menu_caption)) 
		print("<p align=center>$menu_caption </p>");
	else
		print("<p align=center></p>");

	print("</form></DIV>");
}

// Button to open a modal (put in a menu to select sub-options)
function modal_button($label, $target)
{
print("<button type=\"button\" class=\"nav-pills  btn-primary\" data-toggle=\"modal\" ");
print(" data-target=\"#" );
print($target);
print("\" >" .  $label . "</button>");
}



function task_button($page)
{
print("<input class=\"nav-pills btn-primary\" type=\"submit\" name=\"Page\" value=\"");
print($page . "\" ></input>");
}


// This creates a modal header with its ID (the handle by which it is opened)
// and its title
function modal_header($modal_id, $modal_title)
{
$MID= $modal_id . "Modal";
print("<div id=\"$MID\" class=\"modal fade\" role=\"dialog\"><div class=\"modal-dialog\">");
print("<div class=\"modal-content\"><div class=\"modal-header\">");
print("<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>");
print("<h4 class=\"modal-title\">$modal_title</h4></div><div class=\"modal-body\">");
print("<form method=post action=\"index.php\">");
}

// This creates the footer for a modal with its action and close buttons
// It closes the form which is needed for the task, and probably also 
// for post data the modal captures.
function modal_footer($task_name)
{
print("<p align=right>");
task_button($task_name);
print("</p> </form>");

print("</div><div class=\"modal-footer\">");
print("<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>");

print("</div></div></div></div>");
}

