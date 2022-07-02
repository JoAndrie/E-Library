<?php
require_once("connection.php");
session_start();
$_SESSION["ID"];
$userid = $_SESSION['ID'];
    if(!isset($_SESSION["email"]))
    {
        header("location:home-practice.php");
    }

$query = "SELECT book FROM approved where userID = '".$userid."'";
$result = mysqli_query($con,$query);

$query1 = "SELECT COUNT(userID) as total FROM approved WHERE userID = '".$userid."'";
$result1 = mysqli_query($con,$query1);
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
        <link rel="stylesheet" href="css/notification.css">

        <title>AthenaInt: Books</title>
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


                            <a href="home-practice.php" class="nav__link">
                                <i class='bx bx-home nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>


                            <a href="about.html" class="nav__link">
                                <i class="fa-solid fa-users nav__icon1"></i>
                                <span class="nav__name">About</span>    
                            </a>    

                            <a href="notification.php" class="nav__link active">
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

            <section class="books-sec">
                <h2>Notification</h2>
            </section>
            <?php                       
                    while($row=mysqli_fetch_assoc($result))
                       {
                            $book = $row['book'];
                        ?>
            <div class="notif-box">
                <i class="fa-solid fa-exclamation notif-icon"></i>
                <span> The Admin approved the book "<?php echo $book ?>" you just uploaded. </span> 
            </div>
                <?php 
                        }  
                   ?>  
            <div class="notif-num">
                <?php
                $row=mysqli_fetch_assoc($result1);
                $total = $row['total'];

                ?>
                <p> <?php echo $total?> New Notification</p>
            </div>
        </main>

        <!--- footer --->
    <section class="final-page">
    <footer>
        <div class="logo">
            <img src="images/footer.png"></a>
            <p>To an easy access to reliable educational materials!</p>
        </div>
            <ul class="links">
                <li><a href="practice.html">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="index.html">ATHENAEUM</a></li>
                <li><a href="login_form.html">LOG IN</a></li>
                <li><a href="register_form.html">REGISTER</a></li>
            </ul>
        </div>
            <p>All Right reserved by &copy; Athenaeum Interactive 2020</p>
    </footer>
    </section>
        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
</html>