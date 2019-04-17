<!-- Slippr Version 2 
(C) 2019, Andrew Grillet, Released under GPL2.0 
-->

<h2 align="center">Contact form</h2>
<p> &nbsp;</p>
<p>There is a contact form provided in the library. It also has a response page.
</p>
<p>This is typically deployed by including it in page_menu.php for
one or more sections. It may completely replace the menu if appropriate.
(A "contact us" Context probably only needs the home page with
contact details, and the form in place of a menu.
</p>
<p>As supplied, the contact form uses reCaptcha. I have found it useful to
protect from spam. It is fairly privacy invading, and probably unnecessary
and unworkable on an intranet. Copy the supplied files to "local", as the 
contents of lib will be replaced everytime you redeploy to upgrade.
</p>
<p>reCaptcha uses cURL. You will need php-curl, which might not be on your 
system by default, and cURL needs access to cert.pem, which it might not
have on a system where the web server is in a jail or similar (most *BSDs).
The solution is to copy /etc/ssl/cert.pem to /var/www/etc/ssl/cert.pem. 
This is not a security risk, as the file is common knowledge. You might 
have to refresh it occasionally (eg annually).
</p>
<p>As supplied, the captured contact details are placed in /tmp/contacts.csv.
You will need to create both the directory and file yourself. This is not
automatic, as it would risk the loss of data on update. You will need to 
make your own provision for copying the data to somewhere more
useful. (Maybe cron can help).
</p>
<p>I found emailing the contacts (like Wordpress does) to be annoying. YMMV.
</p>
<p>Saving the contacts in a database could be useful, but it is hard to see 
how the code could be very re-useable - partly because of issues to do with 
secure access to the database. I assume you would want to put the data 
in an existing CRM database, and not make a new one. I have a more complex
framework which does this, but it is not Open Source.
</p>

