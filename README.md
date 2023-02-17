<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]


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
