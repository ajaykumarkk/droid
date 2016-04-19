 
 <?php
include 'connect.php';
session_start();
?>
 <!DOCTYPE HTML>
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
						<li><a href="services.php">Services</a></li>
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
				  if($_SERVER['REQUEST_METHOD']=='POST') 
					$p_id=$_POST["user_id"];// radio button selected passes the value
				  else
					  $p_id=$_GET["user_id"];
					 
				  $doc_id=$_SESSION["doc_id"];
					$sql = "
					SELECT 
						Diagnosis,Medicines,Date,note
						
					FROM
						prescription
					WHERE
						Doc_id='$doc_id'
					AND 
						Usr_id='$p_id';"; // put doc_id session variable here
					
				
			$result = mysqli_query(mysqli_connect($server, $username, $password,$database),$sql);	
			$i=1;
			echo "<h2>PATIENTS PROFILE</h2></br>";
			$sql1 = "SELECT 
								User_name 	
							FROM
								user
							WHERE
								Usr_id=$p_id;";
							
					$result1 = mysqli_query(mysqli_connect($server, $username, $password,$database),$sql1);
					$row1 = mysqli_fetch_assoc($result1);
					
					$patient_name=$row1["User_name"];
			echo "<form>
									<div>
										<span><h3>Patient Name: $patient_name</h3></span>
									</div>
									";
			while($row = mysqli_fetch_assoc($result))
			{		
					$date=$row["Date"];		
					echo " <h3> Prescription $i</h3>
										<span><label>Date: $date</label></span>
									";
					$i++;
					$diagnosis=$row["Diagnosis"];
					$medicines=$row["Medicines"];
					
					$note=$row["note"];
					
					echo "
									<div>
										<span><label>Diagnosis: $diagnosis </label></span>
									</div>
									<div>
										<span><label>Medicines: $medicines</label></span>
									</div>
									
									<div>
										<span><label>Note: $note</label></span>
									</div>
					
								</form> ";
			}
					?>
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


 
 
 
 
 
 
 

