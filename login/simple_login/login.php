<?php 

session_start();

    include("connection.php");
    include("functions.php");


        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //something was posted
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];

            if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
            {

                //read from database
                $query = "SELECT * FROM users WHERE user_name= '$user_name' limit 1";

                $result = mysqli_query($con, $query);

                if($result)
                {
                    if($result && mysqli_num_rows($result) > 0)
                    {

                        $user_data = mysqli_fetch_assoc($result);
                        
                        if($user_data['password'] == $password)
                        {
                            $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: crudIndex.php");
                            die;
                        }

                    }
                }
                echo "Wrong username or password.";
            }else
            {
                echo "Wrong username or password.";
            }
        }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/styles2.css">
</head>
<body>

    <div id="box">

        <form method="post">

            <div id="signupTitle">Login</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Signup</a><br><br>

        </form>
    </div>
</body>
</html>

