<?php 
	/* echo '<pre>';
	print_r($_SESSION);
	echo '<pre>';
	
	echo '<pre>';
	print_r($formInfo);
	echo '<pre>'; 
	
	
	*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Payment</title>


<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css"	rel="stylesheet">

<link href="<?php echo base_url();?>bootstrap/css/font-awesome.min.css"	rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/billing.css"	rel="stylesheet">
<style>
label{
	display:block;
	
}
span.error{
	color:red;
}

</style>

</head>
<body>

 	<div class="overlay" style="display:none"></div>
    <div class="white-box" style="display:none">
    	<h3>Please wait</h3>
    	<i class="fa fa-spinner fa-pulse fa-3x"></i>
 	</div>
	<div class="container " >
		<div class="row ">
			<h3 class="page-header" style="margin-left:5px">Payment Details <?php echo (@$_SESSION['user_email'] !=null)? '<i class="fa fa-lock logout" style="float:right; margin-right:5px"> Logout</i>': '';?></h3> <!-- OLD LOGOUT LINK  -->
			<!--  <h3 class="page-header">Payment Details <?php echo (@$_SESSION['user_email'] !=null)? '<button type="button" class="btn logout" style="float:right;background-color:#DDDDDD"> Logout</button>': '';?></h3> --> <!-- background-color:#DDDDDD" because iphone cant see background of class button btn  -->
			<div class="col-md-12 col-sm-12 col-xs-12">
			
				<img src="<?php echo base_url(). "bootstrap/img/Bank_Logo/Payments-Logo.jpg"?>" width="100%" height="100%">
			</div>
			 
			<form action="<?php echo $_SERVER['SCRIPT_NAME'].'/ecard#choice';?>" method="POST" class="form-horizontal" id="billing-form">
			<!-- <form action="https://staging.silverquest.com.au/tom/quicksteam/processCard.php" method="POST" class="form-horizontal" id="billing-form"> -->	
				<!-- First Name  -->
				<div class="form-group">
					<label for="firstname" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">First name</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="text" id="user_firstname" name="user_firstname" placeholder="First Name"
							class="form-control input-lg required firstname"  maxlength="50" value="<?php if(isset($formInfo['0']['user_firstname'])) echo $formInfo['0']['user_firstname']?>"
						<?php if(isset($formInfo['0']['user_firstname']))echo 'disabled';?>/>
					</div>
				</div>
				
				
				<?php 
					// IF user logged in, also submit user_fistname, lastname, email
					if(isset($formInfo['0']['user_firstname'])){
					echo '<input type="hidden" name="user_firstname" value="'.$formInfo['0']['user_firstname'].'"
						/>';
					}
				?>
				
				
				<!-- Last Name  -->
				<div class="form-group">
					<label for="lastname" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">Last Name</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="text" id="user_lastname" name="user_lastname" placeholder="Last Name"
							class="form-control input-lg required lastname"  maxlength="50" value="<?php if(isset($formInfo['0']['user_lastname']))echo $formInfo['0']['user_lastname']?>"
							<?php if(isset($formInfo['0']['user_lastname']))echo 'disabled';?>/>
					</div>
				</div>
				
				
				<?php 
				// IF user logged in, also submit user_fistname, lastname, email
					if(isset($formInfo['0']['user_lastname'])){
					echo '<input type="hidden" name="user_lastname" value="'.$formInfo['0']['user_lastname'].'"
						/>';
					}
				?>
				
				<!-- Email  -->
				<div class="form-group">
					<label for="email" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">Email</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="email" id="email" name="user_email" placeholder="Email"
							class="form-control input-lg required" value="<?php if(isset($_SESSION['user_email']))echo @$_SESSION['user_email'];?>"
							<?php if(isset($_SESSION['user_email']))echo 'disabled';?>/>
					</div>
				</div>
				
				<?php 
				// IF user logged in, also submit user_fistname, lastname, email
					if(isset($_SESSION['user_email'])){
					echo '<input type="hidden" name="user_email" value="'.$_SESSION['user_email'].'"
						/>';
					}
				?>
								
				<!-- Card Holder Name  -->
				<div class="form-group">
					<label for="" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">Cardholder's Name</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="text" id="" name="holder_name" placeholder="Name on card"
							class="form-control input-lg required holder"  maxlength="50" value=""/>
					</div>
				</div>
				
				<!-- Credit Card number  -->
				<div class="form-group">
					<label for="card_num" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >
						Credit Card Number
						<img src="<?php echo base_url().'/bootstrap/img/Header_Footer/securepaymenticons.jpg'?>" style="width: 45%; float: right;">
					</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="number" value="" name="cardNumber" placeholder="Credit Card Number"
							class="form-control input-lg number required" minlength="15" maxlength="20"/>
					</div>
				</div>
								
				<!-- Month, Year Expiry  -->
				<div class="form-group">
					<label for="month" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Card Expiry</label>
					
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 ">
						
						<div class="col-md-1 col-sm-1 col-xs-2">
							
							<select name="cardExpiryMonth" class="form-control " required="required" style="width: 50px;padding: 0px 0px;">
								
								
								<?php $month=''; for($i=1;$i<=12; $i++){
									if($i<=9){
										$month .= '<option value="0'.$i.'">0'.$i.'</option>';
									}else{
										$month .= '<option value="'.$i.'">'.$i.'</option>';
										}
								}
									echo $month;
								?>																			
							</select> 
							
						</div>
						<div class="col-md-1 col-sm-1 col-xs-2" style="text-align:center;"><label style="font-size:20px;">/</label></div>
						
						<div class="col-md-1 col-sm-2 col-xs-2 style="margin-left:0px;"">
							<select name="cardExpiryYear" class="form-control" required="required" style="width: 71px;padding: 0px 0px;">
								
								<?php $year='';for($i=15;$i<=25; $i++){
									$year .= '<option value="'.$i.'">'.$i.'</option>';
								}
									echo $year;
								?>	
								<!-- <option value="09">test </option> -->																		
							</select>
						</div>
					</div>
					
				</div>
				
				<!-- Security code  -->	
				<div class="form-group">
					<label for="s_code" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Security code</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="text" value="" name="cardVerificationNumber" placeholder=""
							class="form-control input-lg number required" minlength="3" maxlength="4" />
					</div>
				</div>
				
				
				<div class="form-group" >
					<!-- <input type="button" id="submit-register" value="Register"> -->
					<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="submit" class="btn btn-block btn-info btn-lg" id="submit-bill" value="Proceed" style="background-color: #6BB9C5; color: white;">
						
					</p>
					<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<a href="<?php echo $_SERVER['SCRIPT_NAME'].'/cart' ?>"><input type="button"
							class="btn btn-block btn-lg" value="Cancel" style="background-color: #A3A5AB;
	color: white;"></a>
					</p>

				</div>
				<input type="hidden" name="token" value="<?php echo time()?>" />
				<input type="hidden" name="orderAmount" value="<?php echo @$_SESSION['subTotal'];?>" /> <!-- Total Donation Amount that will submit to system  -->
			</form>
		</div>
	</div>     
    



<?php

/*  echo '<pre>';
 print_r($_POST);
 echo '<pre>';
 
 echo '<pre>';
 print_r($_SESSION);
 echo '<pre>'; */

?>
<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/jquery.validate.min.js"></script>		<!-- jquery.validate.min.js is for validate form with jquery   -->
<script src="<?php echo base_url();?>bootstrap/js/messages_vi.js"></script>				<!-- messages_vi.js go together with jquery.validate.min.js to display error message -->

<script src="<?php echo base_url();?>bootstrap/js/billing.js"></script>	

</body>
</html>