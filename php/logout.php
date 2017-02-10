<?php
	setcookie("name","",time()-3600*24*365);
	setcookie("password","",time()-3600*24*365);
	setcookie("auth","",time()-3600*24*365);
	echo"<script>location.href='unlogined-blog.php';</script>";
?>