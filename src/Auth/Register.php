<?php
namespace Qvapay\Auth;
use Qvapay;
class Register extends Qvapay
{
	/* https://qvapay.com/api/auth/register */
	/*
	    $data = [
			"name" => "Juan Perez",
			"email" =>  "egc31@gmail.com",
			"password" =>  "CffasdKB73iTtzNJN",
			"c_password" =>  "CffasdKB73iTtzNJN",
			"invite" =>  "referer_username (OPTIONAL)" 
		]
	*/
	public function doit($data){
		return parent::action_post('auth/register', $data, false);
    }
}
 
?>
