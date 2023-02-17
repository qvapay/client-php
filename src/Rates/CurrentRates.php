<?php
namespace Qvapay\Rates;
use Qvapay;
class CurrentRates extends Qvapay
{
	/* https://qvapay.com/api/rates/index */
	public function show(){
		return parent::action_get('rates/index', '', false); 
    }
	
}
 
?>