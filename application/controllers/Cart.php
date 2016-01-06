<?php



class Cart extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->library("session");	// load session so donation_view can submit form to cart.php
    } 
    public function index(){ 
      
    	if(isset($_SESSION['paid'])){
    		redirect('ecard');
    	
    	}
    	    	
    	//Dau tien goi cart_view khi controller cart dc goi nhung khi $_SESSION['totalItem'] == 0 tuc da xoa het cac phan tu trong cart thi redirect ve trang home  
    	$this->load->view("cart_view");
    	if($_SESSION['totalItem'] == 0){
    		
    		 redirect();
    		
    	}
    	//session_destroy();
    } 
    public function hocphp(){ 
        echo "<h3>Hoc PHP Tai QHOnline.Info</h3>"; 
    } 
}