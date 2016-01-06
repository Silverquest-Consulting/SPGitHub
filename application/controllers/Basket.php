<?php



class Basket extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->library("session");	// load session so donation_view can submit form to cart.php
    } 
    public function index(){ 
      
    	// Khi Ajax Post form qua ma total = 0 thi Kiem tra  phan tu do co ton tai trong SESSION ko neu co thi xoa no di    	
    	// else nguoc lai thi luu phan tu do vao session de luu thong tin khach hang lua chon dong thoi tra ve tong so item trong gio hang
  		if($_POST['total'] == 0){
  			if(isset($_SESSION[$_POST['name']])){
    			$this->session->unset_userdata($_SESSION[$_POST['name']]);	// cu phap Delete phan tu trong session
  			}
    	}else{
    		$_SESSION[$_POST['name']] = $_POST;	// gan 1 phan tu trong Session, cach viet nay cua PHP thuan nhung van work voi Codeigniter
    		
    	}
    	
    	$totalItems = @$_SESSION['Needed']['totalItem']
    	+ @$_SESSION['Chirsmas']['totalItem']
    	+ @$_SESSION['Health']['totalItem']
    	+ @$_SESSION['Agriculture']['totalItem']
    	+ @$_SESSION['Church']['totalItem']
    	+ @$_SESSION['Water']['totalItem']
    	+ @$_SESSION['People']['totalItem']
    	+ @$_SESSION['Journey']['totalItem']
    	+ @$_SESSION['Education']['totalItem']
    	+ @$_SESSION['Disaster']['totalItem'];
    	
    	// Put totalItem as a separate key into SESSION so index page could see it
    	$_SESSION['totalItem'] = @$totalItems;
    	
    	echo $totalItems;
    	
    } 
    public function update(){ 

    		
    } 
}