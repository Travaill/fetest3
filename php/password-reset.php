<?php
	$name=$_POST['user'];
	$email=$_POST['email'];
	$conn=mysqli_connect("localhost","root","","blog");
	if($conn->connect_error) {die("连接失败:".$conn->conn_error);}
	$sql="SELECT * FROM user WHERE name='$name'";
	mysqli_select_db($conn,"blog");
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		if($row['email']==$email)
		{
			$rs=sendemail($email,$name);
			if($rs==1)
			{
				echo "<script>alert('发送成功!')</script>";
				echo"<script>location.href='login.html'</script>";
			}
		}
		else
	{
		echo "<script><alert>('该邮箱尚未注册')</alert></script>";
		echo"<script>location.href='password-reset.html';</script>";
	}	
	}
function sendemail($email,$name)
{
	require_once "email.class.php"; 
	$server="smtp.126.com";
	$serverport="25";
	$usermail="loutloi@126.com";
	$user="loutloi";
	$pass="email10086";
	$smtp = new smtp($server,$serverport,true,$user,$pass);
	$emailtype="HTML";
	$to="$email";
	$subject="BLOG找回密码";
	$body="<h1>亲爱的{$name}:<h1/><br/>
			<h2>&nbsp;&nbsp;您好！这里是BLOG找回密码页面&nbsp;&nbsp;<a href='http://localhost/task/password-reset1.php?name={$name}' target='_blank'>请点我重置密码</a></h2>";	
	$rs=$smtp->sendmail($to, $usermail, $subject, $body, $emailtype);
	return $rs;
	
}

?>