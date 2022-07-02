<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="capstone";

    session_start();

    $data = mysqli_connect($host,$user,$password,$db);
    if($data==false)
    {
        die("connection error");
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $ID = $_POST["ID"];
    $name = $_POST["name"];
	$email=$_POST["email"];
	$password=$_POST["password"];


	$sql="select * from user where email='".$email."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

    $_SESSION["ID"] = trim($row["ID"]);
    $_SESSION["name"] = $row["name"];

	if($row["usertype"]=="user")
	{	

		$_SESSION["email"]=$email;

		header("location:index.php");
	}

	elseif($row["usertype"]=="admin")
	{
		$_SESSION["email"]=$email;
		
		header("location:practice_admin/practice_admin.php");
	}

	else
	{
		echo '<script language="javascript">';
        echo 'alert("Email or Password is incorrect!!!")';
        echo '</script>';
	}

    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AthenaInt.</title>
    <link rel="icon" type="image/x-icon" href="favicon/favicon.ico">
    <link rel="stylesheet" href="home-practice.css">
    <!--- font --->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700&display=swap" rel="stylesheet">
    <!--- icon --->
    <script src="https://kit.fontawesome.com/03a8af35d0.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="background">
        <section class="header">
            <nav>
                <a href="home-practice.php"> <img src="AthenaInt..png"></a>
                <div class="nav-links" id="navLinks">
                    <i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
                    <ul>
                        <li><a href="about.html">ABOUT</a></li>
                    </ul>
                    <div id="login">
                        <div class="input_login">
                        <form action="#" method="post">
                            <p>Email</p>
                            <input type="text" name="email" required placeholder="enter your email">
                            <span></span>
                        </div>    
                        <div class="input_login">
                            <p>Password</p>
                            <input type="password" name="password" required placeholder="enter your password">
                            <p><span>Forgot account?</span></p>
                        </div>
                        <div id="b">
                            <input type="submit" id="sub" value="Log In">
                        </form>
                        </div>
                    </div>
                </div>
                <i class="fa-solid fa-bars" onclick="showMenu()"></i>
            </nav>
            <div class="text-box">
                <h1>Athenaeum Interactive</h1>
                <p>A service dedicated to students of the ACLC College's Distance
                    <br>Learning Community.</p>
            </div>
            <div class="background">
                <div class="form-container">

                    <form action="insertuser.php" method="post" name="register"">
                        <h3>register now</h3>
                            <input type="text" name="name" required placeholder="enter your name">
                            <input type="email" name="email" required placeholder="enter your email">
                            <input type="password" name="password" required placeholder="enter your password">
                            <input type="password" name="cpassword" required placeholder="confirm your password">
                            <input type="submit" name="submit" value="register now" class="form-btn">
                    </form>

                </div>
            </div>
        </section>
    </div>
        <!----JavaScript for Toggle Menu----->
        <script type="text/javascript">
            var navLinks = document.getElementById('navLinks');

            function showMenu() {
                navLinks.style.right = "0";
            }

            function hideMenu() {
                navLinks.style.right = "-200px";
            }
            function Confirm() {
                 alert("User successfully registered!!!");
            }
        </script>
</body>

</html>