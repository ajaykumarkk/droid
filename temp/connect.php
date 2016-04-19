<?php   
$username = "sql6114907";  
$password = "RZkysZ4HZq";  
$database = "sql6114907";  
$server = "sql6.freemysqlhosting.net";  
$db_handle = mysqli_connect($server, $username, $password);  
$db_found = mysqli_select_db($db_handle,$database);  
if($db_handle)    
{         
    print "Connected";  
}  
else  
{  
    print "Can not connect to server";  
}         
if ($db_found)   
{ 
     print "DataBase found";  
}  
else   
{  
    print "DataBase not found";  
}  
?>