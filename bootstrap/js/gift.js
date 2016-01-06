$(document).ready(function(e) {
	
	////////////////////////////////////
	// Make footer not have fixed class
	///////////////////////////////////
	
	
	
	////////////////////////////////////////////////////////////////
	// Validate form #message-form, error message will be in <span>
	///////////////////////////////////////////////////////////////
	
	$("#message-form").validate({
        errorElement: "span", 
	});
	
	//////////////////////////////////////////////
	// When button Preview (#done) is clicked
	/////////////////////////////////////////////
	
	$("#done").click(function(){
		if($("#message-form").valid()){
			
			// Neu form #message-form passvalidate, then validate form radio X-mas/Generic
			var radio = $('input[name="card"]:checked').val();
			//console.log(radio);
			if(radio == null ){
				$(".occ-js").after("<span id='erro-mess'  style='margin-left:10px;margin-top:10px' class='error'><br>Please choose 1 ecard</span>");
				location="#erro-mess";
				return false;
			}else{
				// Save form #message-form vao $_SESSION['user_message'] thong qua "gift/form"					
					 $.ajax({
				   			url: "gift/form",			
							type:"POST",
							data: $("#message-form").serialize(),	
				   								
				   			}).done(function(data){
				   				
				   				//alert(data);
				   				if(data == "home"){
				   					location="";
				   				}
				   				
				   			});	
						
			
					
			}
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Get value of recipient-name, recipient-email, recipient-message to show in Preview and to Email later
			//////////////////////////////////////////////////////////////////////////////////////////////////////////
			//var recipient_name = $('input[name="recipient-name"]').val();
			var recipient_email = $('input[name="recipient-email"]').val();
			var recipient_message = $('textarea[name="recipient-message"]').val();
			
			$(".e, .f").css("display","none");
			$(".xmas").css("display","block");
			
			if(radio =='xmas'){
				//$(".ecard-pic").append('<img src="../bootstrap/img/Xmas.jpg" width="100%"  />');
				$(".ecard-pic").append('<img src="../bootstrap/img/Amy/Xmas.jpg" width="100%" height="300px"  />');
				//$(".ecard-pic").append('<img src="https://staging.silverquest.com.au/bootstrap/img/Xmas.jpg" width="100%"  />');
				
			}else{
				//$(".ecard-pic").append('<img src="../bootstrap/img/Generic.jpg" width="100%"  />');
				$(".ecard-pic").append('<img src="../bootstrap/img/Amy/Generic.jpg" width="100%" height="300px"   />');	// increase height here if .message is so far from top for Generic Card 
				//$(".ecard-pic").append('<img src="https://staging.silverquest.com.au/bootstrap/img/Generic.jpg" width="100%"  />');
			}
			
			//$(".xmas").after("<div class=\"col-md-12 col-sm-12 col-xs-12\"><pre class='message'>Dear " +recipient_name+ ",<br/>" +recipient_message+ "</pre></div>");
			
			// them div.cover ben trong chua the pre.message ben trong div.ecard-pic
			//$(".ecard-pic").append("<div class=\"col-md-12 col-sm-12 col-xs-12 cover\"><pre class='message'>Dear " +recipient_name+ ",<br/>" +recipient_message+ "</pre></div>");
			$(".ecard-pic").append("<div class=\"col-md-12 col-sm-12 col-xs-12 cover\"><pre class='message'>" +recipient_message+ "</pre></div>");
			
			
			checkSize();	//checkSize for pre.message
			
			// Tao ra mo the div co heigh = 100px truoc the footer de noi dung text ko bi footer che
			$(".a").before('<div class="col-md-12 col-sm-12 col-xs-12 block" style="height:100px"></div>');
			
			// Display phan picture_item and item_description
			$(".gift").css("display","block");
			
			blockSize();
			
		}
	});
	
	function checkSize(){
		// Lay Height cua the img ben trong div.ecard-pic
		var h= $(".ecard-pic img").innerHeight();
		
		// Lay Width cua device
		var body_w = $("body").innerWidth();
		console.log(body_w);
		
		// Neu body_w cua device tu 480px tro len tuc device Lanscape thi +40px de cho the pre.message nam o giua
		if(body_w >= 480){
			h = h * (-0.5) -(40) ;
		}else{
			h = h * (-0.5) -(40) ;	//iphone 6 and 6+ thi + them 20px, chu gia tri cua top la am "-"
		}
		//console.log(h);
		$(".cover").css("top",h);
	}
	
	function blockSize(){
		//Pic1
		var pic1 = $(".pic1").outerHeight();
		$(".pic1_des").css('height',pic1);
			
		//Pic2
		var pic2 = $(".pic2").outerHeight();
		$(".pic2_des").css('height',pic1);
		
		//Pic3
		var pic3 = $(".pic3").outerHeight();
		$(".pic3_des").css('height',pic1);
	}
	
	window.onresize= checkSize;
	window.onresize= blockSize;
	
	
	
	///////////////////////////////////////////
	// Final step, button Send Ecard is clicked
	///////////////////////////////////////////
	
	$("#finish").click(function(){
		
		
		$(".gift").find('button').remove(); //loai bo button Send khi gui qua url: "email/send_Card",		
		$(".gift").find('.pic3_des_3').remove(); //loai bo khoang trang du thua <div class="col-md-6 col-sm-6 col-xs-6 pic3_des_3" style="height:100px"></div>
		
		// Xoa di thuoc tinh style="height"
		
		$(".gift").find('.pic1_des').removeAttr("style"); 
		$(".gift").find('.pic2_des').removeAttr("style");
		$(".gift").find('.pic3_des').removeAttr("style"); 
		
		// Re-organise
		
		var pic2 = $(".gift").find('.pic2'); 
		$(".gift").find('.pic2').remove();
		$(".gift").find('.pic2_des').before(pic2);
		
		// Send email also kill SESSION
		$.ajax({
   			url: "email/send_Card",			
			type:"POST",
			data: {'gift_info':$(".gift").html()},	//Gui vao gift_info which is pic and gift description
			beforeSend	: function(){
				$(".overlay, .white-box").css("display","block");
				
				
			}						
   			}).done(function(data){
   				$(".overlay, .white-box").css("display","none");
   				console.log(data);
   				
   				$('.f, .xmas, .message, .gift').remove();
   				$('.thank').css("display","block");
   			});
		
		/*
		// Delete other blocks and display thankyou message
		
		$('.f, .xmas, .message, .gift').remove();
		$('.thank').css("display","block");*/
	});
	
});

////////////////////////////////////////////////
// Javascript Object BACK 
///////////////////////////////////////////////

function back(){
	history.back();
}

function reload(){
	location.reload();
}




