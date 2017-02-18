<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>blog</title>
<link href="css/reset.css" rel="stylesheet"/>
<link href="css/search-result.css" rel="stylesheet"/>
</head>
<body>
  <nav>
  <div class="logo"><a href="logined-blog.html">BLOG</a></div>
  <ul>
    <?php
		echo "<li><a href='unlogined-blog.php' class='active'>首页</a></li>".
			 "<li><a href='login.html'>登录</a></li>".			 
			 "<li><a href='registered.html'>注册</a></li>".
			 "<li><a href='#'>联系我们</a></li>";?>
  </ul>
  </nav>
<header>
  <h1>BLOG</h1>
  <form class="form-wrapper" action="search.php" method="post">
  <input type="text" placeholder="Search here..." name="search" required>
  <button type="submit">Search</button>
 </form>
</header>
<div class="content">
    <h1 style="font-size:38px;"><?php
	function ai($con)
	{
		$conn=mysqli_connect("localhost","root","","blog");
		$sql="SELECT * FROM article WHERE type='$con' ";
			mysqli_select_db($conn,"blog");
			$retval=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_array($retval,MYSQLI_BOTH))	
			{	
				echo"<a href='article_unlogined.php?id={$row['id']}&p=1'>{$row['title']}.</a><br>";
			}
			mysqli_free_result($retval);
			mysqli_close($conn);
	}
	?></h1>
    <div class="article-title">
    <h1>FE</h1>
    <ul>
      <li><?php ai('FE');?></li>
    </ul>
    <h1>PHP</h1>
    <ul>
      <li><?php ai('PHP');?></li>
    </ul>
    <h1>JAVA</h1>
    <ul>
      <li><?php ai('JAVA');?></li>
    </ul>
    <h1>Unity</h1>
    <ul>
      <li><?php ai('Unity');?></li>
    </ul>
  </div>
  <div class="article-area">
  <div class="result">
	<?php
		$tag=isset($_POST['tag']) ? $_POST['tag'] : $_GET['tag'];
		echo "<h2>$tag:</h2>".
		"<ul>";
		$page=$_GET['p'];
		if(!$page||$page<1)
		{
			$page=1;
		}
		$pagesize=10;
		$offset=($page-1)*$pagesize;
		$conn=mysqli_connect("localhost","root","","blog");
		if($conn->connect_error) {die("连接失败:".$conn->conn_error);}
		$sql="SELECT * FROM tag WHERE tag='$tag' LIMIT $offset,$pagesize";
		mysqli_select_db($conn,"blog");
		$result=mysqli_query($conn,$sql);
		$total=mysqli_num_rows($result);
		while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
		{
			$title=$row['title'];
			$sql1="SELECT * FROM article WHERE title='$title'";
			mysqli_select_db($conn,"blog");
			$retval=mysqli_query($conn,$sql1);
			if($rows=mysqli_fetch_array($retval,MYSQLI_BOTH))
			{
				echo"<li><a href='article_unlogined.php?id={$rows['id']}&p=1'>{$title}.</a></li><br>";
			}
			mysqli_free_result($retval);
		}
		mysqli_free_result($result);
		mysqli_close($conn);
	?>
    </ul>
  </div>
  <div class="pagination-area">
  <ul class="pagination">
  <li><?php 
	$pages=ceil($total/10);
	$page_banner="";
	$start=1;
	$end=$pages;
	if($page>1)
	{
		$page_banner.="<a href=".'tag_class_unlogined.php'."?p=1&tag={$tag}".">首页</a>";
		$page_banner.="<a href=".'tag_class_unlogined.php'."?p=".($page-1)."&tag={$tag}><<</a>";
	}
	for($i=1;$i<=$pages;$i++)
	{
		$page_banner.="<a href='tag_class_unlogined.php?p={$i}&tag={$tag}'>{$i}</a>";
	}
	if($page<$pages)
	{
		$page_banner.="<a href=".'tag_class_unlogined.php'."?p=".($page+1)."&tag={$tag}>>></a>";
		$page_banner.="<a href=".'tag_class_unlogined.php'."?p={$pages}&tag={$tag}".">尾页</a>";
	}
	echo $page_banner;
  ?></li>
  </ul>
  </div>
  </div>
  </div>
<footer><p>Copyright © 2017 - 2020 BLOG Corporation, All Rights Reserved</p></footer>
</body>
</html>
