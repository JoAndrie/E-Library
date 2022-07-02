<?php
    require_once("connection.php");

    if(isset($_GET['Del']))
         {
             $ID = $_GET['Del'];
             $query = "Delete from user where ID = '".$ID."'";
             $result = mysqli_query($con,$query);
             if($result)
             {
                 header("location: https://localhost/test/practice_admin/manage_user.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location: https://localhost/test/practice_admin/manage_user.php");
         }
?>