<?php
session_start();


if(!isset($_SESSION["username"]))
{
	header("location:practice_admin.html");
}

?>