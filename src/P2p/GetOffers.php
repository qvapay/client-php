<?php
namespace Qvapay\P2p;
use Qvapay;
class GetOffers extends Qvapay
{
	/* https://qvapay.com/api/p2p/index?type=buy&coin=ETECSA&min=1&max=50 */
	/*
	    $data = [
			"type" => "buy",
			"min" => 1,
			"max" => 50,
			"coin" => 'ETECSA'
		]
	*/
	public function show($data){
		return parent::action_get('p2p/index?', http_build_query($data)); 
    }

}
 
?>