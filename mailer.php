<?php
$curl = curl_init();
$name = $_POST['name']; 
$email = $_POST['email']; 
$message = $_POST['message'];
$subject = 'pitaj veterinara';
$data = array (
  "personalizations" => array(
    array(
            "to"=> array(
              array (
                "name"=>"pitaj veterinara",
                "email"=> 'daliborkl@yahoo.com',
              )
            )
    )
              ),
  "from" => array(
    "email"=> $email),
  'subject'=> $subject,
  'content' => array(
    array(
      "type" => "text/html",
      "value"=> "$message"
  ))

);
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer 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",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
header('Location: index.html');

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>