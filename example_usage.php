<?php

if(session_status() !== PHP_SESSION_NONE) session_start();

require(__DIR__ . '/src/Qvapay.php');  

$qvapay = new Qvapay;
$qvapay->auth(["email" => 'blahblah@gmail.com', "password" => 'blahblahblah']);
$response = $qvapay->services();

 /*
$qvapay = new Qvapay;
$auth_api_data = ["app_id" => "b7681925-5fdb-4236-bb03-19c725u0ca53", "app_secret" => "n1MiRuEGGg1gQvfLlWrU1O20fvxlckXbCcszyQx3JcMvwmpdmS"];
$response = $qvapay->api_balance($auth_api_data);
*/
print_r($response);

?>
