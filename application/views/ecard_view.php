<?php 
/* 	echo "<pre>";
		print_r($item);
	echo '</pre>';
	
	

	echo "<pre>";
		print_r($_SERVER['HTTP_REFERER']);
	echo '</pre>';
	
echo "<pre>";
print_r($_POST);
echo '</pre>';

echo '<pre>';
print_r($_SESSION);
echo '<pre>'; */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ecard</title>


<!-- <link href='http://fonts.googleapis.com/css?family=Lato|Open+Sans'
	rel='stylesheet' type='text/css'> -->

<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/ecard.css" rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>bootstrap/css/animate.css" rel="stylesheet">

</head>
<body>
<style>
	body{
		font-family:'Century Gothic', CenturyGothic, AppleGothic, sans-serif !important;
		font-size:16px;
		
		/* background-color: #DDDDDD */
		background-color: #EDEFF7;
}
	
</style>
	<div class="container-fluid navbar-top">
		<div class="row">
		
			<div class="col-md-12 col-sm-12 logo"></div>
			<div class="col-md-12 col-sm-12 jesus">
				<img src="<?php echo base_url(). 'bootstrap/img/jesus.png';?>" width="100%" >
			</div>
			
		</div>
	</div>
	
	<div class="container choice">
	
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<p style="text-align:left; margin-left:5px; margin-top: 9px">
					Thank you <strong><?php echo @$_POST['user_firstname']?> </strong> <br/> <br/>
					
					Your donation of  <strong>$<?php echo @$_SESSION['subTotal']?></strong> has been successfully processed and an email receipt will be sent to you shortly <br/>
				</p>
				<p style="text-align:center">	
					<img src="<?php echo base_url().'bootstrap/img/greentick.png'?>">
					 <br/>
				</p>
				
				<p id="choice" style="text-align:center;margin-top: 24px;"> Would you like to send an Ecard?	<br/>
				<em>(Maximum 3 gifts displayed)</em></br>
					<!-- <input type="radio" name="choice" value="no" /> No
					<input type="radio" name="choice" value="yes" /> Yes<br/>					
					<button type="button" name="go" class="btn btn-success"> Go</button>  -->
					
					<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2" >
						<button type="button" name="yes" class="btn btn-info" style="width: 60px; background-color: #6BB9C5; color: white;"> Yes</button> 
						<button type="button" name="no" class="btn btn-info" style="width: 60px; background-color: #6BB9C5; color: white;float: right"> No</button> 
					</div>
				</p>	
			
			</div>
			
		</div>		
		
	</div>
	
	<div class="container thank" style="display:none;clear:both">
		<div class="row" style="text-align:center">
			
			<p>	
				<img src="<?php echo base_url().'bootstrap/img/Gift_img/Gift_2.jpg'?>" width="100%"> <br/>
			</p>
			
			<!--  <p  style="margin-top: 85px; font-size: 22px; font-style: italic;">Thank you for your support</p>-->
			
			<img src="<?php echo base_url().'bootstrap/img/Thankyou.png'?>" width="100%"> <br/>
			
			<div class="col-md-8 col-md-offset-2 col-sm-11 col-xs-11 " style="margin-top: 30px">
						<a href="<?php echo $_SERVER['SCRIPT_NAME'];?>"><button type="button" name="keepgiving" class="btn btn-info" style="width: 132px; background-color: #6BB9C5; color: white;"> Keep giving</button></a> 
						<a href="<?php echo $_SERVER['SCRIPT_NAME'];?>"><button type="button" name="close" class="btn btn-info" style="width: 132px; background-color: #6BB9C5; color: white;float: right">Close</button></a> 
			</div>
			
			<!-- <a href="<?php echo base_url();	?>"> <button type="button" class="btn btn-success" style="background-color: #6BB9C5; color: white;">Done</button> </a> -->
		</div>	
		
	</div>
	
	
		<footer class="navbar-bottom">
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
							<img class="f-wd" id="submit" src="<?php echo base_url(). 'bootstrap/img/Footer/Cart_2.jpg'?>" >
							
						</div>
					</div>
				</div>
			</div>
		</footer>
	
<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/wow.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap/js/ecard.js" type="text/javascript"></script>
<script>
     new WOW().init();
     	     
</script>




</body>
</html>