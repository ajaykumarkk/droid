<?php
	include 'init.php';
	
	if(empty($_POST) === false)
	{
		// form has been submitted
		//echo 'Form submitted.';
		
		// bunch of processing here
		
		$required_fields = array('username', 'password', 'confirm_password', 'name', 'emailid');
		foreach($_POST as $key=>$value)
		{
			// whatever you posted -> check the values in it
			// if a field is empty ( what you posted from the form ) and this field is in the required fields ( marked with an asterisk )
			// that field is necessary and can't be empty => send an error
			if (empty($value) && in_array($key, $required_fields) === true)
			{
				// if the value is empty and the key of the field associated with it is in the required fields
				$errors[] = "You are required to complete all the fields marked with an asterisk.";
				break 1;
			}
		}
	}
	
	if ( empty($errors) === true )
	{
		// if there are no errors do this
		if (user_exists($_POST['username']) === true)
		{
			// make sure that the html code if entered is not rendered on the screen.
			$errors[] = 'Sorry, the username \'' . htmlentities($_POST['username']) . '\' is already taken.';
		}
		if (strlen($_POST['username']) > 30)
		{
			$errors[] = 'The username \'' . htmlentities($_POST['username']) . '\' is too long. The maximum allowed is 30 characters.';
		}
		if ( preg_match('/\\s/', $_POST['username']) === 1 )
		{
			$error[] = 'The username must not contain any spaces.';
		}
		if ( strlen($_POST['password']) > 0 && (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 15) )
		{
			$errors[] = 'The password must be between 6 and 15 characters long.';
		}
		if ($_POST['password'] !== $_POST['confirm_password'])
		{
			$errors[] = 'The 2 passwords you have typed do not match.';
		}
		if (email_exists($_POST['emailid']) === true)
		{
			$errors[] = 'The email \'' . $_POST['emailid'] . '\' already exists.';
		}
	}
	
	if ( empty($errors) === true && empty($_POST) === false )
	{
		$register_data = array (
			'username' 		=> $_POST['username'],
			'password' 		=> $_POST['password'],
			'name' 			=> $_POST['name'],
			'emailid' 		=> $_POST['emailid']
		);
		
		register_user($register_data);
		// successfully registered now
		loggedin_redirect();
		// set a session
		// throw him into login / postlogin
		// exit this
	}
	else if ( empty($errors) === false )
	{
		echo output_errors($errors);
	}
?>

<!--
<h1>Registration</h1>
<form action="" method="POST">
	<ul>
		<li>
			Username(*): <br>
			<input type="text" name="username"/>
		</li>
		<li>
			Password(*): <br>
			<input type="password" name="password"/>
		</li>
		<li>
			Confirm Password(*): <br>
			<input type="password" name="confirm_password"/>
		</li>
		<li>
			First Name(*): <br>
			<input type="text" name="first_name"/>
		</li>
		<li>
			Last Name: <br>
			<input type="text" name="last_name"/>
		</li>
		<li>
			Email Address(*): <br>
			<input type="email" name="email"/>
		</li>
		<br>
		<input type="submit" value="Register"/>
	</ul>
</form>
-->