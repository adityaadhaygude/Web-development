<?php
$room=$_POST['room'];
include 'dbcon.php';
$query="SELECT name FROM names WHERE '$ip'=ip";
$result=mysqli_query($conn,$query);
$name="";
$result = $conn->query($query);
if($result->num_rows>0){
	while ($row = $result->fetch_assoc())
	{
		$name=$row['name'];	
	}
}
$sql= "SELECT * FROM msgs WHERE roomname = '$room'";
$res="";
$result = $conn->query($sql);
if($result->num_rows>0){
	while ($row = $result->fetch_assoc())
	{
		$res=$res.'<div class="container">';
		$res=$res.'<img src="img/avatar.png"alt="Avatar" > ';
		$res=$res.$name;
		$res=$res."<p>".$row['msg'];
		$res=$res.'</p><span class="time-right">'.$row["stime"].'</span></div>';
	}
}
echo $res;
?>

