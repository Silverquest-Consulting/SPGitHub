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
	<title>People</title>
	
	
	<!-- <link href='http://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'> -->

	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
	
	<link rel="shortcut icon" href="<?php echo base_url();?>apple-touch-icon.png" type="image/jpeg/png"/>
	
	
	<link rel="apple-touch-icon" href="<?php echo base_url();?>apple-touch-icon.png" type="image/jpeg/png"/>
    
</head>


<body>

	<div class="container">
		<div class="row">
			<p class="lead" style="padding:10px;background-color: white; color:blue;font-size:55px;text-transform:uppercase; border: 6px solid darkblue">People
			<span class="pull-right"><img src="<?php echo base_url().'bootstrap/img/SQ-logo.jpg'?>" alt="" width="60px"/></span></p>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4" style="text-align:center; font-size:20px"><label for="">Search </label></div>
			<div class="col-xs-6">
				<div class="form-group lookup">
					
					<input name="info" type="text" class="form-control"/>
						<ul id="list" style="list-style:none;">
		             
			                <li>  
			                	            	
			                    
			                    <input type="radio" name="engine" value="user_firstname" /> Firstame
			                    <input type="radio" name="engine" value="user_lastname" /> Lastname
			                    <input type="radio" name="engine" value="user_email" /> Email
			                    <input type="radio" name="engine" value="user_phone" /> Phone
			                    
			                </li>
		                              
		           	 	</ul>        
					<button type="button" id="search" class="btn btn-default">Search</button>
					<button type="button" class="btn btn-default" name="reset" id="reset">Reset</button>
					
					
					<button style="margin-left:5px;" type="button" id="logout" class="btn btn-danger pull-right" name="logout" id="reset">Logout</button>
					<button type="button" id="finance" class="btn btn-success pull-right">Go to Finance</button>
					
				</div>
			</div>
		</div>
	</div>
	
	 <div class="container">
		<div class="row">
			<table class="table">
				<thead>
					<tr>
						<th>Fullname</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
				
						<?php 
						$html='';
						foreach($user_data as $key =>$val){
						$html.='<tr class="init">	<td>'.$val['user_firstname'].' '.$val['user_lastname'].'</td>
							<td>'.$val['user_email'].'</td>
							<td>'.$val['user_phone'].'</td>
							<td>'.$val['user_address1'].$val['user_address2'].' '.$val['user_suburb'].' '.$val['user_postcode'].'</td>
						</tr>';
						}
						echo $html;
						?>
					
					
				</tbody>
			</table>
		</div>
	</div> 
		
	
	
<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>	



<script type="text/javascript">
$(document).ready(function(){	
	$("#search").click(function(e) {

		var info= $(".lookup :input[name='info']").val();
		var checked = $(".lookup :radio[name='engine']:checked").val();
		
		$.ajax({
			url: "search",
			type: "POST",
			data		: {'info'		:info,
						   'type'	:checked 
						   }
		}).done(function(data){
			console.log(data);
			$(".table .init").fadeOut();
			$(".table tbody").html(data);
			//$(".row").html("Your numbers are: " + data  );
		});
	
	});

	$("#reset").click(function(e) {
		//window.location = 'index.php';
		 location.reload(true);
	});

	$("#finance").click(function(e) {
		 location="finance";
	});

	$("#logout").click(function(e) {
		$.ajax({
			url: "logout"
			
		}).done(function(data){
			 location.reload(true);
		});
		
	});
	
});
</script>
</body>
</html>