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
     <li><a href="unlogined-blog.html" class="active">首页</a></li>
     <li><a href="login.html">登录</a></li>
     <li><a href="registered.html">注册</a></li>
     <li><a href="#">联系我们</a></li>
   </ul>
 </nav>
 <div id="banner">
   <div class="inner">
     <h1>Wecome to BLOG</h1>
     <p>You can find everything here.</p>
     <form class="form-wrapper" action="search.php" method="post">
     <input type="text" placeholder="Search here..." name="search" required>
     <button type="submit">Search</button>
    </form>
   </div>
 </div>
</header>
<div class="content">
  <section class="FE">
    <h1>FE</h1>
    <div class="container">
   <div class="CSS3">
     <div class="text-CSS3"><h2>CSS3</h2><p>CSS即层叠样式表(Cascading StyleSheet).CSS3是CSS技术的升级版本，CSS3语言开发是朝着模块化发展的。把它分解为一些小的模块，更多新的模块也被加入进来。这些模块包括： 盒子模型、列表模块、超链接方式 、语言模块 、背景和边框 、文字特效 、多栏布局等。</p></div>
     <div class="ima-CSS3"><img src="ima/CSS3.jpg" alt="banner"></div>
   </div>
   <div class="HTML5">
     <div class="text-HTML5"><h2>HTML5</h2>
       <p>
        HTML5可以提供:<br>
        1.提高可用性和改进用户的友好体验;<br>
        2.可以给站点带来更多的多媒体元素(视频和音频)；<br>
        3.可以很好的替代FLASH和Silverlight；<br>
        4.当涉及到网站的抓取和索引的时候,对于SEO很友好；<br>
        5.将被大量应用于移动应用程序和游戏。</p></div>
     <div class="ima-HTML5"><img src="ima/HTML5.jpg" alt="banner"></div>
   </div>
   <div class="javascript">
     <div class="ima-javascript"><img src="ima/javascript.jpg" alt="banner"></div>
     <div class="text-javascript"><h2>javascript</h2><p>JavaScript一种直译式脚本语言，是一种动态类型、弱类型、基于原型的语言，内置支持类型。它的解释器被称为JavaScript引擎，为浏览器的一部分，广泛用于客户端的脚本语言，最早是在HTML（标准通用标记语言下的一个应用）网页上使用，用来给HTML网页增加动态功能。</p></div>
   </div>
 </div>
   <div class="article-title-FE">
     <h2>Meet What Your want.</h2>
       <ul>
         <li><?php
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
				ai('FE');
		?></li>
       </ul>
   </div>
 </section>
 <section class="PHP">
   <div class="article-title-PHP">
     <h2>Meet What Your want.</h2>
     <ul>
       <li><?php ai('PHP');?></li>
     </ul>
   </div>
  <div class="ima-PHP"><img src="ima/PHP.png" alt="banner"></div>
  <div class="text-PHP"><h2>PHP</h2><p>PHP（外文名:PHP: Hypertext Preprocessor，中文名：“超文本预处理器”）是一种通用开源脚本语言。语法吸收了C语言、Java和Perl的特点，主要适用于Web开发领域。PHP 独特的语法混合了C、Java、Perl以及PHP自创的语法。它可以比CGI或者Perl更快速地执行动态网页。用PHP做出的动态页面与其他的编程语言相比，PHP是将程序嵌入到HTML（标准通用标记语言下的一个应用）文档中去执行，执行效率比完全生成HTML标记的CGI要高许多；PHP还可以执行编译后代码，编译可以达到加密和优化代码运行，使代码运行更快。</p></div>
 </section>
 <section class="JAVA">
   <div class="article-title-JAVA">
     <h2>Meet What Your want.</h2>
     <ul>
       <li><?php ai('JAVA');?></li>
     </ul>
   </div>
 <div class="ima-JAVA"><img src="ima/JAVA.jpg" alt="banner"></div>
 <div class="text-JAVA"><h2>JAVA</h2><p>Java是一门面向对象编程语言，不仅吸收了C++语言的各种优点，还摒弃了C++里难以理解的多继承、指针等概念，因此Java语言具有功能强大和简单易用两个特征。Java语言作为静态面向对象编程语言的代表，极好地实现了面向对象理论，允许程序员以优雅的思维方式进行复杂的编程[1]  。
Java具有简单性、面向对象、分布式、健壮性、安全性、平台独立与可移植性、多线程、动态性等特点[2]  。Java可以编写桌面应用程序、Web应用程序、分布式系统和嵌入式系统应用程序等[3]  。</p></div>
 </section>
 <section class="Unity">
   <div class="article-title-Unity">
      <h2>Meet What Your want.</h2>
      <ul>
        <li><?php ai('Unity');?></li>
      </ul>
   </div>
 <div class="ima-Unity"><img src="ima/Unity.jpg" alt="banner"></div>
 <div class="text-Unity"><h2>Unity</h2><p>Unity3D是由Unity Technologies开发的一个让玩家轻松创建诸如三维视频游戏、建筑可视化、实时三维动画等类型互动内容的多平台的综合型游戏开发工具，是一个全面整合的专业游戏引擎。其编辑器运行在Windows 和Mac OS X下，可发布游戏至Windows、Mac、Wii、iPhone、WebGL（需要HTML5）、Windows phone 8和Android平台。也可以利用Unity web player插件发布网页游戏，支持Mac和Windows的网页浏览。它的网页播放器也被Mac widgets所支持。</p></div>
 </section>
  <footer>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
  </footer>
</div>
 </div>
 </body>
 </html>
