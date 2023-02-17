# 📚 QvaPay PHP SDK: client-api

![alt: "QvaPay Banner"](https://pbs.twimg.com/media/Eu2VPzEXEAEyVxs.jpg)

PHP client for the QvaPay API

## 🚀 Directory tree

```
/
├── src/
│   ├── Auth/
│   │   └── ...
│   ├── Merchants/
│   │   └── ...
│   └── P2p/
│   │   └── ...
│   └── PaymentLinks/
│   │   └── ...
│   └── Rates/
│   │   └── ...
│   └── Services/
│   │   └── ...
│   └── Transactions/
│   │   └── ...
│   └── User/
│       └── ...
└── ── ── ── ── ── ── ── 
```


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
$services = new Qvapay\Services\Services;
$response = $services->get('e286449c-5bf4-4fbc-9a85-95bb5b54c73e');

/* https://qvapay.com/api/user */
$me = new Qvapay\User\Me;
$response = $me->show();

/* https://qvapay.com/api/topup */
$topup = new Qvapay\User\TopUp;
$response = $topup->show(["pay_method" => "BTCLN","amount" =>  67]);

/* https://qvapay.com/api/withdraw */
$withdraw = new Qvapay\User\Withdraw;
$response = $withdraw->doit(["pay_method" => "BTCLN","amount" =>  67]);


/* https://qvapay.com/api/auth/register */
$data = [
	"name" => "Juan Perez",
	"email" =>  "egc31@gmail.com",
	"password" =>  "CffasdKB73iTtzNJN",
	"c_password" =>  "CffasdKB73iTtzNJN",
	"invite" =>  "referer_username (OPTIONAL)" 
];
	
$register = new Qvapay\Auth\Register;
$response = $register->doit($data);


/* https://qvapay.com/api/auth/logout */
$logout = new Qvapay\Auth\Logout;
$response = $logout->doit();

/* https://qvapay.com/api/v1/info */
$api_data = [
    "app_id" => "9955dd29-082f-470b-882d-f4f0f25ea144",
    "app_secret" => "Zx03ncGDTlBFvZ0JRAq61NUkB82pekNKs1PFkBYAAiadfbzg5l"
];

$api = new Qvapay\Merchants\Info;
$response = $api->show($api_data);

print_r($response);
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
