<?php
namespace Qvapay\User;
use Qvapay;
class Withdraw extends Qvapay
{
	/* https://qvapay.com/api/withdraw */
	/*
	    $data = [
			"name" => "BTCLN",
			"amount" =>  4,
			"details" =>  ["Wallet": "bc1qs67kwcf7znpnc06xjh8cnc0zwsechcfxscghun"],
		]
	*/
	public function doit($data){
		return self::action_post('withdraws', $data);
    }
	
}
 
?>
