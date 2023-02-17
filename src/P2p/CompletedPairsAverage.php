<?php
namespace Qvapay\P2p;
use Qvapay;
class CompletedPairsAverage extends Qvapay
{
	/* https://qvapay.com/api/p2p/completed_pairs_average?coin=TRX */
	/*
	    /*
	    $data = [
		    "coin" => "TRX"
		]
	*/
	public function get($data){
		return parent::action_get('p2p/completed_pairs_average?', http_build_query($data), false); 
    }
	
}
 
?>