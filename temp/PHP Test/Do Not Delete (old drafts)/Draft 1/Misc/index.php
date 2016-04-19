<?php
	include 'core/init.php';
	if ( logged_in() == false )
		header('Location: loginpage.php');
	else
		echo 'You\'re logged in.';
?>

<h1>Home</h1>

<?php
?>