<?php
	session_start();
	$error=''; 
	if (isset($_POST['submit'])) 
	{
		if (empty($_POST['username']) || empty($_POST['password'])) 
		{
			$error = "Username or Password is invalid";
		}
		else
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$connection = mysqli_connect("localhost", "root", "","bookstore");
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($connection,$username);
			$password = mysqli_real_escape_string($connection,$password);
			$query = mysqli_query($connection,"SELECT * FROM admin WHERE password='$password' AND username='$username'");
			$rows = mysqli_num_rows($query);
			if ($rows == 1) 
			{
				$_SESSION['login_user']=$username; 
				header("location: dashboard.php"); 
				exit();
			}
			else 
			{
				$error= "Username or Password is invalid";
							
			}
			mysqli_close($connection); 
		}
	}
?>
