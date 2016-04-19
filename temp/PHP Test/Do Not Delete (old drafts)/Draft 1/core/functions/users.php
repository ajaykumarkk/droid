<?php

	function mysqli_result($res, $row, $field=0)
	{
		// copied code from stack overflow -> not sure whether it works
		// moving from mysql_result to mysqli_resuly
		$res->data_seek($row); 
		$datarow = $res->fetch_array(); 
		return $datarow[$field]; 
	}
	
	// id name emailid username password
	function register_user($register_data)
	{
		array_walk($register_data, 'array_sanitize');
		//$register_data['password'] = md5($register_data['password']);
		$register_data['password'] = ($register_data['password']);
		
		// fields is the field names of the database table users
		// data is the actual data we've gotten through the form
		$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
		$data = '\'' . implode('\', \'', $register_data) . '\'';
		
		//echo $fields;
		//echo $data;
		mysqli_query("INSERT INTO `user_data` ($fields) VALUES ($data);");
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
			$data = mysqli_query("SELECT '$fields' FROM `user_data` WHERE `id` = '$id';");
			$data = mysqli_fetch_assoc($data);
			
			//print_r($data);
			return $data;
		}
		//print_r($func_get_args);
	}
	
	function user_exists ($username)
	{
		$username = sanitize($username);
		// check whether the result of the query passed ( first arguement ) in the column specified ( second arguement ) is 1 or not
		// if true ( value is 1 )return true
		// if false ( not 1 ) return false
		return (mysqli_result(mysqli_query("SELECT COUNT(`id`) FROM `user_data` WHERE `username`='$username';"), 0) == 1) ? true : false;
	}
	
	function email_exists ($emailid)
	{
		$emailid = sanitize($emailid);
		
		return (mysqli_result(mysqli_query("SELECT COUNT(`user_id`) FROM `user_data` WHERE `emailid`='$emailid'"), 0) == 1) ? true : false;
	}
	
	/*
	function user_active ($username)
	{
		$username = sanitize($username);
		return (mysql_resulti(mysqli_query("SELECT COUNT(`user_id`) FROM `user_data` WHERE `username`='$username' AND `active`=1;"), 0) == 1) ? true : false;
	}
	*/
	
	function login ($username, $password)
	{
		// sanitize username
		// encrypt password (md5 hash)
		$id = user_id_from_username($username);
		$username = sanitize($username);
		//$password = md5($password);
		
		return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `user_data` WHERE `username`='$username' AND `password`='$password';"), 0) == 1) ? $id : false;
	}
	
	function user_id_from_username ($username)
	{
		$username = sanitize($username);
		return mysql_result(mysql_query("SELECT `id` FROM `user_data` WHERE `username`='$username';"), 0, 'user_id');
		// we're picking up the userid and pushing it into the userid that we pass as third arg
	}
	
	function logged_in()
	{
		if ( isset($_SESSION['id']) )
			return true;
		return false;
		
	}
?>