<?php /* echo '<pre>';
print_r($_SESSION);
echo '<pre>'; */?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gift Card</title>


<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css"	rel="stylesheet">

<link href="<?php echo base_url();?>bootstrap/css/font-awesome.min.css"	rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/gift.css"	rel="stylesheet">


<style>

span.error{
	color:red;
}

</style>
</head>

<body>

	

	<div class="row t">
			<div class="col-md-12 col-sm-12 col-xs-12 logo-p2"></div>
	</div>
	<div class="row e">
		<p>You have selected an ecard. An email with your gift and message will be sent to your loved ones inbox.</p>
		
		
	</div>


	<div class="container f">
		
		<div class="col-md-12 col-xs-12">
			<div class="col-md-5 col-xs-5" style="text-align: center">
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<label  for="recipient-name" class="distance">Chrismas eCard</label>
				</div>
				<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1" style="height:100px;border:1px solid;background-color:pink; margin-bottom:7px">
					<img src="<?php echo base_url().'bootstrap/img/Xmas_sm_cl.jpg'?>" width="100%" height="100%"/>
				</div>
			
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<label  for="recipient-name" class="distance">All Occasions</label>
				</div>
				<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1" style="height:100px;border:1px solid"></div>
			
			</div>
			<div class="col-md-7 col-sm-6 col-xs-6">
				<form method="POST" id="message-form">
					<div class="form-group">
						<label for="recipient-name" class="distance">Recipient name</label>
						<input type="text" class="form-control required" name="recipient-name" required="required"/>
						
						<label for="recipient-email" class="distance">Recipient email</label>
						<input type="email" class="form-control required" name="recipient-email" required="required">
						
						<label for="recipient-message" class="distance">Your message</label>
						<textarea class="form-control required" rows="4" name="recipient-message" maxlength="200" wrap="soft"></textarea>
						
						
						<button type="button" class="btn btn-success distance" id="done">Done</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="row xmas" style="display:none">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<img src="<?php echo base_url()."/bootstrap/img/Xmas.jpg"?>" width="100%"  />
		</div>
	</div>
	
	<div class="row gift" style="display:none">
			
					<?php 
					unset($_SESSION['user_shopping']['subTotal']);
						$t = array();
				    	foreach($_SESSION['user_shopping'] as $key => $val){
				    		
				    		foreach($val as $key1 => $val1){
				    			if ($key1 == 'gift_pic_1' || $key1 == 'gift_pic_2' || $key1 == 'gift_pic_3'){
				    				$t['gift_pic_1'][] = $val1;
				    			}
				    		}
				    	}
				    	/* echo '<pre>';
				    	print_r($t);
				    	echo '<pre>'; */
						/*echo '<img src="'.base_url().'"/bootstrap/img/Gift_img/'.$t['gift_pic_1']['0'].'" width="100%"  />'; */
					?>
										
				<div class="col-md-4 col-sm-4 col-xs-4">
					<?php 
					if(isset($t['gift_pic_1']['0'])){
					?>			
					
						<img src="<?php echo base_url().'bootstrap/img/Gift_img/'.$t['gift_pic_1']['0']?>" width="100%"  />
					<?php }?>
				</div>	
				
				<div class="col-md-4 col-sm-4 col-xs-4">
					<?php 
					if(isset($t['gift_pic_1']['1'])){
					?>			
					
						<img src="<?php echo base_url().'bootstrap/img/Gift_img/'.$t['gift_pic_1']['1']?>" width="100%"  />
					<?php }?>
				</div>
				
				<div class="col-md-4 col-sm-4 col-xs-4">	
					<?php 
					if(isset($t['gift_pic_1']['2'])){
					?>			
					
						<img src="<?php echo base_url().'bootstrap/img/Gift_img/'.$t['gift_pic_1']['2']?>" width="100%"  />
					<?php }?>
				</div>	
			
		</div>
	
	
	<footer class="navbar-fixed-bottom a">
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
	
	<!-- <div class="container">
		<h2 class="thanks">Thank You!</h2>
		<p>You have selected an ecard. An email with your gift and message will be sent to your loved ones index</p>
		<form action="#" method="POST" >
			<div class="form-group">
				<label for="recipient-name" class="distance">Recipient name</label>
				<input type="text" class="form-control" name="recipient-name" required="required"/>
				
				<label for="recipient-email" class="distance">Recipient email</label>
				<input type="email" class="form-control" name="recipient-email" required="required">
				
				<label for="recipient-message" class="distance">Your message</label>
				<textarea class="form-control" rows="5" name="recipient-message"></textarea>
				
				<button type="submit" class="btn btn-success distance">Done</button>
			</div>
		</form>
	</div> -->
<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/jquery.validate.min.js"></script>		<!-- jquery.validate.min.js is for validate form with jquery   -->
<script src="<?php echo base_url();?>bootstrap/js/messages_vi.js"></script>				<!-- messages_vi.js go together with jquery.validate.min.js to display error message -->
<script src="<?php echo base_url();?>bootstrap/js/gift.js"></script>	
	
</body>
</html>