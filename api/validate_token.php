<?php

header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// Neophodni fajlovi za dekodiranje JSON tokena
include_once 'config/core.php';
include_once 'libs/php-jwt-master/src/BeforeValidException.php';
include_once 'libs/php-jwt-master/src/ExpiredException.php';
include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;

// dobijanje podataka
$data = json_decode(file_get_contents("php://input"));
 
// dobijanje tokena
$jwt=isset($data->jwt) ? $data->jwt : "";
 
// Ako token nije prazan
if($jwt){
 
    // Ako je dekodiranje ok prikazi korisnicke podatke
    try {
        // dekodiraj
        $decoded = JWT::decode($jwt, $key, array('HS256'));
 
        // odgovor servera da je ok
        http_response_code(200);
 
        // Prikazi korisnicke podatke
        echo json_encode(array(
            "message" => "Validan si, imas prolaz",
            "data" => $decoded->data
        ));
 
    }
 
    // dekodiranje je neuspesno
catch (Exception $e){
 
    // server salje 401
    http_response_code(401);
 
    // Obavesti nevalidnog da nece proci
    echo json_encode(array(
        "message" => "You shall not pass",
        "error" => $e->getMessage()
    ));
}
}
 
// greska ako je token prazan 
else{
 
    // server kaze 401
    http_response_code(401);
 
    // Nece moci
    echo json_encode(array("message" => "You shall not pass"));
}
?>