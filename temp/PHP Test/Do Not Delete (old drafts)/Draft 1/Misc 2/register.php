<?php
require "conn.php";
$user_name=$_POST["user_name"];
$user_pass=$_POST["password"];
$name=$_POST["nameReg"];
$email=$_POST["emailReg"];
$mysql_qry= "insert into user_data (name, emailid, username, password) values('$name','$email','$user_name','$user_pass')";


if($conn->query($mysql_qry) === TRUE)
{
	echo "Insert Successful";
}
else 
{
	echo "Error". $mysql_qry . "<br>" . $conn->error;
}
$conn->close();
?>