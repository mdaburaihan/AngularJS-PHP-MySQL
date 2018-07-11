function validateName()
{
	//var name=obj.value;
    var name=document.getElementById("name").value;
    var regex = /^[A-Za-z\s]+$/;

    if(name=="")
    {
        $('#name').css("border",'');
    }
    else if(!regex.test(name))
    {
         $('#name').css({"border":"1px solid red"});
         $('#nameerrormsg').show();
         document.getElementById("nameerrormsg").innerHTML="Name should contain only alphabets.";
         return false;

     }
     else
     {
        $('#name').css("border",'');
        $('#nameerrormsg').hide();
        document.getElementById("nameerrormsg").innerHTML="";
        return true;
    }
}

function validateEmail(){
    var email=document.getElementById("email").value;

    var positionOfAtTheRate=email.indexOf("@");
    var positionOfDot=email.lastIndexOf(".");
    if(email=="")
    {
       $('#email').css("border",'');
       document.getElementById("emailerrormsg").innerHTML="";
       return true;
   }
   if(positionOfAtTheRate<2 || positionOfAtTheRate+2>email.length || positionOfDot+2>email.length || positionOfAtTheRate<0 || positionOfDot<1||positionOfDot<positionOfAtTheRate)
   {
         $('#email').css({"border":"1px solid red"});
         $('#emailerrormsg').show();
         document.getElementById("emailerrormsg").innerHTML="Invalid email.";
         return false;
     }
   else
   {
       $('#email').css("border",'');
       $('#emailerrormsg').hide();
       document.getElementById("emailerrormsg").innerHTML="";
       return true;
   }
}

function validateInputs(){
    return validateName() && validateEmail();
}
