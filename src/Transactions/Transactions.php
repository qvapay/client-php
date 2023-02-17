<?php
namespace Qvapay\Transactions;
use Qvapay;
class Transactions extends Qvapay
{
	/* https://qvapay.com/api/transactions?status=pending */
	public function show($data){
		return self::action_get('transactions?', http_build_query($data));
    }
	
	/* https://qvapay.com/api/transactions/7e48853f-949c-4271-9b4a-1213ee83ac11 */
	public function get($data){
		return self::action_get('transactions/', $data);
    }
	
	/* https://qvapay.com/api/transactions/pay */
	public function pay($data){
		return self::action_post('pay', $data);
    }
}
 
?>