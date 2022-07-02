<?php
    require_once("connection.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['book']) || empty($_POST['author']) || empty($_POST['category']))
        {
            echo '<script language="javascript">';
            echo 'alert("Please fill in the blanks!!!")';
            echo '</script>';
        }
        else
        {
            $book = $_POST['book'];
            $author = $_POST['author'];
            $category = $_POST['category'];
            $image = $_POST['image'];
            

            $query = " insert into book (book, author, category, image) values('$book', '$author', '$category', '$image')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location: https://localhost/test/practice_admin/manage_books.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location: https://localhost/test/practice_admin/manage_books.php");
    }



?>