
function validateForm() {
    var firstName = document.forms["myForm"]["firstname"].value;
    var lastName = document.forms["myForm"]["lastname"].value;

    var month = document.forms["myForm"]["month"].value; 
    var m = document.getElementById("month");
    var mValue = m.options[m.selectedIndex].value;
    //alert(mValue);

    var day = document.forms["myForm"]["day"].value;
    var d = document.getElementById("day");
    var dValue = d.options[d.selectedIndex].value;
    //alert(dValue);

    var year = document.forms["myForm"]["year"].value;
    var y = document.getElementById("year");
    var yValue = y.options[y.selectedIndex].value;
    //alert(yValue);

    var lengthFirst = firstName.length;
    var lengthLast = lastName.length;
    //alert(lengthFirst + ' ' + lengthLast);
    
   /* if(lengthFirst < 5){
      alert('not good');
    }*/


    if (lengthFirst == null || lengthFirst == "" || lengthFirst < 5 ) {
        alert("FirstName must be filled out correctly");
        return false;
    }else if (lengthLast == null || lengthLast == "" || lengthLast < 5 ) {
        alert("LastName must be filled out correctly");
        return false;
    }

    else if (mValue == "na" || mValue == "" || dValue == "na" || dValue == "" ||  yValue == "na" || yValue == "") {
        alert("DOB must be filled out correctly");
        return false;
    }

    else{
      alert('Thank you');
    }

    //alert(firstName + ' ' + lastName);
}
