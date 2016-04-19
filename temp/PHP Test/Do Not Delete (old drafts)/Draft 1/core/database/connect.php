<?php
	$connect_error = "Sorry. We are experiencing some down time.";
	mysql_connect('localhost', 'root', '') or die($connect_error);
		// or die(mysql_error()); // not recommended for public scripts
	mysql_select_db('lr') or die($connect_error);
?>