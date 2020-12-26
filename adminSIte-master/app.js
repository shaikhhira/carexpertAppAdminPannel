//number of brands in database
//get element from html
var brandTotalNumber=document.getElementById("brandTotalNumber");
//ajax call to get value from php file
var brandCount = $.ajax({
    url: "count.php",
    dataType: "json",
    type:"POST",
    async: false,
    //request to call the function in count php file
    data:{REQUEST:"BRANDCOUNT"}
}).responseText;
//parsing the data in simple formate bcz we get the data in json format
var obj = JSON.parse(brandCount);
//assign the data in html tag
brandTotalNumber.innerHTML=obj;


//number of models in database
//get element from html
var modelTotalNumber=document.getElementById("modelTotalNumber");
//ajax call to get value from php file
var modelCount = $.ajax({
    url: "count.php",
    dataType: "json",
    type:"POST",
    async: false,
    //request to call the function in count php file
    data:{REQUEST:"MODELCOUNT"}
}).responseText;
//parsing the data in simple formate bcz we get the data in json format
var obj = JSON.parse(modelCount);
//assign the data in html tag
modelTotalNumber.innerHTML=obj;


//number of issues in database
//get element from html
var issueTotalNumber=document.getElementById("issueTotalNumber");
//ajax call to get value from php file
var issueCount = $.ajax({
    url: "count.php",
    dataType: "json",
    type:"POST",
    async: false,
    //request to call the function in count php file
    data:{REQUEST:"ISSUECOUNT"}
}).responseText;
//parsing the data in simple formate bcz we get the data in json format
var obj = JSON.parse(issueCount);
//assign the data in html tag
issueTotalNumber.innerHTML=obj;


//number of solution in database
//get element from html
var solutionTotalNumber=document.getElementById("solutionTotalNumber");
//ajax call to get value from php file
var solutionCount = $.ajax({
    url: "count.php",
    dataType: "json",
    type:"POST",
    async: false,
    //request to call the function in count php file
    data:{REQUEST:"SOLUTIONCOUNT"}
}).responseText;
//parsing the data in simple formate bcz we get the data in json format
var obj = JSON.parse(solutionCount);
//assign the data in html tag
solutionTotalNumber.innerHTML=obj;


//brand data insert onclick function
function btnBrand(){
    //get brand tag
    var brandBtn=document.getElementById("brandInput");
    
    //store value in variable
    let brandInput=brandBtn.value;

    //ajax request to send data to php
    let req=$.ajax({
        url:"insert.php",
        type:"POST",
        data:{ BRANDNAME:brandInput,REQUEST:"BRANDINSERT"}

    });

    req.done(function(res){
        alert(res);
    });
    req.fail(function(res,code){
        alert("FAIL "+res.responseText);
    })   
    //clean input tag
    brandBtn.value=""; 
}

//model function to insert data
function btnModel(){
    //get model tag
    var modelBtn=document.getElementById("modelInput");

    //ajax call to get the brand id from jquery function which is inside the html code (onload function)
    $.ajax({
        url:"index.php",
        dataType:"html",
        async:false
    }).responseText;
    //get the value 
    var brandID=(sb);
    
    //store its value in variable
    let modelInput=modelBtn.value;

    //ajax request to send data
    let req=$.ajax({
        url:"insert.php",
        type:"POST",
        //send the value to php file (syntax:key(written in php file):value(get from html))
        data:{ MODELNAME:modelInput,BID:brandID,REQUEST:"MODELINSERT"}
    });

    req.done(function(res){
        alert(res);
    });
    req.fail(function(res,code){
        alert("FAIL "+res.responseText);
    })  
    //clean model input tag
     modelBtn.value="";  
}


//issue insert function
function btnIssue(){
    //get issue tag
    var issueBtn=document.getElementById("issueInput");
    console.log(issueBtn.value);

    //store value
    let issueInput=issueBtn.value;

    //ajax call
    let req=$.ajax({
        url:"insert.php",
        type:"POST",
        data:{ ISSUENAME:issueInput,REQUEST:"ISSUEINSERT"}
    });

    req.done(function(res){
        alert(res);
    });
    req.fail(function(res,code){
        alert("FAIL "+res.responseText);
    }) 
    //clean issue input
    issueBtn.value="";
}


//solution insert function
function btnSolution(){
    //get solution input tag
    var solutionBtn=document.getElementById("solutionInput");
    console.log(solutionBtn.value);
    
    //store value 
    let solutionInput=solutionBtn.value;
    
    //ajax call
    let req=$.ajax({
        url:"insert.php",
        type:"POST",
        data:{ SOLUTIONNAME:solutionInput,REQUEST:"SOLUTIONINSERT"}

    });

    req.done(function(res){
        alert(res);
    });
    req.fail(function(res,code){
        alert("FAIL "+res.responseText);
    }) ;
    //clean inpur od solution
    solutionBtn.value="";
}

function addMaster(){
  //ajax call to get the brand id from jquery function which is inside the html code (document.ready function)
  $.ajax({
    url:"index.php",
    dataType:"html",
    async:false
  }).responseText;

  //get the value 
  console.log(dsb); 
  console.log(sm); 
  console.log(si);
  console.log(ss);   

  brandId=dsb;
  modelId=sm;
  issueId=si;
  solutionId=ss;

  //ajax call
  let req=$.ajax({
    url:"insert.php",
    type:"POST",
    data:{ BID:brandId,MID:modelId,IID:issueId,SID:solutionId,REQUEST:"MASTERINSERT"}

  });

  req.done(function(res){
    alert(res);
  });
  req.fail(function(res,code){
    alert("FAIL "+res.responseText);
  }) ;

  var dropDownBrand=document.getElementById("dropDownBrand");
  dropDownBrand.value="Please Select Brand";
  var dropDownModel=document.getElementById("dropDownModel");
  dropDownModel.value="Please Select Model";
}

    


function logout(){
    alert("done");
    var redirect=$.ajax({
        url: "./Login_v16/login.php",
        dataType: "json",
        type:"POST",
        async: false,
        data:{REQUEST:"LOGOUT"}
    }).responseText;
    window.location.href=("./Login_v16/index.html");
    
}


