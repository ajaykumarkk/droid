<!DOCTYPE html>
<html>
	<head>
		<title>Dr.Droid</title>
		<link href="css/style_signup.css" rel="stylesheet" type="text/css"  media="all" />
		
		<script>
		
		
	function validate()
	{
		if(patid.value!=""&&diagnosis.value!=""&&date.value!=""&&med.value!="")
			return true;
		else
			{
			alert("Some required fields are empty.");
			return false;
			}
		
	}
		</script>
	</head>
	<body>
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
				<div class="top-nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="services.php">services</a></li>
						<li class="active"><a href="blog.php">First Aid</a></li>
						<li><a href="contact.php">contact</a></li>
					</ul>					
				</div>
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
				  	<h2>Enter Precription Details</h2> </br>
					
					    <form method="post" action="prescip_insert.php" onsubmit="return validate()">
					    	<div>
						    	<span><label>Patient ID *</label></span>
						    	<span><input type="text" value="" name="patid" id="patid"></span>
						    </div>
							<div>
						    	<span><label>Diagnosis *</label></span>
						    	<span><input type="text" value="" name="diagnosis" id="diagnosis"></span>
						    </div>
							<div>
						    	<span><label>Date *</label></span>
						    	<span><input type="date" name="date" id="date" placeholder="YYYY/MM/DD"></span>
						    </div>
							<div>
						    	<span><label>Medicines *</label></span>
						    	<span><input type="text" value="" name="med" id="med"></span>
						    </div>
							<div>
						    	<span><label>Note</label></span>
						    	<span><input type="text" value="" name="note" id="note"></span>
						    </div>
							<div>
						   		<span><input type="submit" value="upload"></span>
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

