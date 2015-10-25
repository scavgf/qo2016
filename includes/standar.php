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
        <?php include('./includes/head.inc.php'); ?>
  <?php 
           $errors=array();
    	   $missing=array();
      	   if (isset($_POST['send'])){
           $to ='scavgf@126.com';
           $subject='Feedback from website';
           $expected=array('name', 'email', 'comments');
           $required=array('name', 'comments');
           $headers="From: Registerpage<scavgf@126.com>\r\n";
           $headers.='Content-Type: text/plain; charset=utf-8';
           require('./includes/processmail.inc.php');
           }
      	   ?> 
           
	<div id="page">
		<div id="content">
                      <h4> Contact us </h4>
			<?php if ($_POST && $suspect)  {?>
                                <p> Sorry, you mail could not be sent. Please try latter. </p>
			<?php} elseif ($missing || $errors) { ?>
			        <p class="warning"> Please fix the items indicated. </p><?php } ?>

   	        	<form id="feedback" method="post" action="">
			   <p>
                           <label for="name">*姓名:  
			   <?php if ($missing && in_array('name', $missing)) { ?>
			        <span> "please enter your name." </span><?php } ?>
                           </label>
                           <input name="name" id="name" type="text" class="formbox" size='6'> 
                           <label for="name">* 性别:  
			   <?php if ($missing && in_array('gender', $missing)) { ?>
			        <span> "请输入您的性别." </span><?php } ?>
                           </label>
                           <input name="gender" id="gender" type="text" class="formbox" size='6'>
                           </p>
                           <p>
                           <label for="name">*单位:  
			   <?php if ($missing && in_array('unit', $missing)) { ?>
			        <span> "请输入您的单位." </span><?php } ?>
                           </label>
                           <input name="unit" id="unit" type="text" class="formbox" size='20'>
                          </p>
			  <p>
                           <label for="documents"> Upload file:  </label> 
                           <input type="file" name="documents" id="documents" class="formbox" size='20' >
                           <input name="upload" id="upload" type="submit" value="upload">
                        </p>
			  <p>
                           <label for="Email"> Email:  <?php if ($missing && in_array('comments', $missing)) { ?>
			        <span class="wanring">  "please enter your email." </span> 
				<?php } elseif (isset($errors['email'])) { echo $validemail; ?>
			        <span class="wanring">  "Invaild email address" </span> 
			        <?php }?> 
                           </label> </br>
                           <input name="email" id="email" type="text" class="formbox">
                        </p>
			<p>
                           <label for="comments"> Comments: 
			   <?php if ($missing && in_array('comments', $missing)) { ?>
			        <span>  "please enter your comments." </span> <?php } ?> </label>
                           <br/>
                           <textarea name="comments" id="comments"  cols="60" row="10"></textarea>
                        </p>
			<p>
                           <input name="send" id="send" type="submit" value="Send message">
                        </p>
                        </form>
                        <pre>
                           <?php 
                               if(isset($_POST['upload']) {
                                  print_r($_FILE);
                               }
                           ?>
                        </pre>
                <pre>
                <?php
                       echo "Headers: \r\n". htmlentities($headers, ENT_COMPAT, 'utf-8');
                       ini_set('display _errors','1');
                ?>
                 </pre>
		</div>

                <?php include('./includes/nav.inc.php');?>
		<br class="clearfix" />
	</div>
                <?php include('./includes/bottom.inc.php');?>
</div>
</body>
</html>
