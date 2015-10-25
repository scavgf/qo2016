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
#menu ul li.logout {position: absolute; right: 45px;}
#menu ul li.information {padding: 0 0px 0 100px; color: #005831;}
</style>
<div id="header">
	<div id="logo">
	<h1><a href="index.php">第十七届全国量子光学学术会议</a></h1>
	</div>
	<div id="slogan">
	     <img src="./images/logo.png" alt="logo" />	
	</div>
	<div id="slogan">
		<h2>2016-8-5--2016-8-8 甘肃 &bull; 兰州</h2>
	</div>
</div>

<div id="menu">
		<ul>
		<li class="first current_page_item"><a href="index.php">主页</a></li>
                <?php if (!isset($_SESSION['authenticated'])) {
           	echo '<li><a href="login.php">登陆</a></li>';
		echo '<li><a href="register.php">会议注册</a></li>';
                } else{ 
		echo '<li><a href="register.php">会议注册</a></li>';
		echo '<li><a href="personal.info.php">个人信息</a></li>';
		echo '<li class="information"> 欢迎回来,'. $_SESSION['username'].' </li>';
		echo '<li class="logout" onclick="show_confirm()"><a><image height="45" align="center" src="./images/logout.png" /> 登出 </a></li>';
                }?>
		</ul>
		<br class="clearfix" />
</div>

