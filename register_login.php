<?php
if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['pwd']);
    $retyped = trim($_POST['conf_pwd']);
    $userfile = 'uploads/private/encrypted.csv';
    require_once './includes/register_user_csv.php';
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
</head>
<body>
<div id="wrapper">
        <?php include('./includes/head.inc.php');?>
	<div id="page">
              
		<div id="content">
				<h4>会议网站注册</h4>
			<div class="box">
				<form action="" method="post">
                                 <table cellspacing="15">
                                  <tr> 
				    <td>
				        <label for="username">邮 箱:</label>
                                    </td>
				    <td>
				        <input type="text" name="username" id="username">
				    </td>
                                  </tr> 
                                  <tr> 
				    <td>
				        <label for="pwd">密 码:</label>
				    </td>
				    <td>
				        <input type="password" name="pwd" id="pwd">
				    </td>
                                  </tr> 
                                  <tr> 
				    <td>
				        <label for="conf_pwd">密码确认:</label>
				    </td>
                                    <td> 
				        <input type="password" name="conf_pwd" id="conf_pwd">
				    </td>
                                  </tr> 
                                  <tr>
                                    <td colspan="2">
				        <input type="submit" name="register" value="注 册"> <font color="red"> &nbsp; &nbsp; * </font> 请用通信邮箱注册 
                                    </td>
                                  </tr>
                                 </table>
				</form>
				<?php
				if (isset($result) || isset($errors)) {
                                    $redirect = 'login.php';
				    if (!empty($errors)) {
				    echo '<ul>';
                                        echo '<br> <font color="red"> 注册失败, 请重新注册</font> </br>';
				        foreach ($errors as $item) {
				            echo "<li><font clor='red'> *$item </font></li>";
                                  echo '</ul>';
				        }
				    } else {
				       /*<li> *<?php echo $result; ?> &nbsp; <button type=button onclick="location.href='./login.php'">请登陆</li> */
                                    header("Location: $redirect?register=yes");
				    } 
				}?>
                                
			</div>
		</div>
                <?php include('./includes/nav.inc.php');?>
		<br class="clearfix" />
	</div>
                <?php include('./includes/bottom.inc.php');?>
</div>
</body>
</html>
