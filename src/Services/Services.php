<?php
namespace Qvapay\Services;
use Qvapay;
class Services extends Qvapay
{
	/* https://qvapay.com/api/services */
	public function show(){
		return parent::action_get('services');
    }
	
	/* https://qvapay.com/api/services/e286449c-5bf4-4fbc-9a85-95bb5b54c73e */
	/*
	    $data = 'e286449c-5bf4-4fbc-9a85-95bb5b54c73e';
	*/
	public function get($data){
		return parent::action_get('services/', $data); 
    }
	
}
 
?>