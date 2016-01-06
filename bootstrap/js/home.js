$(document).ready(function(e) {
	
	///////////////////////////////////
	// Hide show shopping cart
	/////////////////////////////////
	var total = $('#totalItem').text();
	
	if(parseInt(total) == 0 || total =='' ){
		$('.title >a').css("display","none");
		$('#totalItem').css("display","none");
	}else{
		$('.title >a').css("display","block");
		$('#totalItem').css("display","block");
	}
	
	///////////////////////////////////
	// Replace picture before redirect
	//////////////////////////////////
	$('.change_icon').on("click",function(){
		
		/*$(this).css("background-color","red").delay(2000).fadeOut(400);
		location="donation";*/
		var catID = $(this).attr('catID');
		
		$(this).find(".gone").remove();
		$(this).find("img").fadeIn(500);
		
		/////////////////////////
		// Delay before redirect
		////////////////////////
		var delay=600;
		setTimeout(function(){
			
			//console.log(catID);
			location="index.php/donation?catID="+catID;
		},delay);
	});
	
	
	
	
});
















