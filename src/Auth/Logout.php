<?php
namespace Qvapay\Auth;
use Qvapay;
class Logout extends Qvapay
{
	/* https://qvapay.com/api/auth/logout */
	public function doit(){
		return parent::action_get('auth/logout');
    }
}
?>