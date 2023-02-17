<?php
namespace Qvapay\Merchants;
use Qvapay;
class CreateInvoice extends Qvapay
{
	/* https://qvapay.com/api/v1/create_invoice */
	/*
	    $api_data = [
			"app_id" => "9955dd29-082f-470b-882d-f4f0f25ea144",
			"app_secret" => "Zx03ncGDTlBFvZ0JRAq61NUkB82pekNKs1PFkBYAAiadfbzg5l",
			"amount" => 99.99,
			"description" => "Enanitos verdes",
			"remote_id" => "MY_OWN_CUSTOM_ID",
			"signed" => 1
		]
	*/
	function create($data){
		return self::action_post('v1/create_invoice', $data, false);
    }
}
 
?>