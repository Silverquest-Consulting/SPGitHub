<?php
class Alo{
	public function __construct($params){

                $email_from ='giftcatalogue@samaritanspurse.org.au';
		$email_bcc ='giftcatalogue@samaritanspurse.org.au'; // blind copy to verify email has been sent
		
		$email = $params['email'];
		$encrypted_txt = $this->encrypt_decrypt('encrypt', $email);
		
		date_default_timezone_set('Australia/NSW');
		//$dtime = date('Ymd');	// Pass the current datetime in milliseconds for the 24 hour expiry validation	
		$dtime = (round(microtime(true)*1000));
		
		$_SESSION['token_reset'] = $dtime;
		
		//echo " datetime=$dtime \n";
		//$url = "https://staging.silverquest.com.au/marc/reset?me=".$encrypted_txt."&de=".$dtime;
		//$url = "http://localhost".$_SERVER['SCRIPT_NAME']."/reset?me=".$encrypted_txt."&de=".$dtime;
		
		$url = base_url()."index.php/reset?me=".$encrypted_txt."&de=".$dtime;
		
		require_once('email/SimpleEmailService.php');		
		require_once('email/SimpleEmailServiceRequest.php');
		require_once('email/SimpleEmailServiceMessage.php');
		
		$ses = new SimpleEmailService('AKIAIF3AO26HP3I456XQ', 'a/dxHN7gTjui1i74XtfZNijLBrcBxDfHW0v5RX++');
		print_r($ses->enableVerifyPeer(false));
		
		//TODO : change $email to First Last Name from User table ?
		$msg1 = "Hi " .$email.", \n\n";
		$msg2 = "Please click the url below to change your password\n\n";
		$msg3 = $url ;
		$msg4 = "\n\nThis request to change the password will expire in 24 hours.\n\n" ;
		$msg5 = "Thank you,\n" ;
		$msg6 = "The Team at Samaritan's Purse";
		$msg  = $msg1.$msg2.$msg3.$msg4.$msg5.$msg6;
		
		$email_to = $email;
				
		$m = new SimpleEmailServiceMessage();
		$m->addTo($email_to);
		$m->addBCC($email_bcc);
		$m->setFrom($email_from);
		$m->setSubject('Samaritans Purse - Request For Reset Password');
		$m->setMessageFromString($msg);
		//$m->addAttachmentFromData('text_file.txt', 'Simple content', 'text/plain');
		$m->addCustomHeader("Force-headers:\t1");
		
		$response = $ses->sendEmail($m);
		
		echo " An email has just been sent to $email_to \n";
		
		//TODO log to ej ? include the requestid so as to verify with AWS if the email has been sent
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
	
	public function eCard($params){
		echo '<pre>';
		print_r($params);
		echo '<pre>';
	}
	
}