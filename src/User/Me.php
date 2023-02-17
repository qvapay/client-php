<?php
namespace Qvapay\User;
use Qvapay;
class Me extends Qvapay
{
    /* https://qvapay.com/api/user */
	public function show(){
		return parent::action_get('user');
    }
	
	/* https://qvapay.com/api/user */
	/*
	    $data = [
			"name" => "Pedro Perez1",
			"lastname" => "st",
			"bio" => "svwb erberberb",
			"logo" =>  "",
			"kyc" =>  1,
			"username" =>  "wpiuwe",
			"email" =>  "egc31@gmail.com",
			"password" =>  "CffasdKB73iTtzNJN"
		]
	*/
	public function update($data){
		return parent::action_put('user', $data);
    }
}
 
?>