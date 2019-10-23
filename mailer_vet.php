<?php
$to = "kalemberdalibor@gmail.com"; 
$emailto = filter_var($_POST["kontakt_email"], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST["kontakt_ime"], FILTER_SANITIZE_STRING);
$message = filter_var($_POST["kontakt_poruka"], FILTER_SANITIZE_STRING);

$body = "Pitaj veterinara: $message\nOd korisnika: $emailto";

require 'vendor/autoload.php';
$sendgrid = new SendGrid("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");
$email = new \SendGrid\Mail\Mail(); 


$email->addTo("$to");
$email->setFrom("$emailto");
$email->setSubject("poruka od. '$subject'");
$email->addContent("text/plain", $body);

$response = $sendgrid->send($email);
print $response->statusCode();