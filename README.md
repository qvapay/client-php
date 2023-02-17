[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

# client-php
PHP client for the QvaPay API

## Installation
Include the autoloader file

```php
require(__DIR__ . '/src/autoload.php');  
```

## Usage

```php
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
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
