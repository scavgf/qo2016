<?php
require_once './includes/session_timeout.php';
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
        <?php include('./includes/head.inc.php'); ?>
  <?php 
           $testy=false;
           $errors=array();
    	   $missing=array();
      	   if (isset($_POST['send'])){
           $expected=array('name', 'gender', 'unit', 'title', 'telephone', 'email', 'arrivalTime', 'departureTime', 'lecture', 'hotel', 'uploadFile','meetingfee', 'uploadBill','remark');
           $required=array('name', 'gender', 'unit', 'title', 'telephone', 'email', 'arrivalTime',  'lecture', 'hotel', 'meetingfee');
           }
      	   ?> 
            
	<div id="page">
		<div id="content">
                <?php require_once('./includes/checkinfo.inc.php');?>
                </br>
                <?php if (!$testy && !isset($errord)){
                    echo "<p><strong>恭喜您，注册成功</strong> </p>";
                   } else { ?>

              <form method="post" action="./register.php">
                   <font color="red"> !注册失败，请重新注册 </font> &nbsp; &nbsp; <input type="submit" name="update" value="重新注册" id="update">
                    <input name="id" type="hidden" value="<?= $_GET['user_id'];?>">
              </form>
                 <?php 
	          if (isset($errord)) {
	              echo '<ul>';
	              foreach ($errord as $message) {
	                  echo "<li>* $message</li>";
	              }
	              echo '</ul>';
	          }
                   ?>
                  <?php } ?>  

<!--	          <?php
	          if (isset($resultFile)) {
                     echo "<p>上传文件</p>";
	              echo '<ul>';
	              foreach ($resultFile as $message) {
	                  echo "<li>* $message</li>";
	              }
	              echo '</ul>';
	          }
	          ?>
                 
	          <?php
	          if (isset($resultBill)) {
                     echo "<p>上传汇款单</p>";
	              echo '<ul>';
	              foreach ($resultBill as $message) {
	                  echo "<li>* $message</li>";
	              }
	              echo '</ul>';
	          }
	          ?>
-->
		</div>

                <?php include('./includes/nav.inc.php');?>
		<br class="clearfix" />
	</div>
                <?php include('./includes/bottom.inc.php');?>
</div>
</body>
</html>
