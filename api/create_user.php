<?php
// header za prihvacanje JSON-a
header("Access-Control-Allow-Origin: http://localhost/zavrsniprojekat/registracija/api/");
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


 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// dodela poslatih podataka varijablama iz baze
$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->email = $data->email;
$user->password = $data->password;

if($user->emailExists()){
    http_response_code(400);
    echo json_encode(array("message" => "Korisnik nije kreiran"));
    return;
}
 
// kreiranje novog korisnika
if(
    !empty($user->firstname) &&
    !empty($user->email) &&
    !empty($user->password) &&
    $user->create()
){
    http_response_code(200);
    echo json_encode(array("message" => "Korisnik je kreiran", "success" => true));
}
?>