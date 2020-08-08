$(document).ready(function(){
    
    

   
    
    $("#login_submit").click(function(){
       // alert("haiii");
        var login_username=$("#login_username").val();
        var login_pwd=$("#login_pwd").val();
        

        $.post("../controller/mycontroller.php",{action:"loginDetails",'login_username': login_username,'login_pwd':login_pwd},function(result){
            alert(result);
            if($.trim(result)==1)
							{
								window.location.replace("pagefirst.php");
                            }
            else
            {
                $("#div_login_error").html("Username or Password is Incorrect");
            }
            
     });
     
       // $("#div_state").load('../controller/mycontroller.php',
       // {action:'select_reg_state',ctrl_name_state:ctrl_name_state,varselectedCountry:selectedCountry},function(){ 
   
       // });
   });
   
    
   
});