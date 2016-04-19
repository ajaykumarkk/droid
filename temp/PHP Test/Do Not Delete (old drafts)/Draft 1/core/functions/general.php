<?php

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
?>