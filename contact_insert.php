<?php
include 'connect.php';
session_start();
?>
<html>
<body>
	<?php
		$name=$_POST['name'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$subject=$_POST['subject'];
		
		if(isset($_SESSION['doc_id']))
		{
			$docid=$_SESSION['doc_id'];
		}
		else
		{
			echo 'Not logged in';
		}
		$db_selected = mysqli_select_db(mysqli_connect($server, $username, $password,$database),$database) ;
		$sql = "INSERT INTO `dr_droid`.`contact` (`name`, `mail`, `mobile`, `subject`) VALUES ('$name', '$email', '$mobile', '$subject');";				
		$result = mysqli_query($conn,$sql);
		
		if(!$result)
		{
			//something went wrong, display the error
			//echo 'Something went wrong while registering. Please try again later.';
			//echo mysqli_connect_error();
			echo $conn->error;		//debugging purposes, uncomment when needed
			echo '-->'.$docid;
		}
		else echo header("Location:index.php");
	?>
</body>
</html>