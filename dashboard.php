 <!DOCTYPE HTML>
 <?php
 include 'connect.php';
 session_start();
 ?>
<html>
	<head>
		<title>Dr.Droid</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		
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
						<li><a href="blog.php">First Aid</a></li>
						<li class="active"><a href="contact.html">contact</a></li>
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
				<div class="col span_1_of_3">
				  <div class="contact-form">
				  <?php
				  $doc_id=$_SESSION["doc_id"];
				  $sql = 
				  "SELECT 
							FirstName, LastName,email,Place,City,MobileNo
					FROM
						doctor
					WHERE
						Doc_id='$doc_id';"; // put doc_id session variable here
					
				
			$result = mysqli_query(mysqli_connect($server, $username, $password,$database),$sql);
			
			$row = mysqli_fetch_assoc($result);
			$doc_fname=$row["FirstName"];
			$doc_lname=$row["LastName"];
			$doc_name= $doc_fname." ".$doc_lname;
			$doc_mail = $row["email"];
			$doc_mno= $row["MobileNo"];
			$doc_place = $row["Place"];
			$doc_city = $row["City"];
			$doc_addr = $doc_place . ", " . $doc_city;
				  
				  echo "
				  	<h2>Dashboard</h2></br>
					    <form>
					    	<div>
						    	<span><label>NAME: $doc_name</label></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL:$doc_mail</label></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO:$doc_mno</label></span>
						    </div>
						    <div>
						    	<span><label>CLINIC:$doc_place</label></span>
						    </div>
							<div>
						    	<span><label>ADDRESS: $doc_addr</label></span>
						    </div>
					    </form> "; ?>
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


 
 
 
 
 
 
 