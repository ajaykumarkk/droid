 
 <?php
include 'connect.php';
session_start();
?>
 <!DOCTYPE HTML>
<html>
	<head>
		<title>Dr.Droid</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
	<style>
		input[type=radio] {
			display:none; 
			margin:10px;
			font-family: 'Ropa Sans', sans-serif;
		}
		 
		input[type=radio] + label {
			display:block;
			margin:-2px;
			padding: 7px 7px;
			background-color: #e7e7e7;
			border-color: #ddd;
		}

		input[type=radio]:checked + label { 
		   background-image: none;
			background-color:#0099FF;
		}
	</style><script>
		function init()
		{
			radio=document.getElementById("radio");
			
		}
		function validate() 
		{
			var radioObj = document.form.user_id;

			for(var i=0; i<radioObj.length; i++) {
				if( radioObj[i].checked ) {
					return true;
				}
			}

			return false;
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
					$doc_id=$_SESSION["doc_id"];
					$sql = "
					SELECT 
							Usr_id
					FROM
						prescription
					WHERE
						Doc_id='$doc_id'
					GROUP BY
						Usr_id;"; // put doc_id session variable here
					
				
			$result = mysqli_query(mysqli_connect($server, $username, $password,$database),$sql);
			echo "
				  	<h2>PATIENTS LIST</h2></br>
					<form action ='patient_profile.php' name ='form' method ='POST' onsubmit='return validate()'>";
			$i=1;
			while($row = mysqli_fetch_assoc($result))
			{		
				
				$id=$row["Usr_id"];
				$sql1 = "SELECT 
						User_name 	
					FROM
						user
					WHERE
						Usr_id=$id;";
					
				$result1 = mysqli_query(mysqli_connect($server, $username, $password,$database),$sql1);
				$row1 = mysqli_fetch_assoc($result1);
				$name=$row1["User_name"];
					echo "<input type='radio' id='radio$i' name='user_id' value=$id checked>
						<label for='radio$i'>$name</label></br>";
				$i++;
			}
			echo "<input type='submit' value='Get Profile'/>";
		echo "</form>";
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


 
 
 
 
 
 
 

