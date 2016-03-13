!#/bin/bash

#path to php directory with binary and the ini file you want to use
export PHP_PATH=/usr/bin/php

#path to the top level of the source code. 
export WEB_ROOT=/home/user/chorlicks_code

PHP_PATH\php -S localhost:8000 -t WEB_ROOT -c PHP_PATH\php.ini