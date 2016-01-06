$(document).ready(function(e) {	
	
		
	//////////////////////////////////////////
	//// Show Sign Up form and hide everything
	//////////////////////////////////////////
	
	$("#signup").click(function(){
		$("#login, #btn-guest, #cancel, #signup").remove();
		$("#register").fadeIn();
		
	});
    
	///////////////////////////////////
	//// Validate  form Register Form
	///////////////////////////////////
	
	// Add rule to run Regex on firstname, lastname, suburb
	$.validator.addMethod("string",
	        function(value, element, regexp) {
	            var re = new RegExp(regexp);
	            return this.optional(element) || re.test(value);
	        },
	        "Invalid data"
	);
	
		
	// Add rule to run Regex on password
	$.validator.addMethod("pw",
	        function(value, element, regexp) {
	            var re = new RegExp(regexp);
	            return this.optional(element) || re.test(value);
	        },
	        "Password requires 6 to 20 characters long, and allowed characters are a-z,A-Z,0-9"
	);
	
	// Because name attribue is register[] so we have to use addClassRules for firstname, lastname and suburb
	// in HTML we must add class name firstname, lastname, suburb into
					
	$.validator.addClassRules({
		firstname:{
			string: /^[a-zA-Z'.\s]{1,40}$/	
		},
		lastname:{
			string: /^[a-zA-Z'.\s]{1,40}$/	
		},
		suburb:{
			string: /^[a-zA-Z'.\s]{1,40}$/	
		},
		password:{ 
			pw: /^[a-zA-Z0-9'.\s]{6,20}$/ }			// How come password: pw have to be at both $.validator.addClassRules({ and $("#register-form").validate({ otherwise it wont work
			
	});		
			
	       
	
	
    $("#register-form").validate({
        errorElement: "span", // Định dạng cho thẻ HTML hiện thông báo lỗi
        rules: {
            cpassword: {
                equalTo: "#password", // So sánh trường cpassword với trường có id là password
                	
            },
            firstname:{ 							// khi co addClassRules o tren thi ko can 3 attribute firstname, lastname, suburb o day but i leave it here for reference
				string: /^[a-zA-Z'.\s]{1,40}$/ }
            ,
			lastname:{ 
				string: /^[a-zA-Z'.\s]{1,40}$/ }
			,suburb:{ 
				string: /^[a-zA-Z'.\s]{3,40}$/ }
            ,password:{ 
				pw: /^(?=.*\d)(?=.*[A-Z])(?=.*\W).{6,6}$/ }	// /^(?=.*\d)(?=.*[A-Z])(?=.*\W).{6,6}$/ is Regex for rule 1 Upper Case, 1 Number, and 6 character long
        }
    });
    
    $("#submit-register").click(function(e) {
    	
    	 if($("#register-form").valid()){   // test for validity
             // do stuff if form is valid
    		 //alert('valid');
    		 var email = $('#email').val();			// var email to get email value from user just enter and prepare it for AJAX to send
    		$.ajax({
    				url: "user/checkEmail",			// we send to controller user action 'checkemail'
    				type:"POST",
    				
    				data: {"email":email}		// ham $("#donation").serialize() break phan tu form giong nhu khi ta SUBMIT voi PHP, KQ tuyet voi!!!!
    			}).done(function(data){		
    				//console.log(data);			
    				if(data == 1){				// This is the situation we use AJAX to check and the result retunr email already existed
    					$("#email").after('<span class="error">Email Existed,Please try another one.</span>');
    					location="#email";		// After show error we direct user to the input EMAIL so he will enter another email
    				}else{						// ELSE which mean email user Enter is not existed, we will use AJAX again to create an account for him
    					
    					//console.log('good email');
    					$.ajax({									// This is the situation we use AJAX to create account for USER when he pass validate
    	    				url: "user/register_user",				// we send to controller user action 'register_user'
    	    				type:"POST",
    	    				
    	    				data: $("#register-form").serialize()		// SUBMIT FORM REGISTER to user/register_user to create account for user
    	    			}).done(function(data){
    	    				console.log(data);					// When data tra ve == 1 meaning create user successful 
    	    				if(data == 1){	
    	    				location="billing";		// after register user successful then auto login, dont need code below
    	    				/*	$('#register').hide("slow");		// Hide form Register
    	    					$('#register').after(login);		//Bring back Login form
    	    					location="#login";					// relocation user to form Login, then create a successful message and ask user to login
    	    					//$("#login").before('<div class="container"> <div class="col-md-12 col-sm-12 col-xs-12 success"> Your account has been successfully created. Please login </div>');
    	    					$("#forgot_link").before('<div class="container">	<div class="row my-row"> <div class="alert alert-success">Your account has been successfully created. Please login </div></div</div>');
 	    					   
    	    					
    	    					$('#login').show("slow");	// Finally show form login*/
    	    				} 
    	    			});
    				} 
    			});	
         } else {
             // do stuff if form is not valid
        	// alert('invalid');
         }
    	
    });
    
    ////////////////////////////////////////////////////////
	//// Validate Login Form, simple they just cant be empty
	////////////////////////////////////////////////////////

	$("#login-form").validate({
        errorElement: "span", // Định dạng cho thẻ HTML hiện thông báo lỗi
        
    });
	
	////////////////////////////////////////////////////////
	//// Link show input forgot password
	////////////////////////////////////////////////////////
	
	$("#forgot_link").click(function(e){
	
		e.preventDefault();
		
		//$("#resetPw").css("display","block");
		$("#resetPw").toggle();
			location="#resetPw1";
		
	});
	
	////////////////////////////////////////////////////////
	//// When #resetPw1 click call to controller Email
	////////////////////////////////////////////////////////
	
	// Validate value must be EMAIL
	$("#email").validate({
        errorElement: "span",
    });
	
	// Get email and past to controller Email
	$("#resetPw1").click(function(e){
		
		var email = $('input[name="forgotP"]').val();
		
		 if($("#email").valid()){
			 e.preventDefault();
			 $.ajax({
 				url: "email",			
 				type:"POST",
 				
 				data: {"email":email}		// ham $("#donation").serialize() break phan tu form giong nhu khi ta SUBMIT voi PHP, KQ tuyet voi!!!!
 			}).done(function(data){
 				console.log(data);
 				if(data == "Invalid"){
	 				$('#email span').remove();
	 				$('input[name="forgotP"]').after('<span class="error">Invalid registered email</span>');
 				}else{
 					$('#email span').remove();
	 				$('input[name="forgotP"]').after('<span class="success">'+data+'</span>');
 				}
 			});	
		 }
	});
	
	
	////////////////////////////////////////////////////////
	//// Save user info to localSession
	////////////////////////////////////////////////////////
	
	$('#remember-me').on("change",function(){
		var checks = $("#remember-me:checked");
		//console.log(checks);
		
		/*$.each(checks,function(){
			console.log($(this).val());	
		});*/
		
		var on = checks.length;
		//console.log(on);
		var username = $('#login-form :input[name="username"]').val();
		var password = $('#login-form :input[name="password"]').val();
		//console.log(username);
		if(on == 1 && (username != '' && password !='')){
			// Bit of generic data to test if saved data exists on page load
			localStorage.setItem("flag", "set");
			
			// serializeArray is awesome and powerful
			var data = $("#login-form").serializeArray();
			
			// iterate over results
			$.each(data, function(i, obj) {
				// HTML5 magic!!
				localStorage.setItem(obj.name, obj.value);
			});	
			
		}if(on == 0){
			localStorage.setItem("flag", "");
		}
	});
	
	// Goi lai form when user comeback
	
	if (localStorage.getItem("flag") == "set") {
		
		// Tell the user
		$("#login-form").before("<span class='col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1' id='message'>Hi, Welcome back!<br></span>");
		$("#remember-me").attr('checked','checked');
		// or
		//$("#remember-me").prop('checked','true');
		
		// Same iteration stuff as before
		var data = $("#login-form").serializeArray();
		
		// Only the only way we can select is by the name attribute, but jQuery is down with that.
		$.each(data, function(i, obj) {
			//console.log(obj);
			//console.log(obj.name);
			$("[name='" + obj.name +"']").val(localStorage.getItem(obj.name));
		});
		
	}
	
	/////////////////////////////////////////////////////////
	//// Ajax to see if user login with correct email and pw
	/////////////////////////////////////////////////////////
	
	$('#submit-login').click(function(e){
		e.preventDefault();
		
		if($("#login-form").valid()){   
            // do stuff if form is valid
   		 	   					
	   		$.ajax({
	   			url: "user/validate_user",			
				type:"POST",
				data: $("#login-form").serialize(),	
	   			dataType:"json"							// vi KQ se tra ve mot array $data = array('pass'=>$result,'url'=> $t); nen phai co them dataType:"json"	
	   			}).done(function(data){
	   				//console.log(data);
	   				//console.log(data.pass);
	   				if(data.pass != 1){			// which is user or password is wrong
	   					
	   					$('#login-form :input[name="password"]').after('<span class="error">Invalid username or password </span>');
	   					location="#login-form";			   			
	   				}else{					// which is user login successful
	   					//console.log(data);		// nhu du tinh ban dau thi data.url = /sp/index.php/billing, nhung ta ko the de vao location="/sp/index.php/billing" tuc location = data.url
	   					location="billing"				//do do ta chi can de location="biling", tuc ten controller billing la du, Phan dataType:"json"	 va array $data = array('pass'=>$result,'url'=> $t) se ko can thiet nhung later might be useful nen van de lai	
	   				}
	   			});	
   		}	
	});
	
	////////////////////////////////////////////////////////////
	// Xu ly cho reset email, APPLY only to controller Reset
	//////////////////////////////////////////////////////////
	
	 $("#reset-form").validate({
	        errorElement: "span", // Định dạng cho thẻ HTML hiện thông báo lỗi
	        rules: {
	            cpassword: {
	                equalTo: "#password", // So sánh trường cpassword với trường có id là password
	                	
	            			}
	            	      }
	        
	    });
	
	$("#reset_email").click(function(){
		
		 if($("#reset-form").valid()){   // test for validity
             // do stuff if form is valid
			 $.ajax({
		   			url: "reset/reset_Pass",			
					type:"POST",
					data: $("#reset-form").serialize(),	
		   								
		   			}).done(function(data){
		   				console.log(data);
		   				if(data == 1){
		   					//$('#reset-form :input[name="cpassword"]').after('<span class="success">New password has been updated </span>');
		   					//location.reload();
		   					
		   					$('#register').after('<span class="success">New password has been updated </span>');
		   					$('#register').remove();
		   					
		   				}
		   				
		   			});	
    		
         } 
	});
	
	
});












