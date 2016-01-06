<?php 
/*
	echo "<pre>";
		print_r($item);
	echo '</pre>';

	echo "<pre>";
	print_r($_POST);
	echo '</pre>'; 

	echo "<pre>";
		print_r($_SERVER['HTTP_REFERER']);
	echo '</pre>';
	
	echo '<pre>';
	print_r($_SESSION);
	echo '<pre>';*/
?>
<?php 
$selectArr =Array
(
		'0'=>'0',
		'1'=>'1',
		'2'=>'2',
		'3'=>'3',
		'4'=>'4',
		'5'=>'5',
		'6'=>'6',
		'7'=>'7',
		'8'=>'8',
		'9'=>'9',
		'10'=>'10'

);

$t = $item['0']['alias'];
/* echo "<pre>";
print_r($_SESSION);
echo '</pre>'; */


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <meta name="viewport" content="width=device-width, minimum=1.0, maximum=1.0, user-scalable=no"> --> <!-- Chong Auto ZOOM cua Selectbox tren iphone  -->
<title>Operation Chirsmas Child</title>


<!-- <link href='http://fonts.googleapis.com/css?family=Lato|Open+Sans'
	rel='stylesheet' type='text/css'> -->

<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/donation.css" rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>bootstrap/css/animate.css" rel="stylesheet">

