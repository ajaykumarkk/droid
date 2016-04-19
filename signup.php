<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dr.Droid</title>
		<link href="css/style_signup.css" rel="stylesheet" type="text/css"  media="all" />
		
		<script>
		function init(){
		var new_password = document.getElementById("new_password");
		var repeat_password = document.getElementById("repeat_password");
		var in_correct_pwd = document.getElementById("in_correct_pwd");
		var latitude = document.getElementById("latitude");
		repeat_password.addEventListener("blur",check_password,false);
		
		// positioning div
		in_correct_pwd.style.left = repeat_password.offsetLeft + repeat_password.offsetWidth + "px";
		in_correct_pwd.style.top = repeat_password.offsetTop + "px";
		in_correct_pwd.style.display = "none";
		
		}
	function check_password(event)
	{
		
		p1=new_password.value;
		p2=repeat_password.value;
		if(p1!=p2)
			{	
				in_correct_pwd.style.display="inline-block";
				new_password.value="";
				repeat_password.value="";
				new_password.focus();
			}
		else{
			in_correct_pwd.style.display="none";
		}
	
	}
	function validate()
	{
		if(fname.value!=""&&lname.value!=""&&dob.value!=""&&gender.value!=""&&area.value!=""&&city.value!=""&&email.value!=""&&mobile.value!=""&&state_medical_council.value!=""&&university_name.value!=""&&registeration_number.value!=""&&qualification.value!=""&&qualification_year.value!=""&&specialization.value!=""&&username.value!=""&&new_password.value!=""&&repeat_password.value!="")
			return true;
		else
			{
			alert("Some required fields are empty.");
			return false;
			}
		
	}
		</script>
	</head>
	<body onload="init()">
		<!--start-wrap-->
		
			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="logo" /></a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		    <div class="clear"> </div>
		   <div class="wrap">
		   	<div class="contact">
		   	<div class="section group">				
				
				<div class="col span_2_of_3"> 			
					<div class="contact-form">
				  	<h2>Sign up</h2> </br>
					
					    <form method="post" action="signup_insert.php" onsubmit="return validate()">
					    	<div>
						    	<span><label>First Name *</label></span>
						    	<span><input type="text" value="" name="fname" id="fname"></span>
						    </div>
							<div>
						    	<span><label>Last Name *</label></span>
						    	<span><input type="text" value="" name="lname" id="lname"></span>
						    </div>
							<div>
						    	<span><label>Date Of Birth *</label></span>
						    	<span><input type="date" name="dob" id="dob"></span>
						    </div>
							<div>
						    	<span><label>Gender *</label></span>
						    	<span><input type="text" value="" name="gender" id="gender"></span>
						    </div>
									 
							<div>
						    	<span><label>Area *</label></span>
						    	<span><input type="text" value="" name="area" id="area"></span>
						    </div><div>
						    	<span><label>City *</label></span>
						    	<span><input type="text" value="" name="city" id="city"></span>
						    </div>
							<div>
						    	<span><label>E-Mail *</label></span>
						    	<span><input type="text" value="" name="email" id="email"></span>
						    </div>
						    <div>
						     	<span><label>Mobile No *</label></span>
						    	<span><input type="text" value="" name="mobile" id="mobile"></span>
						    </div>
							<div>
						    	<span><label>State Medical Council *</label></span>
						    	<span><input type="text" value="" name="state_medical_council" id="state_medical_council"></span>
						    </div>
							<div>
						    	<span><label>University Name *</label></span>
						    	<span><input type="text" value="" name="university_name" id="university_name"></span>
						    </div>
							<div>
						    	<span><label>Registration number *</label></span>
						    	<span><input type="text" value="" name="registeration_number" id="registeration_number"></span>
						    </div>
							<div>
						    	<span><label>Qualification *</label></span>
						    	<span><input type="text" value="" name="qualification" id="qualification"></span>
						    </div>
						   	<div>
						    	<span><label>Qualification Year *</label></span>
						    	<span><input type="text" value="" name="qualification_year" id="qualification_year"></span>
						    </div>   
							<div>
						    	<span><label>Specialization</label></span>
						    	<span><input type="text" value="" name="specialization" id="specialization"></span>
						    </div> 
							<div>
						    	<span><label>Username *</label></span>
						    	<span><input type="text" value="" name="username" id="username"></span>
						    </div> 
							<div>
						    	<span><label>New Password *</label></span>
						    	<span><input type="password" value="" name="new_password" id="new_password"></span>
						    </div> 
							<div>
						    	<span><label>Repeat Password *</label> </span>
						    	<span><input type="password" value="" name="repeat_password" id="repeat_password" /> <div id="in_correct_pwd" style="color:red">Passwords do not match</div> </span>

						    </div> 
							<div>
						    	<span><label>Latitude</label></span>
						    	<span><input type="text" value="" name="latitude" id="latitude"></span>
						    </div> 
							<div>
						    	<span><label>Longitude</label></span>
						    	<span><input type="text" value="" name="longitude" ></span>
						    </div> 
						    <div>
						   		<span><input type="submit" value="Sign Up"></span>
						  </div>
					    </form>
						
				    </div>
  				</div>				
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
			</div>
	      <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="services.php">services</a></li>
						<li><a href="blog.php">blog</a></li>
						<li><a href="contact.php">contact</a></li>
					</ul>
		   	</div>
		   	<div class="footer-right">
		   		<p>Dr.Droid | Design By <a href="contact.php">SEA-2</a></p>
		   	</div>
		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>

