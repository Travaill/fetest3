<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>blog</title>
<link href="css/reset.css" rel="stylesheet"/>
<link href="css/article-style.css" rel="stylesheet"/>
</head>
<body>
  <nav>
  <div class="logo"><a href="logined-blog.php">BLOG</a></div>
  <ul><?php
		echo "<li><p>欢迎你:</p><li>".
		"<li><a>{$_COOKIE['name']}</a></li>".
		"<li><a href='logined-blog.php' class='active'>首页</a></li>";   
		if($_COOKIE['auth']==0)
		{
			echo"<li><a href='commit1.php'>发布文章</a></li>".
			"<li><a href='Modify.php?id={$_GET['id']}'>.修改文章.</a></li>";
		}
		echo "<li><a href='#'>联系我们</a></li>";?>
	</ul>
  </nav>
<header>
  <h1>BLOG</h1>
  <form class="form-wrapper" action="search.php?p=1" method="post">
  <input type="text" placeholder="Search here..." name="search" required>
  <button type="submit">Search</button>
 </form>
</header>
<div class="content">
    <h1 style="font-size:38px;"><?php
	$id=isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
	function connect($id)
	{
		$conn=mysqli_connect("localhost","root","123","blog");
		if($conn->connect_error) {die("连接失败:".$conn->conn_error);}
		$sql="SELECT * FROM article WHERE id=$id";
		mysqli_select_db($conn,"blog");
		$result=mysqli_query($conn,$sql);
		return $result;
	}
	$result=connect($id);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		echo"{$row['title']}<br/>";
	}
	mysqli_free_result($result);
	function ai($con)
	{
		$conn=mysqli_connect("localhost","root","123","blog");
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
  <div class="article-imformation">
      <span><?php $result=connect($id);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		echo substr($row['reg_date'],0,16);
	}
	mysqli_free_result($result);
?></span>
  </div>
  <div class="text">
  <p><?php
	$result=connect($id);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		$page=$_GET['p'];
		$sum=mb_strlen($row['content']);
		$words=650;
		$pages=ceil($sum/$words);
		$con=mb_substr($row['content'],($page-1)*$words,$words,'utf-8');
		$con=str_replace(" "," ",str_replace("\n","<br/>",$con));
		echo $con;
	}
	mysqli_free_result($result);
	
?></p>
  </div>
  <div class="pagination-area">
  <ul class="pagination">
  <li><?php
	$result=connect($id);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		$page_banner="";
		if($pages<1){$page_banner.=1;}
		else
		{
			$start=1;
			$end=$pages;
			if($page>1)
			{
				$page_banner.="<a href=".'article-style.php'."?id=$id"."&p=1".">首页</a>";
				$page_banner.="<a href=".'article-style.php'."?id=$id"."&p=".($page-1)."><<</a>";
			}
			for($i=$start;$i<=$end;$i++)
			{
				$page_banner.="<a href=".'article-style.php'."?id=$id"."&p=".$i.">{$i}</a>";
			}
			if($page<$pages)
			{
				$page_banner.="<a href=".'article-style.php'."?id=$id"."&p=".($page+1).">>></a>";
				$page_banner.="<a href=".'article-style.php'."?id=$id"."&p=".($pages).">尾页</a>";
			}
		}
		echo $page_banner;
	}
	mysqli_free_result($result);
?></li>
  </ul>
  </div>
  </div>
  </div>
</div>
<footer><p>Copyright © 2017 - 2020 BLOG Corporation, All Rights Reserved</p></footer>
</body>
</html>
