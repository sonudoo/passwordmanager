# passwordmanager
Secure Password Manager based on PHP, JS and HTML

The password manager is built for personal use only. It is recommended not to host the password manager on the web or permit it to be accessible remotely. Though the password manager is built to be highly secure, password protection is not guaranteed (Bruteforce is always a technique to hack).

# Setup

To setup the password manager on your computer follow the following steps : 

1. Open phpmyadmin and create a new database named "pwdmngr" or whatever you may wish to name it.

2. With the database selected, run the SQL query in "pwdmngr.sql".

3. Open the config.php file in the "pwdmngr" folder and fill in your username, credential code, first password and second password (These four details will be required during login).

4. Fill in your public and private keys of Google Recaptcha (Go to recaptcha.net to get your keys if you don't have one). Next fill in your email (Recovery and unlocking details would be sent to this address). 

5. Next fill in your secret word and key (The key would be used to encrypt and decrypt your passwords).

6. Open the configdb.php file and fill in your server name (localhost recommended), database username (mostly root) and database password. Also fill in the database name ("pwdmngr" or anything else that you selected in step 1). 

7. Visit the password manager directory (i.e, www.your-domain.com/pwdmngr/) in a browser. You must see the default login page name "Secure Login".

6. (Optional) To avoid the login page to appear again and again each time you visit password manager, login to the database in phpmyadmin and go to "autologin" table. Add a new record and insert two values, "pin_post" and "autologin_key" (these values should be at least 30 alphanumeric characters long). Now go to the root directory and open the file named "AutologinCookieSet.php". In the "$cookie_value" field enter the value you entered for the "pin_post" field in the "autologin" table of the database. In the "$cookie_value2" field enter the value you entered for the "autologin_key" field in the "autologin" table of the database. Now visit the file in the browser (The same browser that you wish to autologin upon visit). Autologin cookies would be setup and now you would be logged in as soon as you visit password manager (i.e, www.your-domain.com/pwdmngr/). 

7. Make sure to delete the "pwdmngr.sql" and "AutologinCookieSet.php" file.

# Features

Upon login you will see several options :

1. "Insert" lets you insert a new record to the database. The entered password is encrypted by the "key" in "config.php".
2. "Select" lets you look up a record in the database. It has inbuilt search option. Password are never shown. It can only be copied to clipboard which requires Flash.
3. "Update" lets you update a record for a website.
4. "Check log file" option takes you to the log file of the website. Password manager maintains its own log file seperate from that of server of PHP or browser. It contains all records of every activity made on the password manager from visit to session end.
5. "Active sessions" lets you check the different sessions (or locations or browsers) from which the password manager is currently logged in. You can end particular sessions or remove all sessions at once by typing the "secret word" same as in "config.php". You can also lock the password manager, which disables all features of password manager and I call this feature as "Numbing" the password manager. Once the password manager is locked, you need to manually unlock it.



Password manager has a self-locking feature (either you entered wrong login credentials more than 3 times or you yourself locked the passsword manager). To unlock :

1. Visit the password manager, click on the "Click here" link on the "locked password manager" page. (If there is no such link available then you have to open the phpmyadmin and unlock the password manager manually. To do so just set the "status" table value to "unlocked" instead of "locked" in the database and clear all the cookies of your browser.)
2. Answer the security questions and captcha to receive the unlock link at your email (the same email as provided in the "config.php"). If you enter incorrect answers more than three times, it would result in permanent locking and would require you to manually login to database and set the "status" table value to "unlocked" instead of "locked" and then clearing all your browser cookies.
3. Click the link received at your email. Password manager would be unlocked. 
4. (Important) Clear all your browser cookies before next visit.



In case you forgot your login credentials, you may look for it in the "config.php" file or use the "Forgot your Password" option in the login page. Remember that this option is not available if you have already logged in from the same browser in the past.

1. Answer the security questions and the captcha in the "Forgot your password" page. If you enter incorrect answer more than 3 times, password manager would be locked.
2. Your login credentials would be sent to your email address (as specified in "config.php").



All the pages in the password manager are dynamically generated and cannot be accessed by directly entering the url in browser. The pages generated are W3C certified.


#Developer

Incase you face any error please mail me at administrator [at] sonudoo.com. I hope you enjoy this app.
