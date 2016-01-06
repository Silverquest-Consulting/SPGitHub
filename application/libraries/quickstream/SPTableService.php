<?php
/**
* Class : SPTableService PHP class
*
* Created By : SilverQuest Consulting
* Version    : 1.0
* Created On : October 2015
* Author     : Marc
*
*/

class SPTableService
{
    protected $__connection; 
    protected $__trace;
    
    // Setters
    public function setTrace($trace) 
    {
		$this->__trace = $trace;
		return $this;
	}
    
    function SPTableService()
    {
        $this->__connection = NULL;
		$this->__trace = false; // set true for development ; false to production
    }
    
    public function connect_MySqli() 
    {	
        // TO-DO fine tune this 4 params and read these in a shared config file
        $servername = "localhost";
        $username   = "prd_dbadmin";
        $dbpassword = "sIgo2rBrlTxGJU6Rkpha";
        $dbname     = "sp_prod";
	
        $t_conn = new mysqli($servername, $username, $dbpassword, $dbname);
        if ($t_conn->connect_error) {
            echo "Error in Mysql connect : " . $t_conn->connect_error;  
        } else {
            $this->__connection = $t_conn;
        }
    }
    
    public function close_MySqli() 
    {
         if ($this->__connection != NULL){
            mysqli_close($this->__connection);
            $this->__connection = NULL;
            //echo "close_mysql : Connection closed.";
         }
    }
    
	function addToMultiValue($origMVData, $mvID, $mvData) {
		//echo " addToMultiValue  $mvID $mvData \n";
		$delim = "\x1F"; //UnitSeparator 
		$equal = "=";
		$newMVData=$origMVData.$mvID.$equal.$mvData.$delim;
		//echo " newMVData = $newMVData \n";
		return $newMVData;
	}
	
	function _formatCardNumberForDisplay( $cardNumber )
    {		
        if ( is_null( $cardNumber ) )
        {
            return NULL;
        }

        $formattedCardNumber = '';
        if ( strlen( $cardNumber ) >= 16 )
        {
            $formattedCardNumber = substr( $cardNumber, 0, 6 ) . "..." . 
                substr( $cardNumber, -3 );
        }
        else if ( strlen( $cardNumber ) >= 14 )
        {
            $formattedCardNumber = substr( $cardNumber, 0, 4 ) . "..." . 
                substr( $cardNumber, -3 );
        }
        else
        {
            $formattedCardNumber = $cardNumber;
        }
        return $formattedCardNumber;
    }
	
    public function store_EJ_CardPayment( $loc_requestParameters ) 
    {	
	
        if ($this->__connection==NULL) {
            echo "Function store_ej: Connection is NULL ";
            return;
        }
        
        date_default_timezone_set('Australia/NSW'); // AEST
        $_currdate 	= date("Y-m-d");
        $_currtime 	= date("H:i:s");
		$_tranid    = "05"; 
		$_trandesc  = "Card Payment";
		$_status    = "9"; // sent to Qvalent         $loc_responseParameters[ "response.summaryCode" ];
		$_orderno   = $loc_requestParameters[ "customer.orderNumber" ] ;
		
		//TO-DO add multivalue here 
		//030 "card.PAN"
		//031 "card.cardHolderName"
		//032 "order.amount"		
		$PAN= $loc_requestParameters[ "card.PAN" ];
		$formattedPAN = $this->_formatCardNumberForDisplay( $PAN );
		$cardHolderName= $loc_requestParameters["card.cardHolderName"];
		$amount=$loc_requestParameters["order.amount"];
		
		$delim = "\x1F";
		$msg30="030=".$formattedPAN.$delim;
		$msg31="031=".$cardHolderName.$delim;
		$msg32="032=".$amount.$delim;
		$_multivalue = $msg30.$msg31.$msg32;	
		
        $sql = "INSERT INTO sp_ej ( 
				ej_trandate , ej_trantime, ej_tranid, 
				ej_trandesc, ej_status, ej_card_orderno, ej_multivalue)
                VALUES (
				'$_currdate', '$_currtime', '$_tranid',  
				'$_trandesc', '$_status', '$_orderno', '$_multivalue' ) ";
				
        if ($this->__trace) echo "insert sp_ej sql = >$sql< ";
       
