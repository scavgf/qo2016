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
<style type="text/css">
#logout {
        float:right;
        position: absolute;
        right:10px;
	text-decoration: none;
	color: #FFFFFF;
	font-size: 1.25em;
	letter-spacing: -1px;}
#menu ul li.information {padding: 0 0px 0 0px; color: #FFFFFF;}
#logoutPic {height: 45px;position: absolute; right: 120px; padding: 7px 0 0 0;}
</style>

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
		echo ' <li  onclick="show_confirm()"> <img id="logoutPic" height="40" src="/images/logout-w.png" /> <a id="logout"> 登出 </a> </li>';
                }?>
		</ul>
		<br class="clearfix" />
</div>

