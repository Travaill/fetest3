<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>password-reset1</title>
<link href="css/reset.css" rel="stylesheet"/>
<link href="css/password-reset.css" rel="stylesheet"/>
</head>
<body>
      <div class="blog"><h1>Blog</h1></div>
    <div class="container ">
  <div class="form">
  <?php echo "<form action='reset.php?name={$_GET['name']}' method='post'>"; ?>
      <div class="password">
         <input type="password" name="password" id="password" class="ipt" placeholder="请输入新密码" required>
         <div class="password1">
           <input type="password" name="password1" id="password1" class="ipt" placeholder="再次输入密码" required>
         </div>
      </div>
      </div>
    <div id="button">	<button type="submit"  id="button">点击确认</button></div>
    </form>
  </div>
</body>
</html>
