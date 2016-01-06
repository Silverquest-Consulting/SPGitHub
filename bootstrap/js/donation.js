$(document).ready(function(e) {
	
	function bodyOutside(){
		var t =$("body").outerHeight();
		return t;
	}
	
	var r = bodyOutside();
	
	//////////////////////////////////////
	// Description for item of donation
	//////////////////////////////////////
	
	$('#desc1').click(function() {
		
		// Show and hide donation item
		$('.item2, .item3, .item4 ').toggle();
		
		//////////////////////////////
		// Change arrow		OLD, but good to keep
		////////////////////////////////
		/*if($("#desc1").attr('class') == 'fa fa-chevron-right fa-3x'){
			$("#desc1").removeClass('fa fa-chevron-right fa-3x').addClass('fa fa-chevron-down fa-3x');
		}else{
			$("#desc1").removeClass('fa fa-chevron-down fa-3x').addClass('fa fa-chevron-right fa-3x');
		}*/
		
		//////////////////////////////
		//// Change arrow 	NEW
		//////////////////////////////
		
		var right = $("#desc1").attr('src');	// 01- lay chuoi chua src cua img, http://localhost/sp/bootstrap/img/header_footer/DownDropDownArrow.png
		//console.log(right);
		len = right.length;						// 02- dem do dai cua chuoi
				
		var m = right.slice(-21,len);	// cat chuoi "DownDropDownArrow.png" co 21 char long, var m now = DownDropDownArrow.png
		//console.log(right);
		
		var head_len = len-21;	// lay phan length cua head de co var head = http://localhost/sp/bootstrap/img/header_footer/
		//console.log(head_len);
		
		var head = right.slice(0,head_len);	// lay var head =  http://localhost/sp/bootstrap/img/header_footer/
		//console.log(head);
		if(m == "DownDropDownArrow.png"){
			$("#desc1").removeAttr('src').removeClass().attr('src',head+"SideDropDownArrow.png").addClass("arrow-down");
		}else{
			$("#desc1").removeAttr('src').removeClass().attr('src',head+"DownDropDownArrow.png").addClass("arrow-right");
		}
				
		
		//Open block discription and hide 
		$(".myitem > *").eq(1).toggle();
		
		//$(".block-empty").toggle(function(){
			
			var bodyInside = $("body").outerHeight();
			var offSet = (r - bodyInside) + 60 ;
			console.log(r);
			console.log(bodyInside);
			console.log(offSet);
			$(".desc1").css("height",offSet);
			//alert(offSet);
		//});
	});
	
	$('#desc2').click(function() {
		
		// Show and hide donation item
		$('.item1, .item3, .item4 ').toggle();
		
		// Change arrow	OLD	
		/*if($("#desc2").attr('class') == 'fa fa-chevron-right fa-3x'){
			$("#desc2").removeClass('fa fa-chevron-right fa-3x').addClass('fa fa-chevron-down fa-3x');
		}else{
			$("#desc2").removeClass('fa fa-chevron-down fa-3x').addClass('fa fa-chevron-right fa-3x');
		}*/
		
		//////////////////////////////
		//// Change arrow 	NEW
		//////////////////////////////
		
		var right = $("#desc2").attr('src');	// 01- lay chuoi chua src cua img, http://localhost/sp/bootstrap/img/header_footer/DownDropDownArrow.png
		//console.log(right);
		len = right.length;						// 02- dem do dai cua chuoi
				
		var m = right.slice(-21,len);	// cat chuoi "DownDropDownArrow.png" co 21 char long, var m now = DownDropDownArrow.png
		//console.log(right);
		
		var head_len = len-21;	// lay phan length cua head de co var head = http://localhost/sp/bootstrap/img/header_footer/
		//console.log(head_len);
		
		var head = right.slice(0,head_len);	// lay var head =  http://localhost/sp/bootstrap/img/header_footer/
		//console.log(head);
		if(m == "DownDropDownArrow.png"){
			$("#desc2").removeAttr('src').removeClass().attr('src',head+"SideDropDownArrow.png").addClass("arrow-down");
		}else{
			$("#desc2").removeAttr('src').removeClass().attr('src',head+"DownDropDownArrow.png").addClass("arrow-right");
		}
		
		
		//Open block discription and hide 
		$(".myitem > *").eq(3).toggle();
		
	//	$(".block-empty").toggle(function(){
			
			var bodyInside = $("body").outerHeight();
			var offSet = (r - bodyInside) + 60 ;
			console.log(r);
			console.log(bodyInside);
			console.log(offSet);
			$(".desc2").css("height",offSet);
			//alert(offSet);
	//	});
	});
	
	$('#desc3').click(function() {
			
			// Show and hide donation item
			$('.item1, .item2, .item4 ').toggle();
			
			// Change arrow	OLD	
			/*if($("#desc3").attr('class') == 'fa fa-chevron-right fa-3x'){
				$("#desc3").removeClass('fa fa-chevron-right fa-3x').addClass('fa fa-chevron-down fa-3x');
			}else{
				$("#desc3").removeClass('fa fa-chevron-down fa-3x').addClass('fa fa-chevron-right fa-3x');
			}*/
			
			//////////////////////////////
			//// Change arrow 	NEW
			//////////////////////////////
			
			var right = $("#desc3").attr('src');	// 01- lay chuoi chua src cua img, http://localhost/sp/bootstrap/img/header_footer/DownDropDownArrow.png
			console.log(right);
			len = right.length;						// 02- dem do dai cua chuoi
					
			var m = right.slice(-21,len);	// cat chuoi "DownDropDownArrow.png" co 21 char long, var m now = DownDropDownArrow.png
			//console.log(right);
			
			var head_len = len-21;	// lay phan length cua head de co var head = http://localhost/sp/bootstrap/img/header_footer/
			console.log(head_len);
			
			var head = right.slice(0,head_len);	// lay var head =  http://localhost/sp/bootstrap/img/header_footer/
			console.log(head);
			if(m == "DownDropDownArrow.png"){
				$("#desc3").removeAttr('src').removeClass().attr('src',head+"SideDropDownArrow.png").addClass("arrow-down");
			}else{
				$("#desc3").removeAttr('src').removeClass().attr('src',head+"DownDropDownArrow.png").addClass("arrow-right");
			}
			
			//Open block discription and hide 
			$(".myitem > *").eq(5).toggle();
			
		//	$(".block-empty").toggle(function(){
				
				var bodyInside = $("body").outerHeight();
				var offSet = (r - bodyInside) + 60 ;		// body Height first load - body height when .block-empty toogle
				$(".desc3").css("height",offSet);
				//alert(offSet);
		//	});
	});
	
	//////////////////////////////////////
	// Calculation donation item START
	//////////////////////////////////////
	
	var items = ["#item1","#item2","#item3"];
	
	price_sum(items);
	
	$.each(items, function( index, val ){
		
		$(val).on("change",function(){
			
			total = items_price(val);	
			
			//Thay doi gia ben canh selectbox
			
			$(val).siblings('strong.price').text('$'+total);
			
			//Goi ham tinh tong cua ca gio hang
			price_sum(items);
		});
	});
	
	
	//Ham tinh tong cua tung mat hang
	function items_price(selector){
		var quanlity = $(selector).val();			
		var price 	 = $(selector).attr('data-price');
		var total 	 = quanlity * price;
		
		
		return total;
	}
	
	// Tinh tong cua ca gio hang, tu day lam luon cac chuc nang khac
	function price_sum(selector){
		var total = 0;
		$.each(selector, function( index, val ){
			//console.log(val);
			total =  total + items_price(val);
		});
		
		$("p.sum").text('$' + total);
		
		////////////////////////////////////////////////////////
		//Cac chuc nang khac khi da co tong gia tri cua 3 item
		///////////////////////////////////////////////////////
		
		// 01- Tao ra input hidden chua Total Price de submit to SESSION
		var d= $("p.sum").append('<input type="hidden" name="total" value="' +total+ '">');
		
		/////////////// LAM ITEM BASKET	///////////////////////////////
		
		//- Tao ra bien totalItem tinh tong so item trong mot category
		var totalItem = parseInt($('#item1').val()) + parseInt($('#item2').val()) + parseInt($('#item3').val());
		
		// Trong donation_view tao ra o input hidden #totalItem va moi lan co thay doi thi gia tri o nay cung thay doi
		$("#totalItem").val(totalItem);
		
		// Sau do moi lan selectbox thay doi la submit form qua basket.php
		$.ajax({
			url: "basket",
			type:"POST",
			
			data: $("#donation").serialize()		// ham $("#donation").serialize() break phan tu form giong nhu khi ta SUBMIT voi PHP, KQ tuyet voi!!!!
		}).done(function(data){
			//console.log(data);
			$('#basket').remove();
			$('#submit').after("<span id='basket'>" +data+"</span>");
			
			// Goi ham checkSize() đe span#basket luon nam TOP-RIGHT cua TROLLEYY
			checkSize();
			
			// When basket = 0 then hidden basket
			var span_basket = $('#basket').text();
			if(span_basket == "0"){
				$('#basket').css("display","none");
			}
						
		});	
				
	}
	
	// Ham checkSize() đe span#basket luon nam TOP-RIGHT cua TROLLEYY
	function checkSize(){
	    /*if ($("#bakset").css("left") == "247" ){
	        alert('oh');
	    }*/
		
		// Xu ly LEFT cho span#basket
		var img_D = $('.cart').outerWidth();
		var img_H = $('.cart').outerHeight();
		
		var offset_D = img_D - (parseInt(img_D)/3)-15;
		//console.log(img_D);
		//console.log(img_H);
		//console.log(offset_D);
		
		$('#basket').css("left",offset_D);
		
		// Xu ly TOP cho span#basket
		var offset_H = parseInt(img_H)/4;
		$('#basket').css("top",offset_H);
		
		
		
	}
	
	// Tuy nhien khi rotate man hinh thi span#basket bi sai vi tri
	// Goi doi tuong window.onresize = checkSize de no luon nam dung vi tri
	
	window.onresize= checkSize;
   
	
	//////////////////////////////////////
	// Calculation donation item END
	//////////////////////////////////////
	
	/////////////////////////////////////
	//// Lay height cho div.block-empty
	////////////////////////////////////
	
	
	
	////////////////////////////////////////////////////
	// Validation before submit - Total item in BASKET have to > 0
	// $('#submit') la icon Trolley o donation_view.php
	///////////////////////////////////////////////////
	
	$('#submit').click(function() {
		
		// Variable 'm' to get Total  
		//var m= $("p.sum input").attr('value'); //older version test with Total Price, now no need
		
		var m= parseInt($("#submit > span").text());	//lay gia tri cua tong so item trong BASKET - OLD
		
		var m= parseInt($("#basket").text());			//lay gia tri cua tong so item trong BASKET - NEW
		// If m == 0 NO SUBMIT form, else to submit
		if(m==0){
			return false;
		}else{
						
			$('#donation').submit();
		}	        
			
	});
	

	
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Tom Testing Ajax to Delete an item in Cart.php, dang test voi item Bible cua Catogry Church, It works when fix cart.php
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
	
});

////////////////////////////////////////////////
// Javascript Object BACK 
///////////////////////////////////////////////

function back(){
	history.back();
}




