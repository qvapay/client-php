<?php

if(session_status() !== PHP_SESSION_NONE) session_start();

require(__DIR__ . '/src/Qvapay.php');  

$qvapay = new Qvapay;
$auth_data = ["email" => 'rpcal92@gmail.com', "password" => 'Mecagoenti*02'];
$response = $qvapay->auth($auth_data);
$response = $qvapay->services();

 /*
$qvapay = new Qvapay;
$auth_api_data = ["app_id" => "b7681925-5fdb-4236-bb03-19c725c0ca53", "app_secret" => "n1MiYuEGGg1gQvfLlWrU1O20fvxlckXbCcszyQx3JcMvwmpdmS"];
$response = $qvapay->api_balance($auth_api_data);
*/
print_r($response);

?>
