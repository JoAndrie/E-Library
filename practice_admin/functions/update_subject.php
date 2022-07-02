<?php 
    require_once("connection.php");

    if(isset($_POST['update']))
    {
        $ID = $_GET['ID'];
        $Subject = $_POST['Subject'];

        $query = "update subject set Subject = '".$Subject."', Updated = NOW() where ID= '".$ID."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location: https://localhost/test/practice_admin/manage_subject.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location: https://localhost/test/practice_admin/manage_subject.php");
    }


?>