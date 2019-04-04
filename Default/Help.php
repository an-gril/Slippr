<!-- Slippr is (C) 2019, Andrew Grillet, Released under GPL2.0 -->

<h2 align="center">Slippr - developer help.</h2>
<p> &nbsp;</p>
<p>
</p>
<p>Slippr is used to produce very simple (ie no database) sites where a CMS
like Noof would be overkill. Slippr has no support for login,
so content has to be entered off-line. 
</p>
<p>As the site designer, you are expected to build your site by adding a
series of directories which act like "Sections" in magazines.
</p>
<p>When you first create a new system, you copy the contents of /lib/local 
to local of your system and then customise the contents.
</p>
<p>Then clone the directory "Default" to make your first "Context". The context 
directory should have a capitalised one-word name, which must be added to 
the menu in your "/local". 
</p>
<p>Each context directory must have, as a minimum, a 
"Home.php" file and a "Help.php" file- clone these and edit them. 
It also needs a menu.php file which will choose pages to which over write 
the Home.php page. Do not put spaces in the menus - it can be done by 
jiggery-pokery, but leads to un-reproduceble browser dependent bugs which 
will cause nightmares. 
You should have a Help.php file and menu entry pointing to it in 
each context. 
</p>
<p>Each time you update your website, you should copy the content of your
/home directory over the top of /Default - which will over-write this page.
During development, you can omit that step, and gain access to this 
documentation.
</p>
<p>Information is typically passed between pages in the same context using 
html POST, and between contexts using SESSION variables. You can use other
methods if you can debug them!
</p>
<p>
It is good practice to use version control for your custom pages. You can
add your own copy of local to this, making it possible to control your
customised version. If you use a deployment script, then the fetch from
your version control system can be preceeded by updating Slippr so
you always have the latest version and followed by copying /home/* over
/default. In my case, this needs to be followed by changing the ownership
of the entire directory tree to that of the server. 
</p>


