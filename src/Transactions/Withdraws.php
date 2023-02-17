<?php
namespace Qvapay\Transactions;
use Qvapay;
class Withdraws extends Qvapay
{
	/* https://qvapay.com/api/withdraws */
	public function show(){
		return parent::action_get('withdraws');
    }
	
	/* https://qvapay.com/api/withdraws/10790 */
	public function get($data){
		return parent::action_get('withdraws/', $data);
    }	
}
 
?>