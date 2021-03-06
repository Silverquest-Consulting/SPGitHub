<?php include 'Qvalent_CardsAPI.php' ?>
<?php
	echo "in proceeTestCard.php <br> ";
    $initParams = array();
    $initParams[ "url" ] = "https://ccapi.client.support.qvalent.com/post/CreditCardAPIReceiver";
    $initParams[ "certificateFile" ] = "/etc/pki/tls/certs/SAMAR_2112002.pem";
    $initParams[ "caFile" ] = "/etc/pki/tls/certs/cacerts.crt";
    $initParams[ "logDirectory" ] = "/var/www/vhosts/sp/hdocs/marc/qvalent/";
    $cardsAPI = new Qvalent_CardsAPI();
    $cardsAPI->initialise( $initParams );

    //----------------------------------------------------------------------------
    // Get request information
    //----------------------------------------------------------------------------
    $orderECI               = "SSL";
    $orderType              = "capture";

    $cardNumber             = $_POST[ "cardNumber" ];
	$cardHolderName         = $_POST[ "cardName" ]; // added
    $cardVerificationNumber = $_POST[ "cardVerificationNumber" ];
    $cardExpiryYear         = $_POST[ "cardExpiryYear" ];
    $cardExpiryMonth        = $_POST[ "cardExpiryMonth" ];

    $cardCurrency           = "AUD";
    $orderAmountCents       = number_format( (float)$_POST[ "orderAmount" ] * 100, 0, '.', '' );

    $customerUsername       = "SAMARTESTENV";
    $customerPassword       = "1QUICK3GTSTSAM";
    $customerMerchant       = "SAMARAPIAU";

    // Note: you must supply a unique order number for each transaction request.
    // We recommend that you store each transaction request in your database and
    // that the order number is the primary key for the transaction record in that
    // database.
    $orderNumber            = "1509240001";

    //----------------------------------------------------------------------------
    // Process credit card request
    //----------------------------------------------------------------------------
    $requestParameters = array();
    $requestParameters[ "order.type" ] = $orderType;
    $requestParameters[ "customer.username" ] = $customerUsername;
    $requestParameters[ "customer.password" ] = $customerPassword;
    $requestParameters[ "customer.merchant" ] = $customerMerchant;
    $requestParameters[ "customer.orderNumber" ] = $orderNumber;
    $requestParameters[ "customer.captureOrderNumber" ] = $orderNumber;
	$requestParameters[ "customer.customerReferenceNumber" ] = "Test123"; //md-added: test Only
    $requestParameters[ "card.PAN" ] = $cardNumber;
    $requestParameters[ "card.CVN" ] = $cardVerificationNumber;
    $requestParameters[ "card.expiryYear" ] = $cardExpiryYear;
    $requestParameters[ "card.expiryMonth" ] = $cardExpiryMonth;
    $requestParameters[ "card.currency" ] = $cardCurrency;	
	$requestParameters[ "card.cardHolderName" ] = $cardHolderName; // added
    $requestParameters[ "order.amount" ] = $orderAmountCents;
    $requestParameters[ "order.ECI" ] = $orderECI;

    $responseParameters = $cardsAPI->processCreditCard( $requestParameters );

    // Get the required parameters from the response
    $summaryCode = $responseParameters[ "response.summaryCode" ];
    $responseCode = $responseParameters[ "response.responseCode" ];
    $description = $responseParameters[ "response.text" ];
    $receiptNo = $responseParameters[ "response.referenceNo" ];
    $settlementDate = $responseParameters[ "response.settlementDate" ];
    $creditGroup = $responseParameters[ "response.creditGroup" ];
    $cardSchemeName = $responseParameters[ "response.cardSchemeName" ];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
  <title>Credit Card Result</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <link href="style.css" rel="stylesheet" type="text/css">

</head>

<body BGCOLOR="white">
  <table border="0" width="600" ID="Table1">
    <tr>
      <td colspan="2" class="listHeading">Request</td>
    </tr>
    <tr>
      <td width="180" class="formItem">Card Number:</td>
      <td><?php echo $cardNumber?></td>
    </tr>
    <tr>
      <td width="180" class="formItem">Card Verification Number:</td>
      <td><?php echo $cardVerificationNumber?></td>
    </tr>
    <tr>
      <td width="180" class="formItem">Card Expiry Month:</td>
      <td><?php echo $cardExpiryMonth?></td>
    </tr>
    <tr>
      <td width="180" class="formItem">Card Expiry Year:</td>
      <td><?php echo $cardExpiryYear?></td>
    </tr>
    <tr>
      <td width="180" class="formItem">Order Amount (Cents):</td>
      <td><?php echo $orderAmountCents?></td>
    </tr>

    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td colspan="2" class="listHeading">Response</td>
    </tr>
    <tr>
      <td width="180" class="formItem">Summary Code:</td>
      <td><?php echo $summaryCode?></td>
    </tr>
    <tr>
      <td width="180" class="formItem">Response Code:</td>
      <td><?php echo $responseCode?></td>
    </tr>
    <tr>
      <td width="180" class="formItem">Description:</td>
      <td><?php echo $description?></td>
    </tr>
    <tr>
      <td width="180" class="formItem">Receipt Number:</td>
      <td><?php echo $receiptNo?></td>
    </tr>
    <tr>
      <td width="180" class="formItem">Settlement Date:</td>
      <td><?php echo $settlementDate?></td>
    </tr>
    <tr>
      <td width="180" class="formItem">Credit Group:</td>
      <td><?php echo $creditGroup?></td>
    </tr>
    <tr>
      <td width="180" class="formItem">Card Scheme Name:</td>
      <td><?php echo $cardSchemeName?></td>
    </tr>
  </table>

</body>
</html>