        if ($this->__connection->query($sql) === FALSE) {    
            echo " Error in Adding EJ Record ". $this->__connection->error;
        }
    }
	
	public function update_EJ_CardPayment( $loc_requestParameters, $loc_responseParameters ) 
	{
		if ($this->__trace) echo " In update_EJ_CardPayment ";
		
		$_orderno       = $loc_requestParameters[ "customer.orderNumber" ] ;
		
		//$summaryCode="";
		//if ( array_key_exists( 'response.summaryCode', $loc_responseParameters ) ) {
		//	$summaryCode = $responseParameters[ "response.summaryCode" ];
		//}
		//$_status        = $loc_responseParameters[ "response.summaryCode" ];
		//$_card_response = $loc_responseParameters[ "response.summaryCode" ];
		
		// TO-DO Add Multivalue here ..
		/*
		040 $summaryCode = $responseParameters[ "response.summaryCode" ];
		041 $responseCode = $responseParameters[ "response.responseCode" ];
		042 $description = $responseParameters[ "response.text" ];
		043 $receiptNo = $responseParameters[ "response.referenceNo" ];
		044 $settlementDate = $responseParameters[ "response.settlementDate" ];
		045 $creditGroup = $responseParameters[ "response.creditGroup" ];
		046 $cardSchemeName = $responseParameters[ "response.cardSchemeName" ];	
		*/
		
		$delim = "\x1F";
		$summaryCode    = ""; //$loc_responseParameters[ "response.summaryCode" ];
		$responseCode   = ""; //$loc_responseParameters[ "response.responseCode" ];
		$description    = ""; //$loc_responseParameters[ "response.text" ];
		$receiptNo      = ""; //$loc_responseParameters[ "response.referenceNo" ];
		$settlementDate = ""; //$loc_responseParameters[ "response.settlementDate" ];
		$creditGroup    = ""; //$loc_responseParameters[ "response.creditGroup" ];
		$cardSchemeName = ""; //$loc_responseParameters[ "response.cardSchemeName" ];
		if ( array_key_exists( 'response.summaryCode', $loc_responseParameters ) ) {
			$summaryCode = $loc_responseParameters[ "response.summaryCode" ];
		}
		if ( array_key_exists( 'response.responseCode', $loc_responseParameters ) ) {
			$responseCode   = $loc_responseParameters[ "response.responseCode" ];
		}
		if ( array_key_exists( 'response.text', $loc_responseParameters ) ) {
			$description    = $loc_responseParameters[ "response.text" ];
		}
		if ( array_key_exists( 'response.referenceNo', $loc_responseParameters ) ) {
			$receiptNo      = $loc_responseParameters[ "response.referenceNo" ];
		}
		if ( array_key_exists( 'response.settlementDate', $loc_responseParameters ) ) {
			$settlementDate = $loc_responseParameters[ "response.settlementDate" ];
		}
		if ( array_key_exists( 'response.creditGroup', $loc_responseParameters ) ) {
			$creditGroup    = $loc_responseParameters[ "response.creditGroup" ];
		}
		if ( array_key_exists( 'response.cardSchemeName', $loc_responseParameters ) ) {
			$cardSchemeName = $loc_responseParameters[ "response.cardSchemeName" ];
		}
		
		
		$msg40="040=".$summaryCode.$delim;
		$msg41="041=".$responseCode.$delim;
		$msg42="042=".$description.$delim;
		$msg43="043=".$receiptNo.$delim;
		$msg44="044=".$settlementDate.$delim;
		$msg45="045=".$creditGroup.$delim;
		$msg46="046=".$cardSchemeName.$delim;

		$_origMV="";
		$sql = "SELECT * FROM sp_ej WHERE ej_card_orderno = '$_orderno'";
		$result = $this->__connection->query($sql);
		if ($result->num_rows == 1) {	
			$row = $result->fetch_assoc(); 
			$_origMV = $row["ej_multivalue"];
		}
		
		$_newMV = $_origMV.$msg40.$msg41.$msg42.$msg43.$msg44.$msg45.$msg46;
		
		$sql = "UPDATE sp_ej SET ej_status='$summaryCode', ej_multivalue='$_newMV' 
				WHERE ej_card_orderno= '$_orderno'";
		if ($this->__trace) echo "UPDATE sp_ej sql = >$sql< ";
		
		if ($this->__connection->query($sql) === FALSE) {    
            echo " Error in Updating EJ Record ". $this->__connection->error;
        }
	}
	
	public function getOrderNumber() 
	{	
		//TO-DO lock and unlock this table accordingly as this is being shared
		//$sql = "LOCK TABLES sp_ctrl WRITE";
		//$result = $this->__connection->query($sql);
		//if ($result==false) {
		//	echo " Error in LOCK TABLES " .$result->error;
		//}
		
		$_custrefno = 0;
		$sql = "SELECT * FROM sp_ctrl ";
		$result = $this->__connection->query($sql);
		if ($result) {
			if ($result->num_rows == 1) {		
				$row = $result->fetch_assoc(); 
				$_custrefno = $row['ctrl_custrefno'];
			}
		}
		else {
				echo " Error im reading control record " .$result->error;
		}
		if ( intval($_custrefno) > 0 ) {
			$_custrefno = intval($_custrefno) + intval(1);
			$sql = "UPDATE sp_ctrl SET ctrl_custrefno = '$_custrefno' ";
			if ($this->__trace) echo "update sp_ctrl sql = $sql ";
			$result = $this->__connection->query($sql);
			if ($result==false) {
				echo " Error im updating control record " .$result->error;
			}
		}
		
		//$sql = "UNLOCK TABLES";
		//$result = $this->__connection->query($sql);
		//if ($result==false) {
		//	echo " Error in UNLOCK TABLES " .$result->error;
		//}
		
		$_orderNo = str_pad($_custrefno, 6, '0', STR_PAD_LEFT);
		$_orderNo = "M".$_orderNo;
		if ($this->__trace) echo "reference number = $_orderNo ";
		return strval($_orderNo);
	}
	
}
