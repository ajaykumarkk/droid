<?php
include 'connect.php';
session_start();
?>
<html>
<body>
	<?php
		$patid=$_POST['patid'];
		$diagnosis=$_POST['diagnosis'];
		$med=$_POST['med'];
		$date=$_POST['date'];
		$note=$_POST['note'];
		if(isset($_SESSION['doc_id']))
		{
		$docid=$_SESSION['doc_id'];
		}
		else
		{
			echo 'Not logged in';
		}
		$db_selected = mysqli_select_db(mysqli_connect($server, $username, $password,$database),$database) ;
		$sql = "INSERT INTO `dr_droid`.`prescription` (`P_id`, `Usr_id`, `Doc_id`, `Diagnosis`, `Medicines`, `Date`, `Note`) VALUES (NULL, '$patid', '$docid', '$diagnosis', '$med', '$date', '$note');";				
		$result = mysqli_query($conn,$sql);
		
		if(!$result)
		{
			//something went wrong, display the error
			//echo 'Something went wrong while registering. Please try again later.';
			//echo mysqli_connect_error();
			echo $conn->error;		//debugging purposes, uncomment when needed
			echo '-->'.$docid;
		}
		else echo header("Location:patient_profile.php?user_id=$patid");
	?>
</body>
</html>