<?php

include('connection.php');

	$id = $row['id'];

	$id = $_GET['id'];

	$delete = "DELETE FROM info WHERE id = $id";
	$run_data = mysqli_query($con,$delete);

	if($run_data){
	header('location:crudIndex.php');
	}else{
	echo "Did not Delete";
	}

		

?>