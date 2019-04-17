<!-- Slippr Version 2 - a Bootstrap based Framework -->
<!-- Slippr is (C) 2019, Andrew Grillet, Released under GPL2.0 -->
<h2 align="center">Deployment.</h2>
<p> &nbsp;</p>
<p>
It is good practice to use version control for your custom pages. You can
add your own copy of local to this, making it possible to control your
customised version. 
</p>
<p>Slippr uses Bootstrap - you may use any bootstrap components you like
at any time - although the results may not always be desirable ;-)
</p>
<p>The first step is to copy the Example directory and name it Home. This
will create your landing page. Edit the Home.php and Help.php files in your
new directory. Use Home.php as a template to create new screens. 
</p>
<p>Slippr has examples of some files you need to go in your local directory 
in lib/local. You should populate your own local directory with 
these, and then customise them. Your versions will always be used on the web 
site. If you have not done this, the web site probably won't work. 
</p>
<p>The main menu is created across the screen, similar to a magazine sections 
menu, is generated automatically. This selects the directory containing related 
info - a Context. Php is case sensitive. In Slippr, files which are selected
by menus are capitalised - this helps readability, but is necessary for
correct operation. Do not capitalise other filenames or diectory names. 
</p>
<p>Do not put spaces in filenames which appear in menus - it can be done by 
jiggery-pokery, but leads to un-reproduceble browser dependent bugs which 
will cause you nightmares. 
</p>
<p>The menu structure in page_menu.php is used to build the menu. 
Edit this to add the options and supporting text notes. This
method is used rather than the process used for the Context menu because
it allows the order of the items in the menu to be other than alphabetic,
and allows the descriptive cue text. 
</p>
<p>If it exists, the file "sub_menu.php"  is displayed beneath the page menu. 
This can be used for our cookie policy, contact info or similar.
</p>

