@echo off
rmdir C:\xampp\php
mklink /J C:\xampp\php C:\xampp\php-7.0.27
del C:\xampp\apache\conf\extra\httpd-xampp.conf
copy C:\xampp\apache\conf\extra\httpd-xampp-php-7.conf C:\xampp\apache\conf\extra\httpd-xampp.conf
echo The version of PHP 7.0.27 is set
