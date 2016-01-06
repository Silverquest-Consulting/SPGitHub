<?php 
	/* echo "<pre>";
		print_r($cat);
	echo '</pre>'; */
	/*echo "<pre>";
	 print_r($_SESSION);
	echo '</pre>'; */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" itemprop="thumbnailUrl" content="https://giftcatalogue.samaritanspurse.org.au/meta-icon.png" />
	<title>Home</title>
	
	
	<!-- <link href='http://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'> -->

	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>bootstrap/css/home.css" rel="stylesheet">
	<link href="<?php echo base_url();?>bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>bootstrap/css/animate.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url();?>apple-touch-icon.png" type="image/jpeg/png"/>
	
	
	<link rel="apple-touch-icon" href="<?php echo base_url();?>apple-touch-icon.png" type="image/jpeg/png"/>
    
</head>
<body>
<body>
	
	<div class="container-fluid navbar-fixed-top">
		<div class="row">
			<!-- <div class="col-md-12 col-sm-12 logo">Samaritans' Purse <span>International Relef Australia </span></div> -->
			<div class="col-md-12 col-sm-12 logo"></div>
			<div class="col-md-12 col-sm-12 title">
				<div class="col-md-12 col-sm-12" style="height:8px;background-color:#fff"></div>
				<img src="<?php echo base_url(). 'bootstrap/img/Header/Australian-Gift-Cat.jpg'?>" >
							<a style="display:none" href="<?php echo $_SERVER['SCRIPT_NAME'].'/cart'?>"><i class="fa fa-shopping-cart" ></i>
				<span style="display:none" id="totalItem"><?php if(isset($_SESSION['totalItem'])){echo $_SESSION['totalItem'];}?></span>
				</a>
				
			</div>
		</div>
	</div>
	
	<div class="container myrow">
		<div class="row">
			<?php 
				$html='';
				foreach($cat as $key => $val){
					$html.= '<div catid="'.$val['id'].'" class="col-md-6 col-sm-6 col-xs-6 icon text-center wow fadeInDown change_icon">
								
									<img class="gone" src="'.base_url(). "bootstrap/img/icons/". $val['picture_color'].'">
									<img style="display:none" src="'.base_url(). "bootstrap/img/icons/". $val['picture'].'">
								
								
							
							</div>'
					; 
				}
				
				echo $html;
			?>
			
		</div>
			
	</div>
	
	<!--  <div class="container ">
		
		<div class="row" style="">
			 <div class="col-md-12 col-sm-12 col-xs-12 sq-footer">
				<img src="<?php //echo base_url().'bootstrap/img/Footer/SilverQuest_Footer1.jpg'?>" >
			</div> 
		</div>
	</div>
	-->
	
<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>	
<script src="<?php echo base_url();?>bootstrap/js/wow.js" type="text/javascript"></script>
<script>
   new WOW().init();
 </script>
<script src="<?php echo base_url();?>bootstrap/js/home.js"></script>
</body>
</html>