function validateform(){  
	var title=document.myform.title.value; 
	var client_name=document.myform.client_name.value; 
	var account_number=document.myform.account_number.value; 
	var status=document.myform.status.value; 
	var entity=document.myform.entity.value; 
	var role=document.myform.role.value; 
	var gender=document.myform.gender.value; 
	var address=document.myform.address.value; 
	var idproof_type=document.myform.idproof_type.value; 
	var id_number=document.myform.id_number.value; 
	var txtDate=document.myform.txtDate.value; 
	var tin1=document.myform.tin1.value; 
	var nationality=document.myform.nationality.value; 
	var placebirth=document.myform.placebirth.value; 
	var business_type=document.myform.business_type.value; 
	var vrn=document.myform.vrn.value; 
	var contact_person=document.myform.contact_person.value; 
	var tin2=document.myform.tin2.value; 
	var country_register=document.myform.country_register.value; 
	var regis_number=document.myform.regis_number.value; 
	var regis_date=document.myform.regis_date.value; 
	var tel_no1=document.myform.tel_no1.value; 
	var tel_no2=document.myform.tel_no2.value; 
	var tel_no3=document.myform.tel_no3.value; 
	var mobile_number1=document.myform.mobile_number1.value; 
	var mobile_number2=document.myform.mobile_number2.value; 
	var mobile_number3=document.myform.mobile_number3.value; 
	var email1=document.myform.email1.value; 
	var email2=document.myform.email2.value; 
	var email3=document.myform.email3.value; 
	var appointment_date=document.myform.appointment_date.value; 
	var mandate_date=document.myform.mandate_date.value; 

//client_name pattten
var client_name_regx = /^[A-Za-z\s .]{3,15}$/;
var accountnumber_regx = /^[0-9 .]{9,18}$/;
var address_regx= /^[0-9a-zA-Z\s,-]+$/;
var idnumber_regx = /^[0-9 .]{9}$/;
//var dobpattern = /^([0-9]{2})\-([0-9]{2})\-([0-9]{4})$/;
var tin_regx = /^[0-9 .]{2}$/;
var nationality_regx = /^[A-Za-z\s . ]{3,15}$/;
var var_regx = /^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$/;
var pan_regx = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
var telephone_regx = /^[989][0-9]{9}$/;
//title
if(title== null || title== ""){ 
	document.getElementById("div1").innerHTML="Title can't be blank!";
	document.getElementById("div1").style.color="Red";
	return false;  
}
else
{
	document.getElementById("div1").innerHTML="";
	document.getElementById("div1").style.color="Red";

}
  //clientname
  if(client_name==null || client_name==""){  
  	document.getElementById("div2").innerHTML="Clientname can't be blank!";
  	document.getElementById("div2").style.color="Red";
  	return false;  

  }
  else
  {
  	document.getElementById("div2").innerHTML="";

  }
  if(!client_name_regx.test(client_name)){  
  	document.getElementById("div2").innerHTML="Accepts only alphabetical characters 3 to 15 In Client name!";
  	document.getElementById("div2").style.color="Red";
  	return false;  

  }
  else
  {
  	document.getElementById("div2").innerHTML="";

  }
//account_number


if (account_number=="" ){ 
	document.getElementById("div3").innerHTML="Account_number can't be blank!";
	document.getElementById("div3").style.color="Red"; 
  // $('#title_msg').html("Account_number can't be blank!");
  return false;  
}
else
{
	document.getElementById("div3").innerHTML="";
} 
if(!accountnumber_regx.test(account_number)){
	document.getElementById("div3").innerHTML="Accepts only Number  9 to 18 In Account number!";
	document.getElementById("div3").style.color="Red"; 
  // $('#title_msg').html("Accepts only alphabetical && Number  9 to 18 In Account number!");
  return false;  
}
else
{
	document.getElementById("div3").innerHTML="";
} 

//status
if(status== ""){  
	document.getElementById("div4").innerHTML="Client Type can't be blank!";
	document.getElementById("div4").style.color="Red"; 
  // $('#title_msg').html("Client Type can't be blank!");
  return false;  
} 
else
{
	document.getElementById("div4").innerHTML="";
} 
//entity
if (entity== ""){  
	document.getElementById("div5").innerHTML="Entity can't be blank!";
	document.getElementById("div5").style.color="Red"; 
  // $('#title_msg').html("Entity can't be blank!");
  return false;  
}  
else
{
	document.getElementById("div5").innerHTML="";
}
//role
if (role== ""){  
	document.getElementById("div6").innerHTML="Occupation can't be blank!";
	document.getElementById("div6").style.color="Red";
  // $('#title_msg').html("Role can't be blank!");
  return false;  
}
else
{
	document.getElementById("div6").innerHTML="";
}  
//gender
if (gender == null || gender == ""){  
	document.getElementById("div7").innerHTML="Gender can't be blank!";
	document.getElementById("div7").style.color="Red";
  // $('#title_msg').html("Gender can't be blank!");
  return false;  
}
else
{
	document.getElementById("div7").innerHTML="";
} 
// address_regx
if (address == null || address == ""){  
	document.getElementById("div8").innerHTML="Address can't be blank!";
	document.getElementById("div8").style.color="Red";
     return false;  
 }
else
{
	document.getElementById("div8").innerHTML="";
}  

if(!address_regx.test(address)){
	document.getElementById("div8").innerHTML="Please Enter Valid Address!";
	document.getElementById("div8").style.color="Red";
  // $('#title_msg').html("Please Enter Address charcater");
  return false;  
}
else
{
	document.getElementById("div8").innerHTML="";

}

//idproof_type


if (idproof_type ==  ""){  
	document.getElementById("div9").innerHTML="Idproof_type can't be blank!";
	document.getElementById("div9").style.color="Red";
  // $('#title_msg').html("Idproof_type can't be blank!");
  return false;  
}
else{
	document.getElementById("div9").innerHTML="";
} 
//id_number 



if (id_number ==  ""){ 
	document.getElementById("div10").innerHTML="Id Number can't be blank!";
	document.getElementById("div10").style.color="Red"; 
  // $('#title_msg').html("Id Number can't be blank!");
  return false;  
}else
{
	document.getElementById("div10").innerHTML="";
}  
if(!idnumber_regx.test(id_number)){
	document.getElementById("div10").innerHTML="Accepts only 9 Digit Id Number!";
	document.getElementById("div10").style.color="Red"; 
  // $('#title_msg').html(" Accepts only 9 Digit Id Number ! ");
  return false;  
}else
{
	document.getElementById("div10").innerHTML="";

}
//dob 
if (txtDate ==  ""){ 
	document.getElementById("div11").innerHTML="Date of Birthday can't be blank!";
	document.getElementById("div11").style.color="Red";  
  // $('#title_msg').html("Date of Birthday can't be blank!");
  return false;  
}else
{
	document.getElementById("div11").innerHTML="";
}  
//tin
if (tin1 ==  "" || tin1 == null ){  
	document.getElementById("div12").innerHTML="Tin can't be blank!";
	document.getElementById("div12").style.color="Red";  
  // $('#title_msg').html("Tin can't be blank!");
  return false;  
} else
{
	document.getElementById("div12").innerHTML="";

} 
if(!tin_regx.test(tin1)){
	document.getElementById("div12").innerHTML="Accepts 2 Digit TIN Number!";
	document.getElementById("div12").style.color="Red";  
  // $('#title_msg').html(" Accepts 2 Digit TIN Number ! ");
  return false;  
}
else
{
	document.getElementById("div12").innerHTML="";

}
//nationality

if (nationality ==  ""){  
	document.getElementById("div13").innerHTML="Nationality can't be blank!";
	document.getElementById("div13").style.color="Red";  
  // $('#title_msg').html("Nationality can't be blank!");
  return false;  
}
else
{
	document.getElementById("div13").innerHTML="";
}
if(!nationality_regx.test(nationality)){
	document.getElementById("div13").innerHTML="Accepts only alphabetical 3 to 15 In Nationality!";
	document.getElementById("div13").style.color="Red";  
  // $('#title_msg').html("Accepts only alphabetical 3 to 15 In Nationality!! ");
  return false;  
}
else
{
	document.getElementById("div13").innerHTML="";

}
//placeof birth
if (placebirth ==  ""){  
	document.getElementById("div14").innerHTML="Place of Birth can't be blank!";
	document.getElementById("div14").style.color="Red";  
  // $('#title_msg').html("Place of Birth can't be blank!");
  return false;  
}
else
{
	document.getElementById("div14").innerHTML="";

} 
if(!client_name_regx.test(placebirth)){
	document.getElementById("div14").innerHTML="Accepts only alphabetical characters 3 to 15 In Place of Birth!";
	document.getElementById("div14").style.color="Red"; 
  // $('#title_msg').html("Accepts only alphabetical characters 3 to 15 In Place of Birth!! ");
  return false;  
} 
else
{
	document.getElementById("div14").innerHTML="";

}

//business_type
if (business_type ==  ""){  
	document.getElementById("div15").innerHTML="Business_Type can't be blank!";
	document.getElementById("div15").style.color="Red"; 
  // $('#title_msg').html("Business_Type can't be blank!");
  return false;  
}  
else
{
	document.getElementById("div15").innerHTML="";

}
//vrn

if (vrn ==  ""){  
	document.getElementById("div16").innerHTML="VRN can't be blank!";
	document.getElementById("div16").style.color="Red"; 
  // $('#title_msg').html("VRN can't be blank!");
  return false;  
} 
else
{
	document.getElementById("div16").innerHTML="";
} 
 if(!/^[A-Za-z0-9]\d{15,15}$/.test(vrn)){
    document.getElementById("div16").innerHTML="Accepts only Numeric value length 16 In VRN!! ";
	document.getElementById("div16").style.color="Red"; 
  //$('#title_msg').html("Accepts only alphabetical characters 3 to 15 In VRN!! ");
  return false;  
}
else
{
	document.getElementById("div16").innerHTML="";
} 
//contaant person
if (contact_person ==  ""){  
	document.getElementById("div17").innerHTML="Contact_person can't be blank!";
	document.getElementById("div17").style.color="Red";
	// $('#title_msg').html("Contact_person can't be blank!");
	return false;  
}
else
{
	document.getElementById("div17").innerHTML="";
} 
if(!client_name_regx.test(contact_person)){
	document.getElementById("div17").innerHTML="Accepts only alphabetical characters 3 to 15 In Contact person!!";
	document.getElementById("div17").style.color="Red";
	// $('#title_msg').html("Accepts only alphabetical characters 3 to 15 In Contact person!! ");
	return false;  
} 
else
{
	document.getElementById("div17").innerHTML="";
}  
//pan number
if (tin2 ==  ""){  
	document.getElementById("div18").innerHTML="TIN/PAN can't be blank!";
	document.getElementById("div18").style.color="Red";
	// $('#title_msg').html("TIN/PAN can't be blank!");
	return false;  
}else
{
	document.getElementById("div18").innerHTML="";
}   
 if(!/^[A-Z0-9]{10,10}$/.test(tin2)){
    document.getElementById("div18").innerHTML="Alpha-numeric Enter length 10!";
	document.getElementById("div18").style.color="Red";
  return false;  
 } 
else
{
	document.getElementById("div18").innerHTML="";
}
if (country_register ==  ""){  
	document.getElementById("div19").innerHTML="Country Register can't be blank!";
	document.getElementById("div19").style.color="Red";
  // $('#title_msg').html("Country Register can't be blank!");
  return false;  
}
else
{
	document.getElementById("div19").innerHTML="";
} 

if (regis_number ==  ""){  
	document.getElementById("div20").innerHTML="Registaction_number can't be blank!";
	document.getElementById("div20").style.color="Red";
  // $('#title_msg').html("Registaction_number can't be blank!");
  return false;  
}else
{
	document.getElementById("div20").innerHTML="";
} 
if(!/^[0-9]\d{5,8}$/.test(regis_number)){
    document.getElementById("div20").innerHTML="Accepts only Numberic length 6 between 9 Register Number!!";
	document.getElementById("div20").style.color="Red";
  return false;  
 } 
else
{
	document.getElementById("div20").innerHTML="";
}
if (regis_date ==  ""){
	document.getElementById("div21").innerHTML="Registacion Date can't be blank!";
	document.getElementById("div21").style.color="Red";  
  // $('#title_msg').html("Registacion Date can't be blank!");
  return false;  
}else
{
	document.getElementById("div21").innerHTML="";
} 

//telephone
if (tel_no1 ==  ""){  
	document.getElementById("div22").innerHTML="Telephone No 1 can't be blank!";
	document.getElementById("div22").style.color="Red"; 
  // $('#title_msg').html("Telephone No 1 can't be blank!");
  return false;  
}
else
{
	document.getElementById("div22").innerHTML="";
} 

if (!/^(7|8|9)\d{9,9}$/.test(tel_no1))
{
	document.getElementById("div22").innerHTML="You have entered 0-9 length (6) Telephone no 1!";
	document.getElementById("div22").style.color="Red";
 // $('#title_msg').html("You have entered 0-9 Telephone no 1!");
 return false
}
else
{
	document.getElementById("div22").innerHTML="";
} 

//telephone 2
if (tel_no2 ==  ""){  
  // $('#title_msg').html("Telephone No 2 can't be blank!");
  document.getElementById("div23").innerHTML="Telephone No 2 can't be blank!";
  document.getElementById("div23").style.color="Red";
 // $('#title_msg').html("You have entered 0-9 Telephone no 1!");
 return false
}
else
{
	document.getElementById("div23").innerHTML="";
} 
if (!/^(7|8|9)\d{9,9}$/.test(tel_no2))
{
	document.getElementById("div23").innerHTML="You have entered 0-9 length (6) Telephone no 2!";
	document.getElementById("div23").style.color="Red";
 // $('#title_msg').html("You have entered 0-9 Telephone no 2!");
 return false
}
else
{
	document.getElementById("div23").innerHTML="";
} 
//telephone 3
if (tel_no3 ==  ""){  
	document.getElementById("div24").innerHTML="Telephone No 3 can't be blank!";
	document.getElementById("div24").style.color="Red";
 // $('#title_msg').html("You have entered 0-9 Telephone no 1!");
 return false
}
else
{
	document.getElementById("div24").innerHTML="";
} 
if (!/^(7|8|9)\d{9,9}$/.test(tel_no3))
{
	document.getElementById("div24").innerHTML="You have entered 0-9 length (6) Telephone no 3!";
	document.getElementById("div24").style.color="Red";
 // $('#title_msg').html("You have entered 0-9 Telephone no 3s!");
 return false
}
else
{
	document.getElementById("div24").innerHTML="";
} 
//mobile 1
if (mobile_number1 ==  ""){  
	document.getElementById("div25").innerHTML="Mobile Number 1 can't be blank!";
	document.getElementById("div25").style.color="Red";
  // $('#title_msg').html("Mobile Number 1 can't be blank!");
  return false;  
}
else
{
	document.getElementById("div25").innerHTML="";
}
if (!/^(7|8|9)\d{9,9}$/.test(mobile_number1))
{
	document.getElementById("div25").innerHTML="You have entered 0-9 length (10) Mobile no 1!";
	document.getElementById("div25").style.color="Red";
 // $('#title_msg').html("You have entered 0-9 Mobile no 1!");
 return false
}else
{
	document.getElementById("div25").innerHTML="";
}
  //mobile 2
  if (mobile_number2 ==  ""){  
  	document.getElementById("div26").innerHTML="Mobile Number 2 can't be blank!";
  	document.getElementById("div26").style.color="Red";
  // $('#title_msg').html("Mobile Number 2 can't be blank!");
  return false;  
}
else
{
	document.getElementById("div26").innerHTML="";
}
if (!/^(7|8|9)\d{9,9}$/.test(mobile_number2))
{
	document.getElementById("div26").innerHTML="You have entered 0-9 length (10) Mobile no 2!";
	document.getElementById("div26").style.color="Red";
 // $('#title_msg').html("You have entered 0-9 Mobile no 2!");
 return false
}
else
{
	document.getElementById("div26").innerHTML="";
}
  //mobile 3
  if (mobile_number3 ==  ""){  
  	document.getElementById("div27").innerHTML="Mobile Number 3 can't be blank!";
  	document.getElementById("div27").style.color="Red";
  // $('#title_msg').html("Mobile Number 3 can't be blank!");
  return false;  
}
else
{
	document.getElementById("div27").innerHTML="";

}
if (!/^(7|8|9)\d{9,9}$/.test(mobile_number3))
{
	document.getElementById("div27").innerHTML="You have entered 0-9 length (10) Mobile no 3!";
	document.getElementById("div27").style.color="Red";
	 // $('#title_msg').html("You have entered 0-9 Mobile no 3!");
	 return false
	}
	else
	{
		document.getElementById("div27").innerHTML="";
	}

	if (email1 ==  ""){ 
	document.getElementById("div28").innerHTML="Email Address 1 can't be blank!";
	document.getElementById("div28").style.color="Red"; 
  // $('#title_msg').html("Email Address 1 can't be blank!");
    return false;  
    }
   else
	{
		document.getElementById("div28").innerHTML="";
	}
	// if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email1))
	// {
 //     document.getElementById("div28").innerHTML="Invalid email address 1";
	//  document.getElementById("div28").style.color="Red"; 
	//  // $('#title_msg').html("Invalid email address 1 !");
	//  return false
	// }
	// else
	// {
	// 	document.getElementById("div28").innerHTML="";
	// }

	if (email2 ==  ""){  
	 document.getElementById("div29").innerHTML="Email Address 2 can't be blank!";
	 document.getElementById("div29").style.color="Red"; 
	  // $('#title_msg').html("Email Address 2 can't be blank!");
	  return false;  
	}
	else
	{
		document.getElementById("div29").innerHTML="";
	}
	// if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email2))
	// {
	//    document.getElementById("div29").innerHTML="Invalid email address 2";
	//    document.getElementById("div29").style.color="Red"; 
	//  // $('#title_msg').html("Invalid email address 2 !");
	//  return false
	// }
	// else
	// {
	// 	document.getElementById("div29").innerHTML="";
	// }


	if (email3 ==  ""){  
		 document.getElementById("div30").innerHTML="Email Address 3 can't be blank!";
	     document.getElementById("div30").style.color="Red"; 
	  // $('#title_msg').html("Email Address 3 can't be blank!");
	  return false;  
	}
	else
	{
		document.getElementById("div30").innerHTML="";
	}
 
	// if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email3))
	// {
	// 	 document.getElementById("div30").innerHTML="Invalid email address 3!";
	//      document.getElementById("div30").style.color="Red"; 
	//  // $('#title_msg').html("Invalid email address 3 !");
	//  return false
	// }
 //   else
	// {
	// 	document.getElementById("div30").innerHTML="";
	// }

	if (appointment_date ==  ""){  
		 document.getElementById("div31").innerHTML="Appointment Date can't be blank!";
	     document.getElementById("div31").style.color="Red";
	  // $('#title_msg').html("Appointment Date can't be blank!");
	  return false;  
	} 
	else
	{
		document.getElementById("div31").innerHTML="";
	}

	if (mandate_date ==  ""){  
		 document.getElementById("div32").innerHTML="Mandate Expiry can't be blank!";
	     document.getElementById("div32").style.color="Red";
	  // $('#title_msg').html("Mandate Expiry can't be blank!");
	  return false;  
	}
	else
	{
		document.getElementById("div32").innerHTML="";
	}
  
	}  
