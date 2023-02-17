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
$login = new Login(["email" => 'blahblah@gmail.com', "password" => 'blahblahblah']);




/* https://qvapay.com/api/services */
$services = new Qvapay\Services\Services;
$response = $services->show();

/* https://qvapay.com/api/services/e286449c-5bf4-4fbc-9a85-95bb5b54c73e */
	/*
	    $data = 'e286449c-5bf4-4fbc-9a85-95bb5b54c73e';
	*/
$services = new Qvapay\Services\Services;
$response = $services->get($data);

/* https://qvapay.com/api/user */
$me = new Qvapay\User\Me;
$response = $me->show();

/* https://qvapay.com/api/topup */
	/*
        $data = [
			"pay_method" => "BTCLN",
			"amount" =>  67
		]
	*/
$topup = new Qvapay\User\TopUp;
$response = $topup->show(["pay_method" => "BTCLN","amount" =>  67]);

/* https://qvapay.com/api/withdraw */
	/*
	    $data = [
			"name" => "BTCLN",
			"amount" =>  4,
			"details" =>  ["Wallet": "bc1qs67kwcf7znpnc06xjh8cnc0zwsechcfxscghun"],
		]
	*/
$withdraw = new Qvapay\User\Withdraw;
$response = $withdraw->doit(["pay_method" => "BTCLN","amount" =>  67]);


/* https://qvapay.com/api/auth/register */
	
$data = [
	"name" => "Juan Perez",
	"email" =>  "egc31@gmail.com",
	"password" =>  "CffasdKB73iTtzNJN",
	"c_password" =>  "CffasdKB73iTtzNJN",
	"invite" =>  "referer_username (OPTIONAL)" 
]
	
$register = new Qvapay\Auth\Register;
$response = $register->doit($data);


/* https://qvapay.com/api/auth/logout */
$logout = new Qvapay\Auth\Logout;
$response = $logout->doit();

print_r($response);
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
