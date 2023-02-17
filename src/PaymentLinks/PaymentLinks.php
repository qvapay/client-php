<?php
namespace Qvapay\PaymentLinks;
use Qvapay;
class PaymentLinks extends Qvapay
{
	/* https://qvapay.com/api/payment_links/create */
	/*
	    $data = [
			"name" => "Pulover de guinga azul",
			"product_id" => "PVG-AZUL",
			"amount" => 10.32
		]
	*/
	public function create($data){
		return parent::action_post('payment_links/create',$data);
    }
	
	/* https://qvapay.com/api/payment_links */
	public function show(){
		return parent::action_get('payment_links');
    }
}
 
?>