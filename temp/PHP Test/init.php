<?php
	session_start();
	error_reporting(1);
	
	require 'conn.php';
	require 'general.php';
	require 'users.php';
	
	if( logged_in() === true )
	{
		$session_user_id = $_SESSION['id'];
		// need to make sure whatever parameters we need - we should pass it here
		// the database will update and the changes will be reflected here in user_data array
		// the other code will automatically work to change it accordingly
		$user_data = user_data($session_user_id, 'id', 'username', 'password', 'name', 'emailid');
		
		// you can echo $user_data['username'] / or any other field that we need
	}
	$errors = array();
?>