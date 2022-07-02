<?php 
    require_once("functions/connection.php");
    session_start();
    if(!isset($_SESSION["email"]))
    {
        header("location: https://localhost/test/home-practice.php");
    }

    $query = "SELECT * FROM pending";
    $result = mysqli_query($con,$query);

    $query1 = "SELECT * FROM approved";
    $result1 = mysqli_query($con,$query1);

    $query2 = "SELECT * FROM rejected";
    $result2 = mysqli_query($con,$query2);
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
        <link rel="stylesheet" href="css/submission.css">

        <title>AthenaIntAdmin: Submissions</title>
        <link rel="icon" type="image/x-icon" href="favicon/favicon.ico">
    </head>
    <body>
        <!--========== HEADER ==========-->
        <header class="header">
            <div class="header__container">
                <img src="images/perfil.jpg" alt="" class="header__img">

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
    
                            <a href="practice_admin.php" class="nav__link">
                                <i class='bx bx-grid-alt nav__icon'></i>
                                <span class="nav__name">Dashboard</span>
                            </a>
                            <a href="submission.php" class="nav__link active">
                                <i class='bx bx-copy-alt nav__icon'></i>
                                <span class="nav__name">Submissions</span>
                            </a>
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-book nav__icon'></i>
                                    <span class="nav__name">Books</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="add_books.php" class="nav__dropdown-item">Add Books</a>
                                        <a href="manage_books.php" class="nav__dropdown-item">Manage Books</a>
                                    </div>
                                </div>
                            </div>

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-user-pin nav__icon'></i>
                                    <span class="nav__name">Authors</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="add_authors.php" class="nav__dropdown-item">Add Author</a>
                                        <a href="manage_authors.php" class="nav__dropdown-item">Manage Author</a>
                                    </div>
                                </div>
                            </div>

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bxs-book-content nav__icon'></i>
                                    <span class="nav__name">Subjects</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="add_subject.php" class="nav__dropdown-item">Add Subject</a>
                                        <a href="manage_subject.php" class="nav__dropdown-item">Manage Subject</a>
                                    </div>
                                </div>
                            </div>
    
                        <div class="nav__items">
                            <h3 class="nav__subtitle">USERS</h3>
    
                            <a href="manage_user.php" class="nav__link">
                               <i class='bx bxs-user-circle nav__icon'></i>
                                <span class="nav__name">Manage Users</span>
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
        
        <main class="first">
             <div class="table">
        <div class="table_header">
            <p>Pending Submission</p>
            <form action = "search_pending.php" method="post">
                <div class="author_search"> <input placeholder="Book Title" type="text" name="search"/> 
                <button class="add_new" type = "submit" value="Search">Search</button> </div>
            </form>
        </div>
        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Title</th>
                        <th>Subject</th>
                        <th>Author</th>
                        <th>Submitted by:</th>
                        <th>View</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php                       
                         while($row=mysqli_fetch_assoc($result))
                            {
                                $ID = $row['ID'];
                                $book = $row['book'];
                                $category = $row['category'];
                                $author = $row['author'];
                                $name = $row['name'];
                             ?>
                    </tr>
                        <td><?php echo $ID ?></td>
                        <td><?php echo $book ?>
                        <td><?php echo $category ?>
                        <td><?php echo $author ?>
                        <td><?php echo $name ?>
                        <td><a href="https://localhost/test/uploads/<?php echo $row['file'] ?>" target="_blank">View File</a>
                        <td>
                            <button><a href="functions/approve.php?GetID=<?php echo $ID ?>" onclick="return confirm('Do you want to approve book?')"><i class="fa-solid fa-pen-to-square"></i></button> 
                            <button><a href="functions/reject.php?GetID=<?php echo $ID ?>" onclick="return confirm('Do you want to reject book?')"><i class="fa-solid fa-trash"></i></button>
                    </tbody>
                         <?php 
                             }  
                        ?>    
            </table>
        </div>
        <div class="pagination">
            <div><i class="fa-solid fa-angles-left"></i></div>
            <div><i class="fa-solid fa-chevron-left"></i></div>
            <div>1</div>
            <div><i class="fa-solid fa-chevron-right"></i></div>
            <div><i class="fa-solid fa-angles-right"></i></div>
        </div>
    </div>
        </main>

    <!--==== SECOND CONTENT ====-->

        <main class="second">
             <div class="table">
        <div class="table_header">
            <p>Approved Submission</p>
            <form action = "search_approved.php" method="post">
                <div class="author_search"> <input placeholder="Book Title" type="text" name="search"/> 
                <button class="add_new" type = "submit" value="Search">Search</button> </div>
            </form>
        </div>
        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Title</th>
                        <th>Subject</th>
                        <th>Author</th>
                        <th>Submitted by:</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php                       
                         while($row=mysqli_fetch_assoc($result1))
                            {
                                $ID = $row['ID'];
                                $book1 = $row['book'];
                                $category1 = $row['category'];
                                $author1 = $row['author'];
                                $name1 = $row['name'];
                             ?>
                    </tr>
                        <td><?php echo $ID ?></td>
                        <td><?php echo $book1 ?>
                        <td><?php echo $category1 ?>
                        <td><?php echo $author1 ?>
                        <td><?php echo $name1 ?>
                        <td><span class="approved">Approved</span></td>
                        <td><button><a href="functions/delete_approved.php?Del=<?php echo $ID ?>" onclick="return confirm('Do you want to delete data?')"><i class="fa-solid fa-trash"></i></button>
                    </tbody>
                         <?php 
                             }  
                        ?> 
            </table>
        </div>
        <div class="pagination">
            <div><i class="fa-solid fa-angles-left"></i></div>
            <div><i class="fa-solid fa-chevron-left"></i></div>
            <div>1</div>
            <div><i class="fa-solid fa-chevron-right"></i></div>
            <div><i class="fa-solid fa-angles-right"></i></div>
        </div>
    </div>
        </main>

    <!--==== SECOND CONTENT ====-->

        <main class="third">
             <div class="table">
        <div class="table_header">
            <p>Rejected Submission</p>
            <form action = "search_rejected.php" method="post">
                <div class="author_search"> <input placeholder="Book Title" type="text" name="search"/> 
                <button class="add_new" type = "submit" value="Search">Search</button> </div>
            </form>
        </div>
        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Title</th>
                        <th>Subject</th>
                        <th>Author</th>
                        <th>Submitted by:</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php                       
                             while($row=mysqli_fetch_assoc($result2))
                            {
                                $ID = $row['ID'];
                                $book2 = $row['book'];
                                $category2 = $row['category'];
                                $author2 = $row['author'];
                                $name2 = $row['name'];
                        ?>
                    </tr>
                        <td><?php echo $ID ?></td>
                        <td><?php echo $book2 ?>
                        <td><?php echo $category2 ?>
                        <td><?php echo $author2 ?>
                        <td><?php echo $name2 ?>
                        <td><span class="rejected">Rejected</span></td>
                        <td><button><a href="functions/delete_rejects.php?Del=<?php echo $ID ?>" onclick="return confirm('Do you want to delete data?')"><i class="fa-solid fa-trash"></i></button>
                </tbody>
                         <?php 
                             }  
                        ?> 
            </table>
        </div>
        <div class="pagination">
            <div><i class="fa-solid fa-angles-left"></i></div>
            <div><i class="fa-solid fa-chevron-left"></i></div>
            <div>1</div>
            <div><i class="fa-solid fa-chevron-right"></i></div>
            <div><i class="fa-solid fa-angles-right"></i></div>
        </div>
    </div>
        </main>
        <!--- footer --->
    <section class="final-page">
    <footer>
        <div class="logo">
            <img src="images/footer.png"></a>
            <p>To an easy access to reliable educational materials!</p>
            <div class="socials">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="#"><i class="fa-brands fa-discord"></i></a>
        </div>
        </div>
            <ul class="links">
                <li><a href="practice_admin.php">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="index.html">SUBJECTS</a></li>
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