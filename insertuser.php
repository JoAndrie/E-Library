<?php

    require_once("connection.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = " insert into user (name, email, password, usertype, registered) values('$name','$email','$password', 'user', NOW())";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:home-practice.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location:home-practice.php");
    }



?>