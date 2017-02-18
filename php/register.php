<?php
	$id=$_POST['user'];
	$pass=md5($_POST['password']);
	$pass1=md5($_POST['password1']);
	$email=$_POST['email'];
	
	if(empty($id)||empty($pass)||empty($email))
	{
		echo "<script>alert('用户名和密码不能为空！')</script>";
		echo"<script>location.href='registered.html';</script>";
	}
	else 
	{
		if($pass!=$pass1)
		{
			echo "<script>alert('请输入相同的密码')</script>";
			echo"<script>location.href='registered.html';</script>";
		}
		else
		{		
			$conn=mysqli_connect("localhost","root","","blog");
			if($conn->connect_error)
			{
				die("连接失败:".$conn->conn_error);
			}
			$sql="CREATE TABLE user
			(
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(16) NOT NULL,
				password VARCHAR(32) NOT NULL,
				email VARCHAR(32) NOT NULL,
				auth  INT(2) NOT NULL,
				reg_date TIMESTAMP
			)";
			if ($conn->query($sql) === TRUE){echo " ";} 
			else {echo " ";}
			$sql="SELECT * FROM user WHERE name='$id'";
			mysqli_select_db($conn,"blog");
			$retval=mysqli_query($conn,$sql);
			if($row=mysqli_fetch_array($retval,MYSQLI_BOTH))	
			{
				if($row['name']==$id)
				{
					echo"<script>alert('该用户名已被注册')</script>";
					echo"<script>location.href='registered.html';</script>";
				}
				if($row['email']==$email)
				{
					echo"<script>alert('该邮箱已被注册')</script>";
					echo"<script>location.href='registered.html';</script>";
				}
			}
			else
			{
				$sql="INSERT INTO user(name,password,email,auth)
				VALUES('$id','$pass','$email','1')";
				echo"<script>alert('注册成功！')</script>";
				if($conn->query($sql)===TRUE)
				{
						echo"Sucessfully!";
						echo"<script>location.href='login.html';</script>";
				}
				else
				{
					echo"错误:",$conn->error;
					$conn->close();
				}
			}		
			$conn->close();
		}
	}
?>