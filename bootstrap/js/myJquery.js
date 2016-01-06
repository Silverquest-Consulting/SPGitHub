jQuery(document).ready(function($){

	$("#register").click(function(){
		//$("#info").empty();
	var lengthFirst = $("#myForm :input[name='firstname']").val().length;
	
    var lengthLast = $("#myForm :input[name='lastname']").val().length;
    
    
    var m = $("#myForm select[name='month']");
    var mValue = $(m).val();

    var d = $("#myForm select[name='day']");
    var dValue = $(d).val();

    var y = $("#myForm select[name='year']");
    var yValue = $(y).val();

  	var errorArray = new Array();
	var flagError ;
	flagError = false;


    if (lengthFirst == null || lengthFirst == "" || lengthFirst < 5 ) {

    	errorArray[0] = '<h3 style="color:red">FirstName cant be empty or less than 5 characters </h3>' ;
    	flagError = true;
    }

    if (lengthLast == null || lengthLast == "" || lengthLast < 5 ) {
        errorArray[1] = '<h3 style="color:red">LastName cant be empty or less than 5 characters </h3>' ;
        flagError = true;      
    }

    if (mValue == "na" || mValue == "" || dValue == "na" || dValue == "" ||  yValue == "na" || yValue == "") {
          errorArray[2] = '<h3 style="color:red">DOB must be filled out correctly for Month-Day-Year </h3>';
          flagError = true;
    }
    
    if(flagError == true){

    	$("#info").html(errorArray);
    		/*$.each(errorArray, function( index, value ) {
				
			});*/
			return false;
	}else{
		$("#info").html('<h3 class="col-md-6 col-md-offset-5"style="color:red">Thank You </h3>');
	}

	});
	
});