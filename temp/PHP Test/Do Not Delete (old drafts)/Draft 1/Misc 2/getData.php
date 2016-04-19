<?php 
	
	//Getting the requested id
	$id = $_GET['id'];
	
	//Importing database
	require_once('conn.php');
	
	//Creating sql query with where clause to get an specific employee
	$sql = "SELECT * FROM images WHERE id=$id";
	
	//getting result 
	$r = mysqli_query($conn,$sql);
	
	//pushing result to an array 
	$result = array();
	$row = mysqli_fetch_array($r);
	array_push($result,array(
			"id"=>$row['id'],
			"Place"=>$row['place'],
			"Information"=>$row['info'],
		));

	//displaying in json format 
	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);

?>