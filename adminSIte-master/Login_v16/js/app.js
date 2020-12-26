var LNAME =document.getElementById("LUSERNAME");
var LPASS=document.getElementById("LPASSWORD");

function loginBtn(){
    LUSERNAME=(LNAME.value);
    LPASSWORD=(LPASS.value);

    //check if username or password is missing
    if(!(LUSERNAME) || !(LPASSWORD)){
        alert("invalid");
    }else{
        alert("done");
        //check password length
        if((LPASSWORD).length>=5){
            alert("password done");

            //ajax request to send data to php
            let req=$.ajax({
            url:"login.php",
            type:"POST",
            data:{ LUSERNAME:LUSERNAME,LPASSWORD:LPASSWORD,REQUEST:"LOGIN"}
            });
            req.done(function(){
                window.location.href="../index.html";
            });
            req.fail(function(res,code){
               alert("FAIL "+res.responseText);
            })   
            //
        }else{
            alert("incorrect passowrd")
        }
    }
}