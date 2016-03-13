
Introduction
=============
This is the webframeworks 663 sample application. This is a basica web application
that allows a user to register then access "hidden" php pages behind the application. 

Configuration Settings
=======================
This project is such that no external server is required; web, database or otherwise.
In order to start the applicatino use the .sh or .bat file for linux or windows located
in the utils directory. Also the config.php requires a writeable path for the
sqlite file this config file is located at /includes/config.php

*WARNING*
BE SURE TO MODIFY THE /utils/start_web_server script AND /includes/config.php
ALSO PLEASE MAKE SURE YOUR PHP BINARY OR INI FILE INCLUDES SQLITE SUPPORT.

Work Log
==========
This section has a small write up of each weeks efforts. 

Week 1
---------
The first week is simple. We are required to modify the application to add
in a js enable login page on some other page and add in some additional javascript 
else where. 
To meet these requirements I left the common header as is but modified it to drop 
a form when the login link is clicked. Additionally javascript was added to control 
the css classes for the active link in the header. These javascript files are the 
logincontroller.js and activecontroller.js respectively.
This projrect will automatically install the database tables and create a default user
'admin' with password 'admin'

*WARNING*
THE DEFAULT USER CREATED IS LOCATED IN THE /includes/config.php FILE.

Also the project was modified to use sqlite and the php embedded webserver and 
documetnation was added. 
chorlick 3-12-2016
