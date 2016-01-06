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
	<title>Finance</title>
	
	
	<!-- <link href='http://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'> -->

	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>bootstrap/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>bootstrap/css/datepicker/jquery-ui.css" rel="stylesheet">
	
	<link rel="shortcut icon" href="<?php echo base_url();?>apple-touch-icon.png" type="image/jpeg/png"/>
	
	
	<link rel="apple-touch-icon" href="<?php echo base_url();?>apple-touch-icon.png" type="image/jpeg/png"/>
    
    <style>
		.b td{
			font-weight: bold;
		}
		
	.overlay {
		width: 100%;
		height: 100%;
		background-color:#000;
		position:fixed;
		top: 0px;
		left: 0px;
		opacity:0.4;
		filter: alpha(opacity=40);
		z-index: 900;
	}
	
	.white-box {
		background-color: #FFF;
		//border: 5px solid #00C;
		width: 800px;
		//height: 350px;
		position: fixed;
		left: 50%;
		top: 65%;
		z-index: 1000;
		margin-top: -175px;
		margin-left: -400px;
		text-align:center;
	}
	</style>
    
</head>


<body>
	<div class="overlay" style="display:none"></div>
    <div class="white-box" style="display:none">
    	<h3>Please wait</h3>
    	<i class="fa fa-spinner fa-pulse fa-3x"></i>
 	</div>
	<div class="container">
		<div class="row">
			<p class="lead" style="padding:10px;background-color: white; color:blue;font-size:55px;text-transform:uppercase; border: 6px solid darkblue">Finance
			<span class="pull-right"><img src="<?php echo base_url().'bootstrap/img/SQ-logo.jpg'?>" alt="" width="60px"/></span></p>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4" style="text-align:center; font-size:20px"><label for="">Date </label></div>
			<div class="col-xs-6">
				<div class="form-group lookup">
					
					<div class="row">
						<div class="col-xs-5">
							From :<input readonly="readonly" name="datepickerFr" id="datepickerFr" type="text" class="form-control"/>
						</div>
						<div class="col-xs-1"></div>
						<div class="col-xs-5">
							To :<input readonly="readonly" name="datepickerTo" id="datepickerTo"  type="text" class="form-control"/>
						</div>
					</div>
					<br /><br />
					<div class="row">
						<button type="button" id="search" class="btn btn-default">Search</button>
						<button type="button" class="btn btn-default" name="reset" id="reset">Reset</button>
						<button style="margin-left:5px;" type="button" id="logout" class="btn btn-danger pull-right" name="logout" id="reset">Logout</button>
						<button type="button" id="people" class="btn btn-success pull-right">Go to People</button>
						
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
	
	 <div class="container">
		<div class="row rptable">
			<table class="table">
				<thead>
					<tr class="b">
						<td>Date</td><td>Order</td> <td>Name</td> <td>Address</td> <td>Suburb</td> <td>Postcode</td> 
 <td>State</td> 
 <td>Email</td> 
 <td>Phone</td> 
 <td>PaymentMetdod</td> 
 <td>CardHolderName</td> 
 <td>GiftCategory</td> 
 <td>GiftItem</td> 
 <td>GiftId</td> 
 <td>GiftQty</td> 
 <td>GiftUnitPrice</td> 
 <td>GiftAmount</td> 
 <td>Receipt</td>
					</tr>
				</thead>
				<tbody>
					
						
					
					
				</tbody>
			</table>
		</div>
		<button type="button" id="send" class="btn btn-success pull-right">Send</button>
	</div> 
		
	
	
<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>	
<script src="<?php echo base_url();?>bootstrap/js/datepicker/jquery-ui.js"></script>	


<script type="text/javascript">
$(document).ready(function(){	

	var flag = false;
	$("#search").click(function(e) {

		var from= $(".lookup :input[name='datepickerFr']").val();
		var to = $(".lookup :input[name='datepickerTo']").val();
	
		$.ajax({
			url: "checkDate",
			type: "POST",
			data		: {'from'		:from,
						   'to'	:to 
						   }
		}).done(function(data){
			console.log(data);
			if(data == '<span style="color:red">Please select correct Date</span>'){
				$(".table tbody").html(data);
					return false;
			}else{
					$(".table tbody").html(data);
					flag = true;
			}
		});
	
	});		// Search
	
	$("#send").click(function(e) {
		
		if(flag == true){
			//alert(flag);
			var from= $(".lookup :input[name='datepickerFr']").val();
			var to = $(".lookup :input[name='datepickerTo']").val();
			var table = $(".rptable").html();
			
			$.ajax({
				url: "saveCvs",
				type: "POST",
				data		: {'table'		:table,
							   'from'		:from,
							   'to'	:to
						   },
				beforeSend	: function(){
					$(".overlay, .white-box").css("display","block");
					
					
				}					
			}).done(function(data){
				console.log(data);
				$(".overlay, .white-box").css("display","none");

				if(data == 'Success'){
					alert('Your report has been sent successfully');
				}
			});
		}else{
				return false;
			}
	
	});		// Send
	

	$("#reset").click(function(e) {
		//window.location = 'index.php';
		 location.reload(true);
	});

	$("#people").click(function(e) {
		 location="people";
	});

	$("#logout").click(function(e) {
		$.ajax({
			url: "logout"
			
		}).done(function(data){
			 location.reload(true);
		});
		
	});

	$(function() {
	    $( "#datepickerFr" ).datepicker({
	    	dateFormat: "yy-mm-dd",
	    	defaultDate: "+3d",
	    	changeYear:true,
	    	changeMonth:true,
	    	yearRange: "2015:2030"
	    });
	    $( "#datepickerTo" ).datepicker({
	    	dateFormat: "yy-mm-dd",
	    	defaultDate: "+3d",
	    	changeYear:true,
	    	changeMonth:true,
	    	yearRange: "2015:2030"
	    });
	  });	// Datepicker
	
});
</script>
</body>
</html>