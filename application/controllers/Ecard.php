<?php



class Ecard extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->library("session");	// load session so donation_view can submit form to cart.php
    } 
    public function index(){ 
        
        if(!isset($_SESSION['paid'])){
            redirect();
        }else{
            $this->load->view('ecard_view');
            if(!isset($_SESSION['user_email'])){                //IF user not loggin, add user_email submitted from Billing to SESSION - This is for guest checkout
                $_SESSION['user_email'] = $_POST['user_email'];
            }
        }
    }
    public function kill(){ 
    	session_destroy();
    		
    } 
}