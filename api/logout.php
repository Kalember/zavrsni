<?php
//nepotrebna skripta jer JWT ivalidate ne postoji u Firebase
include_once 'config/core.php';
include_once 'libs/php-jwt-master/src/BeforeValidException.php';
include_once 'libs/php-jwt-master/src/ExpiredException.php';
include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
//////
$jwt =$_COOKIE['jwt'];
JWT::invalidate($jwt);
echo "logout user"
?>