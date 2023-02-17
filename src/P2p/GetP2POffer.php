<?php
namespace Qvapay\P2p;
use Qvapay;
class GetP2POffer extends Qvapay
{
	/* https://qvapay.com/api/p2p/949780ed-7303-4a34-b8c3-2d55d802c75d */
	public function get($data){
		return parent::action_get('p2p/', $data, false); 
    }
}
 
?>