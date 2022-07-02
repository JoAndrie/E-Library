<?php
    session_start();
        if(!isset($_SESSION["email"]))
        {
            header("location:home-practice.php");
        }
    require_once("connection.php");
    $query = "SELECT * FROM book WHERE category='Programming' OR category='programming'";
    $result = mysqli_query($con,$query);
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
        <link rel="stylesheet" href="css/programming.css">

        <title>AthenaInt: Programming</title>
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

                            <a href="subject.php" class="nav__link active">
                                <i class='bx bxs-book-content nav__icon'></i>
                                <span class="nav__name">Subjects</span>
                            </a>
                            <a href="upload.php" class="nav__link">
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
            <div class="subject-header">
                <h1>PROGRAMMING</h1>
            </div>
            <div class="container">
              <?php                       
              while($row=mysqli_fetch_assoc($result))
                 {
                     $ID = $row['ID'];
                     $book = $row['book'];
                     $author = $row['author'];
                     $category = $row['category'];
                  ?>
              <div class="book">
                    <div class="icon">
                        <img src="Book.png" width="40" height="40">
                    </div>
                        <div class="content">
                        <h2><?php echo $book ?></h2>
                        <p><?php echo $category ?></p>
                        <p><?php echo $author ?></p>
                        <span>read more...</span>
                        <button><a href="https://localhost/test/uploads/<?php echo $row['file'] ?>" target="_blank">Access</button></a>
                    </div>
              </div>
                <?php 
                    }  
                ?>    
            </div>
        </main>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
</html>