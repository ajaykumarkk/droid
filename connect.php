<?php 

//connect.php
$server	    = 'localhost';
$username	= 'root';
$password	= '';
$database	= 'dr_droid';
$conn=mysqli_connect($server, $username, $password,$database);
if(!$conn)
{
 	exit('Error: could not establish database connection');
}
else
{
	echo 'Connection successfull';
}

?>