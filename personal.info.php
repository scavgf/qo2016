<?php
require_once './includes/session_timeout.php';
require_once './includes/connection.php';
$remarkInfo=false; 
$conn=dbConnect('read');
$conn->query("set names utf8");
$sql="SELECT * FROM regist";
$result=$conn->query($sql);
if (!result) {
    $error=$conn->error;
} else {
    $numRows=$result->num_rows;
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
			<h4>个人注册信息</h4>
                         <?php if (isset($error)){
                                  echo "<p> $error </p>";
                                  } else {
                                  while($row=$result->fetch_assoc()){
		 		  $id=$row['id'];
              	 		  if ($row['email']==$_SESSION['username']){
                 		  echo ' <table border="1" cellpadding="3">';
                 		  echo '<tr>';
                 		  echo '<td>姓名: </td>';
                 		  echo '<td>'.$row['name'].' </td>';
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>性别: </td>';
                 		  echo '<td>'.$row['gender'].' </td>';
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>单位: </td>';
                 		  echo '<td>'.$row['unit'].' </td>';
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>职称: </td>';
                 		  echo '<td>'.$row['title'].' </td>';
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>电话: </td>';
                 		  echo '<td>'.$row['telephone'].' </td>';
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>邮箱: </td>';
                 		  echo '<td>'.$row['email'].' </td>';
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>到达时间: </td>';
                 		  echo '<td>'.$row['arrivalTime'].' </td>';
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>离开时间: </td>';
                 		  if($row['departureTime']!=""){
                 		  echo '<td>'.$row['departureTime'].'</td>';
                 		  }else{
                 		  echo '<td> 无离开时间</td>';
                 		  }
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>报告信息: </td>';
                 		  echo '<td>'.$row['lecture'].' </td>';
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>上传文件: </td>';
                 		  if($row['uploadFile']!=""){
                 		  echo '<td>'. '<a href='. $row['uploadFile'].'> 下载 </a>' .'</td>';} else{ echo '<td> 无上传文件 </td>';}
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>酒店信息: </td>';
                 		  echo '<td>'.$row['hotel'].' </td>';
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>会议费信息: </td>';
                 		  echo '<td>'.$row['meetingfee'].' </td>';
                 		  echo '</tr>';
                 		  echo '<tr>';
                 		  echo '<td>汇款凭证: </td>';
                 		  if($row['uploadBill']!=""){
                 		  echo '<td>'. '<a href='. $row['uploadBill'].'> 下载 </a>' .'</td>';} else{ 
                 		  echo '<td> 无 </td>';}
                 		  echo '</tr>';
                 		  echo '</table>';
                 		  $remarkInfo=true;
                 		  }                                   
                                              }
                }
                      ?>
              <?php if (!$remarkInfo) {
                    echo '<p class="T2">数据库中暂无您的数据，请先 “会议注册” </p>';
                    } else { ?>
              <form method="post" action="./register.php">
                  如需修改信息，请点击:  <input type="submit" name="update" value="修改信息" id="update">
                    <input name="id" type="hidden" value="<?= $id;?>">
              </form>
              <?php }?>
		</div>
                <?php include('./includes/nav.inc.php');?>
		<br class="clearfix" />
	</div>
                <?php include('./includes/bottom.inc.php');?>
</div>
</body>
</html>
