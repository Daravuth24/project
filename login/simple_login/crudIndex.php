<?php  
session_start();

include('connection.php');

$added = false;

//Add a new student
if(isset($_POST['submit'])) 
{

    $sid = $_POST['stu_id'];
    $sname = $_POST['stu_name'];
    $sgrade = $_POST['stu_grade'];


    $insert_data = "INSERT INTO info(stu_id, stu_name, stu_grade) VALUES('$sid','$sname','$sgrade')";
    $run_data = mysqli_query($con, $insert_data);

  	if($run_data){
		$added = true;
        header('location:crudIndex.php');
  	}else{
  		echo "Data not insert";
  	}

}
?>

<html>
    
    <head>

        <title>CRUD</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

        <link rel="stylesheet" type="text/css" href="css/styles.css">
        
        </head>

        <body>
        <div class="container">
            <a href="logout.php" class="btn btn-success"><i class="fa fa-lock"></i> Logout</a>
        <!-- Student Button modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Add new student
            </button>

            <!-- Add Student Modal -->
            <div id="myModal" class ="modal fade" role="dialog">
                
                <div class="modal-dialog modal-lg">

                    <!-- Modal Content -->

                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="btn-close" data-dismiss="modal"></button>
                        </div>
                        
                        <div class="modal-body">

                            <form method="POST" enctype="multipart/form-data">

                               
                                    <div class="mb-3">
                                        <label for="studentId">Student ID</label>
                                        <input type="text" class="form-control" name ="stu_id" placeholder="Enter 10-digit Student ID" maxlength="10" required>
                                    </div>
                               

                                
                                    <div class="mb-3">
                                        <label for="studentName">Student Name</label>
                                        <input type="text" class="form-control" name ="stu_name" placeholder="Enter Student's Name">
                                    </div>
                                

                                
                                    <div class="mb-3">
                                        <label for="studentGrade">Student Grade</label>
                                        <input type="text" class="form-control" name ="stu_grade" placeholder="Enter Student's Grade">
                                    </div>
                                

                                <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">

                            </form>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                        </div>
                
                    </div>

                </div>

            </div>
          

            <table class="table table-bordered table-striped table-hover">

                <thead>

                    <tr>

                        <th class="text-center" scope ="col">Student List</th>
                        <th class="text-center" scope ="col">ID</th>
                        <th class="text-center" scope ="col">Name</th>
                        <th class="text-center" scope ="col">Grade</th>
                        <th class="text-center" scope ="col">Edit</th>
                        <th class="text-center" scope ="col">Delete</th>

                    </tr>

                </thead>

                <!-- Read table -->
                <?php 

                $get_data = "SELECT * FROM info";
                $run_data = mysqli_query($con,$get_data);
                $i = 0;

                while ($row = mysqli_fetch_array($run_data)) { 

                    $sl = ++$i;
                    $id = $row['id'];
                    $sid = $row['stu_id'];
                    $sname = $row['stu_name'];
                    $sgrade = $row['stu_grade'];

                    echo"

                    <tr>
                
                        <td class='text-center'>$sl </td>
                        <td class='text-center'>$sid </td>
                        <td class='text-center'>$sname </td>
                        <td class='text-center'>$sgrade</td>
                        <td class='text-center'>
                            <span>
                            <a href='#' class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></a>                               
                            </span>
                        </td>
                        <td class='text-center'>
                            <span>
                                <a href='#' class='btn btn-danger deleteuser' title='Delete'><i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i></a>
                            </span>
                            
                        </td>

                    </tr>

                        ";
                } ?>
                   

                    
            </table> 
        </div>
            <!-- Edit Student -->
            <?php

                $get_data = "SELECT * FROM info";
                $run_data = mysqli_query($con,$get_data);

                while ($row = mysqli_fetch_array($run_data)) 
                {
                    $id = $row['id'];
                    $sid = $row['stu_id'];
                    $sname = $row['stu_name'];
                    $sgrade = $row['stu_grade'];

                    echo "
                    
                    <div id='edit$id' class='modal fade' role='dialog'>
                    
                        <div class='modal-dialog'>

                            <!-- Modal content -->

                            <div class='modal-content'>

                                <div class='modal-header'>

                                    <h4 class='modal-title' style='margin-left:180px'>Edit your Data</h4> 
                                    <button type='button' class='btn-close' data-dismiss='modal'></button>
                                    

                                </div>

                                <div class='modal-body'>

                                    <form action='editStu.php?id=$id' method='post' enctype='multipart/form-data'>

                                        <div class='mb-3'>
                                        <label for='studentId'>Student ID</label>
                                        <input type='text' class='form-control' name ='stu_id' placeholder='Enter 10-digit Student ID' maxlength='10' value='$sid' required>
                                        </div>
                            

                                
                                        <div class='mb-3'>
                                            <label for='studentName'>Student Name</label>
                                            <input type='text' class='form-control' name ='stu_name' placeholder='Enter Student's Name' value='$sname'>
                                        </div>
                                    

                                    
                                        <div class='mb-3'>
                                            <label for='studentGrade'>Student Grade</label>
                                            <input type='text' class='form-control' name ='stu_grade' placeholder='Enter Student's Grade' value='$sgrade'>
                                        </div>

                                    </div>
                                    
                                    <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
                                    
                                    </form>

                                </div>

                                <div class='modal-footer'>       
                                </div>

                            </div>

                        </div>

                    </div>

                    ";
                }

           ?>

            <!-- Delete Student -->
            <?php
            
                $get_data = "SELECT * FROM info";
                $run_data = mysqli_query($con,$get_data);

                while($row = mysqli_fetch_array($run_data))
                {
                    $id = $row['id'];
                    echo "

                <div id='$id' class='modal fade' role='dialog'>

                    <div class='modal-dialog'>

                        <!-- Modal content-->

                        <div class='modal-content'>

                            <div class='modal-header'>

                                <h4 class='modal-title' style='margin-left:160px'>Are you want to sure?</h4>
                                <button type='button' class='btn-close' data-dismiss='modal'></button>
                                
                            </div>

                            <div class='modal-body'>
                                <a href='delStu.php?id=$id' class='btn btn-danger' style='margin-left:220px'>Delete</a>
                            </div>
                    
                        </div>

                    </div>

                </div>


                    ";
                    
                }

            ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        </body>

</html>