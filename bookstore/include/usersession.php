<?php
	$connection = mysqli_connect("localhost", "root", "","bookstore");
	session_start();
	$user_check=$_SESSION['login_user'];
	$query=mysqli_query($connection,"select username from register where username='$user_check'");
	$row = mysqli_fetch_assoc($query);
	$login_session =$row['username'];
	
?>

