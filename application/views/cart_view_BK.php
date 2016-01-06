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
/* echo '<pre>';
print_r($_SESSION);
echo '<pre>'; */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <meta name="viewport" content="width=device-width, minimum=1.0, maximum=1.0, user-scalable=no">  -->
<title>Operation Chirsmas Child</title>


<!-- <link href='http://fonts.googleapis.com/css?family=Lato|Open+Sans'
	rel='stylesheet' type='text/css'> -->

<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/cart.css" rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>

	<div class="container-fluid">
		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12 header">

				<div class="col-md-3 col-sm-3 col-xs-3 icon-cart">
					<img src="<?php echo base_url().'/bootstrap/img/sm-logo.png'?>" />
				</div>

				<div
					class="col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-1 col-xs-7 col-xs-offset-1 txt">
					<h4><strong>Your Shopping Cart</strong></h4>
				</div>
				
				
			</div>
		</div>
	</div>
	
	<div class="container-fluid space" style="background-color: white; height:10px"></div>
	
	<form id="item-form" action="<?php //echo $_SERVER['SCRIPT_NAME'].'/checkout' ?>" method="post">
		<div class="example">
			<div class="container">
				<div class="row">

					<!-- Result Table  -->
					
					
					<table class="table">
						<thead>
							<tr>
								<th>Item</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Total</th>
								<th>&nbsp;</th>

							</tr>
						</thead>
						<tbody>
						
							<!-- Agriculture and Livelivehood  -->
							<?php if(key_exists('Agriculture', $_SESSION)  && ($_SESSION['Agriculture']['total']!=0) ){
							?>
							
								
								
								<?php if($_SESSION['Agriculture']['item1_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Agriculture']['picture']?>">&nbsp;<?php echo $_SESSION['Agriculture']['item_name_1']?></td>
										
									<td>$<?php echo $_SESSION['Agriculture']['unit_price_1']?></td>
									<!--  <td><?php //echo $_SESSION['Agriculture']['item1_Qty']?></td>-->
									
									
									<!-- Testing  -->
									<td>								
										<select parent="Agriculture" item="item1_Qty" class="changeme" id="" data-price="7">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Agriculture']['item1_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
													
									</td>
									
									<td class="cross"><span>$<?php echo $_SESSION['Agriculture']['unit_price_1'] * $_SESSION['Agriculture']['item1_Qty'] ?></span></td>
											
									<td><i class="fa fa-times del" parent="Agriculture" item="item1_Qty"></i></td>	
									
														
								</tr>
								<input name="Agriculture[cat_name_1]" type="hidden" value="Where most needed" />
								<input name="Agriculture[item_name_1]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item_name_1'];?>" />	
								<input name="Agriculture[gift_pic_1]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_pic_1'];?>" />
								<input name="Agriculture[unit_price_1]" type="hidden" value="<?php echo $_SESSION['Agriculture']['unit_price_1'];?>" />		
								<input name="Agriculture[item1_Qty]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item1_Qty'];?>" />	
								<input name="Agriculture[sub_item_1]" type="hidden" value="<?php echo ($_SESSION['Agriculture']['unit_price_1']) * ($_SESSION['Agriculture']['item1_Qty']);?>" />
								<input name="Agriculture[gift_id_1]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_id_1'];?>" />
								<?php }?>
								
								
								<?php if($_SESSION['Agriculture']['item2_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Agriculture']['picture']?>">&nbsp;<?php echo $_SESSION['Agriculture']['item_name_2']?></td>
									
									<td>$<?php echo $_SESSION['Agriculture']['unit_price_2']?></td>
									<!--  <td><?php //echo $_SESSION['Agriculture']['item2_Qty']?></td>-->
									<td>								
										<select parent="Agriculture" item="item2_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Agriculture']['item2_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
																
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Agriculture']['unit_price_2'] * $_SESSION['Agriculture']['item2_Qty'] ?></span></td>
										
									<td><i class="fa fa-times del" parent="Agriculture" item="item2_Qty"></i></td>
	
								</tr>
								<input name="Agriculture[cat_name_2]" type="hidden" value="Where most needed" />
								<input name="Agriculture[item_name_2]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item_name_2'];?>" />	
								<input name="Agriculture[gift_pic_2]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_pic_2'];?>" />
								<input name="Agriculture[unit_price_2]" type="hidden" value="<?php echo $_SESSION['Agriculture']['unit_price_2'];?>" />		
								<input name="Agriculture[item2_Qty]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item2_Qty'];?>" />	
								<input name="Agriculture[sub_item_2]" type="hidden" value="<?php echo ($_SESSION['Agriculture']['unit_price_2']) * ($_SESSION['Agriculture']['item2_Qty']);?>" />
								<input name="Agriculture[gift_id_2]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_id_2'];?>" />
								<?php }?>
								
								
								<?php if($_SESSION['Agriculture']['item3_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Agriculture']['picture']?>">&nbsp;<?php echo $_SESSION['Agriculture']['item_name_3']?></td>
									
									<td>$<?php echo $_SESSION['Agriculture']['unit_price_3']?></td>
									<!-- <td><?php //echo $_SESSION['Agriculture']['item3_Qty']?></td> -->
									<td>								
										<select parent="Agriculture" item="item3_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Agriculture']['item3_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
															
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Agriculture']['unit_price_3'] * $_SESSION['Agriculture']['item3_Qty'] ?></span></td>
										
									<td><i class="fa fa-times del" parent="Agriculture" item="item3_Qty"></i></td>
								</tr>
								<input name="Agriculture[cat_name_3]" type="hidden" value="Where most needed" />
								<input name="Agriculture[item_name_3]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item_name_3'];?>" />	
								<input name="Agriculture[gift_pic_3]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_pic_3'];?>" />
								<input name="Agriculture[unit_price_3]" type="hidden" value="<?php echo $_SESSION['Agriculture']['unit_price_3'];?>" />		
								<input name="Agriculture[item3_Qty]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item3_Qty'];?>" />	
								<input name="Agriculture[sub_item_3]" type="hidden" value="<?php echo ($_SESSION['Agriculture']['unit_price_3']) * ($_SESSION['Agriculture']['item3_Qty']);?>" />
								<input name="Agriculture[gift_id_3]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_id_3'];?>" />
															
								<?php }?>
								
								
								<!--<tr>
									<td><a href="<?php //echo $_SERVER['SCRIPT_NAME'] . '/donation?catID='.$_SESSION['Agriculture']['catID']?>" class="myEdit">Edit</a></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>$<?php //echo $_SESSION['Agriculture']['total']?></strong></td>
									
								</tr>  -->
								
								
							<?php }?>
						
							<!-- Agriculture  /-->
							
							<!-- Church  -->
							<?php if(key_exists('Church', $_SESSION) && ($_SESSION['Church']['total']!=0) ){
							?>
								
								
								<?php if($_SESSION['Church']['item1_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Church']['picture']?>">&nbsp;<?php echo $_SESSION['Church']['item_name_1']?></td>
									
									<td>$<?php echo $_SESSION['Church']['unit_price_1']?></td>
									<!--  <td><?php //echo $_SESSION['Church']['item1_Qty']?></td>-->
									<td>								
										<select parent="Church" item="item1_Qty" class="changeme" name="" id="" data-price="15">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Church']['item1_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
													
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Church']['unit_price_1'] * $_SESSION['Church']['item1_Qty'] ?></span></td>
										
									<td><i class="fa fa-times del" parent="Church" item="item1_Qty"></i></td>
	
								</tr>
								<input name="Church[cat_name_4]" type="hidden" value="Church Resourcing" />
								<input name="Church[item_name_4]" type="hidden" value="<?php echo $_SESSION['Church']['item_name_1'];?>" />
								<input name="Church[gift_pic_4]" type="hidden" value="<?php echo $_SESSION['Church']['gift_pic_1'];?>" />
								<input name="Church[unit_price_4]" type="hidden" value="<?php echo $_SESSION['Church']['unit_price_1'];?>" />
								<input name="Church[item4_Qty]" type="hidden" value="<?php echo $_SESSION['Church']['item1_Qty'];?>" />
								<input name="Church[sub_item_4]" type="hidden" value="<?php echo ($_SESSION['Church']['unit_price_1']) * ($_SESSION['Church']['item1_Qty']);?>" />
								<input name="Church[gift_id_4]" type="hidden" value="<?php echo $_SESSION['Church']['gift_id_1'];?>" />
								<?php }?>
								
								<?php if($_SESSION['Church']['item2_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Church']['picture']?>">&nbsp;<?php echo $_SESSION['Church']['item_name_2']?></td>
									
									<td>$<?php echo $_SESSION['Church']['unit_price_2']?></td>
									<!--  <td><?php //echo $_SESSION['Church']['item2_Qty']?></td>-->
									<td>								
										<select parent="Church" item="item2_Qty" class="changeme" name="" id="" data-price="125">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Church']['item2_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
															
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Church']['unit_price_2'] * $_SESSION['Church']['item2_Qty'] ?></span></td>
										
									<td><i class="fa fa-times del" parent="Church" item="item2_Qty"></i></td>
	
								</tr>
								<input name="Church[cat_name_5]" type="hidden" value="Church Resourcing" />
								<input name="Church[item_name_5]" type="hidden" value="<?php echo $_SESSION['Church']['item_name_2'];?>" />
								<input name="Church[gift_pic_5]" type="hidden" value="<?php echo $_SESSION['Church']['gift_pic_2'];?>" />
								<input name="Church[unit_price_5]" type="hidden" value="<?php echo $_SESSION['Church']['unit_price_2'];?>" />
								<input name="Church[item5_Qty]" type="hidden" value="<?php echo $_SESSION['Church']['item2_Qty'];?>" />
								<input name="Church[sub_item_5]" type="hidden" value="<?php echo ($_SESSION['Church']['unit_price_2']) * ($_SESSION['Church']['item2_Qty']);?>" />
								<input name="Church[gift_id_5]" type="hidden" value="<?php echo $_SESSION['Church']['gift_id_2'];?>" />
								
								<?php }?>
								
								<?php if($_SESSION['Church']['item3_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Church']['picture']?>">&nbsp;<?php echo $_SESSION['Church']['item_name_3']?></td>
									
									<td>$<?php echo $_SESSION['Church']['unit_price_3']?></td>
									<!-- <td><?php //echo $_SESSION['Church']['item3_Qty']?></td>-->
									<td>								
										<select parent="Church" item="item3_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Church']['item3_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
															
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Church']['unit_price_3'] * $_SESSION['Church']['item3_Qty'] ?></span></td>
										
									<td><i class="fa fa-times del" parent="Church" item="item3_Qty"></i></td>
	
								</tr>
								<input name="Church[cat_name_6]" type="hidden" value="Church Resourcing" />
								<input name="Church[item_name_6]" type="hidden" value="<?php echo $_SESSION['Church']['item_name_3'];?>" />
								<input name="Church[gift_pic_6]" type="hidden" value="<?php echo $_SESSION['Church']['gift_pic_3'];?>" />
								<input name="Church[unit_price_6]" type="hidden" value="<?php echo $_SESSION['Church']['unit_price_3'];?>" />
								<input name="Church[item6_Qty]" type="hidden" value="<?php echo $_SESSION['Church']['item3_Qty'];?>" />
								<input name="Church[sub_item_6]" type="hidden" value="<?php echo ($_SESSION['Church']['unit_price_3']) * ($_SESSION['Church']['item3_Qty']);?>" />
								<input name="Church[gift_id_6]" type="hidden" value="<?php echo $_SESSION['Church']['gift_id_3'];?>" />
								
								<?php }?>
								
								  <!--  <tr>
									<td><a href="<?php //echo $_SERVER['SCRIPT_NAME'] . '/donation?catID='.$_SESSION['Church']['catID']?>" class="myEdit">Edit</a></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>$<?php //echo $_SESSION['Church']['total']?></strong></td>
									
								</tr>-->
							<?php }?>
							<!-- Church  /-->
							
							<!-- Disaster  -->
							<?php if(key_exists('Disaster', $_SESSION) && ($_SESSION['Disaster']['total']!=0) ){
								
							?>
																
								<?php if($_SESSION['Disaster']['item1_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Disaster']['picture']?>">&nbsp;<?php echo $_SESSION['Disaster']['item_name_1']?></td>
									<td>$<?php echo $_SESSION['Disaster']['unit_price_1']?></td>
									<!--  <td><?php //echo $_SESSION['Disaster']['item1_Qty']?></td>-->
									<td>								
										<select parent="Disaster" item="item1_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Disaster']['item1_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Disaster']['unit_price_1'] * $_SESSION['Disaster']['item1_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Disaster" item="item1_Qty"></i></td>
	
	
								</tr>
								<input name="Disaster[cat_name_7]" type="hidden" value="Disaster Relief" />								
								<input name="Disaster[item_name_7]" type="hidden" value="<?php echo $_SESSION['Disaster']['item_name_1'];?>" />
								<input name="Disaster[gift_pic_7]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_pic_1'];?>" />
								<input name="Disaster[unit_price_7]" type="hidden" value="<?php echo $_SESSION['Disaster']['unit_price_1'];?>" />
								<input name="Disaster[item7_Qty]" type="hidden" value="<?php echo $_SESSION['Disaster']['item1_Qty'];?>" />
								<input name="Disaster[sub_item_7]" type="hidden" value="<?php echo ($_SESSION['Disaster']['unit_price_1']) * ($_SESSION['Disaster']['item1_Qty']);?>" />
								<input name="Disaster[gift_id_7]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_id_1'];?>" />
																
								<?php }?>
								
								<?php if($_SESSION['Disaster']['item2_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Disaster']['picture']?>">&nbsp;<?php echo $_SESSION['Disaster']['item_name_2']?></td>
									<td>$<?php echo $_SESSION['Disaster']['unit_price_2']?></td>
									<!--  <td><?php //echo $_SESSION['Disaster']['item2_Qty']?></td>-->
									<td>								
										<select parent="Disaster" item="item2_Qty" class="changeme" name="" id="" data-price="100">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Disaster']['item2_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Disaster']['unit_price_2'] * $_SESSION['Disaster']['item2_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Disaster" item="item2_Qty"></i></td>
	
	
								</tr>
								<input name="Disaster[cat_name_8]" type="hidden" value="Disaster Relief" />	
								<input name="Disaster[item_name_8]" type="hidden" value="<?php echo $_SESSION['Disaster']['item_name_2'];?>" />
								<input name="Disaster[gift_pic_8]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_pic_2'];?>" />
								<input name="Disaster[unit_price_8]" type="hidden" value="<?php echo $_SESSION['Disaster']['unit_price_2'];?>" />
								<input name="Disaster[item8_Qty]" type="hidden" value="<?php echo $_SESSION['Disaster']['item2_Qty'];?>" />
								<input name="Disaster[sub_item_8]" type="hidden" value="<?php echo ($_SESSION['Disaster']['unit_price_2']) * ($_SESSION['Disaster']['item2_Qty']);?>" />
								<input name="Disaster[gift_id_8]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_id_2'];?>" />
								
								<?php }?>
								
								<?php if($_SESSION['Disaster']['item3_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Disaster']['picture']?>">&nbsp;<?php echo $_SESSION['Disaster']['item_name_3']?></td>
									<td>$<?php echo $_SESSION['Disaster']['unit_price_3']?></td>
									<!--  <td><?php //echo $_SESSION['Disaster']['item3_Qty']?></td>-->
									<td>								
										<select parent="Disaster" item="item3_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Disaster']['item3_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Disaster']['unit_price_3'] * $_SESSION['Disaster']['item3_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Disaster" item="item3_Qty"></i></td>	
								</tr>
								<input name="Disaster[cat_name_9]" type="hidden" value="Disaster Relief" />	
								<input name="Disaster[item_name_9]" type="hidden" value="<?php echo $_SESSION['Disaster']['item_name_3'];?>" />
								<input name="Disaster[gift_pic_9]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_pic_3'];?>" />
								<input name="Disaster[unit_price_9]" type="hidden" value="<?php echo $_SESSION['Disaster']['unit_price_3'];?>" />
								<input name="Disaster[item9_Qty]" type="hidden" value="<?php echo $_SESSION['Disaster']['item3_Qty'];?>" />
								<input name="Disaster[sub_item_9]" type="hidden" value="<?php echo ($_SESSION['Disaster']['unit_price_3']) * ($_SESSION['Disaster']['item3_Qty']);?>" />
								<input name="Disaster[gift_id_9]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_id_3'];?>" />
								<?php }?>
								<!--<tr>
									<td><a href="<?php //echo $_SERVER['SCRIPT_NAME'] . '/donation?catID='.$_SESSION['Disaster']['catID']?>" class="myEdit">Edit</a></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>$<?php //echo $_SESSION['Disaster']['total']?></strong></td>
									
								</tr>  -->
							<?php }?>
							<!-- Disaster  /-->
							
							<!-- Education  -->
							<?php if(key_exists('Education', $_SESSION) && ($_SESSION['Education']['total']!=0) ){
								
							?>
								
								
								<?php if($_SESSION['Education']['item1_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Education']['picture']?>">&nbsp;<?php echo $_SESSION['Education']['item_name_1']?></td>
									<td>$<?php echo $_SESSION['Education']['unit_price_1']?></td>
									<!--  <td><?php //echo $_SESSION['Education']['item1_Qty']?></td>-->
									<td>								
										<select parent="Education" item="item1_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Education']['item1_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Education']['unit_price_1'] * $_SESSION['Education']['item1_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Education" item="item1_Qty"></i></td>
											
								</tr>
								<input name="Education[cat_name_10]" type="hidden" value="Education and Training" />
								<input name="Education[item_name_10]" type="hidden" value="<?php echo $_SESSION['Education']['item_name_1'];?>" />
								<input name="Education[gift_pic_10]" type="hidden" value="<?php echo $_SESSION['Education']['gift_pic_1'];?>" />
								<input name="Education[unit_price_10]" type="hidden" value="<?php echo $_SESSION['Education']['unit_price_1'];?>" />
								<input name="Education[item10_Qty]" type="hidden" value="<?php echo $_SESSION['Education']['item1_Qty'];?>" />
								<input name="Education[sub_item_10]" type="hidden" value="<?php echo ($_SESSION['Education']['unit_price_1']) * ($_SESSION['Education']['item1_Qty']);?>" />
								<input name="Education[gift_id_10]" type="hidden" value="<?php echo $_SESSION['Education']['gift_id_1'];?>" />
								
								<?php }?>
								
								<?php if($_SESSION['Education']['item2_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Education']['picture']?>">&nbsp;<?php echo $_SESSION['Education']['item_name_2']?></td>
									<td>$<?php echo $_SESSION['Education']['unit_price_2']?></td>
									<!--  <td><?php //echo $_SESSION['Education']['item2_Qty']?></td>-->
									<td>								
										<select parent="Education" item="item2_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Education']['item2_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Education']['unit_price_2'] * $_SESSION['Education']['item2_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Education" item="item2_Qty"></i></td>
	
								</tr>
								<input name="Education[cat_name_11]" type="hidden" value="Education and Training" />
								<input name="Education[item_name_11]" type="hidden" value="<?php echo $_SESSION['Education']['item_name_2'];?>" />
								<input name="Education[gift_pic_11]" type="hidden" value="<?php echo $_SESSION['Education']['gift_pic_2'];?>" />
								<input name="Education[unit_price_11]" type="hidden" value="<?php echo $_SESSION['Education']['unit_price_2'];?>" />
								<input name="Education[item11_Qty]" type="hidden" value="<?php echo $_SESSION['Education']['item2_Qty'];?>" />
								<input name="Education[sub_item_11]" type="hidden" value="<?php echo ($_SESSION['Education']['unit_price_2']) * ($_SESSION['Education']['item2_Qty']);?>" />
								<input name="Education[gift_id_11]" type="hidden" value="<?php echo $_SESSION['Education']['gift_id_2'];?>" />
								<?php }?>
								
								<?php if($_SESSION['Education']['item3_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Education']['picture']?>">&nbsp;<?php echo $_SESSION['Education']['item_name_3']?></td>
									<td>$<?php echo $_SESSION['Education']['unit_price_3']?></td>
									<!--  <td><?php //echo $_SESSION['Education']['item3_Qty']?></td>-->
									<td>								
										<select parent="Education" item="item3_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Education']['item3_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Education']['unit_price_3'] * $_SESSION['Education']['item3_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Education" item="item3_Qty"></i></td>
	
	
								</tr>
								<input name="Education[cat_name_12]" type="hidden" value="Education and Training" />
								<input name="Education[item_name_12]" type="hidden" value="<?php echo $_SESSION['Education']['item_name_3'];?>" />
								<input name="Education[gift_pic_12]" type="hidden" value="<?php echo $_SESSION['Education']['gift_pic_3'];?>" />
								<input name="Education[unit_price_12]" type="hidden" value="<?php echo $_SESSION['Education']['unit_price_3'];?>" />
								<input name="Education[item12_Qty]" type="hidden" value="<?php echo $_SESSION['Education']['item3_Qty'];?>" />
								<input name="Education[sub_item_12]" type="hidden" value="<?php echo ($_SESSION['Education']['unit_price_3']) * ($_SESSION['Education']['item3_Qty']);?>" />
								<input name="Education[gift_id_12]" type="hidden" value="<?php echo $_SESSION['Education']['gift_id_3'];?>" />
								<?php }?>
								
								<!--  <tr>
									<td><a href="<?php //echo $_SERVER['SCRIPT_NAME'] . '/donation?catID='.$_SESSION['Education']['catID']?>" class="myEdit">Edit</a></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>$<?php //echo $_SESSION['Education']['total']?></strong></td>
									
								</tr>-->
							<?php }?>
							<!-- Education  /-->
							
							<!-- Health  -->
								
							<?php if(key_exists('Health', $_SESSION) && ($_SESSION['Health']['total']!=0) ){
								
							?>
								
								
								<?php if($_SESSION['Health']['item1_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Health']['picture']?>">&nbsp;<?php echo $_SESSION['Health']['item_name_1']?></td>
									<td>$<?php echo $_SESSION['Health']['unit_price_1']?></td>
									<!--  <td><?php //echo $_SESSION['Health']['item1_Qty']?></td>-->
									<td>								
										<select parent="Health" item="item1_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Health']['item1_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Health']['unit_price_1'] * $_SESSION['Health']['item1_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Health" item="item1_Qty"></i></td>
								</tr>
								<input name="Health[cat_name_13]" type="hidden" value="Health and Nutrition" />
								<input name="Health[item_name_13]" type="hidden" value="<?php echo $_SESSION['Health']['item_name_1'];?>" />
								<input name="Health[gift_pic_13]" type="hidden" value="<?php echo $_SESSION['Health']['gift_pic_1'];?>" />
								<input name="Health[unit_price_13]" type="hidden" value="<?php echo $_SESSION['Health']['unit_price_1'];?>" />
								<input name="Health[item13_Qty]" type="hidden" value="<?php echo $_SESSION['Health']['item1_Qty'];?>" />
								<input name="Health[sub_item_13]" type="hidden" value="<?php echo ($_SESSION['Health']['unit_price_1']) * ($_SESSION['Health']['item1_Qty']);?>" />
								<input name="Health[gift_id_13]" type="hidden" value="<?php echo $_SESSION['Health']['gift_id_1'];?>" />
								
								
								<?php }?>
								
								<?php if($_SESSION['Health']['item2_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Health']['picture']?>">&nbsp;<?php echo $_SESSION['Health']['item_name_2']?></td>
									<td>$<?php echo $_SESSION['Health']['unit_price_2']?></td>
									<!--  <td><?php //echo $_SESSION['Health']['item1_Qty']?></td>-->
									<td>								
										<select parent="Health" item="item2_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Health']['item2_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Health']['unit_price_2'] * $_SESSION['Health']['item2_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Health" item="item2_Qty"></i></td>
	
	
								</tr>
								<input name="Health[cat_name_14]" type="hidden" value="Health and Nutrition" />
								<input name="Health[item_name_14]" type="hidden" value="<?php echo $_SESSION['Health']['item_name_2'];?>" />
								<input name="Health[gift_pic_14]" type="hidden" value="<?php echo $_SESSION['Health']['gift_pic_2'];?>" />
								<input name="Health[unit_price_14]" type="hidden" value="<?php echo $_SESSION['Health']['unit_price_2'];?>" />
								<input name="Health[item14_Qty]" type="hidden" value="<?php echo $_SESSION['Health']['item2_Qty'];?>" />
								<input name="Health[sub_item_14]" type="hidden" value="<?php echo ($_SESSION['Health']['unit_price_2']) * ($_SESSION['Health']['item2_Qty']);?>" />
								<input name="Health[gift_id_14]" type="hidden" value="<?php echo $_SESSION['Health']['gift_id_2'];?>" />
								<?php }?>
								
								<?php if($_SESSION['Health']['item3_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Health']['picture']?>">&nbsp;<?php echo $_SESSION['Health']['item_name_3']?></td>
									<td>$<?php echo $_SESSION['Health']['unit_price_3']?></td>
									<!--  <td><?php //echo $_SESSION['Health']['item3_Qty']?></td>-->
									<td>								
										<select parent="Health" item="item3_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Health']['item3_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Health']['unit_price_3'] * $_SESSION['Health']['item3_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Health" item="item3_Qty"></i></td>
	
								</tr>
								<input name="Health[cat_name_15]" type="hidden" value="Health and Nutrition" />
								<input name="Health[item_name_15]" type="hidden" value="<?php echo $_SESSION['Health']['item_name_3'];?>" />
								<input name="Health[gift_pic_15]" type="hidden" value="<?php echo $_SESSION['Health']['gift_pic_3'];?>" />
								<input name="Health[unit_price_15]" type="hidden" value="<?php echo $_SESSION['Health']['unit_price_3'];?>" />
								<input name="Health[item15_Qty]" type="hidden" value="<?php echo $_SESSION['Health']['item3_Qty'];?>" />
								<input name="Health[sub_item_15]" type="hidden" value="<?php echo ($_SESSION['Health']['unit_price_3']) * ($_SESSION['Health']['item3_Qty']);?>" />
								<input name="Health[gift_id_15]" type="hidden" value="<?php echo $_SESSION['Health']['gift_id_3'];?>" />
								<?php }?>
								
								<!--  <tr>
									<td><a href="<?php //echo $_SERVER['SCRIPT_NAME'] . '/donation?catID='.$_SESSION['Health']['catID']?>" class="myEdit">Edit</a></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>$<?php //echo $_SESSION['Health']['total']?></strong></td>
									
								</tr>-->
							<?php }?>
							<!-- Health  /-->
							
							<!-- Most Needed  -->
							<?php if(key_exists('Needed', $_SESSION) && ($_SESSION['Needed']['total']!=0) ){
								
							?>
								
								
								<?php if($_SESSION['Needed']['item1_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Needed']['picture']?>">&nbsp;<?php echo $_SESSION['Needed']['item_name_1']?></td>
									<td>$<?php echo $_SESSION['Needed']['unit_price_1']?></td>
									<!--  <td><?php //echo $_SESSION['Needed']['item1_Qty']?></td>-->
									<td>								
										<select parent="Needed" item="item1_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Needed']['item1_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Needed']['unit_price_1'] * $_SESSION['Needed']['item1_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Needed" item="item1_Qty"></i></td>
								</tr>
								<input name="Needed[cat_name_16]" type="hidden" value="Where most needed" />
								<input name="Needed[item_name_16]" type="hidden" value="<?php echo $_SESSION['Needed']['item_name_1'];?>" />
								<input name="Needed[gift_pic_16]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_pic_1'];?>" />
								<input name="Needed[unit_price_16]" type="hidden" value="<?php echo $_SESSION['Needed']['unit_price_1'];?>" />
								<input name="Needed[item16_Qty]" type="hidden" value="<?php echo $_SESSION['Needed']['item1_Qty'];?>" />
								<input name="Needed[sub_item_16]" type="hidden" value="<?php echo ($_SESSION['Needed']['unit_price_1']) * ($_SESSION['Needed']['item1_Qty']);?>" />
								<input name="Needed[gift_id_16]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_id_1'];?>" />
								
								
								<?php }?>
								
								<?php if($_SESSION['Needed']['item2_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Needed']['picture']?>">&nbsp;<?php echo $_SESSION['Needed']['item_name_2']?></td>
									<td>$<?php echo $_SESSION['Needed']['unit_price_2']?></td>
									<!--  <td><?php //echo $_SESSION['Needed']['item2_Qty']?></td>-->
									<td>								
										<select parent="Needed" item="item2_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Needed']['item2_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Needed']['unit_price_2'] * $_SESSION['Needed']['item2_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Needed" item="item2_Qty"></i></td>	
								</tr>
								<input name="Needed[cat_name_17]" type="hidden" value="Where most needed" />
								<input name="Needed[item_name_17]" type="hidden" value="<?php echo $_SESSION['Needed']['item_name_2'];?>" />
								<input name="Needed[gift_pic_17]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_pic_2'];?>" />
								<input name="Needed[unit_price_17]" type="hidden" value="<?php echo $_SESSION['Needed']['unit_price_2'];?>" />
								<input name="Needed[item17_Qty]" type="hidden" value="<?php echo $_SESSION['Needed']['item2_Qty'];?>" />
								<input name="Needed[sub_item_17]" type="hidden" value="<?php echo ($_SESSION['Needed']['unit_price_2']) * ($_SESSION['Needed']['item2_Qty']);?>" />
								<input name="Needed[gift_id_17]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_id_2'];?>" />
								<?php }?>
								
								<?php if($_SESSION['Needed']['item3_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Needed']['picture']?>">&nbsp;<?php echo $_SESSION['Needed']['item_name_3']?></td>
									<td>$<?php echo $_SESSION['Needed']['unit_price_3']?></td>
									<!--  <td><?php //echo $_SESSION['Needed']['item3_Qty']?></td>-->
									<td>								
										<select parent="Needed" item="item3_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Needed']['item3_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Needed']['unit_price_3'] * $_SESSION['Needed']['item3_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Needed" item="item3_Qty"></i></td>	
	
								</tr>
								<input name="Needed[cat_name_18]" type="hidden" value="Where most needed" />
								<input name="Needed[item_name_18]" type="hidden" value="<?php echo $_SESSION['Needed']['item_name_3'];?>" />
								<input name="Needed[gift_pic_18]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_pic_3'];?>" />
								<input name="Needed[unit_price_18]" type="hidden" value="<?php echo $_SESSION['Needed']['unit_price_3'];?>" />
								<input name="Needed[item18_Qty]" type="hidden" value="<?php echo $_SESSION['Needed']['item3_Qty'];?>" />
								<input name="Needed[sub_item_18]" type="hidden" value="<?php echo ($_SESSION['Needed']['unit_price_3']) * ($_SESSION['Needed']['item3_Qty']);?>" />
								<input name="Needed[gift_id_18]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_id_3'];?>" />
								<?php }?>
								
								<!-- <tr>
									<td><a href="<?php //echo $_SERVER['SCRIPT_NAME'] . '/donation?catID='.$_SESSION['Needed']['catID']?>" class="myEdit">Edit</a></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>$<?php //echo $_SESSION['Needed']['total']?></strong></td>
									
								</tr> -->
							<?php }?>
								<!-- Most Needed  /-->
								
								<!-- Operation Chrismas Child  -->
							<?php if(key_exists('Chirsmas', $_SESSION) && ($_SESSION['Chirsmas']['total']!=0) ){
								
							?>
									
									
								<?php if($_SESSION['Chirsmas']['item1_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Chirsmas']['picture']?>">&nbsp;<?php echo $_SESSION['Chirsmas']['item_name_1']?></td>
									<td>$<?php echo $_SESSION['Chirsmas']['unit_price_1']?></td>
									<!--  <td><?php //echo $_SESSION['Chirsmas']['item1_Qty']?></td>-->
									<td>								
										<select parent="Chirsmas" item="item1_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Chirsmas']['item1_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Chirsmas']['unit_price_1'] * $_SESSION['Chirsmas']['item1_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Chirsmas" item="item1_Qty"></i></td>	
								</tr>
								<input name="Chirsmas[cat_name_19]" type="hidden" value="Operation Christmas Child" />
								<input name="Chirsmas[item_name_19]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item_name_1'];?>" />
								<input name="Chirsmas[gift_pic_19]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_pic_1'];?>" />
								<input name="Chirsmas[unit_price_19]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['unit_price_1'];?>" />
								<input name="Chirsmas[item19_Qty]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item1_Qty'];?>" />
								<input name="Chirsmas[sub_item_19]" type="hidden" value="<?php echo ($_SESSION['Chirsmas']['unit_price_1']) * ($_SESSION['Chirsmas']['item1_Qty']);?>" />
								<input name="Chirsmas[gift_id_19]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_id_1'];?>" />
																
								<?php }?>
								
								<?php if($_SESSION['Chirsmas']['item2_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Chirsmas']['picture']?>">&nbsp;<?php echo $_SESSION['Chirsmas']['item_name_2']?></td>
									<td>$<?php echo $_SESSION['Chirsmas']['unit_price_2']?></td>
									<!--  <td><?php //echo $_SESSION['Chirsmas']['item2_Qty']?></td>-->
									<td>								
										<select parent="Chirsmas" item="item2_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Chirsmas']['item2_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Chirsmas']['unit_price_2'] * $_SESSION['Chirsmas']['item2_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Chirsmas" item="item2_Qty"></i></td>	
								</tr>
								<input name="Chirsmas[cat_name_20]" type="hidden" value="Operation Christmas Child" />
								<input name="Chirsmas[item_name_20]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item_name_2'];?>" />
								<input name="Chirsmas[gift_pic_20]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_pic_2'];?>" />
								<input name="Chirsmas[unit_price_20]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['unit_price_2'];?>" />
								<input name="Chirsmas[item20_Qty]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item2_Qty'];?>" />
								<input name="Chirsmas[sub_item_20]" type="hidden" value="<?php echo ($_SESSION['Chirsmas']['unit_price_2']) * ($_SESSION['Chirsmas']['item2_Qty']);?>" />
								<input name="Chirsmas[gift_id_20]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_id_2'];?>" />
								<?php }?>
								
								<?php if($_SESSION['Chirsmas']['item3_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Chirsmas']['picture']?>">&nbsp;<?php echo $_SESSION['Chirsmas']['item_name_3']?></td>
									<td>$<?php echo $_SESSION['Chirsmas']['unit_price_3']?></td>
									<!--  <td><?php //echo $_SESSION['Chirsmas']['item3_Qty']?></td>-->
									<td>								
										<select parent="Chirsmas" item="item3_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Chirsmas']['item3_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Chirsmas']['unit_price_3'] * $_SESSION['Chirsmas']['item3_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Chirsmas" item="item3_Qty"></i></td>	
	
								</tr>
								<input name="Chirsmas[cat_name_21]" type="hidden" value="Operation Christmas Child" />
								<input name="Chirsmas[item_name_21]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item_name_3'];?>" />
								<input name="Chirsmas[gift_pic_21]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_pic_3'];?>" />
								<input name="Chirsmas[unit_price_21]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['unit_price_3'];?>" />
								<input name="Chirsmas[item21_Qty]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item3_Qty'];?>" />
								<input name="Chirsmas[sub_item_21]" type="hidden" value="<?php echo ($_SESSION['Chirsmas']['unit_price_3']) * ($_SESSION['Chirsmas']['item3_Qty']);?>" />
								<input name="Chirsmas[gift_id_21]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_id_3'];?>" />
								<?php }?>
																						
								<!-- <tr>
									<td><a href="<?php //echo $_SERVER['SCRIPT_NAME'] . '/donation?catID='.$_SESSION['Chirsmas']['catID']?>" class="myEdit">Edit</a></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>$<?php //echo $_SESSION['Chirsmas']['total']?></strong></td>
									
								</tr> -->
							<?php }?>
							
							<!-- Operation Chrismas Child  /-->
							
							<!-- People at Risk  -->
							<?php if(key_exists('People', $_SESSION) && ($_SESSION['People']['total']!=0) ){
								
							?>
								
								
								<?php if($_SESSION['People']['item1_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['People']['picture']?>">&nbsp;<?php echo $_SESSION['People']['item_name_1']?></td>
									<td>$<?php echo $_SESSION['People']['unit_price_1']?></td>
									<!--  <td><?php //echo $_SESSION['People']['item1_Qty']?></td>-->
									<td>								
										<select parent="People" item="item1_Qty" class="changeme" name="" id="" data-price="50">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['People']['item1_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['People']['unit_price_1'] * $_SESSION['People']['item1_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="People" item="item1_Qty"></i></td>		
	
								</tr>
								<input name="People[cat_name_22]" type="hidden" value="People at Risk" />
								<input name="People[item_name_22]" type="hidden" value="<?php echo $_SESSION['People']['item_name_1'];?>" />
								<input name="People[gift_pic_22]" type="hidden" value="<?php echo $_SESSION['People']['gift_pic_1'];?>" />
								<input name="People[unit_price_22]" type="hidden" value="<?php echo $_SESSION['People']['unit_price_1'];?>" />
								<input name="People[item22_Qty]" type="hidden" value="<?php echo $_SESSION['People']['item1_Qty'];?>" />
								<input name="People[sub_item_22]" type="hidden" value="<?php echo ($_SESSION['People']['unit_price_1']) * ($_SESSION['People']['item1_Qty']);?>" />
								<input name="People[gift_id_22]" type="hidden" value="<?php echo $_SESSION['People']['gift_id_1'];?>" />
								
								<?php }?>
								
								<?php if($_SESSION['People']['item2_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['People']['picture']?>">&nbsp;<?php echo $_SESSION['People']['item_name_2']?></td>
									<td>$<?php echo $_SESSION['People']['unit_price_2']?></td>
									<!--  <td><?php //echo $_SESSION['People']['item2_Qty']?></td>-->
									<td>								
										<select parent="People" item="item2_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['People']['item2_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['People']['unit_price_2'] * $_SESSION['People']['item2_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="People" item="item2_Qty"></i></td>	
								</tr>
								<input name="People[cat_name_23]" type="hidden" value="People at Risk" />
								<input name="People[item_name_23]" type="hidden" value="<?php echo $_SESSION['People']['item_name_2'];?>" />
								<input name="People[gift_pic_23]" type="hidden" value="<?php echo $_SESSION['People']['gift_pic_2'];?>" />
								<input name="People[unit_price_23]" type="hidden" value="<?php echo $_SESSION['People']['unit_price_2'];?>" />
								<input name="People[item23_Qty]" type="hidden" value="<?php echo $_SESSION['People']['item2_Qty'];?>" />
								<input name="People[sub_item_23]" type="hidden" value="<?php echo ($_SESSION['People']['unit_price_2']) * ($_SESSION['People']['item2_Qty']);?>" />
								<input name="People[gift_id_23]" type="hidden" value="<?php echo $_SESSION['People']['gift_id_2'];?>" />
								<?php }?>
								
								<?php if($_SESSION['People']['item3_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['People']['picture']?>">&nbsp;<?php echo $_SESSION['People']['item_name_3']?></td>
									<td>$<?php echo $_SESSION['People']['unit_price_3']?></td>
									<!--  <td><?php //echo $_SESSION['People']['item3_Qty']?></td>-->
									<td>								
										<select parent="People" item="item3_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['People']['item3_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['People']['unit_price_3'] * $_SESSION['People']['item3_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="People" item="item3_Qty"></i></td>	
								</tr>
								<input name="People[cat_name_24]" type="hidden" value="People at Risk" />
								<input name="People[item_name_24]" type="hidden" value="<?php echo $_SESSION['People']['item_name_3'];?>" />
								<input name="People[gift_pic_24]" type="hidden" value="<?php echo $_SESSION['People']['gift_pic_3'];?>" />
								<input name="People[unit_price_24]" type="hidden" value="<?php echo $_SESSION['People']['unit_price_3'];?>" />
								<input name="People[item24_Qty]" type="hidden" value="<?php echo $_SESSION['People']['item3_Qty'];?>" />
								<input name="People[sub_item_24]" type="hidden" value="<?php echo ($_SESSION['People']['unit_price_3']) * ($_SESSION['People']['item3_Qty']);?>" />
								<input name="People[gift_id_24]" type="hidden" value="<?php echo $_SESSION['People']['gift_id_3'];?>" />
								<?php }?>
								
								<!-- <tr>
									<td><a href="<?php //echo $_SERVER['SCRIPT_NAME'] . '/donation?catID='.$_SESSION['People']['catID']?>" class="myEdit">Edit</a></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>$<?php //echo $_SESSION['People']['total']?></strong></td>
									
								</tr> -->
							<?php }?>
							
							<!-- People at Risk  /-->
							
							<!-- The Greatest Journey -->
							<?php if(key_exists('Journey', $_SESSION) && ($_SESSION['Journey']['total']!=0) ){
								
							?>
								
								
								<?php if($_SESSION['Journey']['item1_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Journey']['picture']?>">&nbsp;<?php echo $_SESSION['Journey']['item_name_1']?></td>
									<td>$<?php echo $_SESSION['Journey']['unit_price_1']?></td>
									<!--  <td><?php //echo $_SESSION['Journey']['item1_Qty']?></td>-->
									<td>								
										<select parent="Journey" item="item1_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Journey']['item1_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Journey']['unit_price_1'] * $_SESSION['Journey']['item1_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Journey" item="item1_Qty"></i></td>	
	
								</tr>
								<input name="Journey[cat_name_25]" type="hidden" value="The Greatest Journey" />
								<input name="Journey[item_name_25]" type="hidden" value="<?php echo $_SESSION['Journey']['item_name_1'];?>" />
								<input name="Journey[gift_pic_25]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_pic_1'];?>" />
								<input name="Journey[unit_price_25]" type="hidden" value="<?php echo $_SESSION['Journey']['unit_price_1'];?>" />
								<input name="Journey[item25_Qty]" type="hidden" value="<?php echo $_SESSION['Journey']['item1_Qty'];?>" />
								<input name="Journey[sub_item_25]" type="hidden" value="<?php echo ($_SESSION['Journey']['unit_price_1']) * ($_SESSION['Journey']['item1_Qty']);?>" />
								<input name="Journey[gift_id_25]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_id_1'];?>" />
								
								<?php }?>
								
								<?php if($_SESSION['Journey']['item2_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Journey']['picture']?>">&nbsp;<?php echo $_SESSION['Journey']['item_name_2']?></td>
									<td>$<?php echo $_SESSION['Journey']['unit_price_2']?></td>
									<!--  <td><?php //echo $_SESSION['Journey']['item2_Qty']?></td>-->
									<td>								
										<select parent="Journey" item="item2_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Journey']['item2_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Journey']['unit_price_2'] * $_SESSION['Journey']['item2_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Journey" item="item2_Qty"></i></td>	
	
								</tr>
								<input name="Journey[cat_name_26]" type="hidden" value="The Greatest Journey" />
								<input name="Journey[item_name_26]" type="hidden" value="<?php echo $_SESSION['Journey']['item_name_2'];?>" />
								<input name="Journey[gift_pic_26]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_pic_2'];?>" />
								<input name="Journey[unit_price_26]" type="hidden" value="<?php echo $_SESSION['Journey']['unit_price_2'];?>" />
								<input name="Journey[item26_Qty]" type="hidden" value="<?php echo $_SESSION['Journey']['item2_Qty'];?>" />
								<input name="Journey[sub_item_26]" type="hidden" value="<?php echo ($_SESSION['Journey']['unit_price_2']) * ($_SESSION['Journey']['item2_Qty']);?>" />
								<input name="Journey[gift_id_26]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_id_2'];?>" />
								<?php }?>
								
								<?php if($_SESSION['Journey']['item3_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Journey']['picture']?>">&nbsp;<?php echo $_SESSION['Journey']['item_name_3']?></td>
									<td>$<?php echo $_SESSION['Journey']['unit_price_3']?></td>
									<!--  <td><?php //echo $_SESSION['Journey']['item3_Qty']?></td>-->
									<td>								
										<select parent="Journey" item="item3_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Journey']['item3_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Journey']['unit_price_3'] * $_SESSION['Journey']['item3_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Journey" item="item3_Qty"></i></td>	
	
								</tr>
								<input name="Journey[cat_name_27]" type="hidden" value="The Greatest Journey" />
								<input name="Journey[item_name_27]" type="hidden" value="<?php echo $_SESSION['Journey']['item_name_3'];?>" />
								<input name="Journey[gift_pic_27]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_pic_3'];?>" />
								<input name="Journey[unit_price_27]" type="hidden" value="<?php echo $_SESSION['Journey']['unit_price_3'];?>" />
								<input name="Journey[item27_Qty]" type="hidden" value="<?php echo $_SESSION['Journey']['item3_Qty'];?>" />
								<input name="Journey[sub_item_27]" type="hidden" value="<?php echo ($_SESSION['Journey']['unit_price_3']) * ($_SESSION['Journey']['item3_Qty']);?>" />
								<input name="Journey[gift_id_27]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_id_3'];?>" />
								<?php }?>
								
								<!-- <tr>
									<td><a href="<?php //echo $_SERVER['SCRIPT_NAME'] . '/donation?catID='.$_SESSION['Journey']['catID']?>" class="myEdit">Edit</a></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>$<?php //echo $_SESSION['Journey']['total']?></strong></td>
									
								</tr> -->
							<?php }?>
							<!-- The Greatest Journey  /-->
							
							<!-- Water and Sanitation -->
							<?php if(key_exists('Water', $_SESSION)  && ($_SESSION['Water']['total']!=0) ){
								
							?>
								
								
								<?php if($_SESSION['Water']['item1_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Water']['picture']?>">&nbsp;<?php echo $_SESSION['Water']['item_name_1']?></td>
									<td>$<?php echo $_SESSION['Water']['unit_price_1']?></td>
									<!--  <td><?php //echo $_SESSION['Water']['item1_Qty']?></td>-->
									<td>								
										<select parent="Water" item="item1_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Water']['item1_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Water']['unit_price_1'] * $_SESSION['Water']['item1_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Water" item="item1_Qty"></i></td>	
	
								</tr>
								<input name="Water[cat_name_28]" type="hidden" value="Water and Sanitation" />
								<input name="Water[item_name_28]" type="hidden" value="<?php echo $_SESSION['Water']['item_name_1'];?>" />
								<input name="Water[gift_pic_28]" type="hidden" value="<?php echo $_SESSION['Water']['gift_pic_1'];?>" />
								<input name="Water[unit_price_28]" type="hidden" value="<?php echo $_SESSION['Water']['unit_price_1'];?>" />
								<input name="Water[item28_Qty]" type="hidden" value="<?php echo $_SESSION['Water']['item1_Qty'];?>" />
								<input name="Water[sub_item_28]" type="hidden" value="<?php echo ($_SESSION['Water']['unit_price_1']) * ($_SESSION['Water']['item1_Qty']);?>" />
								<input name="Water[gift_id_28]" type="hidden" value="<?php echo $_SESSION['Water']['gift_id_1'];?>" />
								
								
								<?php }?>
								
								<?php if($_SESSION['Water']['item2_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Water']['picture']?>">&nbsp;<?php echo $_SESSION['Water']['item_name_2']?></td>
									<td>$<?php echo $_SESSION['Water']['unit_price_2']?></td>
									<!--  <td><?php //echo $_SESSION['Water']['item2_Qty']?></td>-->
									<td>								
										<select parent="Water" item="item2_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Water']['item2_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Water']['unit_price_2'] * $_SESSION['Water']['item2_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Water" item="item2_Qty"></i></td>	
	
								</tr>
								<input name="Water[cat_name_29]" type="hidden" value="Water and Sanitation" />
								<input name="Water[item_name_29]" type="hidden" value="<?php echo $_SESSION['Water']['item_name_2'];?>" />
								<input name="Water[gift_pic_29]" type="hidden" value="<?php echo $_SESSION['Water']['gift_pic_2'];?>" />
								<input name="Water[unit_price_29]" type="hidden" value="<?php echo $_SESSION['Water']['unit_price_2'];?>" />
								<input name="Water[item29_Qty]" type="hidden" value="<?php echo $_SESSION['Water']['item2_Qty'];?>" />
								<input name="Water[sub_item_29]" type="hidden" value="<?php echo ($_SESSION['Water']['unit_price_2']) * ($_SESSION['Water']['item2_Qty']);?>" />
								<input name="Water[gift_id_29]" type="hidden" value="<?php echo $_SESSION['Water']['gift_id_2'];?>" />
								<?php }?>
								
								<?php if($_SESSION['Water']['item3_Qty'] != 0) {?> <!-- Bat dieu kien de hien thi item nao co selection > 0, neu dc copy cho cac phan con lai  -->
								<tr>
									<td><img src="<?php echo base_url(). "bootstrap/img/" . $_SESSION['Water']['picture']?>">&nbsp;<?php echo $_SESSION['Water']['item_name_3']?></td>
									<td>$<?php echo $_SESSION['Water']['unit_price_3']?></td>
									<!--  <td><?php //echo $_SESSION['Water']['item3_Qty']?></td>-->
									<td>								
										<select parent="Water" item="item3_Qty" class="changeme" name="" id="" data-price="">
											<?php
													$html=''; 
													foreach($selectArr as $key => $val){
														 if($key == $_SESSION['Water']['item3_Qty']){
																
																$html .= '<option selected="selected" value="'.$key.'">'.$val.'</option>';
															}else{
																$html .= '<option value="'.$key.'">'.$val.'</option>';
																}
															
													}				
													echo $html;
											?>				
										</select>
														
									</td>
									<td class="cross"><span>$<?php echo $_SESSION['Water']['unit_price_3'] * $_SESSION['Water']['item3_Qty'] ?></span></td>
									<td><i
										class="fa fa-times del" parent="Water" item="item3_Qty"></i></td>	
	
								</tr>
								<input name="Water[cat_name_30]" type="hidden" value="Water and Sanitation" />
								<input name="Water[item_name_30]" type="hidden" value="<?php echo $_SESSION['Water']['item_name_3'];?>" />
								<input name="Water[gift_pic_30]" type="hidden" value="<?php echo $_SESSION['Water']['gift_pic_3'];?>" />
								<input name="Water[unit_price_30]" type="hidden" value="<?php echo $_SESSION['Water']['unit_price_3'];?>" />
								<input name="Water[item30_Qty]" type="hidden" value="<?php echo $_SESSION['Water']['item3_Qty'];?>" />
								<input name="Water[sub_item_30]" type="hidden" value="<?php echo ($_SESSION['Water']['unit_price_3']) * ($_SESSION['Water']['item3_Qty']);?>" />
								<input name="Water[gift_id_30]" type="hidden" value="<?php echo $_SESSION['Water']['gift_id_3'];?>" />
								<?php }?>
								
								<!-- <tr>
									<td><a href="<?php //echo $_SERVER['SCRIPT_NAME'] . '/donation?catID='.$_SESSION['Water']['catID']?>" class="myEdit">Edit</a></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>$<?php //echo $_SESSION['Water']['total']?></strong></td>
									
								</tr> -->
							
							<?php }?>
							<!-- Water and Sanitation  /-->							
														
						</tbody>
					</table>				

				</div>
			</div>

		</div>

		<div class="col-md-12 col-sm-12 col-xs-12 line"></div>



		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-6 checkout">
					<strong>Subtotal: $<?php $total= @$_SESSION['Needed']['total']
													+ @$_SESSION['Chirsmas']['total']
													+ @$_SESSION['Health']['total']
													+ @$_SESSION['Agriculture']['total']
													+ @$_SESSION['Church']['total']
													+ @$_SESSION['Water']['total']
													+ @$_SESSION['People']['total']
													+ @$_SESSION['Journey']['total']
													+ @$_SESSION['Education']['total']
													+ @$_SESSION['Disaster']['total'];
								
								echo $total;
								echo $finalTotal = '<input type="hidden" name="subTotal" value="'.$total.'".>';
								// SAVE or UPDATE subtotal into SESSION in order to use in billing checkout. !Very important
								$_SESSION['subTotal'] = $total;
								?>
					</strong>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-4 col-xs-offset-8 checkout">
					<!--<button type="submit" class="btn btn-success" style="display:none;" >Checkout</button> old no need-->
					<!-- <button type="submit" class="mysubmit" >Checkout</button> old no need-->
					<a id="mycheckout" href="<?php //echo $_SERVER['SCRIPT_NAME'].'/user' ?>"><input type="button" id="" name=""
							class="btn btn-block btn-lg blue-bt" style="background-color: #6BB9C5; color: white;" value="Checkout">
					</a>
					
				</div>
			</div>

		</div>

	</form>
	 <!--  <footer class="navbar-fixed-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 footer center-center">
					<div class="col-md-4 col-sm-4 col-xs-4 back">
						<a href="javascript:back();"><i class="fa fa-arrow-left"></i></a>
					</div>
					<div
						class="col-md-4 col-sm-4 col-sm-offset-3 col-xs-4 col-xs-offset-4 home">
						<a href="<?php //echo $_SERVER['SCRIPT_NAME'];?>"><i class="fa fa-home"></i></a>
					</div>


				</div>
			</div>
		</div>
	</footer> -->
	
	
	<!--  <footer class="navbar-fixed-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 footer center-center">
					<div class="col-md-4 col-sm-4 col-xs-4 back">
						<img src="<?php //echo base_url(). 'bootstrap/img/Header_Footer/Arrow_2.jpg'?>" width="100%" height="100%">
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 home">
						<a href="<?php //echo $_SERVER['SCRIPT_NAME'];?>"><img src="<?php //echo base_url(). 'bootstrap/img/Header_Footer/Home_1.jpg'?>" width="100%" height="100%"></a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 cart">
						<img id="submit" src="<?php //echo base_url(). 'bootstrap/img/Header_Footer/Cart_1.jpg'?>" width="100%" height="100%">
					</div>
				</div>
			</div>
		</div>
	</footer>-->
	
	<footer class="navbar-fixed-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 footer center-center">
					<div class="col-md-4 col-sm-4 col-xs-4 ">
						<img class="f-wd" src="<?php echo base_url(). 'bootstrap/img/Footer/Arrow_2.jpg'?>" >
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 ">
						<a href="<?php echo $_SERVER['SCRIPT_NAME'];?>"><img class="f-wd" src="<?php echo base_url(). 'bootstrap/img/Footer/Home_1.jpg'?>" ></a>
					</div>
					
					<div class="col-md-4 col-sm-4 col-xs-4 ">
						<img class="f-wd" src="<?php echo base_url(). 'bootstrap/img/Footer/Cart_2.jpg'?>" >
					</div>
					
				</div>
			</div>
		</div>
	</footer>



<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/cart.js" type="text/javascript"></script>





</body>
</html>