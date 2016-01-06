<?php



class Admin extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->library("session");	// load session so donation_view can submit form to cart.php
        $this->load->database();
    } 
    public function index(){ 
    	
    	//$_SESSION['admin'] = '';
    	//session_destroy();
    	
    	$this->load->Model("Mdata");
		$dataCat=$this->Mdata->getUser();
		
		$result['user_data'] = $dataCat;
		
		$this->load->view("admin_view", $result);
    	
    	
    } 
    
    public function checkAdmin(){
    	/* echo '<pre>';
    	print_r($_POST);
    	echo '<pre>'; */
    	
    	
    	
    	$this->load->Model("Mdata");
    	$result=$this->Mdata->isExist_Admin($_POST);
    	if($result == 1){
    		$_SESSION['admin'] = $_POST['username'];
    	}
   		echo $result;
    	
    }
    
    public function people(){
    	
		//IF admin not loggin then redirect	
    	if(!isset($_SESSION['admin'])){
    		redirect();
    	}
    	
    	$this->load->Model("Mdata");
    	$dataCat=$this->Mdata->getUser();
    
    	$result['user_data'] = $dataCat;
    
    	$this->load->view("people_view", $result);
    	 
    	 
    }
    
    public function search(){
    	/* echo '<pre>';
    	print_r($_POST);
    	echo '<pre>'; */
    	
    	$this->load->Model("Mdata");
    	$data=$this->Mdata->lookup($_POST);
    	/* 
    	echo '<pre>';
    	print_r($data);
    	echo '<pre>'; */
    	
 
    	$html='';
    	foreach($data as $key =>$val){
    		$html.='<tr class="init">	<td>'.$val['user_firstname'].' '.$val['user_lastname'].'</td>
							<td>'.$val['user_email'].'</td>
							<td>'.$val['user_phone'].'</td>
							<td>'.$val['user_address1'].$val['user_address2'].' '.$val['user_suburb'].' '.$val['user_postcode'].'</td>
						</tr>';
    	}
    	echo $html;
    	
    }
    
    public function finance(){
    	 
    	//IF admin not loggin then redirect
    	if(!isset($_SESSION['admin'])){
    		redirect();
    	}
    	 
    	/* $this->load->Model("Mdata");
    	$dataCat=$this->Mdata->getUser();
    
    	$result['user_data'] = $dataCat; */
    
    	$this->load->view("finance_view");
    
    
    }
    
    public function checkDate(){
    	/* echo '<pre>';
    	print_r($_POST);
    	echo '<pre>'; */
    	
    	
    	$from = date_parse_from_format('Y/m/d', $_POST['from']) ;
    		
    	$tsFrom	= mktime(0, 0, 0, $from['month'], $from['day'], $from['year']);

    	//echo $tsFrom;
    	//echo "Output: " . date("Y-m-d", $tsFrom);
    	
    	$to = date_parse_from_format('Y/m/d', $_POST['to']) ;
    	
    	$tsTo	= mktime(0, 0, 0, $to['month'], $to['day'],$to['year']);
    	
    	//echo $tsTo;
    	//echo "Output: " . date("Y-m-d", $tsTo);
    	if($tsTo >= $tsFrom ){
    		//echo 'hop le';
    		$this->load->Model("Mdata");
    		 $data=$this->Mdata->getReport($_POST);
    		
    	/* 	echo '<pre>';
    		print_r($data);
    		echo '<pre>'; */
    		
    	
    		$html='';
    		foreach($data as $key =>$val){
    			$html.='<tr class="init">	
							<td>'.$val['or_date'].'</td>
							<td>'.$val['or_orderid'].'</td>
							<td>'.$val['or_constituentname'].'</td>
							<td>'.$val['or_address'].'</td>
							<td>'.$val['or_suburb'].'</td>
							<td>'.$val['or_postcode'].'</td>		
							<td>'.$val['or_state'].'</td>
							<td>'.$val['or_email'].'</td>
							<td>'.$val['or_phone'].'</td>
							<td>'.$val['or_paymentmethod'].'</td>
							<td>'.$val['or_cardholdername'].'</td>
							<td>'.$val['or_gift_category'].'</td>		
									
							<td>'.$val['or_gift_item'].'</td>
							<td>'.$val['or_gift_id'].'</td>
							<td>'.$val['or_gift_qty'].'</td>
							<td>'.$val['or_gift_unitprice'].'</td>
							<td>'.$val['or_gift_amount'].'</td>
							<td>'.$val['or_receipt'].'</td>		
									
						</tr>';
    		}
    		echo $html;
    	
    		
    	}else{
    		echo '<span style="color:red">Please select correct Date</span>';
    	}
    }
    
    public function saveCvs(){
    	/* echo '<pre>';
    	print_r($_POST);
    	echo '<pre>';
    	die('die is called'); */
    	
    	$table = $_POST['table'];
    	$from  = $_POST['from'];
    	$to    = $_POST['to'];
    	
    	$this->load->library("Csv");
    	$this->csv->createCsv($table,$from,$to);
    	
    	if(file_exists('log/SP_'.$from.'_'.$to.'.csv')){
    		//echo 'ton tai';
    		$this->load->library("Mail");
    		$this->mail->eReport($from,$to);
    	}else{
    		echo 'ko ton tai';
    	} 
    
    }
    
    public function logout(){
    	unset($_SESSION['admin']);
    }
   
    
}