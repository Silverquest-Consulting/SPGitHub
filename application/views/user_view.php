<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Login</title>


<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css"	rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/user_view.css"	rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/animate.css"	rel="stylesheet">

<style>
label{
	display:block;
	
}
span.error{
	color:red;
}
span.success{
	color:green;
}

</style>

</head>
<body>

<div class="container-fluid navbar-top">
		<div class="row">
		
			<div class="col-md-12 col-sm-12 logo"></div>
			
			
		</div>
	</div>

<div class="form-group" style="margin-top: 12px">
	<p class="col-md-3 col-md-offset-2   col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
		<a href="<?php echo $_SERVER['SCRIPT_NAME'].'/billing' ?>">
			<button id="btn-guest" name="" class="btn btn-block btn-info btn-lg" style="background-color: #6BB9C5; color: white;">Guest Checkout</button>
		</a>
	</p>

</div>
	
<section id="login">
	<div class="container " >
		<div class="row ">
			<h3 class="page-header" style="margin-left: 29px;font-size:21px">Login</h3>
			<form action="#" method="POST" class="form-horizontal" id="login-form">
				
				<!-- User Name  -->
				<div class="form-group">
					<label for="username" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >User Email</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input  name="username" placeholder="Your Email"
							class="form-control input-lg email required"  />
					</div>
				</div>
				
				<!-- Password  -->
				<div class="form-group">
					<label for="password" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">Password</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="password" name="password" placeholder="Your Password"
							class="form-control input-lg required" maxlength="10" />
					</div>
				</div>
				
				<div class="form-group">
					<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<button id="submit-login" name="submit-login"
							class="btn btn-block btn-info btn-lg" style="background-color: #6BB9C5; color: white;">Login</button>
					</p>
					

				</div>
			</form>
			<div class="form-group">
				<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<label class="checkbox pull-left">
                    	<input type="checkbox" value="1" id="remember-me" name="remember-me"> Remember me
                	</label>
                	
               </p>
               
                             
               <p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<label class="checkbox pull-left">
                    	 <a href="" id="forgot_link" alt="Forgot your password?">Forgot your password?</a>
                	</label>
                	
               </p>
         	</div>
         	
				<div class="form-group" id="resetPw" style="display:none">
					<form id="email">
						<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
							<input type="email" name="forgotP" placeholder="Your email"
								class="form-control input-lg email required"  />
						</div>
						
						<p id="resetPw1" class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" ">
							<button style="color:white; background-color:#A3A5AB; margin-top:10px "id="" name="submit-login" class="btn btn-block btn-lg">Reset my password</button>
						</p>
					</form>
				</div>	
				
				
            
		</div>
	</div>
</section>

<!-- SIGN UP AND GUEST CHECKOUT -->

<div class="form-group">
	<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
		<button id="signup" name="" class="btn btn-block btn-info btn-lg" style="background-color: #6BB9C5; color: white;">Register</button>
	</p>

</div>





<div class="form-group">
					
					<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<a href="<?php echo $_SERVER['SCRIPT_NAME'].'/cart' ?>">
							<button type="button" id="cancel" name="submit-login"
							class="btn btn-block btn-lg" style="background-color: #A3A5AB !important;
	color: white !important;">Cancel</button>
						</a>
						
					</p>

				</div>


<div class="form-group" id="guest" style="display:none">
	<label for="guest" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Guest Checkout</label>				
	<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
			<input type="email" name="guest" placeholder="Email Address"
							class="form-control input-lg required"  />
	</div>
					
	<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
			<button style="color:white; background-color:#F6982E; margin-top:10px "id="" name="submit-login" class="btn btn-block btn-lg">Checkout as a Guest</button>
	</p>
	
	<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
			<a href="<?php echo $_SERVER['SCRIPT_NAME'].'/cart' ?>"><button style="color:white; background-color:#39B3D7; margin-top:10px "id="" name="cancel" class="btn btn-block btn-lg">Cancel</button></a>
	</p>
	
	
	<!-- #39B3D7  -->
