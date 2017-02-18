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
    <li><p>欢迎你:</p><li>
     <?php echo"<li><a>{$_COOKIE['name']}</a></li>";?>
	 <li><a href="logined-blog.php" class="active">首页</a></li>
     <li><a href="logout.php">注销</a></li>
     <?php
	 if($_COOKIE['auth']==0)
	 {
		echo "<li><a href='commit1.php'>发布文章</a></li>";
	 }?>
     <li><a href="#">联系我们</a></li>
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
				echo"<a href='article-style.php?id={$row['id']}&p=1'>{$row['title']}.</a><br>";
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
    <h2>您的搜索结果为:</h2>
    <ul>
    <?php
		$search=isset($_POST['search']) ? $_POST['search'] : $_GET['search'];;
		$page=$_GET['p'];
		if(!$page||$page<1)
		{
			$page=1;
		}
		$pagesize=10;
		$offset=($page-1)*$pagesize;
		$conn=mysqli_connect("localhost","root","","blog");
		if($conn->connect_error) {die("连接失败:".$conn->conn_error);}
		$sql="SELECT * FROM article WHERE title LIKE '%{$search}%' LIMIT $offset,$pagesize";
		mysqli_select_db($conn,"blog");
		$result=mysqli_query($conn,$sql);
		$total=mysqli_num_rows($result);
		while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
		{
			echo"<li><a href='article-style.php?id={$row['id']}&p=1'>{$row['title']}.</a></li><br>";
		}
		if(mysqli_num_rows($result)==0)
		{
			echo"<li>无记录！</li>";
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
		$page_banner.="<a href=".'search.php'."?p=1&search={$search}".">首页</a>";
		$page_banner.="<a href=".'search.php'."?p=".($page-1)."&search={$search}><<</a>";
	}
	for($i=1;$i<=$pages;$i++)
	{
		$page_banner.="<a href='search.php?p={$i}&search={$search}'>{$i}</a>";
	}
	if($page<$pages)
	{
		$page_banner.="<a href=".'search.php'."?p=".($page+1)."&search={$search}>>></a>";
		$page_banner.="<a href=".'search.php'."?p={$pages}&search={$search}".">尾页</a>";
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
