<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>commit</title>
<link href="css/reset.css" rel="stylesheet"/>
<link href="css/header.css" rel="stylesheet"/>
<link href="css/commit-modify.css" rel="stylesheet"/>
</head>
<body>
  <div class="wrapper">
  <header>
   <nav>
     <div class="logo"><a href="logined-blog.php">BLOG</a></div>
     <ul>
       <li><p>欢迎你:</p><li>
     <?php echo"<li><a>{$_COOKIE['name']}</a></li>";?>
	   <li><a href="logined-blog.php" class="active">首页</a></li>
        <?php if($_COOKIE['auth']==0)
		{
			echo "<li><a href='commit1.php'>发布文章</a></li>";
		}?>
       <li><a href="#">联系我们</a></li>
     </ul>
   </nav>
  </header>
<?php echo"<form class='content' action='change.php?id={$_GET['id']}' method='post'>"; ?>
  <div class="container">
<?php 
	$conn=mysqli_connect("localhost","root","123","blog");
	$id=isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
	if($conn->connect_error) {die("连接失败:".$conn->conn_error);}
	$sql="SELECT * FROM article WHERE id=$id";
	mysqli_select_db($conn,"blog");
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		$title=$row['title'];
		$content=$row['content'];
	}
	mysqli_free_result($result);
	$sql="SELECT * FROM tag WHERE title='$title'";
	mysqli_select_db($conn,"blog");
	$result=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($result);
	$tag="";
	$i=1;
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
			$tag[$i]=$row['tag']." ";
			$i++;
	}
	$tag=implode($tag);
	mysqli_free_result($result);
	mysqli_close($conn);
?>
  <div class="title-area">
    <h1>修改你的文章</h1>
 <?php   echo"<input type='text' name='title' id='title' class='title' maxlength='50' 
	value='$title' required>"; ?>
  </div>
  <div class="article-area">
 <?php 
	echo"<textarea cols='100' rows='17' name='content'  required >$content</textarea>"; ?>
  </div>
 <?php echo"<input type='text' name='tag' id='label' class='label' maxlength='50'value='$tag' required>"; ?>
<div class="checkbox-area">
  <h2>给你的文章分个类吧:</h2>
 <input type="checkbox" value="FE"  name="type" /><label for="checkbox1">FE</label>
 <input type="checkbox" value="PHP"  name="type" /><label for="checkbox2">PHP</label>
 <input type="checkbox" value="JAVA"  name="type" /><label for="checkbox4">JAVA</label>
 <input type="checkbox" value="Unity"  name="type" /><label for="checkbox5">Unity</label>
</div>
<div class="button-area">
   <input type="submit" value="确定"  name="submit" />
   <input type="reset" value="重置"  name="reset" />

 </div>
   </form>
 </div>
 </div>
</body>
</html>