</div>	


	
<section id="register" style="display:none">
	<div class="container " >
		<div class="row ">
			<h3 class="page-header" style="margin-left:5px">Registration Form</h3>
			<form action="<?php echo $_SERVER['SCRIPT_NAME'].'/user/register_user' ?>" method="POST" class="form-horizontal" id="register-form">
				
				<!-- First Name  -->
				<div class="form-group">
					<label for="firstname" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">First name</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="text" name="register[user_firstname]" placeholder="First Name"
							class="form-control input-lg required firstname"  maxlength="50"/>
					</div>
				</div>
				
				<!-- Last Name  -->
				<div class="form-group">
					<label for="lastname" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">Last Name</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="text" name="register[user_lastname]" placeholder="Last Name"
							class="form-control input-lg required lastname"  maxlength="50"/>
					</div>
				</div>
				
				<!-- Email  -->
				<div class="form-group">
					<label for="email" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">Email</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="email" id="email" name="register[user_email]" placeholder="Email"
							class="form-control input-lg required"  />
					</div>
				</div>
				
				<!-- Contact Phone  -->
				<div class="form-group">
					<label for="phone" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Contact Phone (Optional)</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="number" name="register[user_phone]" placeholder="Contact Phone"
							class="form-control input-lg number" minlength="8" maxlength="15"/>
					</div>
				</div>
				
				<!-- Country  -->
				<div class="form-group">
					<label for="country" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Country</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<select name="register[user_country]" class="form-control input-lg" disabled>
						
							<!-- <option value="">Please choose a country</option> -->
							<option value="au">Australia</option>						
						</select>
						<input type="hidden" name="register[user_country]" value="au"> <!-- Temporary value 'au' for Australia  -->
					</div>
				</div>

				<!-- Address 1  -->			
				<div class="form-group">
					<label for="Address 1" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Address 1</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="text" name="register[user_address1]" placeholder="Address 1"
							class="form-control input-lg" required="required" maxlength="50" />
					</div>
				</div>
				
				<!-- Address 2  -->	
				<div class="form-group">
					<label for="Address 2" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Address 2</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="text" name="register[user_address2]" placeholder="Address 2"
							class="form-control input-lg" maxlength="50"/>
					</div>
				</div>
				
				<!-- Suburb  -->	
				<div class="form-group">
					<label for="Suburb" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Suburb</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="text" name="register[user_suburb]" placeholder="Suburb"
							class="form-control input-lg required suburb" maxlength="50"/>
					</div>
				</div>
				
				<!-- Postcode  -->	
				<div class="form-group">
					<label for="Postcode" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Postcode</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="number" name="register[user_postcode]" placeholder="Postcode"
							class="form-control input-lg number required" minlength="4" maxlength="4" />
					</div>
				</div>
				
				<!-- State  -->
				<div class="form-group">
					<label for="State" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >State</label>
					
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<select name="register[user_state]" class="form-control input-lg" required="required" >
						
							<option value="">Please choose a state</option>
							<option value="ACT">ACT</option>
							<option value="NSW">NSW</option>
							<option value="NT">NT</option>
							<option value="QLD">QLD</option>
							<option value="SA">SA</option>
							<option value="TAS">TAS</option>
							<option value="VIC">VIC</option>
							<option value="WA">WA</option>
													
						</select>
					</div>
				</div>
				
				<!-- Password  -->			
				<div class="form-group">
					<label for="Password" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Password</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="password" name="register[user_password]" id="password" placeholder="Password"
							class="form-control input-lg required password" />
					</div>
				</div>
				
				<!-- Confirm Password  -->			
				<div class="form-group">
					<label for="Confirm Password" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Confirm Password</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"
							class="form-control input-lg required cpassword" />
					</div>
				</div> 
				
				
				<div class="form-group" >
					
					<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="button" class="btn btn-block btn-info btn-lg" id="submit-register" value="Register" style="background-color: #6BB9C5; color: white;">
						
					</p>
					<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<a href="<?php echo $_SERVER['SCRIPT_NAME'].'/cart' ?>"><input type="button"
							class="btn btn-block  btn-lg" value="Cancel" style="background-color: #A3A5AB;
	color: white;"></a>
					</p>

				</div>
				<input type="hidden" name="token" value="<?php echo time()?>" />
				<!--  <input type="hidden" name="register[user_date_created]" value="<?php //echo date("Y-m-d H:m:s",time())?>" />-->
			</form>
		</div>
	</div>     
</section>     

<div class="container-fluid" style=""></div>

 <footer class="navbar-fixed-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 footer center-center">
					<div class="col-md-4 col-sm-4 col-xs-4 back">
						<img class="f-wd" src="<?php echo base_url(). 'bootstrap/img/Footer/Arrow_2.jpg'?>" >
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 home">
						<a href="<?php echo $_SERVER['SCRIPT_NAME'];?>"><img class="f-wd" src="<?php echo base_url(). 'bootstrap/img/Footer/Home_1.jpg'?>" ></a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 cart">
						<img class="f-wd" id="submit" src="<?php echo base_url(). 'bootstrap/img/Footer/Cart_1.jpg'?>" >
						
					</div>
				</div>
			</div>
		</div>
	</footer>

<?php

 /* echo '<pre>';
 print_r($_POST);
 echo '<pre>'; */

?>
<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/jquery.validate.min.js"></script>		<!-- jquery.validate.min.js is for validate form with jquery   -->
<script src="<?php echo base_url();?>bootstrap/js/messages_vi.js"></script>				<!-- messages_vi.js go together with jquery.validate.min.js to display error message -->
<!--  <script src="<?php //echo base_url();?>bootstrap/js/bootbox.min.js"></script>	-->			<!-- bootbox.min.js is the library to display pop-up with options  -->	
<!--  <script src="<?php //echo base_url();?>bootstrap/js/bb-dialog-v4.x.js"></script>	-->		<!--  bb-dialog-v4.x.js go together with bootbox.min.js, we use it in user_view.php for redirect -->


<script src="<?php echo base_url();?>bootstrap/js/user.js"></script>	

</body>
</html>