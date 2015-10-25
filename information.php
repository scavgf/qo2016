<?php
require_once './includes/session_timeout.php';
require_once './includes/connection.php';
$conn=dbConnect('read');
$conn->query("set names utf8");
$sql="SELECT name, unit FROM regist";
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
<link rel="stylesheet" type="text/css" href="stylesheets/organizingcommittee-style.css" />
</head>
<body>
<div id="wrapper">
        <?php include('./includes/head.inc.php');?>
	<div id="page">
		<div id="content">
                            <h4> 已注册人员 </h4>
                            <?php if (isset($error)){
                                  echo "<p> $error </p>";
                                  } elseif (!$numRows){
                                  echo "<p> No records found </p>";
                                  } else { ?>
                            <table width="350" >
                               <tr>
                               <th align="center"> 序 号</th>
                               <th align="center"> 姓 名</th>
                               <th align="center"> 单 位</th>
                               </tr>
                               <?php $i=0; while($row=$result->fetch_assoc() ) { $i++;
                               $name=$row['name'];
                               $unit=$row['unit'];
                               echo '<tr>';
                               echo '<td align="center">'. $i. '</td>';
                               echo '<td align="center">'. $name.'</td>';
                               echo '<td align="center">'. $unit. '</td>';
                               echo "</tr>";
                               }?>
                            </table>
                              <?php }?>
		</div>
        <?php include('./includes/nav.inc.php');?>
		<br class="clearfix" />
	</div>
        <?php include('./includes/bottom.inc.php');?>
</div>
</body>
</html>
