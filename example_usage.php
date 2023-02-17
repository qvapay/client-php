<?php

require(__DIR__ . '/src/autoload.php');  

use Qvapay\Auth\Login;
$auth_data = ["email" => 'blahblah@gmail.com', "password" => 'blahblahblah'];
$login = new Login($auth_data);

$services = new Qvapay\Services\Services;
$response = $services->show();

//$me = new Qvapay\User\Me;
//$response = $me->show();

//$topup = new Qvapay\User\TopUp;
//$response = $topup->show(["pay_method" => "BTCLN","amount" =>  67]);

print_r($response);
