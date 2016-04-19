<?php
//signout.php
include 'connect.php';
session_start();

if($_SESSION['signed_in'] == 1)
{
	
	$_SESSION['signed_in'] = NULL;
	echo header("Location:index.php");
}
else
{
	echo 'You are not signed in. Would you like to ';
	echo "Already Logged in--->".$_SESSION['signed_in'];
	echo '<button id="myButton" class="item" >Sign In!</button>

	<script type="text/javascript">
		document.getElementById("myButton").onclick = function () {
			location.href = "login.php";
		};
	</script>';
	
	echo '?';
	
}

?>