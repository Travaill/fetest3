<?php
	$search=$_POST['search'];
	$conn=mysqli_connect("localhost","root","123","blog");
	if($conn->connect_error) {die("连接失败:".$conn->conn_error);}
	$sql="SELECT * FROM article WHERE title LIKE '%{$search}%'";
	mysqli_select_db($conn,"blog");
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		echo"<a href='article-style.php?id={$row['id']}&p=1'>{$row['title']}.</a><br>";
	}
	if(mysqli_num_rows($result)==0)
	{
		echo"无记录！";
	}
	mysqli_free_result($result);
	mysqli_close($conn);
?>