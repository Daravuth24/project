<?php

include("connection.php");

//Add new student
//$get_data = "SELECT * FROM info order by 1 desc";

if(isset($_POST['submit'])) {

    $sid = $_POST['stu_id'];
    $sname = $_POST['stu_name'];
    $sgrade = $_POST['stu_grade'];


    $insert_data = "INSERT INTO info(stu_id, stu_name, stu_grade) VALUES('$sid','$sname','$sgrade')";
    $run_data = mysqli_query($con,$insert_data);

  	if($run_data){
		$added = true;
  	}else{
  		echo "Data not insert";
  	}

}

?>

