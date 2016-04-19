<!DOCTYPE html>
<html>
<head>

<?php
include 'connect.php';
session_start();

	$_SESSION['signed_in'] = NULL;
	$_SESSION['doc_id'] = NULL;

  if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
	echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
}
else
{
		$errors = array(); /* declare the array for later use */
		if(!isset($_POST['UserName']))
		{
			$errors[] = 'The Username field must not be empty.';
		}
		
		if(!isset($_POST['Password']))
		{
			$errors[] = 'The password field must not be empty.';
		}
		
		if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
		{
			echo 'Uh-oh.. a couple of fields are not filled in correctly..<br /><br />';
			echo '<ul>';
			foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
			{
				echo '<li>' . $value . '</li>'; /* this generates a nice error list */
			}
			echo '</ul>';
		}
		else
		{
			
			$name=$_POST['UserName'];
			$pass=$_POST['Password'];
			$sql = "SELECT 
						Doc_id
						
					FROM
						doclogin
					WHERE
						UserName = '$name'
					AND
						Password = '$pass' ";
						
			$result = mysqli_query(mysqli_connect($server, $username, $password,$database),$sql);
			$row=mysqli_fetch_array($result);
			
			$_SESSION["doc_id"]=$row["Doc_id"];
			
			
			
			if(!$result)
			{
				
				echo 'Something went wrong while signing in. Please try again later.';
				
			}
			else
			{
				
				
				if(mysqli_num_rows($result) == 0)
				{
					header('Location: login_error.html');
					
				}
				else
				{
					$_SESSION['signed_in'] = true;
					
					
	
			

					
					
					
					header('Location: index.php');
					
					
					
				}
			}
		}
	}
?>

</head>
</html>
