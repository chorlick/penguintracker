@ECHO OFF

:: path to your php executible directory and the ini file
SET PHP_PATH=C:\Users\chorl_000\code\php\

::PATH TO TOP LEVEL SOURCE CODE DIRECTORY
SET WEB_ROOT=C:\Users\chorl_000\Documents\NetBeansProjects\PenguinTracker-master

%PHP_PATH%\php -S localhost:8000 -t %WEB_ROOT% -c %PHP_PATH%\php.ini