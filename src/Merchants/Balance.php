<?php
namespace Qvapay\Merchants;
use Qvapay;
class Balance extends Qvapay
{
	/* https://qvapay.com/api/v1/balance */
	/*
	    $api_data = [
			"app_id" => "9955dd29-082f-470b-882d-f4f0f25ea144",
			"app_secret" => "Zx03ncGDTlBFvZ0JRAq61NUkB82pekNKs1PFkBYAAiadfbzg5l"
		]
	*/
	function show($data){
		return parent::action_post('v1/balance', $data, false);
    }
}
 
?>