<?php
    require_once("connection.php");

    if(isset($_GET['Del']))
         {
             $ID = $_GET['Del'];
             $query = "Delete from rejected where ID = '".$ID."'";
             $result = mysqli_query($con,$query);
             if($result)
             {
                 header("location: https://localhost/test/practice_admin/submission.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location: https://localhost/test/practice_admin/submission.php");
         }
?>