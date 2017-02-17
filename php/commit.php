<?php
	$type=$_POST['type'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$tag=$_POST['tag'];
	$tags=explode(" ",$tag);
	$num=count($tags);
	if(empty($title)||empty($content))
	{
		echo "<script>alert('内容和标题不能为空！')</script>";
		echo"<script>location.href='registered.html';</script>";
	}
	$conn=mysqli_connect("localhost","root","123","blog");
	if($conn->connect_error) {die("连接失败:".$conn->conn_error);}
	$sql="CREATE TABLE article
	(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		type VARCHAR(16) NOT NULL,
		title VARCHAR(50) NOT NULL,
		content VARCHAR(10000) NOT NULL,
		reg_date TIMESTAMP
	)";
	if ($conn->query($sql) === TRUE){echo " ";} 
	else {echo " ";}
	
	$sql="CREATE TABLE tag
	(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		tag VARCHAR(10) NOT NULL,
		title VARCHAR(50) NOT NULL,
		reg_date TIMESTAMP
	)";
	if ($conn->query($sql) === TRUE){echo " ";} 
	else {echo " ";}
	
	for($i=0;$i<$num;$i++)
	{
		$sql=" INSERT INTO tag(tag,title)
		VALUES('$tags[$i]','$title')";
		if($conn->query($sql)===TRUE)
		{
			echo" ";
		}
		else
		{
			echo"错误:",$conn->error;
			$conn->close();
		}	
	}
	
	$sql="INSERT INTO article(type,title,content)
	VALUES('$type','$title','$content')";
	if($conn->query($sql)===TRUE)
	{
		echo"<script>alert('发布成功！')</script>";
		echo"<script>location.href='logined-blog.php';</script>";
	}
	else
	{
		echo"错误:",$conn->error;
		$conn->close();
	}	
	$conn->close();
?>