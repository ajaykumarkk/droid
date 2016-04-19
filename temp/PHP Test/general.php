<?php
	require 'conn.php';
	/*
	$db_name = "944002";
	$mysql_username = "944002";
	$mysql_password = "redmoon12";
	$server_name = "localhost";

	$conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);
	*/
	function loggedin_redirect()
	{
		if (logged_in() === true)
		{
			header('Location: loggedin.php');
		}
	}
	function array_sanitize($item)
	{
		$item = mysqli_real_escape_string($item);
	}

	function sanitize($data)
	{
		return mysqli_real_escape_string($data);
	}
	
	function output_errors($errors)
	{
		//the long way first
		$output = array();
		foreach($errors as $error)
		{
			$output[] = '<li>' . $error . '</li>';
		}
		return '<ul>' . implode('', $output) . '<ul>';
		// take an array and convert it into a string -> implode
	}
	
	//mysqli_close($conn);
?>