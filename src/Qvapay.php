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
		return $this;
    }
	
	public function set_api_url_data($data){
		$this->api_url_data = $data;
		return $this;
    }
	
	public function get_token(){
		return $this->token;
    }
	
	public function set_token(){
		session_start();
		if(isset($_SESSION['qvapay_token'],$_SESSION['qvapay_token_expire']) && time() < $_SESSION['qvapay_token_expire'] ){
		    $this->token = $_SESSION['qvapay_token'];
		} else {
		    $get_user = $this->connect();
			$auth = json_decode($get_user);
			if(isset($auth->accessToken)){
				$this->token = $auth->accessToken;
				$_SESSION['qvapay_token'] = $this->token;
				$_SESSION['qvapay_token_expire'] = (time()+500);
			}
		}
		return $this;
    }
	
	public function unset_token(){
		$this->token = "";
		unset($_SESSION['qvapay_token']);
		unset($_SESSION['qvapay_token_expire']);
    }
	
	public function set_header_token($token){
		$this->curl_header = array_merge($this->curl_header, ['Authorization: Bearer '.$token]);
		return $this;
    }
	
	/* https://qvapay.com/api/auth/login */
	/*
	    $data = [
			"email" => "juan@gmail.com",
			"password" => "CffasdKB73iTtzNJN"
		]
	*/
	public function auth($data){
		$this->method = 'POST';
		$this->post_data = $data;
		self::set_api_url_data('auth/login');
		self::set_token();
    }
	
	/* https://qvapay.com/api/user */
	public function me(){
		//return self::action_get('user');
		return self::action_get('user');
    }
	
	/* https://qvapay.com/api/user */
	/*
	    $data = [
			"name" => "Pedro Perez1",
			"lastname" => "st",
			"bio" => "svwb erberberb",
			"logo" =>  "",
			"kyc" =>  1,
			"username" =>  "wpiuwe",
			"email" =>  "egc31@gmail.com",
			"password" =>  "CffasdKB73iTtzNJN"
		]
	*/
	public function update_me($data){
		return self::action_put('user', $data);
    }
	
	/* https://qvapay.com/api/auth/register */
	/*
	    $data = [
			"name" => "Juan Perez",
			"email" =>  "egc31@gmail.com",
			"password" =>  "CffasdKB73iTtzNJN",
			"c_password" =>  "CffasdKB73iTtzNJN",
			"invite" =>  "referer_username (OPTIONAL)" 
		]
	*/
	public function register($data){
		return self::action_post('auth/register', $data);
    }
	
	/* https://qvapay.com/api/auth/logout */
	public function logout(){
		return self::action_get('auth/logout');
    }
	
	/* https://qvapay.com/api/topup */
	/*
        $data = [
			"pay_method" => "BTCLN",
			"amount" =>  67
		]
	*/
	public function topup($data){ 
		return self::action_post('topup', $data);
    }
	
	/* https://qvapay.com/api/withdraw */
	/*
	    $data = [
			"name" => "BTCLN",
			"amount" =>  4,
			"details" =>  ["Wallet": "bc1qs67kwcf7znpnc06xjh8cnc0zwsechcfxscghun"],
		]
	*/
	public function withdraw($data){ 
		return self::action_post('withdraws', $data);
    }
	
	/* https://qvapay.com/api/transactions?status=pending */
	public function transactions($data){ 
		return self::action_get('transactions?', http_build_query($data));
    }
	
	/* https://qvapay.com/api/transactions/7e48853f-949c-4271-9b4a-1213ee83ac11 */
	public function get_transaction($data){ 
		return self::action_get('transactions/', $data);
    }
	
	/* https://qvapay.com/api/withdraws */
	public function withdraws(){
		return self::action_get('withdraws');
    }
	
	/* https://qvapay.com/api/withdraws/10790 */
	public function withdraw_id($data){
		return self::action_get('withdraws/', $data);
    }
	
	/* https://qvapay.com/api/transactions/transfer */
	public function transfer($data){
		return self::action_post('transfer', $data);
    }
	
	/* https://qvapay.com/api/transactions/pay */
	public function pay($data){
		return self::action_post('pay', $data);
    }
	
	/* https://qvapay.com/api/v1/info */
	/*
	    $api_data = [
			"app_id" => "9955dd29-082f-470b-882d-f4f0f25ea144",
			"app_secret" => "Zx03ncGDTlBFvZ0JRAq61NUkB82pekNKs1PFkBYAAiadfbzg5l"
		]
	*/
	
	public function api_info($data){
		return self::action_post('v1/info', $data);
    }
	
	/* https://qvapay.com/api/v1/balance */
	/*
	    $api_data = [
			"app_id" => "9955dd29-082f-470b-882d-f4f0f25ea144",
			"app_secret" => "Zx03ncGDTlBFvZ0JRAq61NUkB82pekNKs1PFkBYAAiadfbzg5l"
		]
	*/
	public function api_balance($data){
		return self::action_post('v1/balance', $data, false);
    }
	
	/* https://qvapay.com/api/v1/create_invoice */
	/*
	    $api_data = [
			"app_id" => "9955dd29-082f-470b-882d-f4f0f25ea144",
			"app_secret" => "Zx03ncGDTlBFvZ0JRAq61NUkB82pekNKs1PFkBYAAiadfbzg5l",
			"amount" => 99.99,
			"description" => "Enanitos verdes",
			"remote_id" => "MY_OWN_CUSTOM_ID",
			"signed" => 1
		]
	*/
	public function api_create_invoice($data){
		return self::action_post('v1/create_invoice', $data, false);
    }
	
	/* https://qvapay.com/api/v1/transactions */
	/*
	    $api_data = [
			"app_id" => "9955dd29-082f-470b-882d-f4f0f25ea144",
			"app_secret" => "Zx03ncGDTlBFvZ0JRAq61NUkB82pekNKs1PFkBYAAiadfbzg5l"
		]
	*/
	public function api_transactions($data){
		return self::action_post('v1/transactions', $data);
    }
	
	/* https://qvapay.com/api/v1/transactions/54079648-39bc-49ef-bd3e-b89032a7ac05 */
	/*
	    $api_data = [
			"app_id" => "9955dd29-082f-470b-882d-f4f0f25ea144",
			"app_secret" => "Zx03ncGDTlBFvZ0JRAq61NUkB82pekNKs1PFkBYAAiadfbzg5l"
		]
	*/
	public function api_transaction_status($data, $id){
		return self::action_post('v1/transactions/'.$id, $data, false);
    }
	
	/* https://qvapay.com/api/payment_links/create */
	/*
	    $data = [
			"name" => "Pulover de guinga azul",
			"product_id" => "PVG-AZUL",
			"amount" => 10.32
		]
	*/
	public function create_payment_link($data){
		return self::action_post('payment_links/create',$data);
    }
	
	/* https://qvapay.com/api/payment_links */
	public function payment_links(){
		return self::action_get('payment_links');
    }
	
	/* https://qvapay.com/api/services */
	public function services(){
		return self::action_get('services');
    }
	
	/* https://qvapay.com/api/services/e286449c-5bf4-4fbc-9a85-95bb5b54c73e */
	/*
	    $data = 'e286449c-5bf4-4fbc-9a85-95bb5b54c73e';
	*/
	public function get_service($data){
		return self::action_get('services/', $data); 
    }
	
	/* https://qvapay.com/api/p2p/get_coins_list */
	public function get_coins_list(){
		return self::action_get('p2p/get_coins_list', false); 
    }
	
	/* https://qvapay.com/api/p2p/completed_pairs_average?coin=TRX */
	/*
	    /*
	    $data = [
		    "coin" => "TRX"
		]
	*/
	public function pairs_average($data){
		return self::action_get('p2p/completed_pairs_average?', http_build_query($data), false); 
    }
	
	/* https://qvapay.com/api/p2p/index?type=buy&coin=ETECSA&min=1&max=50 */
	/*
	    $data = [
			"type" => "buy",
			"min" => 1,
			"max" => 50,
			"coin" => 'ETECSA'
		]
	*/
	public function get_offers($data){
		if(!self::valid_offers_type($data)){
		   return self::response('Invalid offer type'); 
		}
		return self::action_get('p2p/index?', http_build_query($data)); 
    }
	
	/* https://qvapay.com/api/p2p/949780ed-7303-4a34-b8c3-2d55d802c75d */
	public function get_p2p_offer($data){
		if(!self::valid_offers_type($data)){
		   return self::response('Invalid offer type'); 
		}
		return self::action_get('p2p/', $data, false); 
    }
	
	/* https://qvapay.com/api/rates/index */
	public function current_rates(){
		return self::action_get('rates/index', '', false); 
    }
	
	/* https://qvapay.com/api/coins */
	public function current_coins(){
		return self::action_get('coins', false); 
    }
	
	public function action_post($action, $data = '', $use_token = true){
		$this->method = 'POST';
		self::set_api_url_data($action);
		if ($use_token) self::set_header_token($this->token);
		if (!empty($data)) self::custom_post_data($data);
		return self::connect(); 
    }
	
	public function action_get($action,  $data = '', $use_token = true){
		$this->method = 'GET';
		self::set_api_url_data($action . $data);
		if ($use_token) self::set_header_token($this->token);
		return self::connect(); 
    }
	
	public function action_put($action, $data = ''){
		$this->method = 'PUT';
		self::set_api_url_data($action);
		self::set_header_token($this->token);
		self::custom_post_data($data);
		return self::connect(); 
    }
	
	public function valid_offers_type($data){
		if(isset($data['type'],$data['min'],$data['max'],$data['coin']) or !in_array($data['type'], ['buy', 'sell'])){
		   return true; 
		}
		return false; 
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
?>
