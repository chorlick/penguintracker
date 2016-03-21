!!!YOU MAY IGNORE ALL OF THIS *EXCEPT* THE WARNING SECTIONS PLEASE READ THE WARNING SECTIONS!!!

Introduction
=============
This is the webframeworks 663 sample application. This is a basic web application
that allows a user to register then access "hidden" php pages behind the application. 

BY DEFAULT THE PHP EMBEDDED WEBSERVER WILL BE ACCESSIBLE AT http://localhost:8000

Configuration Settings
=======================
This project is such that no external server is required; web, database or otherwise.
In order to start the application, use the .sh or .bat file for linux or windows located
in the utils directory. Additionally, the config.php requires a writeable path for the
sqlite file this config file is located at /includes/config.php.

*WARNING*

BE SURE TO MODIFY THE /utils/start_web_server script AND /includes/config.php

ALSO PLEASE MAKE SURE YOUR PHP BINARY OR INI FILE INCLUDES PDO SQLITE SUPPORT.

Work Log
==========
This section has a small write up of each week's efforts. 

Week 1
---------
The first week is simple. We are required to modify the application to add
in a js enabled login page on some other page and add in some additional javascript 
elsewhere. 
To meet these requirements, I left the common header as is but modified it to drop 
a form when the login link is clicked. Additionally javascript was added to control 
the css classes for the active link in the header. These javascript files are the 
logincontroller.js and activecontroller.js respectively located in the js directory.
This project will automatically install the database tables and create a default user
'admin' with password 'admin'.

*WARNING*

THE DEFAULT USER CREATED IS LOCATED IN THE /includes/config.php FILE. 

Additionally, the project was modified to use sqlite and the php embedded webserver and 
documetnation was added. 
chorlick 3-12-2016

Week 2
---------
This week we added some ajax calles to the penguin tracker application. These are
mostly seen on the userinfo.php page. All of the information is populated with a few 
calls to the back end database. 

Additionally, I added in the code from week 1 to make sure there is a mouse over
event. This was added to the header, when the user mouse overs one of the menu 
elements the active class is added and then removed when the mouse out even is caught
chorlick 3-19-2016