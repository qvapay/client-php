<?php
namespace Qvapay\Transactions;
use Qvapay;
class Tranfer extends Qvapay
{
	/* https://qvapay.com/api/transactions/transfer */
	function doit($data){
		return parent::action_post('transfer', $data);
    }
}
 
?>