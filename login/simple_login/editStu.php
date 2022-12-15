<?php

include('connection.php');

$id = $_GET['id'];

if(isset($_POST['submit']))
{
	
	$sid = $_POST['stu_id'];
	$sname = $_POST['stu_name'];
	$sgrade = $_POST['stu_grade'];

	$update = "UPDATE info SET stu_id='$sid', stu_name ='$sname', stu_grade='$sgrade' WHERE id=$id";
	$run_update = mysqli_query($con,$update);

	if($run_update){
		header('location:crudIndex.php');
	}else{
		echo "Data not updated";
	}
}

		
?>