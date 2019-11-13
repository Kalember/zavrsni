<?php
$to = "bane85@gmail.com"; 
$emailto = filter_var($_POST["kontakt_email"], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST["kontakt_ime"], FILTER_SANITIZE_STRING);
$message = filter_var($_POST["kontakt_poruka"], FILTER_SANITIZE_STRING);

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