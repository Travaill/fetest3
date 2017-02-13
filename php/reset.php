<html>
<?php
	$name=$_GET['name'];
	$pass=md5($_POST['password']);
	$pass1=md5($_POST['password1']);
	if($pass!=$pass1)
	{
		echo "<script>alert('请输入相同的密码')</script>";
		echo"<script>location.href='password-reset1.php?name={$name}';</script>";
	}
	else
	{	
		$conn=mysqli_connect("localhost","root","123","blog");
		if($conn->connect_error) {die("连接失败:".$conn->conn_error);}
		$sql="UPDATE user SET password='$pass' WHERE name='$name'";
		mysqli_select_db($conn,"blog");
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			echo"<script><alert>('重置成功')</alert></script>";
			echo"<script>location.href='successful-reset.html'</script>";
		}
	}
?>
</html>