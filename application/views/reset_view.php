<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reset Password</title>


<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css"	rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/user_view.css"	rel="stylesheet">


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
<?php //echo $url_email; // controller Reset send to view $url_email la gia tri ma hoa email tren url ?>

			
<!-- Close the Logo 

<div class="row t">
			<div class="col-md-12 col-sm-12 col-xs-12 logo-p2"></div>
</div> -->


<!-- SIGN UP AND GUEST CHECKOUT -->



	
<section id="register" style="display:block">
	<div class="container " >
		<div class="row ">
			<h3 class="page-header" style="margin-left:5px">Reset Password</h3>
			<form action="<?php //echo $_SERVER['SCRIPT_NAME'].'/user/register_user'; ?>" method="POST" class="form-horizontal" id="reset-form">
							
				
				<!-- Password  -->			
				<div class="form-group">
					<label for="Password" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >Password</label>
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="password" name="new_password" id="password" placeholder="Password"
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
				
				<input type="hidden" name="url_email" value ="<?php echo $url_email;?>"/>
				
				<div class="form-group" >
					
					<p class="col-md-3 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<input type="button" class="btn btn-block btn-info btn-lg" id="reset_email" value="Reset" style="background-color: #6BB9C5; color: white;">
						
					</p>
				

				</div>
				
			</form>
		</div>
	</div>     
</section>     



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