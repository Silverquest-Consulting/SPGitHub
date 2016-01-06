<?php



class billing extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->library("session");	// load session so donation_view can submit form to cart.php
        $this->load->database();
    } 
    public function index(){ 
    	
    	// IF SESSION = EMPTY then redirect to home
    	if($_SESSION['totalItem'] == 0){
    	
    		redirect();
    		
    	}
    	
    	if(isset($_SESSION['user_email'])){			// If user login success then in SESSION will have $_SESSION['user_email'], that is at user/validate_user() 
    		$username = $_SESSION['user_email'];
    		$query=$this->db->query("SELECT `user_firstname`, `user_lastname` FROM `user` WHERE `user_email` ='$username'");		
    		
    		$formInfo = $query->result_array();	// dung email trong SESSION lay ra `user_firstname`, `user_lastname` trong database de gan vao form o billing_view.php
    		/* echo '<pre>';
    		print_r($formInfo);
    		echo '<pre>'; */
    		$data['formInfo'] = $formInfo;		// KQ la  $formInfo, ta viet $data['formInfo'] = $formInfo
    		 
    		$this->load->view("billing_view",$data);	// ta truyen data vao 'billing_view' thi tai view ta in ra 'formInfo' ta se thay KQ la  $formInfo
    	}else{
    		$this->load->view("billing_view");	// tai ELSE tuc la guest checkout thi ta chi load billing_view
    	}
    	
    	
    } 
    public function logout(){ 
    	
    	$this->session->unset_userdata('user_email');
    	$this->session->unset_userdata('user_firstname');
    } 
    
    public function paid(){
    	 
    	$_SESSION['paid'] = 1;
    	/*session_destroy(); */
    }
    
}