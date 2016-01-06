$(document).ready(function(e) {	
	
	// Add rule to run Regex on firstname, lastname, suburb
	$.validator.addMethod("string",
	        function(value, element, regexp) {
	            var re = new RegExp(regexp);
	            return this.optional(element) || re.test(value);
	        },
	        "Invalid data"
	);
	
	$.validator.addClassRules({
		holder:{
			string: /^[a-zA-Z'.\s]{1,40}$/	
		}
	});
	$("#billing-form").validate({
        errorElement: "span", // Định dạng cho thẻ HTML hiện thông báo lỗi
        
    });
	
	// Tam thoi, neu billing-form valid, we assume transaction success
	// then tao mot phan tu $_SESSION['paid'] == 1
	// neu phan tu nay ton tai thi program se chay tiep den ecard va gift ko co user quay lai
	
	
	/*	 $("#submit-bill").click(function(e){
			 e.preventDefault();
			
			 $.ajax({
					url: "billing/paid"
					
					}).done(function(data){
						$("#billing-form").submit();
						
				});	
		 });*/
			
	
	 
	 // when marc done with his report, copy this code to the part where payment is successful
	 //////////////////
	
	$(".logout").click(function(){
		$.ajax({
			url: "billing/logout"
			/*type:"POST",
			data:{'subTotal':subtotal} 	*/	
			}).done(function(data){
				//console.log('');
				location="billing";
				
		});	
	});
	
	////////////////
	// Submit button 
	//////////////
	
	$("#submit-bill").click(function(e){
		e.preventDefault();
		if($("#billing-form").valid()){
			$.ajax({
				//url: "https://staging.silverquest.com.au/tom/quicksteam/processCard.php",
				url:"email/get_Receipt",
				type:"POST",
				dataType:"json",		
				data: $("#billing-form").serialize()
				}).done(function(data){
					console.log(data);
					var proCard = data;
					if(data.Summary_Code == "1" || data.Summary_Code == "0"){
						//alert(data.Description);
						
						// This is Part of marc Report
						$.ajax({
							url: "report",
							type:"POST",
							//dataType:"json",		
							//data: $("#billing-form").serialize()
							data:{'card':proCard}							// gui qua controller report la code tra ve tu processCard.php
							}).done(function(data){
								console.log(data);
								//$("#billing-form").submit();
							});
				
						// THis is email the receipt
						$.ajax({
						url: "email/send_Receipt",
						type:"POST",
						//dataType:"json",		
						//data: $("#billing-form").serialize()
						data:{'card':proCard},						// gui qua controller report la code tra ve tu processCard.php
						beforeSend	: function(){
							$(".overlay, .white-box").css("display","block");
							
							
						}					
						}).done(function(data){
							//$(".overlay, .white-box").css("display","none");
							console.log(data);
							 $.ajax({
									url: "billing/paid"			// tao ra trong SESSION phan tu [paid]
									
									});
							$("#billing-form").submit();
						});
					}
					
					if(data.Response_Code == "14" ){
						$('input[name="cardNumber"]').after('<span class="error">'+data.Description+'</span>');
						e.preventDefault();
					}
					
					
					
			});	
		}
	});
	
});












