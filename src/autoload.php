<?php

class Qvapay
{
	public $url = 'https://qvapay.com/api/'; 
	public $api_url_data = ''; 
	public $method = 'POST';
	public $token = '';
	public $user_email = '';
	public $user_secret = '';
	public $curl_header = ['Accept: application/json'];
	public $post_data = [];
	
	public function custom_post_data($data = array()){
		$this->post_data =  $data;
    }
	
	public function save_token($data){
		$this->token =  $data;
    }
	
	public function set_api_url_data($data){
		$this->api_url_data = $data;
    }
	
	public function get_token(){
		return $_SESSION['qvapay_token'];
    }
	
	public function unset_token(){
		$this->token = "";
		unset($_SESSION['qvapay_token']);
		unset($_SESSION['qvapay_token_expire']);
    }
	
	public function set_header_token($token){
		$this->curl_header = array_merge($this->curl_header, ['Authorization: Bearer '.$token]);
		
    }

	public function action_post($action, $data = '', $use_token = true){
		$this->method = 'POST';
		self::set_api_url_data($action);
		if ($use_token) self::set_header_token(self::get_token());
		if (!empty($data)) self::custom_post_data($data);
		return self::connect(); 
    }
	
	public function action_get($action,  $data = '', $use_token = true){
		$this->method = 'GET';
		self::set_api_url_data($action . $data);
		if ($use_token) self::set_header_token(self::get_token());
		return self::connect(); 
    }
	
	public function action_put($action, $data = ''){
		$this->method = 'PUT';
		self::set_api_url_data($action);
		self::set_header_token($this->token);
		self::custom_post_data($data);
		return self::connect(); 
    }
	
	public function response($data){
		return json_encode(['url'=> $this->url.$this->api_url_data,'token'=> self::get_token(), 'message'=> $data, 'post_data'=> $this->post_data]); 
    }
	
	public function connect(){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->url.$this->api_url_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->method);
		if(!empty($this->post_data)){
		    curl_setopt($curl, CURLOPT_POSTFIELDS, $this->post_data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 15);
		curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->curl_header);

		$result = curl_exec($curl);
		try {
			$result = curl_exec($curl);
        } catch (Exception $e) {
			return self::response($e->getMessage());
        }
		if (curl_errno($curl)) {
			return self::response(curl_error($curl));
		}
		curl_close($curl);
	    return $result;
    }
}

/* Auth */  
require('Auth/Login.php');
require('Auth/Logout.php');
require('Auth/Register.php');

/* Services */  
require('Services/Services.php'); 

/* user */  
require('User/Me.php');  
require('User/TopUp.php');  
require('User/Withdraw.php'); 

/* Transactions */ 
require('Transactions/Transactions.php');  
require('Transactions/Withdraws.php');  
require('Transactions/Transfer.php');  

/* Merchants */ 
require('Merchants/Info.php');  
require('Merchants/CreateInvoice.php');  
require('Merchants/Balance.php');  
require('Merchants/TransactionsStatus.php');  
require('Merchants/Transactions.php');  

/* CreatePaymentLinks */ 
require('PaymentLinks/PaymentLinks.php');  

/* P2p */ 
require('P2p/CompletedPairsAverage.php');  
require('P2p/EnabledCurrencies.php');  
require('P2p/GetOffers.php');  
require('P2p/GetP2POffer.php');  

/* Rates */ 
require('Rates/CurrentCoins.php');  
require('Rates/CurrentRates.php');  

?>
