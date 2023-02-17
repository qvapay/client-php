<?php
namespace Qvapay\Merchants;
use Qvapay;
class TransactionsStatus extends Qvapay
{
	/* https://qvapay.com/api/v1/transactions/54079648-39bc-49ef-bd3e-b89032a7ac05 */
	/*
	    $api_data = [
			"app_id" => "9955dd29-082f-470b-882d-f4f0f25ea144",
			"app_secret" => "Zx03ncGDTlBFvZ0JRAq61NUkB82pekNKs1PFkBYAAiadfbzg5l"
		]
	*/
	public function show($data, $id){
		return parent::action_post('v1/transactions/'.$id, $data, false);
    }
}
 
?>