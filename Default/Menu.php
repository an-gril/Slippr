<p>Menu
</P>
<?php
include "lib/menu_tools.php";
print("<p align=center> </p>");

print("<DIV class=\"menu_class\"><form action=\"index.php\" method=\"post\">");
print("<table align=center>");

print("<tr><td/>&nbsp;</tr>");

print("<tr><td/>");
page_button("Home", "<td/>Home screen");
print("</tr>");

print("<tr><td/>");
page_button("Design", "<td/>Design rules for Slippr");
print("</tr>");

print("<tr><td/>");
page_button("Deploy", "<td/>Typical deploy script");
print("</tr>");


print("<tr><td/>");
page_button("Release", "<td/>Release notes");
print("</tr>");

print("<tr><td/>");
page_button("Help", "<td/>Get some help!");
print("</tr>");

print("<tr><td/>&nbsp;</tr>");
print("<tr><td/>&nbsp;</tr>");

print("</table>");

print("<p align=center><img src=\"images/RTFM.jpg\"/> </p>");

print("</form></DIV>");

?>
