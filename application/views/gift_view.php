<?php /* echo '<pre>';
print_r($_SESSION);
echo '<pre>'; */



?>
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
	display:block;
}

</style>
</head>

<body>
<div class="overlay" style="display:none"></div>
    <div class="white-box" style="display:none">
    	<h3>Please wait</h3>
    	<i class="fa fa-spinner fa-pulse fa-3x"></i>
 	</div>
	

	<div class="container-fluid navbar-top">
		<div class="row">
		
			<div class="col-md-12 col-sm-12 logo"></div>
			<div class="col-md-12 col-sm-12 jesus">
				<img src="<?php echo base_url(). 'bootstrap/img/jesus.png';?>" width="100%" >
			</div>
			
		</div>
	</div>
	
	<div class="row e">
		<p>You have selected an ecard. An email with your gift and message will be sent to your loved ones inbox.</p>
		
		
	</div>


	<div class="container f">
		<form method="POST" id="message-form">	
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: left">
					<div class="col-md-12 col-sm-12 col-xs-12" >
						<label  for="recipient-name" class="distance">&nbsp;&nbsp;<input type="radio" name="card" value="xmas" <?php if(@$_SESSION['user_message']['card'] == "xmas")echo "checked"?> />&nbsp;&nbsp;Christmas</label>
					</div>
					<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 xmas-js" style="height:100px;border:1px solid; margin-bottom:7px">
						<img src="<?php echo base_url().'bootstrap/img/Xmas_sm_cl.jpg'?>" width="100%" height="100%"/>
					</div>
				
					<div class="col-md-12 col-sm-12 col-xs-12" >
						<label  for="recipient-name" class="distance">&nbsp;&nbsp;<input type="radio" name="card" value="occ" <?php if(@$_SESSION['user_message']['card'] == "occ")echo "checked"?>/>&nbsp;&nbsp;All Occasions </label>
						
					</div>
					<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 occ-js" style="height:100px;border:1px solid">
						<img src="<?php echo base_url().'bootstrap/img/Generic_sm_col.jpg'?>" width="100%" height="100%"/>
					</div>
				
				</div>
				<div class="col-md-6 col-sm-5 col-xs-5 col-xs-offset-1">
					
						<div class="form-group">
						<!-- 	<label for="recipient-name" class="distance">Recipient name</label>
							<input type="text" class="form-control required" name="recipient-name" required="required"/> -->
							
							<label for="recipient-email" class="distance">Recipient email</label>
							<input type="email" class="form-control required" name="recipient-email" required="required" value="<?php echo @$_SESSION['user_message']['recipient-email'];?>">
							
							<label for="recipient-message" class="distance" style="margin-bottom: 10px;">Your message<br></label>
							<textarea placeholder="Max 200 characters" class="form-control required" rows="4" name="recipient-message" maxlength="200" wrap="soft" value=""><?php echo @$_SESSION['user_message']['recipient-message'];?></textarea>
							
							
							<button type="button" class="btn btn-info distance f-right" id="done" style="background-color: #6BB9C5; color: white;">Preview</button>
							
							
						</div>
					
				</div>
			</div>
		</form>	
	</div>
	
	<div class="container" style="position:relative">
	
		<div class="row xmas" style="display:none">
			<div class="col-md-12 col-sm-12 col-xs-12 ecard-pic">
				<!--  <img src="<?php echo base_url()."/bootstrap/img/Xmas.jpg"?>" width="100%"  />-->
			</div>
		</div>
	
		<div class="row gift" style="display:none">
			
						<?php 
					/* //	OLD cart_view use this
					  unset($_SESSION['user_shopping']['subTotal']);
							$t = array();
					    	foreach($_SESSION['user_shopping'] as $key => $val){
					    		
					    		foreach($val as $key1 => $val1){
					    			if ($key1 == 'gift_pic_1' || $key1 == 'gift_pic_2' || $key1 == 'gift_pic_3'){
					    				$t['gift_pic_1'][] = $val1;
					    			}
					    		}
					    	} 
					*/
					    	/* echo '<pre>';
					    	print_r($t);
					    	echo '<pre>'; */
							/*echo '<img src="'.base_url().'"/bootstrap/img/Gift_img/'.$t['gift_pic_1']['0'].'" width="100%"  />'; */
					    
						?>
						<?php
						// New code for getting picture of gift_item. Should work for both old and new cart_view
						
						
						
						unset($_SESSION['user_shopping']['subTotal']);	// Xoa de tranh loi khi foreach
						$t = array();
						foreach($_SESSION['user_shopping'] as $key => $val){
						
							foreach($val as $key1 => $val1){
								foreach($val1 as $key2 => $val2){
									if (checkPic($val2) == true){
										//echo $val1;die('called die');
										$t['gift_pic_1'][] = $val2;		// neu true thi ta se co  mang $t['gift_pic_1'][] chua ca ten file .jpg
									}
								}
								
							}
						}
						
						/* 
						echo '<pre>';
						print_r($t);
						echo '<pre>'; */
						// Ham checkPic ket hop voi foreach o tren de no search trong mang ma no thay .jpg thi no se gan vao $t['gift_pic_1'][]
						function checkPic($url) {
							// $pattern = '#(?<=<script type="text/javascript">window.__SSR = {).*#ims';
							/* VD co chuoi nhu sau
							  "news.com.au. 400,285 likes"
							  (?<=\. ).*(?= likes)
							  KQ se la "400,285"  
							*/

							$pattern = '#(?<=\.).*#';	// vd co "abc.jpg" thi day la RE de lay ra jpg
						
							preg_match ( $pattern, $url, $matches );
							if(count($matches) != 0){
								return true;			// neu dua $val1 o tren vao va no la chuoi ket thuc bang .jpg thi trong mang $matches sẽ > 0. Return true luc nay
							}
							/* echo '<pre>';
							print_r($matches);
							echo '<pre>'; */
						
							//$str = implode ( "", $matches );
							//echo $str;
						
							//return true;
						}
						?>					
					
						<?php 
						if(isset($t['gift_pic_1']['0'])){
						?>			
						<div class="col-md-6 col-sm-6 col-xs-6 pic1 padd">
							<img src="<?php echo base_url().'bootstrap/img/Gift_img/'.$t['gift_pic_1']['0']?>" width="100%"  />
						</div>
						<?php }?>
						
										
						<?php 
							if(isset($t['gift_pic_1']['0'])){
								$des = $this->Mdata->getDesc($t['gift_pic_1']['0']);
								/* echo '<pre>';
								print_r($des);
								echo '<pre>'; */
							
						?>
						<div class="col-md-6 col-sm-6 col-xs-6 pic1_des padd">
							<strong><?php echo $des['0']['name'];?></strong>
							<p><?php echo $des['0']['description'];?></p>	
						</div>	
						<?php }?>	
						
					
					
					
						<?php 
							if(isset($t['gift_pic_1']['1'])){
								$des = $this->Mdata->getDesc($t['gift_pic_1']['1']);
						?>
						<div class="col-md-6 col-sm-6 col-xs-6 pic2_des padd">
							<strong><?php echo $des['0']['name'];?></strong>
							<p><?php echo $des['0']['description'];?></p>	
						</div>
						<?php }?>	
						
					
					
						<?php 
						if(isset($t['gift_pic_1']['1'])){
						?>			
						<div class="col-md-6 col-sm-6 col-xs-6 pic2 padd">
							<img src="<?php echo base_url().'bootstrap/img/Gift_img/'.$t['gift_pic_1']['1']?>" width="100%"  />
						</div>
						<?php }?>
				
					
					
					
				
						<?php 
						if(isset($t['gift_pic_1']['2'])){
						?>			
						<div class="col-md-6 col-sm-6 col-xs-6 pic3 padd">	
							<img src="<?php echo base_url().'bootstrap/img/Gift_img/'.$t['gift_pic_1']['2']?>" width="100%"  />
						</div>
						<?php }?>
					
					
					
						<?php 
							if(isset($t['gift_pic_1']['2'])){
								$des = $this->Mdata->getDesc($t['gift_pic_1']['2']);
						?>
						<div class="col-md-6 col-sm-6 col-xs-6 pic3_des padd">
							<strong><?php echo $des['0']['name'];?></strong>
							<p><?php echo $des['0']['description'];?></p>
						</div>
						<?php }?>	
				
					<div class="col-md-9 col-md-offset-2 col-sm-9 col-sm-offset-2 col-xs-9 col-xs-offset-2" >
						<button type="button" class="btn btn-info distance f-right" id="finish" style="background-color: #6BB9C5; color: white;">Send</button>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 pic3_des_3" style="height:100px"></div>
			</div>
	
	</div>
	
	<div class="container thank" style="display: none;">
		<div class="row" style="text-align:center">
			
			<p>	
				<img src="<?php echo base_url().'bootstrap/img/Gift_img/Gift_2.jpg'?>" width="100%"> <br/>
			</p>
			
			<!--  <p style="margin-top: 85px; font-size: 22px; font-style: italic;">Thank you for your support</p>-->
			<img src="<?php echo base_url().'bootstrap/img/Thankyou.png'?>" width="100%"> <br/>
			<div class="col-md-8 col-md-offset-2 col-sm-11 col-xs-11 " style="margin-top: 30px">
						<a href="<?php echo $_SERVER['SCRIPT_NAME'];?>"><button type="button" name="keepgiving" class="btn btn-info" style="width: 132px; background-color: #6BB9C5; color: white;"> Keep giving</button></a> 
						<a href="<?php echo $_SERVER['SCRIPT_NAME'];?>"><button type="button" name="close" class="btn btn-info" style="width: 132px; background-color: #6BB9C5; color: white;float: right">Close</button></a> 
			</div>
			
			<!-- <a href="http://localhost/sp/"> <button type="button" class="btn btn-success" style="background-color: #6BB9C5; color: white;">Done</button> </a> -->
		</div>	
		
	</div>
	
	<footer class="navbar-fixed-bottom a">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 footer center-center">
					<div onclick="reload();" class="col-md-4 col-sm-4 col-xs-4 back">
						<img class="f-wd" src="<?php echo base_url(). 'bootstrap/img/Footer/Arrow_1.jpg'?>" >
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
<script src="<?php echo base_url();?>bootstrap/js/jquery.validate.min.js"></script>		<!-- jquery.validate.min.js is for validate form with jquery   -->
<script src="<?php echo base_url();?>bootstrap/js/messages_vi.js"></script>				<!-- messages_vi.js go together with jquery.validate.min.js to display error message -->
<script src="<?php echo base_url();?>bootstrap/js/gift.js"></script>	
	
</body>
</html>
