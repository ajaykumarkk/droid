<?php
include 'connect.php';
?>
<html>
<body>
	<?php
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$area=$_POST['area'];
		$city=$_POST['city'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$state_medical_council=$_POST['state_medical_council'];
		$university_name=$_POST['university_name'];
		$registeration_number=$_POST['registeration_number'];
		$qualification=$_POST['qualification'];
		$qualification_year=$_POST['qualification_year'];
		$specialization=$_POST['specialization'];
		$user_name=$_POST['username'];
		$repeat_password=$_POST['repeat_password'];
		
		$db_selected = mysqli_select_db(mysqli_connect($server, $username, $password,$database),$database) ;
		$sql = "INSERT INTO `dr_droid`.`doctor` (`Doc_id`, `FirstName`, `LastName`, `DOB`, `City`, `Place`, `Rating`, `Sex`, `email`, `MobileNo`, `smc`, `UniversityName`, `Qualification`, `QualificationYear`, `Specialization`, `Date`, `Latitude`, `Longitude`) VALUES ('$registeration_number', '$fname','$lname', '$dob', '$city','$area',NULL, '$gender','$email','$mobile','$state_medical_council','$university_name','$qualification','$qualification_year','$specialization', NULL, NULL, NULL)";				
		$result = mysqli_query($conn,$sql);
		
		
		$sql = "INSERT INTO `dr_droid`.`doclogin` (`Doc_id`,`UserName`,`Password`) VALUES ('$registeration_number','$user_name','$repeat_password')";
		$result = mysqli_query($conn,$sql);
		
		if(!$result)
		{
			//something went wrong, display the error
			//echo 'Something went wrong while registering. Please try again later.';
			//echo mysqli_connect_error();
			echo $conn->error;		//debugging purposes, uncomment when needed
		}
		else echo header("Location:login.php");
	?>
</body>
</html>