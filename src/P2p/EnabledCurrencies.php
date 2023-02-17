<?php
namespace Qvapay\P2p;
use Qvapay;
class EnabledCurrencies extends Qvapay
{
	/* https://qvapay.com/api/p2p/get_coins_list */
	public function show(){
		return parent::action_get('p2p/get_coins_list', false); 
    }
}
 
?>