<?php
class Quickstream{
	public function __construct(){
		
		// This one STOP the program if credit card is wrong
		include 'quickstream/Qvalent_CardsAPI.php';
		include 'quickstream/SPTableService.php';
		
		
	}

	public function receipt($params){
		/* echo '<pre>';
		print_r($params);
		echo '<pre>'; */
		
		$initParams = array();
		$initParams[ "url" ] = "https://ccapi.client.qvalent.com/post/CreditCardAPIReceiver";
		$initParams[ "certificateFile" ] = "/etc/pki/tls/certs/SAMAR_2511203.pem";
		$initParams[ "caFile" ] = "/etc/pki/tls/certs/cacerts.crt";
		$initParams[ "logDirectory" ] = "/var/log/sp";
		$cardsAPI = new Qvalent_CardsAPI();
		$cardsAPI->initialise( $initParams );
		
		//----------------------------------------------------------------------------
		// Get request information
		//----------------------------------------------------------------------------
		$orderECI               = "SSL";
		$orderType              = "capture";
		
		$cardNumber             = $_POST[ "cardNumber" ];
		$cardVerificationNumber = $_POST[ "cardVerificationNumber" ];
		$cardExpiryYear         = $_POST[ "cardExpiryYear" ];
		$cardExpiryMonth        = $_POST[ "cardExpiryMonth" ];
		$cardHolderName         = $_POST[ "holder_name" ]; //required for Order and Report
		
		$cardCurrency           = "AUD";
		$orderAmountCents       = number_format( (float)$_POST[ "orderAmount" ] * 100, 0, '.', '' );
		
		$customerUsername       = "SAMARPROD";
		$customerPassword       = "Au5889cv7";
		$customerMerchant       = "SAMARAPIAU";
		
		// Note: you must supply a unique order number for each transaction request.
		// We recommend that you store each transaction request in your database and
		// that the order number is the primary key for the transaction record in that
		// database.
		//$orderNumber            = time();
		
		//----------------------------------------------------------------------------
		// Process credit card request
		//----------------------------------------------------------------------------
		$requestParameters = array();
		$requestParameters[ "order.type" ] = $orderType;
		$requestParameters[ "customer.username" ] = $customerUsername;
		$requestParameters[ "customer.password" ] = $customerPassword;
		$requestParameters[ "customer.merchant" ] = $customerMerchant;
		//$requestParameters[ "customer.orderNumber" ] = $orderNumber;
		//$requestParameters[ "customer.captureOrderNumber" ] = $orderNumber;
		$requestParameters[ "card.PAN" ] = $cardNumber;
		$requestParameters[ "card.CVN" ] = $cardVerificationNumber;
		$requestParameters[ "card.expiryYear" ] = $cardExpiryYear;
		$requestParameters[ "card.expiryMonth" ] = $cardExpiryMonth;
		$requestParameters[ "card.currency" ] = $cardCurrency;
		$requestParameters[ "card.cardHolderName" ] = $cardHolderName; //added for SP
		$requestParameters[ "order.amount" ] = $orderAmountCents;
		$requestParameters[ "order.ECI" ] = $orderECI;
		
		$spTable = new SPTableService();			// initialize SPTableService for EJ and Control Tables updates
		$spTable->connect_MySqli(); 				// connect mysql
		$orderNumber = $spTable->getOrderNumber(); 	// get unique OrderNumber from Control Table
		$requestParameters[ "customer.orderNumber" ] = $orderNumber;
		$requestParameters[ "customer.captureOrderNumber" ] = $orderNumber;
		
		// Store transaction in EJ in case we get a timeout or transaction response code ='2' or "Transaction Erred"
		// In that case, we need to call Qvalent to check if the account is debited then inform Samaritan Purse
		$spTable->store_EJ_CardPayment( $requestParameters );
		
		//echo " ordernumber = $orderNumber ";
		
		$responseParameters = $cardsAPI->processCreditCard( $requestParameters );
		
		$spTable->update_EJ_CardPayment( $requestParameters, $responseParameters ); // Update EJ Table
		$spTable->close_MySqli();	// close mysql connection
		
		// Get the required parameters from the response
		$summaryCode="";
		$responseCode=""; 
    		$description=""; 
    		$receiptNo="";
		$transactionDate=""; 
    		$settlementDate=""; 
    		$creditGroup=""; 
    		$cardSchemeName="";
	if ( array_key_exists( 'response.summaryCode', $responseParameters ) ) {
		$summaryCode = $responseParameters[ "response.summaryCode" ];
	}
	if ( array_key_exists( 'response.responseCode', $responseParameters ) ) {
		$responseCode = $responseParameters[ "response.responseCode" ];
	}
	if ( array_key_exists( 'response.text', $responseParameters ) ) {
		 $description = $responseParameters[ "response.text" ];
	}
	if ( array_key_exists( 'response.referenceNo', $responseParameters ) ) {
		  $receiptNo = $responseParameters[ "response.referenceNo" ];
	}
	if ( array_key_exists( 'response.transactionDate', $responseParameters ) ) {
		  $transactionDate = $responseParameters[ "response.transactionDate" ];
	}
	if ( array_key_exists( 'response.settlementDate', $responseParameters ) ) {
		  $settlementDate = $responseParameters[ "response.settlementDate" ];
	}
	if ( array_key_exists( 'response.creditGroup', $responseParameters ) ) {
		  $creditGroup = $responseParameters[ "response.creditGroup" ];
	}
	if ( array_key_exists( 'response.cardSchemeName', $responseParameters ) ) {
		 $cardSchemeName = $responseParameters[ "response.cardSchemeName" ];
	}  

	//echo $summaryCode ;
	$request = array();
	$request['Summary_Code'] = $summaryCode;
	$request['Response_Code'] = $responseCode;
	$request['Description'] = $description;
	$request['Receipt_Number'] = $receiptNo;	
	$request['Settlement_Date'] = $settlementDate;
	
	//MD : added next three lines for Order table
	$request['Transaction_Date'] = $transactionDate;
	$request['CardSchemeName']   = $cardSchemeName;
	$request['Order_Number']     = $orderNumber;
	$request['Currency'] 		 = $cardCurrency;
	$request['CardHolderName']   = $cardHolderName;
	//For Guest
	$request['GuestFirstName']   = $_POST[ "user_firstname" ];
	$request['GuestLastName']    = $_POST[ "user_lastname" ];
	$request['GuestEmail']       = $_POST[ "user_email" ];
    
	$request['POST']            = $_POST;

			
	echo json_encode($request);
		
	}
}
?>
