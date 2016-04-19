<?php
include 'connect.php';
session_start();
						$sql="
								SELECT
								Doc_id,max(user_rating)
								FROM	
									ratings
								GROUP BY
									Doc_id;
									";
						$result = mysqli_query(mysqli_connect($server, $username, $password,$database),$sql);
						$myary=array();
						while($row = mysqli_fetch_assoc($result))
						{	
						
							$doc_id=$row["Doc_id"];
							$user_rating=$row["max(user_rating)"];
							$myary["$user_rating"]=$doc_id;
							//echo " ".$myary["$user_rating"];
						}
						
						
						krsort ($myary);
						foreach ($myary as $key => $val) {
							$sql1 = "
								SELECT
									FirstName,LastName
								FROM	
									doctor
								WHERE
									Doc_id='$val';
									";
								$result1= mysqli_query(mysqli_connect($server, $username, $password,$database),$sql1);
								$row1 = mysqli_fetch_assoc($result1);
								echo " <li><img src='images/arrow.png'>".$row1["FirstName"]." ".$row1["LastName"].""."</a></li> ";
						}
						
						
?>