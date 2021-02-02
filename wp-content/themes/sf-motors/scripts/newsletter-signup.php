<?php
//Receive the RAW post data.
$rawJSON = file_get_contents("php://input");
//Attempt to decode the incoming RAW post data from JSON.
$email = json_decode($rawJSON, false)->email_address;

$apiKey = '06caad146ff1e3a65af18ff3cd2c408f-us17';
$url = 'https://us17.api.mailchimp.com/3.0/lists/c3a73e4a5a/members/';
// Setup cURL
$ch = curl_init($url);
curl_setopt_array($ch, array(
  CURLOPT_USERPWD => 'user:' . $apiKey,
  CURLOPT_POST => TRUE,
  CURLOPT_RETURNTRANSFER => TRUE,
  CURLOPT_SSL_VERIFYPEER => FALSE,
  CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
  CURLOPT_POSTFIELDS => $rawJSON
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if ($response === FALSE) {
  die(curl_error($ch));
}
$other = json_decode($response, false);
if ($other->status == 400) {
  http_response_code(400);
}
// Print the date from the response
echo $response;