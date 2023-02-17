<?php
namespace Qvapay\User;
use Qvapay;
class TopUp extends Qvapay
{
	/* https://qvapay.com/api/topup */
	/*
        $data = [
			"pay_method" => "BTCLN",
			"amount" =>  67
		]
	*/
	public function show($data){ 
		return parent::action_post('topup', $data);
    }
	
}
 
?>