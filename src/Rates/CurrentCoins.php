<?php
namespace Qvapay\Rates;
use Qvapay;
class CurrentCoins extends Qvapay
{
	/* https://qvapay.com/api/coins */
	public function show(){
		return parent::action_get('coins', false); 
    }
}
?>