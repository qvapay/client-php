<?php
namespace Qvapay\Auth;
use Qvapay;
class Login extends Qvapay
{   
    public $url = 'https://qvapay.com/api/'; 
	public $api_url_data = ''; 
	public $method = 'POST';
	public $token = '';
	public $user_email = '';
	public $user_secret = '';
	public $curl_header = ['Accept: application/json'];
	public $post_data = [];
	
	/* https://qvapay.com/api/auth/login */
	/*
	    $data = [
			"email" => "juan@gmail.com",
			"password" => "CffasdKB73iTtzNJN"
		]
	*/
	function __construct($data){
		$this->method = 'POST';
		$this->post_data = $data;
		parent::set_api_url_data('auth/login');
		self::set_token(); 
    }
	
	public function set_token(){
		session_start();
		if(isset($_SESSION['qvapay_token'],$_SESSION['qvapay_token_expire']) && time() < $_SESSION['qvapay_token_expire'] ){
		    $this->token = $_SESSION['qvapay_token'];
		} else {
		    $get_user = parent::connect();
			$auth = json_decode($get_user);
			if(isset($auth->accessToken)){
				$this->token = $auth->accessToken;
				$_SESSION['qvapay_token'] =  $this->token;
				$_SESSION['qvapay_token_expire'] = (time()+500);
			}
		}
    }
}
 
?>