<!-- Slippr is (C) 2019, Andrew Grillet, Released under GPL2.0 
        [But see below for licence of the Bash script]
-->

<h2 align="center">Deployment.</h2>
<p> &nbsp;</p>
<p>
It is good practice to use version control for your custom pages. You can
add your own copy of local to this, making it possible to control your
customised version. 
</p>
<p>The normal way to deploy a Slippr site is to use a script on the server
to install from version control. You may use Git, but I use svn. 
</p>
<p>If you use a deployment script, then the fetch from
your version control system can be preceeded by updating Slippr so
you always have the latest version. 
</p>
<p>Slippr provides documentation for developers in /Default/ which is
the first place you arrive on visiting a site. Leave this untouched on a
development site, but on a production site, the export from version
control is followed by copying the /home/* you are developing over
/default. In my case, this needs to be followed by changing the ownership
of the entire directory tree to that of the server. YMMV.
</p>
<h3>Here is a typical deployment script (deploy.sh)
</h3>
<code>
#!/bin/sh<br>
# Licence: You may do what ever the hell you like with this code, including, <br>
# but not limited to, killing time or making babies, or vice versa, If what <br>
# you do is immoral or illegal, I did not do it - so don't blame me for it.<br>
#<br>
# Deploy new version of Slippr and Site<br>
# (Site uses Slippr for infrastructure)<br>
svn export --force --username anonymous  \<br>
  svn://github.com/an-gril/Slippr/trunk /var/www/site<br>

svn export --force --username www --password top-secret \<br>
  svn://svn.grillet.home/var/svn/site/trunk /var/www/site<br>
<br>
echo '&lt;?php \nprint &quot;&lt;p align=center>' &gt; /var/www/site/local/version.php<br>;
echo Slippr - Experimental version .  Deployed:  >> /var/www/site/local/version.php<br>
date >> /var/www/site/local/version.php<br>
echo '&quot;;\n?> \n\\&lt;p> \n' >> /var/www/site/local/version.php<br>
<br>
# On a production site, you need to replace the default contents from Slippr.<br>
cp -R /var/www/site/Home/* /var/www/site/Default<br>
# and may need to change the owner of the files to the browser's owner<br>
chown -R www:www /var/www/site<br>
</code>
<p>This is normally placed in /var/www on OpenBSD. Linux would probably put it 
somewhere else.
</p>
<p>You can run the script from /var/www using:<br>
<code>
www > ./deploy.sh<br>
</code>
</p>

