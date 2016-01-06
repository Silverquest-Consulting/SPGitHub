<?php



class Gift extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->library("session");	// load session so donation_view can submit form to cart.php
        $this->load->database();
    } 
    public function index(){ 
    	
    	if(!isset($_SESSION['paid'])){
    		redirect();}
    	
    	$this->load->Model("Mdata");
    	$this->load->view('gift_view');
    	
    	   
    } 
    public function form(){ 

    	// IF $_SESSION['user_shopping'] ko ton tai thi redirect khi nhan PREVIEW
    	if(!isset($_SESSION['user_shopping'])){
    		echo 'home';
    	}
    	else{    		
    		$_SESSION['user_message'] = $_POST;	// luc nay gift_view co the echo info ra form tu SESSION
    		/* echo '<pre>';
    		print_r($_SESSION);
    		echo '<pre>'; */
    	}
    } 
}