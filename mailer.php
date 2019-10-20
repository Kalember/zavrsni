<?php
$to = ""; 
$emailto = filter_var($_POST["kontakt_email"], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST["kontakt_ime"], FILTER_SANITIZE_STRING);
$message = filter_var($_POST["kontakt_email"], FILTER_SANITIZE_STRING);
$body = "Message: $message\nE-mail: $emailto";


require 'vendor/autoload.php';
$sendgrid = new SendGrid("");
$email = new \SendGrid\Mail\Mail(); 

$email->addTo("$to");
$email->setFrom("$emailto");
$email->setSubject("poruka od. '$subject'");
$email->addContent("text/plain", $body);

$response = $sendgrid->send($email);
print $response->statusCode();
