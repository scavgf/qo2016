<script type="text/javascript">
function show_confirm()
{
var r=confirm("确认退出?");
if (r==true)
  {
  location.href="./logout.php?confirm=yes";
  }
}
</script>

<div id="header">
<!--	<div id="logo">
	<h1><a href="index.php">第十七届全国量子光学学术会议</a></h1>
	</div>
	<div id="slogan">
	</div>
	<div id="slogan">
	     <img src="./images/logo.png" alt="logo" />	
	</div>
-->
</div> 
<div id="menu">
		<ul>
		<li class="first current_page_item"><a href="index.php"><center>主页</center></a></li>
                <?php if (!isset($_SESSION['authenticated'])) {
           	echo '<li><a href="login.php"><center>登陆</center></a></li>';
		echo '<li><a href="register.php"><center>会议注册</center></a></li>';
                } else{ 
		echo '<li><a href="register.php"><center>会议注册</center></a></li>';
		echo '<li><a href="personal.info.php"><center>个人信息</center></a></li>';
		echo '<li class="information"> 欢迎回来, '. $_SESSION['username'].' </li>';
		echo ' <li id="logout" onclick="show_confirm()"> <img id="logoutPic" src="/images/logout-w.png" /> <center>登出</center> </li>';
                }?>
		</ul>
		<br class="clearfix" />
</div>

