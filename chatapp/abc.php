<?php
$conn =mysqli_connect("localhost","root","","chatroom");
//check connection
if(!$conn){
	die("Failed to connect".mysqli_connect_error());
}
$ip=$_SERVER['REMOTE_ADDR'];
$name=$_POST['name'];
$sql="INSERT INTO names VALUES('$ip','$name')";
mysqli_query($conn,$sql);
$query="SELECT name FROM names WHERE '$ip'=ip";
$result=mysqli_query($conn,$query);
$res="";
$result = $conn->query($query);
if($result->num_rows>0){
	while ($row = $result->fetch_assoc())
	{
		$res=$row['name'];	
	}
}
echo '<script>alert("'.$message.'");window.location="http://localhost/chatapp/rooms.php?roomname='.$room.'"</script>';
?>
<html>
<head>
</head>
<body>
<form method="post">
<label>Name:</label>
<input name="name" type="text" placeholder="Enter your name" />
<button type="submit">Submit</button>
</form>
</body>
</html>