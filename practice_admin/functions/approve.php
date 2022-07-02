<?php 
    require_once("connection.php");
    $ID = $_GET['GetID'];

    $query = "INSERT INTO book(book,author,category,file,type,size) SELECT book, author,category,file,type,size FROM pending WHERE ID = '".$ID."'";
    $result = mysqli_query($con,$query);
    
    $query1 = "INSERT INTO approved(userID, name, book, author,category) SELECT userID, name, book, author,category FROM pending WHERE ID = '".$ID."'";
    $result1 = mysqli_query($con,$query1);

    $query2 = "DELETE FROM pending WHERE ID = '".$ID."'";
    $result2 = mysqli_query($con,$query2);

    if($result && $result1 && $result2)
            {
                header("location: https://localhost/test/practice_admin/submission.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }


?>