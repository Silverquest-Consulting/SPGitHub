bootbox.dialog({
  message: "<h1>Tell us what you want</h1> ",
  title: "Next step",
  buttons: {
	  Registration: {
      label: "Registration",
      className: "btn-success",
      callback: function() {
        location="#register";
        $('#register').css("display","block");
      }
    },
    Login: {
      label: "Login",
      className: "btn-info",
      callback: function() {
    	  location="#login";
          $('#login').css("display","block");
      }
    },
    Guess: {
      label: "Checkout as Guest",
      className: "btn-primary",
      callback: function() {
    	  //location="#guest";
          //$('#guest').css("display","block");
    	  location="billing";
      }
    }
  }
});

// Button 'x' to close this pop-up has been turned off
// To enable search "<button type='button' class='bootbox-close-button close' data-dismiss='modal' aria-hidden='true'>&times;</button>"
// in 'bootbox.min.js' and restore &times;, it will come back