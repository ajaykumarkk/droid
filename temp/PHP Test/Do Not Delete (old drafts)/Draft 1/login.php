<?php
	include 'core/init.php';
	
	if (empty($_POST) === false)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if (empty($username) === true || empty($password) === true)
		{
			$errors[] = 'You need to enter a username and password.';
		}
		else if (user_exists($username) === false) // now check if the user exists
		{
			$errors[] = 'We can\'t find that username. Are you sure you\'ve registered?';
		}
		/*
		else if (user_active($username) === false) // check is user has activated his account
		{
			$errors[] = 'You have not activated your account.';
		}
		*/
		else //login
		{
			// add additional checks (if any) here
			if ( strlen ($password) > 15 )
				$errors[] = 'Password is too long.';
			$login = login($username, $password);
			// if true => user successfully logged in ( get the userid from username )
			// else user hasn't been able to successfully login
			if ($login === false)
			{
				$errors[] = 'That username/password combination isn\'t correct.';
			}
			else
			{
				// set a user session
				// redirect to home or to plan a trip
				$_SESSION['id'] = $login; // cuz login returns the userid so we need that
				loggedin_redirect();
				exit();
			}
		}
		//if ( empty($errors) === false )
		//	print_r($errors);
	}
	else
	{
		$errors[] = 'No data received';
		// we can redirect with a header redirect;
	}
	if ( empty($errors) === false )
	{
?>
		<h2> We tried logging you in but, </h2>
		<?php
		echo output_errors($errors);
		}
?>
