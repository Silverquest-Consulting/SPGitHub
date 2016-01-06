<?php

class Reset extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->database();
        $this->load->library("session");	// load session so donation_view can submit form to cart.php
    } 
    public function index(){ 
      
    	
    	//if ($_SESSION['token_reset'] == $_GET['de']  ){
    	$url_email = $_GET['me'];
		$date_send = $_GET['de'];
		
		if ( (strlen($url_email) > 0)  and (strlen($date_send) > 0) )
      	{
			
    		$url_email = $this->encrypt_decrypt('decrypt', $url_email);
			
			$date_current = (round(microtime(true)*1000));
			$date_expiry =  intval($date_send) +intval(24*60*60*1000); //24 hour expiry
			//echo " email=$url_email datesend=$date_send datecurrent=$date_current dateexpiry=$date_expiry "; 
    		if ( intval($date_current) > intval($date_expiry) ) {
				//echo " Reset Password has expired ";
				// TODO display error message or redirect to an error page
				redirect();
			} else {
				//echo " OK to Reset Password "; 
			}
			
    		$data['url_email'] = $url_email;
    		$this->load->view("reset_view",$data);
    		
    		
    	}else {
    		redirect();
    	}
    }

    public function encrypt_decrypt($action, $string) {
    	$output = false;
    
    	$encrypt_method = "AES-256-CBC";
    	$secret_key = 'This is my secret key';
    	$secret_iv = 'This is my secret iv';
    
    	// hash
    	$key = hash('sha256', $secret_key);
    
    	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    	$iv = substr(hash('sha256', $secret_iv), 0, 16);
    
    	if( $action == 'encrypt' ) {
    		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    		$output = base64_encode($output);
    	}
    	else if( $action == 'decrypt' ){
    		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    	}
    
    	return $output;
    }
    
    public function reset_Pass() {
    	/*[new_password] => A12345
    [cpassword] => A12345
    [url_email] => thaitoan@yahoo.com  */
    	    	
    	 $this->load->Model("Mdata"); 
    	$test = $this->Mdata->update_pass($_POST);	// neu update success then $test == 1, then ajax from user.js se nhan dc data la 1 ko can phai echo ra
    	
    	// xoa di SESSION['token_reset']
    	unset($_SESSION['token_reset']);
    	
    	
    	
    }
    
}