<?php 
    require_once("connection.php");

    if(isset($_POST['update']))
    {
        $ID = $_GET['ID'];
        $book =$_POST['book'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $image = $_POST['image'];

        $file = rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $folder="uploads/";

        move_uploaded_file($file_loc,$folder.$file);
        $query = "update book set book = '".$book."', author = '".$author."', category = '".$category."', file = '".$file."', type = '".$file_type."', size = '".$file_size."'  where ID= '".$ID."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location: https://localhost/test/practice_admin/manage_books.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location: https://localhost/test/practice_admin/manage_books.php");
    }


?>