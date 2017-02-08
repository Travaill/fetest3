<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>blog</title>
<link href="css/reset.css" rel="stylesheet"/>
<link href="css/header.css" rel="stylesheet"/>
<link href="css/content.css" rel="stylesheet"/>
<link href="css/footer.css" rel="stylesheet"/>
</head>
<body>
<div class="main-wrapper">
<header>
 <nav>
   <div class="logo"><a href="blog.html">BLOG</a></div>
   <ul>
     <li><a href="#" class="active">首页</a></li>
     <li><a href="#">登录</a></li>
     <li><a href="#">注册</a></li>
     <li><a href="#">联系我们</a></li>
   </ul>
 </nav>
 <div id="banner">
   <div class="inner">
     <h1>Wecome to BLOG</h1>
     <p>You can find everything here.</p>
     <ul>
       <li><a href="#">FE</a></li>
       <li><a href="#">PHP</a></li>
       <li><a href="#">JAVA</a></li>
       <li><a href="#">Unity</a></li>
     </ul>
   </div>
 </div>
</header>
<div class="content">
  <section class="FE">
    <h1>FE</h1>
    <div class="container">
	<?php
	$conn=mysqli_connect("localhost","root","123","blog");
	if($conn->connect_error) {die("连接失败:".$conn->conn_error);}
	$sql1="SELECT * FROM article WHERE type='FE' ";
	mysqli_select_db($conn,"blog");
	$retval1=mysqli_query($conn,$sql1);
	while($row=mysqli_fetch_array($retval1,MYSQLI_BOTH))	
	{	
		echo"{$row['title']}.<br>";
	}
	mysqli_free_result($retval1);
	?>
   <div class="CSS3">
     <div class="ima-CSS3"><img src="ima/CSS3.jpg" alt="banner"></div>
     <div class="text-CSS3"><h2>CSS3</h2><p></p></div>
	 <?php
	$sql2="SELECT * FROM article WHERE type='CSS3' ";
	mysqli_select_db($conn,"blog");
	$retval2=mysqli_query($conn,$sql2);
	while($row=mysqli_fetch_array($retval2,MYSQLI_BOTH))	
	{	
		echo"{$row['title']}.<br>";
	}
	mysqli_free_result($retval2);
	?>
   </div>
   <div class="HTML5">
     <div class="text-HTML5"><h2>HTML5</h2></div>
     <div class="ima-HTML5"><img src="ima/HTML5.jpg" alt="banner"></div>
	 <?php
	$sql3="SELECT * FROM article WHERE type='HTML5' ";
	mysqli_select_db($conn,"blog");
	$retval3=mysqli_query($conn,$sql3);
	while($row=mysqli_fetch_array($retval3,MYSQLI_BOTH))	
	{	
		echo"{$row['title']}.<br>";
	}
	mysqli_free_result($retval3);
	?>
   </div>
   <div class="javascript">
     <div class="ima-javascript"><img src="ima/javascript.jpg" alt="banner"></div>
     <div class="text-javascript"><h2>javascript</h2><p></p></div>
	 <?php
	$sql4="SELECT * FROM article WHERE type='javascript' ";
	mysqli_select_db($conn,"blog");
	$retval4=mysqli_query($conn,$sql4);
	while($row=mysqli_fetch_array($retval4,MYSQLI_BOTH))	
	{	
		echo"<a href='article.php'>{$row['title']}.</a><br>";
	}
	mysqli_free_result($retval4);
	mysqli_close($conn);
	?>
   </div>
 </div>
 </section>
 <section class="PHP">
  <div class="ima-PHP"><img src="ima/PHP.png" alt="banner"></div>
  <div class="text-PHP"><h2>PHP</h2><p></p></div>
 </section>
 <section class="JAVA">
<div class="ima-JAVA"><img src="ima/JAVA.jpg" alt="banner"></div>
<div class="text-JAVA"><h2>JAVA</h2></div>
 </section>
 <section class="Unity">
<div class="ima-Unity"><img src="ima/Unity.jpg" alt="banner"></div>
<div class="text-Unity"><h2>Unity</h2></div>
 </section>
  <footer>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
  </footer>
</div>
 </div>
 </body>
 </html>
