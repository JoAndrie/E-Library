<?php
session_start();
require_once("connection.php");
$_SESSION["ID"];
$_SESSION["name"];
if(!isset($_SESSION["email"]))
{
	header("location:home-practice.php");
}

if(isset($_POST['submit']))
  {
  	$ID = $_SESSION['ID'];
    $name = $_SESSION['name'];
    $book = $_POST['book'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    $file = rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="uploads/";

    move_uploaded_file($file_loc,$folder.$file);
    
    $query=mysqli_query($con, "INSERT INTO pending(userID, name,book,author,category,file,type,size) values('$ID','$name','$book','$author','$category','$file','$file_type','$file_size')");
    if($query){
        echo "<script>alert('Pending Book request has been added');</script>";
        
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";

    }
  }
?>





<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--========== FONTAWESOME ICONS ==========-->
        <script src="https://kit.fontawesome.com/03a8af35d0.js" crossorigin="anonymous"></script>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="css/upload.css">

        <title>AthenaInt: Upload</title>
        <link rel="icon" type="image/x-icon" href="favicon/favicon.ico">
    </head>
    <body>
        <!--========== HEADER ==========-->
        <header class="header">

            <div class="header__container">
                <img src="assets/img/perfil.jpg" alt="" class="header__img">

                <a href="#" class="header__logo">Athenaeum Interactive</a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class='bx bx-search header__icon'></i>
                </div>
    
                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>

            </div>
        </header>

        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="#" class="nav__link nav__logo">
                        <i class='bx bx-library nav__icon'></i>
                        <span class="nav__logo-name">AthenaInt</span>
                    </a>
    
                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">NAVIGATION</h3>
    
                            <a href="index.php" class="nav__link">
                                <i class='bx bx-grid-alt nav__icon'></i>
                                <span class="nav__name">Dashboard</span>
                            </a>


                            <a href="practice.html" class="nav__link">
                                <i class='bx bx-home nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>


                            <a href="about.html" class="nav__link">
                                <i class="fa-solid fa-users nav__icon1"></i>
                                <span class="nav__name">About</span>    
                            </a>    

                            <a href="notification.php" class="nav__link">
                                <i class='bx bx-bell nav__icon'></i>
                                <span class="nav__name">Notification</span>    
                            </a>    

    
                        <div class="nav__items">
                            <h3 class="nav__subtitle">ATHENAEUM</h3>
    
                            <a href="books.php" class="nav__link">
                               <i class='bx bx-book nav__icon'></i>
                                <span class="nav__name">Books</span>
                            </a>

                            <a href="subject.php" class="nav__link">
                                <i class='bx bxs-book-content nav__icon'></i>
                                <span class="nav__name">Subjects</span>
                            </a>
                            <a href="upload.php" class="nav__link active">
                                <i class='bx bx-upload nav__icon'></i>
                                <span class="nav__name">Upload</span>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="logout.php" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>


        <!--========== CONTENTS ==========-->
<main>
 <div class="container">
    <div class="title">Upload Book</div>
    <div class="content">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Book Name</span>
            <input type="text" required name = "book">
          </div>
          <div class="input-box">
            <span class="details">Author</span>
            <input type="text" required name = "author">
          </div>
          <div class="input-box">
            <span class="details">Category</span>
            <input type="text" required name = "category">
          </div>
          
          <div class="upload">
            <span class="details">Document</span>
      <button type = "button" class = "btn-warning">
        <i class = "fa fa-upload"></i> Upload PDF File
        <input type="file" name="file" value = "" required>
      </button>
        </div>
        
        <div class="button">
          <input type="submit" name="submit">
        </div>
      </form>
    </div>
  </div>
  </main>
        <!--- footer --->
    <section class="final-page">
    <footer>
        <div class="logo">
            <a href="practice.html"><img src="images/AthenaInt..png"></a>
            <p>To an easy access to reliable educational materials!</p>
        </div>
            <ul class="links">
                <li><a href="practice.html">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="index.html">ATHENAEUM</a></li>
            </ul>
        </div>
            <p>All Right reserved by &copy; Athenaeum Interactive 2020</p>
    </footer>
    </section>
        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
</html>