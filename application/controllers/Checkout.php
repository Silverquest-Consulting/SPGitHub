<?php

class Checkout extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->library("session");	// load session so donation_view can submit form to cart.php
    } 
    public function index(){ 
          	  	
    	
    } 
    public function update(){ 
        /* echo '<pre>';
    	print_r($_POST);
    	echo '<pre>';
    	echo '<pre>';
    	print_r($_SESSION);
    	echo '<pre>'; die(); */
    	
    	// Tag <i> in donation_view will call checkout/update
    	
    	if(key_exists($_POST['parent'], $_SESSION)){
    		
    		// Dau tien Update lai $_SESSION['totalItem'] de BASKET hien thi dung
    		$_SESSION['totalItem']= $_SESSION['totalItem'] - $_SESSION[$_POST['parent']][$_POST['item']];
    		
    		//update [totalItem] ben trong phan tu gui qua 
    		$_SESSION[$_POST['parent']]['totalItem']= $_SESSION[$_POST['parent']]['totalItem'] - $_SESSION[$_POST['parent']][$_POST['item']];
    		
    		//update Qty of item that need to set to 0
    		$_SESSION[$_POST['parent']][$_POST['item']]=0;
    		    		
    		
    		//Update Total cua $_POST['parent'] de khi REFRESH thi van hien thi dung cac gia tri TOTAL o cuoi trang
    		$_SESSION[$_POST['parent']]['total']= ($_SESSION[$_POST['parent']]['item1_Qty']*$_SESSION[$_POST['parent']]['unit_price_1'])
    											+ ($_SESSION[$_POST['parent']]['item2_Qty']*$_SESSION[$_POST['parent']]['unit_price_2'])
    											+ ($_SESSION[$_POST['parent']]['item3_Qty']*$_SESSION[$_POST['parent']]['unit_price_3']);
    		
    		if($_SESSION[$_POST['parent']]['totalItem'] == 0){
    			$this->session->unset_userdata($_SESSION[$_POST['parent']]);
    		}
    		//session_destroy();
    		/* echo '<pre>';
    		print_r($_SESSION);
    		echo '<pre>'; */
    		
    	}
    } 
    
    public function updateQty(){
    	/* echo '<pre>';
    	print_r($_POST);
    	echo '<pre>'; */
    	
    	
    	if(key_exists($_POST['parent'], $_SESSION)){
    		
    		// Dau tien Update lai $_SESSION['totalItem'] de BASKET hien thi dung
    		$_SESSION['totalItem']= ($_SESSION['totalItem'] - $_SESSION[$_POST['parent']][$_POST['item']])+ $_POST['qty'];
    		
    		//update [totalItem] ben trong phan tu gui qua
    		$_SESSION[$_POST['parent']]['totalItem']= ($_SESSION[$_POST['parent']]['totalItem'] - $_SESSION[$_POST['parent']][$_POST['item']]) + $_POST['qty'];
    		
    		//update Qty of item that need to set to 0
    		$_SESSION[$_POST['parent']][$_POST['item']]= $_POST['qty'];
    		
    		//Update Total cua $_POST['parent'] de khi REFRESH thi van hien thi dung cac gia tri TOTAL o cuoi trang
    		$_SESSION[$_POST['parent']]['total']= ($_SESSION[$_POST['parent']]['item1_Qty']*$_SESSION[$_POST['parent']]['unit_price_1'])
    		+ ($_SESSION[$_POST['parent']]['item2_Qty']*$_SESSION[$_POST['parent']]['unit_price_2'])
    		+ ($_SESSION[$_POST['parent']]['item3_Qty']*$_SESSION[$_POST['parent']]['unit_price_3']);
    		
    		if($_SESSION[$_POST['parent']]['totalItem'] == 0){
    			$this->session->unset_userdata($_SESSION[$_POST['parent']]);
    		}
    		//session_destroy();
    		
    	
    	}
    	/* echo '<pre>';
    	print_r($_SESSION);
    	echo '<pre>';  */
    }
    
    public function subTotal(){
    	$_SESSION['subTotal'] = $_POST['subTotal'];
    	echo '<pre>';
    	print_r($_SESSION);
    	echo '<pre>';
    	
    	echo '<pre>';
    	print_r($_POST);
    	echo '<pre>';
    	
    	$_SESSION['user_shopping'] = $_POST;
    	
    }
    
}