$(document).ready(function(e) {
	
	////////////////////////////////////
	// CALL BACK FORM GIFT, WORKED
	///////////////////////////////////
	
	if (localStorage.getItem("flag1") == "set1") {
		console.log(localStorage.getItem("card"));
		// Tell the user
		//$("#message-form").before("<p id='message'>Hi, Welcome back!</p>");
		
		// Same iteration stuff as before
		var data = $("#message-form").serializeArray();
		
		// Only the only way we can select is by the name attribute, but jQuery is down with that.
		$.each(data, function(i, obj) {
			//console.log(obj);
			console.log(obj.name);
			$("[name='" + obj.name +"']").val(localStorage.getItem(obj.name));
			
		});
		
		// Goi value radio 'card' tu localStorage
		//console.log(localStorage.getItem("card"));
				
		$('input:radio[name="card"][value="'+localStorage.getItem("card")+'"]').prop('checked', true);
		
		// Xoa localSESSION cho 'flag1 va 'card' neu tai /index.php/gift nhan Refresh 2 lan
		localStorage.setItem("flag1", "");		
		localStorage.setItem("card", "");	//console.log(localStorage.getItem('recipient-email'));
	}
	
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
				$(".occ-js").after("<span class='error'>Please choose 1 ecard</span>");
				return false;
			}else{
				////////////////////////////////////////////////
				// SAVE FORM GIFT TO LOCAL STORAGE , WORKED
				// (somehow safari cant work with local storage so we have 2 var isChrome and var isSafari)
				////////////////////////////////////////////////
				
				var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
				var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
				//if (isSafari) alert("You are using Safari!");
				
				// IF browser is !
				
				if (isChrome == true){
					localStorage.setItem("flag1", "set1");
					
					// serializeArray is awesome and powerful
					var data1 = $("#message-form").serializeArray();
					//console.log(data1);
					// iterate over results
					$.each(data1, function(i, obj) {
						// HTML5 magic!!
						//console.log(obj);
						//console.log(obj.name);
						localStorage.setItem(obj.name, obj.value);
						localStorage.setItem('card', radio);			// somehow data1 = $("#message-form").serializeArray(); ko lay dc gia tri radio 'card' so ta them vao dong lenh nay
																		// de ben duoi ta co the goi lai localStorage.getItem('card')
					});
				}
				
				if (isSafari == true){
					
					 $.ajax({
				   			url: "gift/form",			
							type:"POST",
							data: $("#message-form").serialize(),	
				   								
				   			}).done(function(data){
				   				//alert(data);
				   				
				   				
				   			});	
						
				}
					
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
		
		// Delete localStorage of #message-form
		
		localStorage.setItem("flag1", "");		
		localStorage.setItem("card", "");	//console.log(localStorage.getItem('recipient-email'));
		
		// Using Ajax to send Email
		
		$.ajax({
   			url: "email/send_Card",			
			type:"POST",
			data: $("#message-form").serialize(),	
   								
   			}).done(function(data){
   				console.log(data);
   			});
		
		// Delete other blocks and display thankyou message
		
		$('.f, .xmas, .message, .gift').remove();
		$('.thank').css("display","block");
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




