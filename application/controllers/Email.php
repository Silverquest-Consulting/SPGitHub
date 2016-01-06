<?php



class Email extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
          $this->load->library("session");
          $this->load->database();
    } 
    public function index(){ 
   		 	

    	$email = $_POST['email'];
    	$params = array('email' => $email);
    	$this->load->Model("Mdata");
    	$test = $this->Mdata->isExist_user($email);
    	if($test != 1){
    		echo 'Invalid';
    	}else{
    		$this->load->library("Alo",$params);
    	}
    } 
    
    public function send_Card(){
    	
    	/* echo '<pre>';
    	print_r($_POST);die();
    	echo '<pre>';
		 */
    	 $this->load->library("Mail");
    	 $this->mail->eCard($_POST);
    	 
    	 // After send Ecard to user by Email then Kill-off SESSION
    	 session_destroy();
    	
    }
    
	public function get_Receipt(){
    	
    	/* echo '<pre> email/send_Receipt';
    	print_r($_SESSION);
    	echo '<pre>'; */
		
		
    	$this->load->library("Quickstream");
    	$this->quickstream->receipt($_POST);

    	
    	
    }
    
    public function send_Receipt(){
    	 
    	/* echo '<pre> email/send_Receipt';
    	 print_r($_POST);
    	echo '<pre>'; */
    
    	$this->load->library("Mail");
    	$this->mail->eReceipt($_POST);
    
    	 
    	 
    }
    
    
}