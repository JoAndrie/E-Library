<?php 
    require_once("connection.php");

    if(isset($_POST['update']))
    {
        $ID = $_GET['ID'];
        $author = $_POST['Author'];

        $query = "update author set Author = '".$author."', Updated = NOW() where ID= '".$ID."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location: https://localhost/test/practice_admin/manage_authors.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location: https://localhost/test/practice_admin/manage_authors.php");
    }


?>