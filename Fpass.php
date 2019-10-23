<?php
include "php/connect.php"; // konekcija
$rsent = false;
$error = null;
if (isset($_POST['f_email'])) {
    $Femail = $_POST['f_email'];
    if (!filter_var($Femail, FILTER_VALIDATE_EMAIL)) {
        $error = 'Unesite ispravnu email adresu';
    }
    //provera baze
    $check = mysqli_query( $connection, "SELECT email FROM users WHERE email = '$Femail'");
    if ($check->num_rows== 0) {
        $error = 'Ne postoji korisnik sa tom email adresom';
        echo "Ne postoji korisnik sa tom email adresom";
    }
    if ($error == null) {
        //$user = new User($connection);
        $r = mysqli_query( $connection, "SELECT username FROM users WHERE email = '$Femail' ");
        //$r = mysqli_query ($connection, $query);
        //ako postoji postavi novu lozinku
        $password = substr(md5(uniqid(rand(), 1)), 3, 10);
        $pass = password_hash($password, PASSWORD_BCRYPT);

        //slanje poruke
        $to = "kalemberdalibor@gmail.com"; //primaoc poruke
        $emailto = filter_var($_POST["f_email"], FILTER_SANITIZE_EMAIL); //od koga
        $subject = "Zaboravljena lozinka"; //naslov
        $message = "$password"; //sadrzaj

        $body = "Poruka sa kontakt forme: $message\nOd korisnika: $emailto";

        require 'vendor/autoload.php';
        $sendgrid = new SendGrid("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");
        $email = new \SendGrid\Mail\Mail();


        $email->addTo("$to");
        $email->setFrom("$emailto");
        $email->setSubject("poruka od. '$subject'");
        $email->addContent("text/plain", $body);

        $response = $sendgrid->send($email);
        print $response->statusCode();
        // kraj slanja poruke
        //$user->updatePassword($Femail, $pass);
        $sql = mysqli_query( $connection, "UPDATE users SET password='$pass' WHERE email = '$Femail'") or die(mysql_error());
        $rsent = true;
    }}

if (!empty($error)) {
    $i = 0;
    while ($i < count($error)) {
        echo "<div class='error-msg'>" . $error[$i] . "</div>";
        $i++;
    }
} // close if empty errors


if ($rsent == true) {
    echo "<p>Poslat mejl na $Femail</p>n";
} else {
    echo "<p>Please enter your e-mail address. You will receive a new password via e-mail.</p>n";
}?>
