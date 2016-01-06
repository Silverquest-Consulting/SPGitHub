$(document).ready(function(e) {
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Tom Testing Ajax to Delete an item in Cart.php, 
	///////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// The <i> o donation_view gui qua checkout/update	
	$("i.del").click(function(){
	
		//var t= $(this).parent().html();
		var iParent = $(this).attr('parent');
		var item = $(this).attr('item');
		//console.log(iParent +''+item);
		$.ajax({
			url: "checkout/update",
			type:"POST",
			data:{'parent':iParent,'item':item} 		
			}).done(function(data){
				//console.log(data)
				location.reload();
				
		});	
	});
	
	// Update Qty at Cart_View
	
	$(".changeme").on("change",function(){
		/*$.each(group,function(){
			console.log($(this).val());	
		});*/
		var val = $(this).val();
		var iParent = $(this).attr('parent');
		var item = $(this).attr('item');
		
		//console.log(val + ' ' + iParent + ' ' +item);
		$.ajax({
			url: "checkout/updateQty",
			type:"POST",
			data:{'parent':iParent,'item':item, 'qty':val} 		
			}).done(function(data){
				//console.log(data)
				location.reload();
				
		});	
		
	});
	
	// When button checkout is clicked, create $_SESSION['user_shopping'] = $_POST for later doing REPORT then redirect to controller user
	$("#mycheckout").on("click",function(e){
		e.preventDefault();
		
		// This step to re-confirm the Subtotal in SESSION (might not needed, just redirect use because in cart_view we already did it at <input type="hidden" name="subTotal" could be remove  BUT KEEP FOR SAFE)
		
		var subtotal = $('input[name="subTotal"]').val();
		//console.log(subtotal);
		
		$.ajax({
			url: "checkout/subTotal",
			type:"POST",
			data:
					$('#item-form').serialize()		
			 		
			}).done(function(data){
				console.log(data)
				location="user";
				
		});	
		
	});
	
	
	
	
});

////////////////////////////////////////////////
// Javascript Object BACK 
///////////////////////////////////////////////

function back(){
	history.back();
}














