<?php
class Mdata extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
    }
    
    public function getCat(){
    	//$query=$this->db->get("category");							// Cach 1- Use phuong thuc get("product") goi den table `product`
    	$query=$this->db->query("SELECT * FROM `category` ORDER BY `id` ");		// Cach 2- Use phuong thuc query("") ben trong ta tu viet cau SQL
    	return $query->result_array();
    }
    
    public function getItem($data){
		
    	$sql = "SELECT * FROM `item` WHERE `category_id` ='$data'";
    //	echo $sql; die('die is called');
    	$query=$this->db->query($sql); 
    	return $query->result_array();
    	//$data = array("username" => "tom", "password" => "123", "fullname" => "tomtran");
    	//$this->db->insert("user",$data['hi']);
    	 
    }

     public function getUser(){
    	//$query=$this->db->get("product");							// Cach 1- Use phuong thuc get("product") goi den table `product`
    	$query=$this->db->query("SELECT `user_firstname`, `user_lastname`, `user_email`, `user_address1`, `user_address2`, `user_suburb`, `user_postcode`, `user_phone`  FROM `user` ");		// Cach 2- Use phuong thuc query("") ben trong ta tu viet cau SQL
    	return $query->result_array();
    }
    
    public function listall(){
    	//$query=$this->db->get("product");							// Cach 1- Use phuong thuc get("product") goi den table `product`
    	$query=$this->db->query("SELECT * FROM `product` ");		// Cach 2- Use phuong thuc query("") ben trong ta tu viet cau SQL
    	return $query->result_array();
    }
	
    public function isExist_user($data){
    	//echo $data; die('die is called');
    	$sql = "SELECT * FROM `user` WHERE `user_email` ='$data'";
    	//	echo $sql; die('die is called');
    	$query=$this->db->query($sql);
    	return $query->num_rows();
    	
    }
    
    public function insert_user($data){
    	/* echo '<pre>';
    	print_r($data);
    	echo '<pre>';  */
    	
    	// Khi luu thong tin user vao database thi time create ta thuc hien tai day,  ta them vao $data['userInfo'] phan tu ['user_date_created'] =date("Y-m-d H:m:s",time());
    	// Tuy nhien truoc khi ham date() chay thi ta phai co dong ben duoi voi ham date_default_timezone_set(), neu ko HOST se bao loi
    	date_default_timezone_set('Australia/Sydney');
    	$data['userInfo']['user_date_created'] =date("Y-m-d H:m:s",time());
    	/* echo '<pre>';
    	print_r($data);
    	echo '<pre>'; die('die is called'); */
    	
    	//$data = array("username" => "tom", "password" => "123", "fullname" => "tomtran");
    	//$this->db->insert("user",$data['hi']);

        //MD-encrypt password
        $email = $data['userInfo']['user_email'];
        $password = $data['userInfo']['user_password'];
        $pwd_hashed = hash('sha256', $password . $email);
        $data['userInfo']['user_password'] = $pwd_hashed;
    	
    	 $result = $this->db->insert("user",$data['userInfo']);
    	 echo $result;
			
		//MD - if successful insert into "user" table, then insert "Registration" transaction into "ej" table
		if ( $result === TRUE ) {
			$_tranid 	= "01";
			$_trandesc 	= "Registration";
			date_default_timezone_set('Australia/NSW'); // AEST
        	$_currdate 	= date("Y-m-d");
        	$_currtime 	= date("H:i:s");
			$_responsecode= "0"; //successful since user was added in user table
			
			$sql = "INSERT INTO sp_ej ( ej_trandate , ej_trantime, ej_email, ej_tranid, ej_trandesc, ej_status)
				VALUES ( '$_currdate', '$_currtime', '$email', '$_tranid', '$_trandesc', '$_responsecode') ";
			$result2=$this->db->query( $sql );
			if ($result2 === FALSE) echo " Error in updating SP_EJ Record : $this->db->error ";	
		}
    	
    }

    public function login_user($data){
    	
    	// Be careful to turn of print_r() when doing AJAX
    	/* echo '<pre>';
		 print_r($data);
 		 echo '<pre>'; */

 		 $username = $data['user']['username'];
 		 $password = $data['user']['password'];
 		 
 		 
 		 //echo $password;
 		 //SELECT `id` FROM `user` WHERE `username` ='tom' AND `password` = '123';
 		

 		//$result=$this->db->query("SELECT `user_id` FROM `user` WHERE `user_email` ='$username' AND `user_password` = '$password'");
		//MD-decrypt password
		$pwd_hashed = hash('sha256', $password . $username);
		$result=$this->db->query("SELECT `user_id` FROM `user` WHERE `user_email` ='$username' AND `user_password` = '$pwd_hashed'");
		
		//MD - if successful then insert "Login" transaction into "ej" table
		//$numrows =$result->num_rows(); 
		//echo " login_user resultnumrows = $numrows ";
		if ($result->num_rows() == 1) {
			$_tranid 	= "02";
			$_trandesc 	= "Login";
			date_default_timezone_set('Australia/NSW'); // AEST
        	$_currdate 	= date("Y-m-d");
        	$_currtime 	= date("H:i:s");
			$_responsecode= "0"; //successful since user was added in user table
			
			$sql = "INSERT INTO sp_ej ( ej_trandate , ej_trantime, ej_email, ej_tranid, ej_trandesc, ej_status)
				VALUES ( '$_currdate', '$_currtime', '$username', '$_tranid', '$_trandesc', '$_responsecode') ";
			$result2=$this->db->query( $sql );
			if ($result2 === FALSE) echo " Error in updating SP_EJ Record : $this->db->error ";	
		}

 		return $result->num_rows();
 		
    }
    	
 	public function getDesc($data){
 		$query=$this->db->query("SELECT `name`, `description` FROM `item` WHERE `gift_pic` ='$data'");		// Cach 2- Use phuong thuc query("") ben trong ta tu viet cau SQL
 		return $query->result_array();
 	}	
 		
 	public function update_pass($data){   	
 		/* echo 'at mdata';
 		echo '<pre>';
 		print_r($data);
 		echo '<pre>'; */
 		
 		$newPass 	= $data['new_password'];
 		$url_email  = $data['url_email'];
 		
 		//$query=$this->db->query("UPDATE `user` SET `user_password` = '$newPass' WHERE `user_email` = '$url_email'");

                //MD: encrypt password	and update user_pwd_reset_date
	        $pwd_hashed = hash('sha256', $newPass . $url_email);
                date_default_timezone_set('Australia/Sydney');
                $currdate =date("Y-m-d H:m:s",time());
                $query=$this->db->query("UPDATE `user` SET `user_password` = '$pwd_hashed', `user_pwd_reset_date` = '$currdate' WHERE `user_email` = '$url_email'");
  
 		echo $query;
 		//return $query->num_rows();
 		/*  UPDATE `user` SET `user_password` = 'A12346' WHERE `user_email` = 'thaitoan@yahoo.com' */
		
		//MD - if successful update into "user" table, then insert "Reset Password" transaction into "ej" table
		if ( $query === TRUE ) {
			$_tranid 	= "04";
			$_trandesc 	= "Reset Password";
			date_default_timezone_set('Australia/NSW'); // AEST
        	$_currdate 	= date("Y-m-d");
        	$_currtime 	= date("H:i:s");
			$_responsecode= "0"; //successful since user was added in user table
			
			$sql = "INSERT INTO sp_ej ( ej_trandate , ej_trantime, ej_email, ej_tranid, ej_trandesc, ej_status)
				VALUES ( '$_currdate', '$_currtime', '$url_email', '$_tranid', '$_trandesc', '$_responsecode') ";
			$result2=$this->db->query( $sql );
			if ($result2 === FALSE) echo " Error in updating SP_EJ Record : $this->db->error ";	
		}
 	}
	
	public function insert_order($data) {
	
		echo '<insert_order>';
    	print_r($_SESSION);
        print_r($data);
        echo '<insert_order>'; 
			
		$_email = $_SESSION['user_email'];
		//echo "user email = $_email "; 
		$sql = "SELECT * FROM `user` WHERE `user_email` ='$_email'";
		//echo "sql = $sql ";
		$result=$this->db->query( $sql );
		if ($result === FALSE) echo " Error in reading USER Record : $this->db->error ";

		$_firstName = "";
		$_lastName = "";
		$_phone = "";
		$_addr1 = "";
		$_addr2 = "";
		$_suburb = "";
		$_postCode = "";
		$_state = "";
		$_country = "";
			
		if ($result->num_rows() == 1) {
			foreach($result->result_array() as $row) {
				$_firstName = $row["user_firstname"];
				$_lastName = $row["user_lastname"];
				$_phone = $row["user_phone"];
				$_addr1 = $row["user_address1"];
				$_addr2 = $row["user_address2"];
				$_suburb = $row["user_suburb"];
				$_postCode = $row["user_postcode"];
				$_state = $row["user_state"];
				$_country = $row["user_country"];
			}
		}

		date_default_timezone_set('Australia/NSW'); // AEST
        	$_currdate 	= date("Y-m-d");
        	$_currtime 	= date("H:i:s");

		$_orderNumber    = $data[ "card" ][ "Order_Number" ];
		$_summarycode    = $data[ "card" ][ "Summary_Code" ];
		$_responsecode   = $data[ "card" ][ "Response_Code" ];
		$_responsedesc   = $data[ "card" ][ "Description" ];
		$_cardHolderName = $data[ "card" ][ "CardHolderName" ];
		$_currency 		 = $data[ "card" ][ "Currency" ];		
		$_cardSchemeName = $data[ "card" ][ "CardSchemeName" ];
		$_tranDate       = $data[ "card" ][ "Transaction_Date" ];
		$_receipt        = $data[ "card" ][ "Receipt_Number" ];	
		
		$tax = array();
		if(key_exists('tax', $_SESSION['user_shopping'])){
			foreach($_SESSION['user_shopping']['tax'] as $key => $val){
				$tax[$key] = $val;
			}
		}			
		foreach($tax as $key => $val){     			
			$_itemname  = $val['item_name'];
			$_itemqty   = $val['item_Qty'];
			$_itemprice = $val['item_price'];
			$_itemsub   = $val['item_sub'];
			$_itemid    = $val['item_id'];
			$_catname   = $val['cat_name'];
			$_itemtax   = "Y"; //tax-deductible	

			//Store to order/report table
			if 	((strlen($_itemname) > 0 ) and
				 (intval($_itemsub) > 0 ) and
				 (intval($_itemqty) > 0 )) 	{

				$sql = "INSERT INTO sp_order ( 
					or_orderid, or_date, or_time,
					or_summarycode, or_responsecode, 
					or_responsedesc, or_constituentname, or_address,
					or_suburb, or_state, or_postcode,
					or_country, or_email, or_phone,
					or_paymentmethod, or_cardholdername, or_gift_category,
					or_gift_item, or_gift_id, or_gift_qty,
					or_gift_unitprice, or_gift_amount, or_gift_tax,
					or_currency, or_trandate, or_receipt)
					VALUES (
					'$_orderNumber', '$_currdate', '$_currtime',
					'$_summarycode', '$_responsecode',
					'$_responsedesc', '$_firstName $_lastName', '$_addr1 $_addr2', 
					'$_suburb', '$_state', '$_postCode',
					'$_country', '$_email', '$_phone',
					'$_cardSchemeName', '$_cardHolderName', '$_catname', 
					'$_itemname', '$_itemid', '$_itemqty', 
					'$_itemprice', '$_itemsub', '$_itemtax',
					'$_currency', '$_tranDate', '$_receipt' ) ";			
				echo " ORDER sql = $sql "; 
				$result=$this->db->query( $sql );			
				if ($result === FALSE) echo " Error in Adding ORDER Record ";
				
			}
			
		} //foreach($tax ..

		$nontax = array();
		if(key_exists('nontax', $_SESSION['user_shopping'])){
			foreach($_SESSION['user_shopping']['nontax'] as $key => $val){
				$nontax[$key] = $val;
			}
		}	
		foreach($nontax as $key => $val){     			
			$_itemname  = $val['item_name'];
			$_itemqty   = $val['item_Qty'];
			$_itemprice = $val['item_price'];
			$_itemsub   = $val['item_sub'];
			$_itemid    = $val['item_id'];
			$_catname   = $val['cat_name'];
			$_itemtax   = "N"; //tax-deductible	

			//Store to order/report table
			if 	((strlen($_itemname) > 0 ) and
				 (intval($_itemsub) > 0 ) and
				 (intval($_itemqty) > 0 )) 	{

				$sql = "INSERT INTO sp_order ( 
					or_orderid, or_date, or_time,
					or_summarycode, or_responsecode, 
					or_responsedesc, or_constituentname, or_address,
					or_suburb, or_state, or_postcode,
					or_country, or_email, or_phone,
					or_paymentmethod, or_cardholdername, or_gift_category,
					or_gift_item, or_gift_id, or_gift_qty,
					or_gift_unitprice, or_gift_amount, or_gift_tax,
					or_currency, or_trandate, or_receipt)
					VALUES (
					'$_orderNumber', '$_currdate', '$_currtime',
					'$_summarycode', '$_responsecode',
					'$_responsedesc', '$_firstName $_lastName', '$_addr1 $_addr2', 
					'$_suburb', '$_state', '$_postCode',
					'$_country', '$_email', '$_phone',
					'$_cardSchemeName', '$_cardHolderName', '$_catname', 
					'$_itemname', '$_itemid', '$_itemqty', 
					'$_itemprice', '$_itemsub', '$_itemtax',
					'$_currency', '$_tranDate', '$_receipt' ) ";
					 
						
				echo " insert_order sql = $sql "; 
				$result=$this->db->query( $sql );			
				if ($result === FALSE) echo " Error in Adding ORDER Record ";
				
			}
			
		} //foreach($nontax	..

		//Update EJ with emailid 
		$sql = "UPDATE `sp_ej` SET `ej_email` = '$_email' WHERE `ej_card_orderno` = '$_orderNumber' ";
		$result=$this->db->query( $sql );
		if ($result === FALSE) echo " Error in updating SP_EJ Record : $this->db->error ";	
				
    }
   
}