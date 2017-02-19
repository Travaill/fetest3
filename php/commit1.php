<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Modify</title>
<link href="css/reset.css" rel="stylesheet"/>
<link href="css/header.css" rel="stylesheet"/>
<link href="css/commit-modify.css" rel="stylesheet"/>
</head>
<body>
  <div class="wrapper">
  <header>
   <nav>
     <div class="logo"><a href="blog.html">BLOG</a></div>
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
<form class="content" action="commit.php" method="post">
  <div class="container">

  <div class="title-area">
    <h1>发布你的文章</h1>
    <input type="text" name="title" id="title" class="title" maxlength="50"placeholder="请输入文章标题" required>
  </div>
  <div class="article-area">
      <input type="text" name="tag" id="label" class="label" maxlength="50"placeholder="填写标签" required>
    <textarea cols="100" rows="17" placeholder="请输入文章" name="content" required ></textarea>
  </div>

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
