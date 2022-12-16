<?php

include("connection.php");

$added = false;

if(isset($_POST['submit'])) {

    $sid = $_POST['stu_id'];
    $sname = $_POST['stu_name'];
    $sgrade = $_POST['stu_grade'];


    $insert_data = "INSERT INTO info(stu_id, stu_name, stu_grade) VALUES('$sid','$sname','$sgrade')";
    $run_data = mysqli_query($con,$insert_data);

  	if($run_data){
		$added = true;
    header('location:crudIndex.php');
  	}else{
  		echo "Data not insert";
  	}

}