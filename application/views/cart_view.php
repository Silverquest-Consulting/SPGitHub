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
								
								<input name="tax[item1][item_name]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item_name_1'];?>" />
								<input name="tax[item1][item_Qty]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item1_Qty'];?>" />
								<input name="tax[item1][item_price]" type="hidden" value="<?php echo $_SESSION['Agriculture']['unit_price_1'];?>" />		
								<input name="tax[item1][item_sub]" type="hidden" value="<?php echo ($_SESSION['Agriculture']['unit_price_1']) * ($_SESSION['Agriculture']['item1_Qty']);?>" />		
								<input name="tax[item1][item_pic]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_pic_1'];?>" />
								<input name="tax[item1][item_id]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_id_1'];?>" />
								<input name="tax[item1][cat_name]" type="hidden" value="Agriculture and Livelivehood" />
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
								<input name="tax[item2][item_name]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item_name_2'];?>" />
								<input name="tax[item2][item_Qty]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item2_Qty'];?>" />
								<input name="tax[item2][item_price]" type="hidden" value="<?php echo $_SESSION['Agriculture']['unit_price_2'];?>" />		
								<input name="tax[item2][item_sub]" type="hidden" value="<?php echo ($_SESSION['Agriculture']['unit_price_2']) * ($_SESSION['Agriculture']['item2_Qty']);?>" />		
								<input name="tax[item2][item_pic]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_pic_2'];?>" />
								<input name="tax[item2][item_id]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_id_2'];?>" />
								<input name="tax[item2][cat_name]" type="hidden" value="Agriculture and Livelivehood" />
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
								<input name="tax[item3][item_name]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item_name_3'];?>" />
								<input name="tax[item3][item_Qty]" type="hidden" value="<?php echo $_SESSION['Agriculture']['item3_Qty'];?>" />
								<input name="tax[item3][item_price]" type="hidden" value="<?php echo $_SESSION['Agriculture']['unit_price_3'];?>" />		
								<input name="tax[item3][item_sub]" type="hidden" value="<?php echo ($_SESSION['Agriculture']['unit_price_3']) * ($_SESSION['Agriculture']['item3_Qty']);?>" />		
								<input name="tax[item3][item_pic]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_pic_3'];?>" />
								<input name="tax[item3][item_id]" type="hidden" value="<?php echo $_SESSION['Agriculture']['gift_id_3'];?>" />
								<input name="tax[item3][cat_name]" type="hidden" value="Agriculture and Livelivehood" />
															
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
								<input name="nontax[item4][item_name]" type="hidden" value="<?php echo $_SESSION['Church']['item_name_1'];?>" />
								<input name="nontax[item4][item_Qty]" type="hidden" value="<?php echo $_SESSION['Church']['item1_Qty'];?>" />
								<input name="nontax[item4][item_price]" type="hidden" value="<?php echo $_SESSION['Church']['unit_price_1'];?>" />		
								<input name="nontax[item4][item_sub]" type="hidden" value="<?php echo ($_SESSION['Church']['unit_price_1']) * ($_SESSION['Church']['item1_Qty']);?>" />		
								<input name="nontax[item4][item_pic]" type="hidden" value="<?php echo $_SESSION['Church']['gift_pic_1'];?>" />
								<input name="nontax[item4][item_id]" type="hidden" value="<?php echo $_SESSION['Church']['gift_id_1'];?>" />
								<input name="nontax[item4][cat_name]" type="hidden" value="Church Resourcing" />
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
								<input name="nontax[item5][item_name]" type="hidden" value="<?php echo $_SESSION['Church']['item_name_2'];?>" />
								<input name="nontax[item5][item_Qty]" type="hidden" value="<?php echo $_SESSION['Church']['item2_Qty'];?>" />
								<input name="nontax[item5][item_price]" type="hidden" value="<?php echo $_SESSION['Church']['unit_price_2'];?>" />		
								<input name="nontax[item5][item_sub]" type="hidden" value="<?php echo ($_SESSION['Church']['unit_price_2']) * ($_SESSION['Church']['item2_Qty']);?>" />		
								<input name="nontax[item5][item_pic]" type="hidden" value="<?php echo $_SESSION['Church']['gift_pic_2'];?>" />
								<input name="nontax[item5][item_id]" type="hidden" value="<?php echo $_SESSION['Church']['gift_id_2'];?>" />
								<input name="nontax[item5][cat_name]" type="hidden" value="Church Resourcing" />
								
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
								<input name="nontax[item6][item_name]" type="hidden" value="<?php echo $_SESSION['Church']['item_name_3'];?>" />
								<input name="nontax[item6][item_Qty]" type="hidden" value="<?php echo $_SESSION['Church']['item3_Qty'];?>" />
								<input name="nontax[item6][item_price]" type="hidden" value="<?php echo $_SESSION['Church']['unit_price_3'];?>" />		
								<input name="nontax[item6][item_sub]" type="hidden" value="<?php echo ($_SESSION['Church']['unit_price_3']) * ($_SESSION['Church']['item3_Qty']);?>" />		
								<input name="nontax[item6][item_pic]" type="hidden" value="<?php echo $_SESSION['Church']['gift_pic_3'];?>" />
								<input name="nontax[item6][item_id]" type="hidden" value="<?php echo $_SESSION['Church']['gift_id_3'];?>" />
								<input name="nontax[item6][cat_name]" type="hidden" value="Church Resourcing" />
								
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
								
								<input name="tax[item7][item_name]" type="hidden" value="<?php echo $_SESSION['Disaster']['item_name_1'];?>" />
								<input name="tax[item7][item_Qty]" type="hidden" value="<?php echo $_SESSION['Disaster']['item1_Qty'];?>" />
								<input name="tax[item7][item_price]" type="hidden" value="<?php echo $_SESSION['Disaster']['unit_price_1'];?>" />		
								<input name="tax[item7][item_sub]" type="hidden" value="<?php echo ($_SESSION['Disaster']['unit_price_1']) * ($_SESSION['Disaster']['item1_Qty']);?>" />		
								<input name="tax[item7][item_pic]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_pic_1'];?>" />
								<input name="tax[item7][item_id]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_id_1'];?>" />
								<input name="tax[item7][cat_name]" type="hidden" value="Disaster Relief" />
								
								
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
								
								<input name="tax[item8][item_name]" type="hidden" value="<?php echo $_SESSION['Disaster']['item_name_2'];?>" />
								<input name="tax[item8][item_Qty]" type="hidden" value="<?php echo $_SESSION['Disaster']['item2_Qty'];?>" />
								<input name="tax[item8][item_price]" type="hidden" value="<?php echo $_SESSION['Disaster']['unit_price_2'];?>" />		
								<input name="tax[item8][item_sub]" type="hidden" value="<?php echo ($_SESSION['Disaster']['unit_price_2']) * ($_SESSION['Disaster']['item2_Qty']);?>" />		
								<input name="tax[item8][item_pic]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_pic_2'];?>" />
								<input name="tax[item8][item_id]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_id_2'];?>" />
								<input name="tax[item8][cat_name]" type="hidden" value="Disaster Relief" />
															
								
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
								
								<input name="tax[item9][item_name]" type="hidden" value="<?php echo $_SESSION['Disaster']['item_name_3'];?>" />
								<input name="tax[item9][item_Qty]" type="hidden" value="<?php echo $_SESSION['Disaster']['item3_Qty'];?>" />
								<input name="tax[item9][item_price]" type="hidden" value="<?php echo $_SESSION['Disaster']['unit_price_3'];?>" />		
								<input name="tax[item9][item_sub]" type="hidden" value="<?php echo ($_SESSION['Disaster']['unit_price_3']) * ($_SESSION['Disaster']['item3_Qty']);?>" />		
								<input name="tax[item9][item_pic]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_pic_3'];?>" />
								<input name="tax[item9][item_id]" type="hidden" value="<?php echo $_SESSION['Disaster']['gift_id_3'];?>" />
								<input name="tax[item9][cat_name]" type="hidden" value="Disaster Relief" />
																
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
								
								<input name="tax[item10][item_name]" type="hidden" value="<?php echo $_SESSION['Education']['item_name_1'];?>" />
								<input name="tax[item10][item_Qty]" type="hidden" value="<?php echo $_SESSION['Education']['item1_Qty'];?>" />
								<input name="tax[item10][item_price]" type="hidden" value="<?php echo $_SESSION['Education']['unit_price_1'];?>" />		
								<input name="tax[item10][item_sub]" type="hidden" value="<?php echo ($_SESSION['Education']['unit_price_1']) * ($_SESSION['Education']['item1_Qty']);?>" />		
								<input name="tax[item10][item_pic]" type="hidden" value="<?php echo $_SESSION['Education']['gift_pic_1'];?>" />
								<input name="tax[item10][item_id]" type="hidden" value="<?php echo $_SESSION['Education']['gift_id_1'];?>" />
								<input name="tax[item10][cat_name]" type="hidden" value="Education and Training" />								
								
								
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
								
								<input name="tax[item11][item_name]" type="hidden" value="<?php echo $_SESSION['Education']['item_name_2'];?>" />
								<input name="tax[item11][item_Qty]" type="hidden" value="<?php echo $_SESSION['Education']['item2_Qty'];?>" />
								<input name="tax[item11][item_price]" type="hidden" value="<?php echo $_SESSION['Education']['unit_price_2'];?>" />		
								<input name="tax[item11][item_sub]" type="hidden" value="<?php echo ($_SESSION['Education']['unit_price_2']) * ($_SESSION['Education']['item2_Qty']);?>" />		
								<input name="tax[item11][item_pic]" type="hidden" value="<?php echo $_SESSION['Education']['gift_pic_2'];?>" />
								<input name="tax[item11][item_id]" type="hidden" value="<?php echo $_SESSION['Education']['gift_id_2'];?>" />
								<input name="tax[item11][cat_name]" type="hidden" value="Education and Training" />			
								
								
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
								
								<input name="tax[item12][item_name]" type="hidden" value="<?php echo $_SESSION['Education']['item_name_3'];?>" />
								<input name="tax[item12][item_Qty]" type="hidden" value="<?php echo $_SESSION['Education']['item3_Qty'];?>" />
								<input name="tax[item12][item_price]" type="hidden" value="<?php echo $_SESSION['Education']['unit_price_3'];?>" />		
								<input name="tax[item12][item_sub]" type="hidden" value="<?php echo ($_SESSION['Education']['unit_price_3']) * ($_SESSION['Education']['item3_Qty']);?>" />		
								<input name="tax[item12][item_pic]" type="hidden" value="<?php echo $_SESSION['Education']['gift_pic_3'];?>" />
								<input name="tax[item12][item_id]" type="hidden" value="<?php echo $_SESSION['Education']['gift_id_3'];?>" />
								<input name="tax[item12][cat_name]" type="hidden" value="Education and Training" />			
								
							
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
								
								<input name="tax[item13][item_name]" type="hidden" value="<?php echo $_SESSION['Health']['item_name_1'];?>" />
								<input name="tax[item13][item_Qty]" type="hidden" value="<?php echo $_SESSION['Health']['item1_Qty'];?>" />
								<input name="tax[item13][item_price]" type="hidden" value="<?php echo $_SESSION['Health']['unit_price_1'];?>" />		
								<input name="tax[item13][item_sub]" type="hidden" value="<?php echo ($_SESSION['Health']['unit_price_1']) * ($_SESSION['Health']['item1_Qty']);?>" />		
								<input name="tax[item13][item_pic]" type="hidden" value="<?php echo $_SESSION['Health']['gift_pic_1'];?>" />
								<input name="tax[item13][item_id]" type="hidden" value="<?php echo $_SESSION['Health']['gift_id_1'];?>" />
								<input name="tax[item13][cat_name]" type="hidden" value="Health and Nutrition" />			
																							
								
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
								
								<input name="tax[item14][item_name]" type="hidden" value="<?php echo $_SESSION['Health']['item_name_2'];?>" />
								<input name="tax[item14][item_Qty]" type="hidden" value="<?php echo $_SESSION['Health']['item2_Qty'];?>" />
								<input name="tax[item14][item_price]" type="hidden" value="<?php echo $_SESSION['Health']['unit_price_2'];?>" />		
								<input name="tax[item14][item_sub]" type="hidden" value="<?php echo ($_SESSION['Health']['unit_price_2']) * ($_SESSION['Health']['item2_Qty']);?>" />		
								<input name="tax[item14][item_pic]" type="hidden" value="<?php echo $_SESSION['Health']['gift_pic_2'];?>" />
								<input name="tax[item14][item_id]" type="hidden" value="<?php echo $_SESSION['Health']['gift_id_2'];?>" />
								<input name="tax[item14][cat_name]" type="hidden" value="Health and Nutrition" />	
								
								
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
								<input name="tax[item15][item_name]" type="hidden" value="<?php echo $_SESSION['Health']['item_name_3'];?>" />
								<input name="tax[item15][item_Qty]" type="hidden" value="<?php echo $_SESSION['Health']['item3_Qty'];?>" />
								<input name="tax[item15][item_price]" type="hidden" value="<?php echo $_SESSION['Health']['unit_price_3'];?>" />		
								<input name="tax[item15][item_sub]" type="hidden" value="<?php echo ($_SESSION['Health']['unit_price_3']) * ($_SESSION['Health']['item3_Qty']);?>" />		
								<input name="tax[item15][item_pic]" type="hidden" value="<?php echo $_SESSION['Health']['gift_pic_3'];?>" />
								<input name="tax[item15][item_id]" type="hidden" value="<?php echo $_SESSION['Health']['gift_id_3'];?>" />
								<input name="tax[item15][cat_name]" type="hidden" value="Health and Nutrition" />	
																
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
								
								<input name="tax[item16][item_name]" type="hidden" value="<?php echo $_SESSION['Needed']['item_name_1'];?>" />
								<input name="tax[item16][item_Qty]" type="hidden" value="<?php echo $_SESSION['Needed']['item1_Qty'];?>" />
								<input name="tax[item16][item_price]" type="hidden" value="<?php echo $_SESSION['Needed']['unit_price_1'];?>" />		
								<input name="tax[item16][item_sub]" type="hidden" value="<?php echo ($_SESSION['Needed']['unit_price_1']) * ($_SESSION['Needed']['item1_Qty']);?>" />		
								<input name="tax[item16][item_pic]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_pic_1'];?>" />
								<input name="tax[item16][item_id]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_id_1'];?>" />
								<input name="tax[item16][cat_name]" type="hidden" value="Where most needed" />	
									
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
								
								<input name="tax[item17][item_name]" type="hidden" value="<?php echo $_SESSION['Needed']['item_name_2'];?>" />
								<input name="tax[item17][item_Qty]" type="hidden" value="<?php echo $_SESSION['Needed']['item2_Qty'];?>" />
								<input name="tax[item17][item_price]" type="hidden" value="<?php echo $_SESSION['Needed']['unit_price_2'];?>" />		
								<input name="tax[item17][item_sub]" type="hidden" value="<?php echo ($_SESSION['Needed']['unit_price_2']) * ($_SESSION['Needed']['item2_Qty']);?>" />		
								<input name="tax[item17][item_pic]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_pic_2'];?>" />
								<input name="tax[item17][item_id]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_id_2'];?>" />
								<input name="tax[item17][cat_name]" type="hidden" value="Where most needed" />	
								
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
								
								<input name="tax[item18][item_name]" type="hidden" value="<?php echo $_SESSION['Needed']['item_name_3'];?>" />
								<input name="tax[item18][item_Qty]" type="hidden" value="<?php echo $_SESSION['Needed']['item3_Qty'];?>" />
								<input name="tax[item18][item_price]" type="hidden" value="<?php echo $_SESSION['Needed']['unit_price_3'];?>" />		
								<input name="tax[item18][item_sub]" type="hidden" value="<?php echo ($_SESSION['Needed']['unit_price_3']) * ($_SESSION['Needed']['item3_Qty']);?>" />		
								<input name="tax[item18][item_pic]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_pic_3'];?>" />
								<input name="tax[item18][item_id]" type="hidden" value="<?php echo $_SESSION['Needed']['gift_id_3'];?>" />
								<input name="tax[item18][cat_name]" type="hidden" value="Where most needed" />	
								
								
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
								
								<input name="nontax[item19][item_name]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item_name_1'];?>" />
								<input name="nontax[item19][item_Qty]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item1_Qty'];?>" />
								<input name="nontax[item19][item_price]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['unit_price_1'];?>" />		
								<input name="nontax[item19][item_sub]" type="hidden" value="<?php echo ($_SESSION['Chirsmas']['unit_price_1']) * ($_SESSION['Chirsmas']['item1_Qty']);?>" />		
								<input name="nontax[item19][item_pic]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_pic_1'];?>" />
								<input name="nontax[item19][item_id]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_id_1'];?>" />
								<input name="nontax[item19][cat_name]" type="hidden" value="Operation Christmas Child" />	
								
								
																
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
								
								<input name="nontax[item20][item_name]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item_name_2'];?>" />
								<input name="nontax[item20][item_Qty]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item2_Qty'];?>" />
								<input name="nontax[item20][item_price]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['unit_price_2'];?>" />		
								<input name="nontax[item20][item_sub]" type="hidden" value="<?php echo ($_SESSION['Chirsmas']['unit_price_2']) * ($_SESSION['Chirsmas']['item2_Qty']);?>" />		
								<input name="nontax[item20][item_pic]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_pic_2'];?>" />
								<input name="nontax[item20][item_id]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_id_2'];?>" />
								<input name="nontax[item20][cat_name]" type="hidden" value="Operation Christmas Child" />	
								
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
								
								<input name="nontax[item21][item_name]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item_name_3'];?>" />
								<input name="nontax[item21][item_Qty]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['item3_Qty'];?>" />
								<input name="nontax[item21][item_price]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['unit_price_3'];?>" />		
								<input name="nontax[item21][item_sub]" type="hidden" value="<?php echo ($_SESSION['Chirsmas']['unit_price_3']) * ($_SESSION['Chirsmas']['item3_Qty']);?>" />		
								<input name="nontax[item21][item_pic]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_pic_3'];?>" />
								<input name="nontax[item21][item_id]" type="hidden" value="<?php echo $_SESSION['Chirsmas']['gift_id_3'];?>" />
								<input name="nontax[item21][cat_name]" type="hidden" value="Operation Christmas Child" />	
								
								
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
								
								<input name="tax[item22][item_name]" type="hidden" value="<?php echo $_SESSION['People']['item_name_1'];?>" />
								<input name="tax[item22][item_Qty]" type="hidden" value="<?php echo $_SESSION['People']['item1_Qty'];?>" />
								<input name="tax[item22][item_price]" type="hidden" value="<?php echo $_SESSION['People']['unit_price_1'];?>" />		
								<input name="tax[item22][item_sub]" type="hidden" value="<?php echo ($_SESSION['People']['unit_price_1']) * ($_SESSION['People']['item1_Qty']);?>" />		
								<input name="tax[item22][item_pic]" type="hidden" value="<?php echo $_SESSION['People']['gift_pic_1'];?>" />
								<input name="tax[item22][item_id]" type="hidden" value="<?php echo $_SESSION['People']['gift_id_1'];?>" />
								<input name="tax[item22][cat_name]" type="hidden" value="People at Risk" />	
								
																
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
								
								<input name="tax[item23][item_name]" type="hidden" value="<?php echo $_SESSION['People']['item_name_2'];?>" />
								<input name="tax[item23][item_Qty]" type="hidden" value="<?php echo $_SESSION['People']['item2_Qty'];?>" />
								<input name="tax[item23][item_price]" type="hidden" value="<?php echo $_SESSION['People']['unit_price_2'];?>" />		
								<input name="tax[item23][item_sub]" type="hidden" value="<?php echo ($_SESSION['People']['unit_price_2']) * ($_SESSION['People']['item2_Qty']);?>" />		
								<input name="tax[item23][item_pic]" type="hidden" value="<?php echo $_SESSION['People']['gift_pic_2'];?>" />
								<input name="tax[item23][item_id]" type="hidden" value="<?php echo $_SESSION['People']['gift_id_2'];?>" />
								<input name="tax[item23][cat_name]" type="hidden" value="People at Risk" />	
								
								
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
								
								<input name="tax[item24][item_name]" type="hidden" value="<?php echo $_SESSION['People']['item_name_3'];?>" />
								<input name="tax[item24][item_Qty]" type="hidden" value="<?php echo $_SESSION['People']['item3_Qty'];?>" />
								<input name="tax[item24][item_price]" type="hidden" value="<?php echo $_SESSION['People']['unit_price_3'];?>" />		
								<input name="tax[item24][item_sub]" type="hidden" value="<?php echo ($_SESSION['People']['unit_price_3']) * ($_SESSION['People']['item3_Qty']);?>" />		
								<input name="tax[item24][item_pic]" type="hidden" value="<?php echo $_SESSION['People']['gift_pic_3'];?>" />
								<input name="tax[item24][item_id]" type="hidden" value="<?php echo $_SESSION['People']['gift_id_3'];?>" />
								<input name="tax[item24][cat_name]" type="hidden" value="People at Risk" />	
								
								
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
								
								<input name="nontax[item25][item_name]" type="hidden" value="<?php echo $_SESSION['Journey']['item_name_1'];?>" />
								<input name="nontax[item25][item_Qty]" type="hidden" value="<?php echo $_SESSION['Journey']['item1_Qty'];?>" />
								<input name="nontax[item25][item_price]" type="hidden" value="<?php echo $_SESSION['Journey']['unit_price_1'];?>" />		
								<input name="nontax[item25][item_sub]" type="hidden" value="<?php echo ($_SESSION['Journey']['unit_price_1']) * ($_SESSION['Journey']['item1_Qty']);?>" />		
								<input name="nontax[item25][item_pic]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_pic_1'];?>" />
								<input name="nontax[item25][item_id]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_id_1'];?>" />
								<input name="nontax[item25][cat_name]" type="hidden" value="The Greatest Journey"/>	
								
								
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
								
								<input name="nontax[item26][item_name]" type="hidden" value="<?php echo $_SESSION['Journey']['item_name_2'];?>" />
								<input name="nontax[item26][item_Qty]" type="hidden" value="<?php echo $_SESSION['Journey']['item2_Qty'];?>" />
								<input name="nontax[item26][item_price]" type="hidden" value="<?php echo $_SESSION['Journey']['unit_price_2'];?>" />		
								<input name="nontax[item26][item_sub]" type="hidden" value="<?php echo ($_SESSION['Journey']['unit_price_2']) * ($_SESSION['Journey']['item2_Qty']);?>" />		
								<input name="nontax[item26][item_pic]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_pic_2'];?>" />
								<input name="nontax[item26][item_id]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_id_2'];?>" />
								<input name="nontax[item26][cat_name]" type="hidden" value="The Greatest Journey"/>	
								
								
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
								
								<input name="nontax[item27][item_name]" type="hidden" value="<?php echo $_SESSION['Journey']['item_name_3'];?>" />
								<input name="nontax[item27][item_Qty]" type="hidden" value="<?php echo $_SESSION['Journey']['item3_Qty'];?>" />
								<input name="nontax[item27][item_price]" type="hidden" value="<?php echo $_SESSION['Journey']['unit_price_3'];?>" />		
								<input name="nontax[item27][item_sub]" type="hidden" value="<?php echo ($_SESSION['Journey']['unit_price_3']) * ($_SESSION['Journey']['item3_Qty']);?>" />		
								<input name="nontax[item27][item_pic]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_pic_3'];?>" />
								<input name="nontax[item27][item_id]" type="hidden" value="<?php echo $_SESSION['Journey']['gift_id_3'];?>" />
								<input name="nontax[item27][cat_name]" type="hidden" value="The Greatest Journey"/>	
								
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
								
								<input name="tax[item28][item_name]" type="hidden" value="<?php echo $_SESSION['Water']['item_name_1'];?>" />
								<input name="tax[item28][item_Qty]" type="hidden" value="<?php echo $_SESSION['Water']['item1_Qty'];?>" />
								<input name="tax[item28][item_price]" type="hidden" value="<?php echo $_SESSION['Water']['unit_price_1'];?>" />		
								<input name="tax[item28][item_sub]" type="hidden" value="<?php echo ($_SESSION['Water']['unit_price_1']) * ($_SESSION['Water']['item1_Qty']);?>" />		
								<input name="tax[item28][item_pic]" type="hidden" value="<?php echo $_SESSION['Water']['gift_pic_1'];?>" />
								<input name="tax[item28][item_id]" type="hidden" value="<?php echo $_SESSION['Water']['gift_id_1'];?>" />
								<input name="tax[item28][cat_name]" type="hidden" value="Water and Sanitation" />	
								
								
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
								
								<input name="tax[item29][item_name]" type="hidden" value="<?php echo $_SESSION['Water']['item_name_2'];?>" />
								<input name="tax[item29][item_Qty]" type="hidden" value="<?php echo $_SESSION['Water']['item2_Qty'];?>" />
								<input name="tax[item29][item_price]" type="hidden" value="<?php echo $_SESSION['Water']['unit_price_2'];?>" />		
								<input name="tax[item29][item_sub]" type="hidden" value="<?php echo ($_SESSION['Water']['unit_price_2']) * ($_SESSION['Water']['item2_Qty']);?>" />		
								<input name="tax[item29][item_pic]" type="hidden" value="<?php echo $_SESSION['Water']['gift_pic_2'];?>" />
								<input name="tax[item29][item_id]" type="hidden" value="<?php echo $_SESSION['Water']['gift_id_2'];?>" />
								<input name="tax[item29][cat_name]" type="hidden" value="Water and Sanitation" />	
								
								
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
								
								<input name="tax[item30][item_name]" type="hidden" value="<?php echo $_SESSION['Water']['item_name_3'];?>" />
								<input name="tax[item30][item_Qty]" type="hidden" value="<?php echo $_SESSION['Water']['item3_Qty'];?>" />
								<input name="tax[item30][item_price]" type="hidden" value="<?php echo $_SESSION['Water']['unit_price_3'];?>" />		
								<input name="tax[item30][item_sub]" type="hidden" value="<?php echo ($_SESSION['Water']['unit_price_3']) * ($_SESSION['Water']['item3_Qty']);?>" />		
								<input name="tax[item30][item_pic]" type="hidden" value="<?php echo $_SESSION['Water']['gift_pic_3'];?>" />
								<input name="tax[item30][item_id]" type="hidden" value="<?php echo $_SESSION['Water']['gift_id_3'];?>" />
								<input name="tax[item30][cat_name]" type="hidden" value="Water and Sanitation" />	
								
								
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