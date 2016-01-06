<?php



class Report extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
		$this->load->Model("Mdata"); //MD-added
		//$this->load->database; //MD-added
        $this->load->library("session");	// load session so donation_view can submit form to cart.php
    } 
    public function index(){ 
      
    	echo '<pre>';
    	print_r($_SESSION);
    	echo '<pre>';
    	
    	echo '<pre>';
    	print_r($_POST);
    	echo '<pre>';
		
		//die('die is called');

    	/*
    	Array
		(
		    [card] => Array
		        (
		            [Summary_Code] => 1
		            [Response_Code] => 34
		            [Description] => Suspected fraud
		            [Receipt_Number] => 721962220
		            [Settlement_Date] => 20151012
		            [POST] => Array
		                (
		                    [user_firstname] => Thai Toan
		                    [holder_name] => mytest
		                    [cardNumber] => 4564710000000004
		                    [cardExpiryMonth] => 02
		                    [cardExpiryYear] => 09
		                    [cardVerificationNumber] => 847
		                    [token] => 1444627900
		                    [orderAmount] => 50
		                )

		        )
		)
		*/
		
		/*$_summaryCode  = $_POST[ "Summary_Code" ];
		echo " Summary Code = $_summaryCode " ;
		*/
		echo '<MarcTest1>';
		$this->load->Model("Mdata");
		$check = $this->Mdata->insert_order($_POST);
		echo '<MarcTest2>';
			/*echo '<pre>';
    	print_r($check);
    	echo '<pre>';*/
		
    	
    } 
    public function rand_img(){ 
	
    	
    }
   
}