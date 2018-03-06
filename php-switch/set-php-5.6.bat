@echo off
rmdir C:\xampp\php
mklink /J C:\xampp\php C:\xampp\php-5.6.33
del C:\xampp\apache\conf\extra\httpd-xampp.conf
copy C:\xampp\apache\conf\extra\httpd-xampp-php-5.conf C:\xampp\apache\conf\extra\httpd-xampp.conf 
echo The version of PHP 5.6.33 is set
