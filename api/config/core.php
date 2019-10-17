<?php
// greske
error_reporting(E_ALL);
 
// vremenska zona
date_default_timezone_set('Europe/Belgrade');
 
// variables used for jwt
$key = "moj tajni kljuc";
$iss = "http://example.org";
$aud = "http://example.com";
$iat = 1356999524;
$nbf = 1357000000;
?>