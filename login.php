<?php
$error = '';
if (isset($_POST['login'])) {
    session_start();
    $username = trim($_POST['username']);
    $password = trim($_POST['pwd']);
    // location of usernames and passwords
    $userlist = 'uploads/private/encrypted.csv';
    // location to redirect on success
    $redirect = 'index.php';
    require_once './includes/authenticate.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Big Business
Description: A two-column, fixed-width design with a bright color scheme.
Version    : 1.0
Released   : 20120210
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>第十七届全国量子光学学术会议</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheets/meetingfee-style.css" />
<link rel="stylesheet" type="text/css" href="head.css" />
</head>
<body>
<div id="wrapper">
        <?php include('./includes/head.inc.php');?>
	<div id="page">
		<div id="content">
				<h4>会议登陆</h4>
			<div class="box">
				<?php
				if ($error) {
				    echo "<p>$error</p>";
				} elseif (isset($_GET['unlogin'])){?>
                                    <p> 访问限制，请您先登陆 </p>  <?php 
				} elseif (isset($_GET['expired'])) { ?>
				    <p>会话已超时请重新登陆</p>
                                <?php } elseif(isset($_GET['register'])) {?> 
                                <p> 您已经注册成功, 请登陆</p>
                                <?php }?>

				<form method="post" action="">
				    <p>
				        <label for="username">邮 箱:</label>
				        <input type="text" name="username" id="username">
				    </p>
				    <p>
				        <label for="pwd">密 码:</label>
				        <input type="password" name="pwd" id="pwd">
				    </p>
				    <p>
				        <input name="login" type="submit" value="登 陆"> &nbsp;&nbsp;&nbsp; <font color="red">*</font> 新用户请 <a href="./register_login.php">注 册</a>
				       <!-- <button type="button"  onclick="location.href='./register_login.php';"> 注 册 </button> <font color="red">*</font> 新用户请注册 -->
				    </p>
				</form>
			</div>
		</div>
                <?php include('./includes/nav.inc.php');?>
		<br class="clearfix" />
	</div>
                <?php include('./includes/bottom.inc.php');?>
</div>
</body>
</html>
