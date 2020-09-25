(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) 
      {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } 
      else if (this.hasOwnProperty("oldValue")) 
      {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } 
      else 
      {
       
        this.value = "";
      }
 
    });

  };
}(jQuery));
$("#user_phone").inputFilter(function(value) {
  if (isNaN($("#user_phone").val())) {
    $('#phone_error').html("Alphabets are not allowed");
  }
  else
  {
    $('#phone_error').html("");
  }


  return /^-?\d*$/.test(value);
  });

$("#user_name").inputFilter(function(value) {
  var val = $("#user_name").val();
  if (val=='') 
  {
    $('#name_error').hide();
  
  }
 
  else if (isNaN($("#user_name").val())) {
    $('#name_error').html("");
  }
  else
  {
    $('#name_error').html("Numbers are not allowed");
    $('#name_error').show();
  }
  return /^[a-z a-z]*$/i.test(value);
   });
$("#user_last_name").inputFilter(function(value) {
  var val = $("#user_last_name").val();
  if (val=='') 
  {
    $('#last_name_error').hide();
  
  }
 
  else if (isNaN($("#user_last_name").val())) {
    $('#last_name_error').html("");
  }
  else
  {
    $('#last_name_error').html("Numbers are not allowed");
    $('#last_name_error').show();
  }
  return /^[a-z a-z]*$/i.test(value);
   });
$("#user_country").inputFilter(function(value) {
  var val = $("#user_country").val();
  if (val=='') 
  {
    $('#country_error').hide();
  
  }
 
  else if (isNaN($("#user_country").val())) {
    $('#country_error').html("");
  }
  else
  {
    $('#country_error').html("Numbers are not allowed");
    $('#country_error').show();
  }
  return /^[a-z a-z]*$/i.test(value);
   });


    //Dogi
  $(".toggle-password").click(function() {
    var cls = $('.eye').attr('class');
    $(this).toggleClass("eye");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });



// $(function() {
//   $("#registration_form").validate({
//     rules: {
//       user_name: {
//         required: true,
//         minlength: 3,
//         maxlength: 40,
//       },
//       user_last_name: {
//         required: true,
//         minlength: 3,
//         maxlength: 40,
//       },
//       user_password: {
//         required: true,
//         minlength: 6
//       },
//       confirm_password: {
//         required: true,
//         minlength: 6,
//         equalTo: "#user_password"
//       },
//       user_email: {
//         required: true,
//         email: true
//       },
//     },
//     // Specify validation error messages
//     messages: {
//       user_name: {
//         required:  "Please enter your Full Name",
//         minlength: "Your First name must be consists of atleast 3 characters",
//         maxlength: "Too long Name"
//       },
//       user_email: "Please enter a valid email address",
//       confirm_password: {
//         required: "Please Enter Confirm Passowrd",
//         minlength: "Your Password must be atleast 6 characters long",
//         equalTo: "Please Enter Same Passwords"
//       }
//     },

//     // Make sure the form is submitted to the destination defined
//     // in the "action" attribute of the form when valid
//     submitHandler: function(form) {
//       form.submit();
//     }
//   });
// });

  const user_password = document.getElementById("user_password");
  const confirm_password = document.getElementById("confirm_password");
  user_password.onpaste = e => {
    e.preventDefault();
    return false;
  };
  confirm_password.onpaste = e => {
    e.preventDefault();
    return false;
  };