</head>
<body>
	
	<div class="container-fluid navbar-top">
		<div class="row">
		
			<div class="col-md-12 col-sm-12 logo"></div>
			<div class="col-md-12 col-sm-12 jesus">
				<img src="<?php echo base_url(). 'bootstrap/img/jesus.png';?>" width="100%" >
			</div>
			
		</div>
	</div>
	
	<div class="container-fluid">
	<form action="<?php echo $_SERVER['SCRIPT_NAME'].'/cart' ?>" method="POST" name="chrismas" id="donation">
		<div class="row t">
			<!-- <div class="col-md-12 col-sm-12 col-xs-12 logo-p2"></div> -->
			<div class="col-md-12 col-sm-12 col-xs-12 cate-p2">
				
				<img src="<?php echo base_url(). 'bootstrap/img/Top_Banner/'.$item['0']['banner'];?>" width="100%" height="100%">
				<!--  
				<div class="col-md-5 col-sm-5 col-xs-5 pic pic1">
					<img src="<?php //echo base_url(). "bootstrap/img/" . $item['0']['banner']?>" width="135px" height="91px">
					
				</div>
				
				<div class="col-md-2 col-sm-2 col-xs-2 pic middle">
					<img src="<?php //echo base_url(). "bootstrap/img/" . $item['0']['picture']?>" >
				</div>
				
				<div class="col-md-5 col-sm-5 col-xs-5 pic pic2"><h3><?php //echo $item['0']['title'] ?></h3></div>
				
				-->
			</div>
		</div>



		<div class="row myitem">

			<div class="col-md-12 col-sm-12 col-xs-12 item item1">
				<!-- <i class="fa fa-chevron-right fa-3x" id="desc1"></i> -->
				<img id="desc1" src="<?php echo base_url(). 'bootstrap/img/Header_Footer/DownDropDownArrow.png'?>"  class="arrow-right">
				<h5><?php echo $item['0']['name'] ?></h5>
				
				<input type="hidden" name="item_name_1" value="<?php echo $item['0']['name'] ?>"/>
				<input type="hidden" name="gift_pic_1" value="<?php echo $item['0']['gift_pic'] ?>"/>
				<select class="form-control" name="item1_Qty" id="item1" data-price="<?php echo $item['0']['price'] ?>">
												
				<?php
					$html=''; 
					foreach($selectArr as $key => $val){
						 if($key == $_SESSION[$t]['item1_Qty']){
								
								$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
							}else{
								$html .= '<option value="'.$key.'">'.$val.'</option>';
								}
							
					}				
						
					echo $html;
				?>				

				</select>
				
				 <strong class="price">$<?php echo $item['0']['price'] ?></strong>
				 <input type="hidden" name="unit_price_1" value="<?php echo $item['0']['price'] ?>">
			</div>

			<!-- <div class="col-md-9 col-md-offset-2 col-sm-9 col-sm-offset-2 col-xs-9 col-xs-offset-2 desc1"> -->
			
			<div class="col-md-12 col-sm-12 col-xs-12 desc1">
				<p>
					<?php echo $item['0']['description']; ?>
					 <input type="hidden" name="gift_id_1" value="<?php echo $item['0']['gift_id'] ?>">
				</p>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 item item2">
				<!-- <i class="fa fa-chevron-right fa-3x" id="desc2"></i> -->
				<img id="desc2" src="<?php echo base_url(). 'bootstrap/img/Header_Footer/DownDropDownArrow.png'?>"  class="arrow-right">
				<h5><?php echo $item['1']['name'] ?></h5>
				
				<input type="hidden" name="item_name_2" value="<?php echo $item['1']['name'] ?>"/>
				<input type="hidden" name="gift_pic_2" value="<?php echo $item['1']['gift_pic'] ?>"/>
				<select class="form-control" name="item2_Qty" id="item2" data-price="<?php echo $item['1']['price'] ?>" >
				
					<?php
					$html=''; 
					foreach($selectArr as $key => $val){
						
							if($key == $_SESSION[$t]['item2_Qty']){
								
								$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
							}else{
								$html .= '<option value="'.$key.'">'.$val.'</option>';
								}
							
					}				
						
					echo $html;
				?>				

				</select>
				<strong class="price">$<?php echo $item['1']['price'] ?></strong>
				<input type="hidden" name="unit_price_2" value="<?php echo $item['1']['price'] ?>">
			</div>

			<!-- <div class="col-md-9 col-md-offset-2 col-sm-9 col-sm-offset-2 col-xs-9 col-xs-offset-2 desc2"> -->
			<div class="col-md-12 col-sm-12 col-xs-12 desc2">
				<p>
					<?php echo $item['1']['description'] ?>
					<input type="hidden" name="gift_id_2" value="<?php echo $item['1']['gift_id'] ?>">
				</p>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 item item3">
				<!-- <i class="fa fa-chevron-right fa-3x" id="desc3"></i>  -->
				<img id="desc3" src="<?php echo base_url(). 'bootstrap/img/Header_Footer/DownDropDownArrow.png'?>"  class="arrow-right">
				<h5><?php echo $item['2']['name'] ?></h5> 
				
				<input type="hidden" name="item_name_3" value="<?php echo $item['2']['name'] ?>"/>
				<input type="hidden" name="gift_pic_3" value="<?php echo $item['2']['gift_pic'] ?>"/>
				
				<select class="form-control" name="item3_Qty" id="item3" data-price="<?php echo $item['2']['price'] ?>" >
				
					<?php
					$html=''; 
					foreach($selectArr as $key => $val){
						
							if($key == $_SESSION[$t]['item3_Qty']){
								
								$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
							}else{
								$html .= '<option value="'.$key.'">'.$val.'</option>';
								}
							
					}				
						
					echo $html;
				?>				

				</select>
				
				 <strong class="price">$<?php echo $item['2']['price'] ?></strong>
				 <input type="hidden" name="unit_price_3" value="<?php echo $item['2']['price'] ?>">
			</div>

			<!-- <div class="col-md-9 col-md-offset-2 col-sm-9 col-sm-offset-2 col-xs-9 col-xs-offset-2 desc3"> -->
			<div class="col-md-12 col-sm-12 col-xs-12 desc3">
				<p>
					<?php echo $item['2']['description']; ?>
					<input type="hidden" name="gift_id_3" value="<?php echo $item['2']['gift_id'] ?>">
				</p>
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12 item item4">
				<strong class="total">Total</strong>
				<p class="sum">
					<strong>$0</strong>
				</p>
				<?php if(@$_GET['catID'] == 2 || @$_GET['catID'] == 9 || @$_GET['catID'] == 10){
					echo '<em style="text-align: left; line-height: 90px">(These gifts are not tax deductible)</em>';	
				}
				?>
			</div>
			
			
		</div>
		
		<input type="hidden" name="name" value="<?php echo $item['0']['alias']; ?>"/>
		<input type="hidden" name="title" value="<?php echo $item['0']['title']; ?>"/>
		<input type="hidden" name="catID" value="<?php echo $_GET['catID'];?>"/>
		<input type="hidden" name="picture" value="<?php echo $item['0']['icon']; ?>"/>
		<input type="hidden" name="totalItem" id="totalItem" value="0">
		
	 </form>	
	</div>

	<!-- <div class="col-md-12 col-sm-12 col-xs-12 block-empty"></div> -->
	
	
	
	<!-- <footer class="navbar-fixed-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 footer center-center">
					<div class="col-md-4 col-sm-4 col-xs-4 back">
						<i class="fa fa-arrow-left grey"></i>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 home">
						<a href="<?php //echo $_SERVER['SCRIPT_NAME'];?>"><i class="fa fa-home"></i></a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 cart">
						<i class="fa fa-shopping-cart" id="submit"></i>
					</div>
				</div>
			</div>
		</div>
	</footer>-->
	 

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

<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/wow.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap/js/donation.js" type="text/javascript"></script>
<script>
     new WOW().init();
     	     
</script>




</body>
</html>