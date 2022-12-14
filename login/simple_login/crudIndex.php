<?php  

include('connection.php');
$get_data = "SELECT * FROM info order by 1 desc"; 
$run_data = mysqli_query($con, $get_data);

?>

<html>
    <head>
        <title>CRUD</title>
        <style></style>
        <body>
            <table>

                <thead>

                    <tr>

                        <th>Student List</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Grade</th>
                        <th colspan="2">Action</th>

                    </tr>

                </thead>
                
                <?php 
                
                $i = 0;

                while ($row = mysqli_fetch_array($run_data)) {

                    $sl = ++$i;
                    $sid = $row['stu_id'];
                    $sname = $row['stu_name'];
                    $sgrade = $row['stu_grade'];
                    
                    echo"

                    <tr>
                
                        <td>$sl </td>
                        <td>$sid </td>
                        <td>$sname </td>
                        <td>$sgrade</td>
                
                    </tr>

                        ";

                    } 

                    ?>
            </table> 
        </body>
    </head>
</html>