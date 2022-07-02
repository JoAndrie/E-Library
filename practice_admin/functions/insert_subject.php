<?php
    require_once("connection.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['subject']))
        {
            echo '<script language="javascript">';
            echo 'alert("Please fill in the blanks!!!")';
            echo '</script>';
        }
        else
        {
            $subject = $_POST['subject'];

            $query = " insert into subject (subject, creation ) values('$subject', NOW())";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location: https://localhost/test/practice_admin/manage_subject.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location: https://localhost/test/practice_admin/manage_subject.php");
    }



?>