<?php
	$id=$_GET['id'];
	$title=addslashes($_POST['title']);
	$content=addslashes($_POST['content']);
	$type=$_POST['type'];
	$tag=$_POST['tag'];
	$tags=explode(" ",$tag);
	$num=count($tags);
	str_replace(" "," ",str_replace("\n","<br/>",$_POST['content']));
	$conn=mysqli_connect("localhost","root","","blog");
	if($conn->error){die("连接失败:".$conn->conn_error);}
	mysqli_query($conn,$sql="DELETE FROM tag WHERE title='$title'");
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
	$sql="UPDATE article SET title='$title',content='$content',type='$type' WHERE id=$id";
	mysqli_select_db($conn,"blog");
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		echo"<script>alert('更新成功!')</script>";
		echo"<script>location.href='article-style.php?id={$id}&p=1'</script>";

	} 
	else 
	{
		echo"<script>alert('更新失败!请重试')</script>";
		echo"<script>location.href='Modify.php?id={$id}'</script>";
	}
?>

?>
