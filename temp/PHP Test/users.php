<?php
	require 'conn.php';
	/*
	$db_name = "944002";
	$mysql_username = "944002";
	$mysql_password = "redmoon12";
	$server_name = "localhost";

	$conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);
	*/
	// id name emailid username password
	function register_user($register_data)
	{
		//$register_data['password'] = md5($register_data['password']);
		$register_data['password'] = $register_data['password'];
		
		// fields is the field names of the database table users
		// data is the actual data we've gotten through the form
		$fields = '' . implode(', ', array_keys($register_data)) . '';
		$data = '\'' . implode('\', \'', $register_data) . '\'';
		
		//echo $fields;
		//echo $data;
		mysqli_query($conn, "insert into user_data ($fields) values ($data);");
	}
	
	function user_data($id)
	{
		$data = array();
		$id = (int)$id;
		
		$func_num_args = func_num_args();
		//echo $func_num_args;
		
		$func_get_args = func_get_args();
		
		//print_r($func_get_args);
		if ( $func_num_args > 1 )
		{
			// unset the user session id
			unset($func_get_args[0]);
			
			// we can pass this string into the query.
			$fields = '`' . implode('`, `', $func_get_args) . '`';
			//echo $fields;
			$data = mysqli_query($conn, "select '$fields' from user_data where id = '$id';");
			$data = mysqli_fetch_assoc($data);
			
			return $data;
		}
	}
	
	function user_exists($username)
	{
		echo "$db_name, $mysql_username <br>";
		if ( $res = mysqli_query($conn, "select * from user_data where username like '$username';") )
		{
			echo 'res set <br>';
		}
		$s = mysqli_num_rows($res);
		echo "$s : <br>";
		if ( mysqli_num_rows($res) > 0 )
		{
			return true;
		}
		return false;
	}
	
	function email_exists($emailid)
	{
		//$emailid = sanitize($emailid);
		$res = mysqli_query($conn, "select * from user_data where emailid like '$emailid';");
		if ( $res )
			echo 'yay query succeeded <br>';
		else
			echo 'query failing <br>';
		if ( mysqli_num_rows($res) > 0 )
		{
			return true;
		}
		return false;
	}
	
	function login ($username, $password)
	{
		// encrypt password (md5 hash)
		$id = user_id_from_username($username);
		//$password = md5($password);
		$res = mysqli_query($conn, "select * from user_data where username like '$username' and password like '$password';");
		if ( mysqli_num_rows($res) > 0 )
			return $id;
		return false;
	}
	
	function user_id_from_username ($username)
	{
		$res = mysqli_query($conn, "select id from user_data where username like '$username';");
		foreach($res as $key=>$value)
			echo "$key -> $value <br>";
		$check1 = mysqli_data_seek($res, 0);
		print_r($check1);
		echo '<br>';
		$check2 = mysqli_fetch_array($res);
		print_r($check2);
		echo '<br>';
		print_r($check2[0]);
		echo '<br>';
		return $check2[0];
		// we're picking up the userid and pushing it into the userid that we pass as third arg
	}
	
	function logged_in()
	{
		if ( isset($_SESSION['id']) )
			return true;
		return false;
		
	}
	
	//mysqli_close($conn);
?>