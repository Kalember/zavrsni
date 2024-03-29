<?php
// obavezni header-i
header("Access-Control-Allow-Origin: http://localhost/zavrsniprojekat/api/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// konekcija ka bazi
include_once 'config/database.php';
include_once 'objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// provera da li vec postoji korisnik sa istim mejlom
$data = json_decode(file_get_contents("php://input"));
 
$user->email = $data->email;
$email_exists = $user->emailExists();
 
// kreiranje JSON web tokena
include_once 'config/core.php';
include_once 'libs/php-jwt-master/src/BeforeValidException.php';
include_once 'libs/php-jwt-master/src/ExpiredException.php';
include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
 
// provera da li username podudara sa paswordom
if($email_exists && password_verify($data->password, $user->password)){
 
    $token = array(
       "iss" => $iss,
       "aud" => $aud,
       "iat" => $iat,
       "nbf" => $nbf,
       "data" => array(
           "id" => $user->id,
           "firstname" => $user->firstname,
           "lastname" => $user->lastname,
           "email" => $user->email
       )
    );
 
    // odgovor servera
    http_response_code(200);
 
    // generisanje tokena
    
    $jwt = JWT::encode($token, $key);
    echo json_encode(
            array(
                "message" => "Uspesno logovanje",
                "jwt" => $jwt
            )
        );
 
}
 
// neuspesno logovanje
else{
 
    // odgovor servera
    http_response_code(401);
 
    // neuspesno logovanje
    echo json_encode(array("message" => "Da li ovo radi?????"));
}
?>