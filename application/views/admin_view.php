<?php 
	/* echo "<pre>";
		print_r($user_data);
	echo '</pre>'; */

	/* echo "<pre>";
	 print_r($_SESSION);
	echo '</pre>'; */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	
	
	<!-- <link href='http://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'> -->

	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
	
	<link rel="shortcut icon" href="<?php echo base_url();?>apple-touch-icon.png" type="image/jpeg/png"/>
	
	
	<link rel="apple-touch-icon" href="<?php echo base_url();?>apple-touch-icon.png" type="image/jpeg/png"/>
<style>
.error{
	color:red;
}	
</style>   
</head>


<body>
	<?php if(!isset($_SESSION['admin'])){?>
	<section >
	
		<div class="container " >
			<div class="row ">
				<h3 class="page-header" style="margin-left: 29px;font-size:21px">Admin Login</h3>
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
							<button id="login" name="finance" type="button"
								class="btn btn-block btn-info btn-lg" style="text-transform:uppercase;background-color: #6BB9C5; color: white;">Login
							
							</button>
						</p>
						
	
					</div>
				</form>
	            
			</div>
		</div>
	</section>
<?php } else{?>
				<br><br>
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
									<button id="people" name="people" type="button"
										class="btn btn-block btn-info btn-lg" style="text-transform:uppercase;background-color: #6BB9C5; color: white;">People
									
									</button>
							</div>
						</div>
						
							<div class="col-xs-4 "></div>
						
						<div class="col-xs-4 ">
							<div class="form-group">
								<button id="finance" name="finance" type="button"
									class="btn btn-block btn-info btn-lg" style="text-transform:uppercase;background-color: #6BB9C5; color: white;">Finance
								
								</button>
							</div>
						</div>
					</div>
				</div>
<?php }?>
	
<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>	
<script src="<?php echo base_url();?>bootstrap/js/jquery.validate.min.js"></script>		<!-- jquery.validate.min.js is for validate form with jquery   -->
<script src="<?php echo base_url();?>bootstrap/js/messages_vi.js"></script>			


<script type="text/javascript">
$(document).ready(function(){	

	$("#login-form").validate({
        errorElement: "span", // Định dạng cho thẻ HTML hiện thông báo lỗi
        
    });
    
	$("#login").click(function(e) {
		 if($("#login-form").valid()){
		
			
			//var info= $(".lookup :input[name='info']").val();
			//var checked = $(".lookup :radio[name='engine']:checked").val();
			
			$.ajax({
				url: "admin/checkAdmin",
				type: "POST",
				data: $("#login-form").serialize(),
				
				/*beforeSend	: function(){
					$(".overlay, .white-box").css("display","block");
					
					
				},	*/	
				error: function(jqXHR, status, errorThrown){
						alert(errorThrown);
						//$(".overlay, .white-box").css("display","none");
						return false;
						}
				}).done(function(data){
				if(data == 1){
					location.reload(true);
				}else{
						$("#login").next().remove('span');
						$("#login").after('<span style="color:red;">Login Fail</span>')	;
					}
				
			});
		 }
	});

	
	$("#people").click(function(e) {
		
		 location="admin/people";
	});

	$("#finance").click(function(e) {
		
		 location="admin/finance";
	});
});
</script>
</body>
</html>