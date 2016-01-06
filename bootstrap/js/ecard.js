$(document).ready(function(e) {
	
	/*$('button[name="go"]').click(function(){
		var t=$('input[name="choice"]:checked').val();
		console.log(t);
		if(t=='no'){
			$('.choice').css("display","none");
			$('.thank').css("display","block");
		}

		if(t=='yes'){
			//location="/sp/bootstrap/ecard.php"; //LOCALHOST WORKS
			location="gift"; 
		}
	});*/
	
	$('button[name="no"]').click(function(){
		
			$('.choice').css("display","none");
			$('.thank').css("display","block");
			 $.ajax({
		   			url: "ecard/kill",			
					
							   								
		   			}).done(function(data){
		   				//alert(data);
		   						   				
		   			});	
	});	
	
	$('button[name="yes"]').click(function(){
		
		location="gift"; 
	});	
	
	$('button[name="keepgiving"]').click(function(){
		
		
	});	

		
	
	
});

////////////////////////////////////////////////
// Javascript Object BACK 
///////////////////////////////////////////////

function back(){
	history.back();
}




