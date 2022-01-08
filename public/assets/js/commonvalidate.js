function commonvalidate(){  
	var description=document.myform.description.value;
	if(!/^[A-Za-z0-9]+$/.test(description)){ 
		document.getElementById("div1").innerHTML="Enter description Alpha-numeric";
		document.getElementById("div1").style.color="Red";
		return false;  
	}
	else
	{
		document.getElementById("div1").innerHTML="";
		document.getElementById("div1").style.color="Red";

	}
	//addresss
}
// function addressvalidate()
// {
// 	var insurance=document.myform.insurance.value;
// 	var description=document.myform.description.value;
// 	var address=document.myform.address.value; 
// 	var password1=document.myform.password1.value;
// 	var password_regx= /^[0-9a-z]+$/;
// 	var password2=document.myform.password2.value;
	
	
// 	//insurance
//     if (insurance== ""){  
// 	  document.getElementById("div7").innerHTML="Insurance can't be blank!";
// 	  document.getElementById("div7").style.color="Red"; 
//       return false;  
// 	}  
// 	else
// 	{
// 		document.getElementById("div7").innerHTML="";
// 	}

// 	if (/^[A-Za-z .]{3,15}$/.test(insurance)){  
// 	  document.getElementById("div7").innerHTML="Accepts only alphabetical characters 3 to 15 In Insurance Company name!";
// 	  document.getElementById("div7").style.color="Red"; 
//       return false;  
// 	}  
// 	else
// 	{
// 	  document.getElementById("div7").innerHTML="";
// 	}

//    if (password1== ""){  
// 	 document.getElementById("div3").innerHTML="Password can't be blank!";
// 	 document.getElementById("div3").style.color="Red"; 
//      return false;  
// 	}  
// 	else
// 	{
// 		document.getElementById("div3").innerHTML="";
// 	}
	
	
// 	if(!password_regx.test(password1)){
// 		document.getElementById("div3").innerHTML="At least 1 Uppercase At least 1 Lowercase At least 1 Number At least 1 Symbol, symbol allowed!";
// 		document.getElementById("div3").style.color="Red";
// 		return false;  
// 	}
// 	else
// 	{
// 		document.getElementById("div3").innerHTML="";

// 	}
// 	if (password2== ""){  
// 	 document.getElementById("div4").innerHTML="Password can't be blank!";
// 	 document.getElementById("div4").style.color="Red"; 
//     return false;  
// 	}  
// 	else
// 	{
// 		document.getElementById("div4").innerHTML="";
// 	}
// 	if(!password_regx.test(password2)){
// 		document.getElementById("div4").innerHTML="At least 1 Uppercase At least 1 Lowercase At least 1 Number At least 1 Symbol, symbol allowed!";
// 		document.getElementById("div4").style.color="Red";
// 		return false;  
// 	}
// 	else
// 	{
// 		document.getElementById("div4").innerHTML="";

// 	}
// 	if($password1==$password2)
// 	{
// 		document.getElementById("div4").innerHTML="Password and confirm Password does not Match!";
// 		document.getElementById("div4").style.color="Red";
// 		return false;  
// 	}
// 	else
// 	{
// 		document.getElementById("div4").innerHTML="";

// 	}

// 	if (address== ""){  
// 	 document.getElementById("div2").innerHTML="Address can't be blank!";
// 	 document.getElementById("div2").style.color="Red"; 
//     return false;  
// 	}  
// 	else
// 	{
// 		document.getElementById("div2").innerHTML="";
// 	}
	
// 	var address_regx= /^[0-9a-zA-Z\s,-]+$/;

// 	if(!address_regx.test(address)){
// 		document.getElementById("div2").innerHTML="Please Enter Valid Address!";
// 		document.getElementById("div2").style.color="Red";
// 		return false;  
// 	}
// 	else
// 	{
// 		document.getElementById("div2").innerHTML="";

// 	}

// 	if(!/^[A-Za-z0-9]+$/.test(description)){ 
// 		document.getElementById("div6").innerHTML="Enter description Alpha-numeric";
// 		document.getElementById("div6").style.color="Red";
// 		return false;  
// 	}
// 	else
// 	{
// 		document.getElementById("div6").innerHTML="";
// 		document.getElementById("div6").style.color="Red";

// 	}
	
// 	//password
	
// 	//description

// }