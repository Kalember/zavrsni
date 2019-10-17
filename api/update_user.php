<?php
//*Kreiranje APIJA za korisnicki nalog
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// JSON tokeni
include_once 'config/core.php';
include_once 'libs/php-jwt-master/src/BeforeValidException.php';
include_once 'libs/php-jwt-master/src/ExpiredException.php';
include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-master/src/JWT.php';

use \Firebase\JWT\JWT;

// konekcija ka bazi
include_once 'config/database.php';
include_once 'objects/user.php';
$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// preuzimanje podataka iz forme
$data = json_decode(file_get_contents("php://input"));

// tokena
$jwt = isset($data->jwt) ? $data->jwt : "";

// ako token nije prazan
if ($jwt) {

    // prikazi podatke korisnika
    try {

        // token
        $decoded = JWT::decode($jwt, $key, array('HS256'));

        $user->firstname = $data->firstname;
        $user->lastname = $data->lastname;
        $user->email = $data->email;
        $user->password = $data->password;
        $user->id = $decoded->data->id;

        // izmena podataka
        if ($user->update()) {
            // regenierisanje tokena
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
            $jwt = JWT::encode($token, $key);

            // server kaze moze
            http_response_code(200);

            // JSON
            echo json_encode(
                array(
                    "message" => "Korisnik je izmenio podatke",
                    "jwt" => $jwt
                )
            );
        }

        // ako nije
        else {
            // server kaze nije
            http_response_code(401);

            // i prikazuje gresku
            echo json_encode(array("message" => "Ostajes to sto jesi, nisi promenio podatke"));
        }
    }

    //ako dekodiranje nije uspesno
    catch (Exception $e) {

        // server kaze token nije dobar
        http_response_code(401);

        // i prikazuje gresku
        echo json_encode(array(
            "message" => "MOzda radi ???????????????????????",
            "error" => $e->getMessage()
        ));
    }
}

// ako je token prazan
else {

    //* server priajvljuje gresku
    http_response_code(401);

    // i obavestava korisnika 
    echo json_encode(array("message" => "Teraj se"));
}
?>
