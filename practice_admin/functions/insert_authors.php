<?php
    require_once("connection.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['author']))
        {
            echo '<script language="javascript">';
            echo 'alert("Please fill in the blanks!!!")';
            echo '</script>';
        }
        else
        {
            $author = $_POST['author'];

            $query = " insert into author (author, creation ) values('$author', NOW())";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location: https://localhost/test/practice_admin/manage_authors.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location: https://localhost/test/practice_admin/manage_authors.php");
    }



?>