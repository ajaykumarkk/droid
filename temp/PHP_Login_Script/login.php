<?php

include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 

$name=mysqli_real_escape_string($db,$_POST['username']); 
$pass=mysqli_real_escape_string($db,$_POST['password']); 


$sql="SELECT 
						Doc_id
						
					FROM
						doclogin
					WHERE
						UserName = '$name'
					AND
						Password = '$pass' ";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//$active=$row['active'];

$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
session_register("myusername");
$_SESSION['login_user']=$name;

header("location: index.php");
}
else 
{
$error="Your Login Name or Password is invalid";
}
}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Droid Login</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <style type="text/css">
		
      body {
  font-family: "Open Sans", sans-serif;
  height: 100vh;
  background: url("http://i.imgur.com/HgflTDf.jpg") 50% fixed;
  background-size: cover;
}

@keyframes spinner {
  0% {
    transform: rotateZ(0deg);
  }
  100% {
    transform: rotateZ(359deg);
  }
}
* {
  box-sizing: border-box;
}

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
  background: rgba(4, 40, 68, 0.85);
}

.login {
  border-radius: 2px 2px 5px 5px;
  padding: 10px 20px 20px 20px;
  width: 90%;
  max-width: 320px;
  background: #ffffff;
  position: relative;
  padding-bottom: 80px;
  box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
}
.login.loading button {
  max-height: 100%;
  padding-top: 50px;
}
.login.loading button .spinner {
  opacity: 1;
  top: 40%;
}
.login.ok button {
  background-color: #8bc34a;
}
.login.ok button .spinner {
  border-radius: 0;
  border-top-color: transparent;
  border-right-color: transparent;
  height: 20px;
  animation: none;
  transform: rotateZ(-45deg);
}
.login input {
  display: block;
  padding: 15px 10px;
  margin-bottom: 10px;
  width: 100%;
  border: 1px solid #ddd;
  transition: border-width 0.2s ease;
  border-radius: 2px;
  color: #ccc;
}
.login input + i.fa {
  color: #fff;
  font-size: 1em;
  position: absolute;
  margin-top: -47px;
  opacity: 0;
  left: 0;
  transition: all 0.1s ease-in;
}
.login input:focus {
  outline: none;
  color: #444;
  border-color: #2196F3;
  border-left-width: 35px;
}
.login input:focus + i.fa {
  opacity: 1;
  left: 30px;
  transition: all 0.25s ease-out;
}
.login a {
  font-size: 0.8em;
  color: #2196F3;
  text-decoration: none;
}
.login .title {
  color: #444;
  font-size: 1.2em;
  font-weight: bold;
  margin: 10px 0 30px 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 20px;
}
	
input#sub {
  color:white;
  font-size: 15px;
  background-color:#2196F3;
}
.login:not(.loading) button:hover {
  box-shadow: 0px 1px 3px #2196F3;
}
.login:not(.loading) button:focus {
  border-bottom-width: 4px;
}

footer {
  display: block;
  padding-top: 50px;
  text-align: center;
  color: #ddd;
  font-weight: normal;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.2);
  font-size: 0.8em;
}
footer a, footer a:link {
  color: #fff;
  text-decoration: none;
}
</style>
	<script src="js/prefixfree.min.js"></script>
</head>
<body>
  <div class="wrapper">
	
		<form class="login" method ="POST" action ="">
			<p class="title">Log in</p>
			<input type="text" name = "username" placeholder="Username" autofocus/>
				<i class="fa fa-user"></i>
			<input type="password" name = "password" placeholder="Password" />
				<i class="fa fa-key"></i>
			<a href="#">Forgot your password?</a>
			<br> </br>
			<input type="submit" value="Log in" id ="sub"/>
		</form>
		<footer><a target="" href="index.php">Dr.Droid</a></footer>
	</p>
	</div>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
  </body>
 </html>