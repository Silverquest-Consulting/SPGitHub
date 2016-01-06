<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
  <title>Credit Card Test Page</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <link href="style.css" rel="stylesheet" type="text/css">
</head>


<body BGCOLOR="white">
  <form id="creditCardForm" name="creditCardForm" method="POST" action="processCard.php"> <!-- action="processCard.php" -->
    <table border="0" width="600">
      <tr>
        <td colspan="2" class="listHeading">Payment Amount</td>
      </tr>
      <tr>
        <td width="180" class="formItem">Amount (dollars):</td>
        <td>
          <input type="text" name="orderAmount" class="grey" value="1.00" maxlength="15" size="15" ID="Text2"/>
        </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>

      <tr>
        <td colspan="2" class="listHeading">Card Details</td>
      </tr>
      <tr>
        <td width="180" class="formItem">Card Number:</td>
        <td>
          <input type="text" name="cardNumber" class="grey" value="4564710000000004" maxlength="20" size="20"/>
        </td>
      </tr>
      <tr>
        <td width="180" class="formItem">Card Verification Number:</td>
        <td>
          <input type="text" name="cardVerificationNumber" class="grey" value="847" maxlength="4" size="4"/>
        </td>
      </tr>
      <tr>
        <td width="180" class="formItem">Card Expiry (mm/yy):</td>
        <td>
          <input type="text" name="cardExpiryMonth" class="grey" value="02" maxlength="2" size="3"/> /
          <input type="text" name="cardExpiryYear" class="grey" value="09" maxlength="2" size="3"/>
        </td>
      </tr>

      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table>

    <input type="submit" name="Submit" value="Process Capture">
  </form>
<?php
	 echo '<pre>';
     print_r($_POST);
     echo '<pre>';
		

?>
</body>
</html>
