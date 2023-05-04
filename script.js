+ function($) {
  $('.palceholder').click(function() {
    $(this).siblings('input').focus();
  });

  $('.form-control').focus(function() {
    $(this).parent().addClass("focused");
  });

  $('.form-control').blur(function() {
    var $this = $(this);
    if ($this.val().length == 0)
      $(this).parent().removeClass("focused");
  });
  $('.form-control').blur();

  // validetion
  $.validator.setDefaults({
    errorElement: 'span',
    errorClass: 'validate-tooltip'
  });

  $("#formvalidate").validate({
    rules: {
      userName: {
        required: true,
        minlength: 5
       
      },
      userPassword: {
        required: true,
        minlength: 5
      },
      userEmail: {
        required: true,
        minlength: 5,
        email:true
      },
      birthday:{
        required:true
      }

    },
    messages: {
      userName: {
        required: "Please enter your name.",
        minlength: "Please provide a name longer than 5 words.",
      },
      userPassword: {
        required: "Enter your password to Login.",
        minlength: "Incorrect login or password."
      },
      userEmail: {
        required: "Please enter your email.",
        minlength: "Please provide valid email.",
        email:"Please provide valid email."
      },
      birthday: {
        required: "Please choose your birthday.",
        
      }
    }
  });

}(jQuery);

var is_visible = false;

function see()
{
    var input = document.getElementById("userPassword");
    var see = document.getElementById("see");
    
    if(is_visible)
    {
        input.type = 'password';
        is_visible = false; 
        see.style.color='#30a862';
    
    }
    else
    {
        input.type = 'text';
        is_visible = true; 
        see.style.color='#262626';
    }
    
}
 
function see2()
{
    var input = document.getElementById("userPassword2");
    var see = document.getElementById("see2");
    
    if(is_visible)
    {
        input.type = 'password';
        is_visible = false; 
        see.style.color='#30a862';
    
    }
    else
    {
        input.type = 'text';
        is_visible = true; 
        see.style.color='#262626';
    }
    
}
 
function showemailnotice(){
  var popup = document.getElementById("popup");
  popup.classList.toggle('show');
   
}

function check()
{
    var input = document.getElementById("userPassword").value;
    
    input=input.trim();
    document.getElementById("userPassword").value=input;
    if(input.length>=5)
    {
        document.getElementById("check0").style.color="green";
    }
    else
    {
       document.getElementById("check0").style.color="red"; 
    }
    
    if(input.length<=10)
    {
        document.getElementById("check1").style.color="green";
    }
    else
    {
       document.getElementById("check1").style.color="red"; 
    }
    
    if(input.match(/[0-9]/i))
    {
        document.getElementById("check2").style.color="green";
    }
    else
    {
       document.getElementById("check2").style.color="red"; 
    }
    
    if(input.match(/[^A-Za-z0-9-' ']/i))
    {
        document.getElementById("check3").style.color="green";
    }
    else
    {
       document.getElementById("check3").style.color="red"; 
    }
    
    if(input.match(' '))
    {
        document.getElementById("check4").style.color="red";
    }
    else
    {
       document.getElementById("check4").style.color="green"; 
    }
    
}