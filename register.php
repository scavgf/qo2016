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
<link rel="stylesheet" href="./includes/calendar/jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="head.css" />
<script src="./includes/calendar/jquery-1.10.2.js"></script>
<script src="./includes/calendar/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker1" ).datepicker();
    $( "#datepicker2" ).datepicker();
  });
  /*$(document).ready(function(){
   $("#uploadYes1").click(function(){
   $('#p1').show();
   });
   $("#uploadYes2").click(function(){
   $('#p1').show();
   });
   $("#uploadNo").click(function(){
   $('#p1').hide();
   });
   });*/
</script>
<script>
  function clickshow(){
        $("#p1").show();
  }
  function clickhide(){
        $("#p1").hide();
  }
  function clickradioShow(){
    $("#bill").show();
  }
  function clickradioHide(){
    $("#bill").hide();
  }
  function clicktimeShow(){
    $("#time").show();
  }
  function clicktimeHide(){
    $("#time").hide();
  }
</script>
</head>
<body>
<div id="wrapper">
        <?php include('./includes/head.inc.php'); ?>
           
	<div id="page">
		<div id="content">
                      <h4> 会议注册</h4>
   	        	<form id="feedback" method="post" enctype="multipart/form-data"  action="./register.info.php?user_id=<?=$_POST['id'];?>">
			   <p>
                           <label for="name"><font color="font">* </font> 姓名:  
                           </label>
                           <input name="name" id="name" type="text" class="formbox" size='8'> 
                           </p>
                           <p><label for="name"><font color="font">* </font>  性别:  &nbsp;
                           </label>
			   <input  type="radio" value="male" name="gender" /> 男 &nbsp;&nbsp;
		           <input  type="radio" value="female" name="gender" /> 女
                           </p>
                           <p>
                           <label for="name"><font color="font">* </font>单位:  
                           </label>
                           <input name="unit" id="unit" type="text" class="formbox" size='30'>
                          </p>
                           <p>
                           <label for="title"><font color="font">* </font> 职称: </label>
                           <select name="title">
			   <option value="teacher" id="titleTeacher" />在职人员</option>
			   <option value="graduate"  id="titleGraduate" /> 学生 </option>
                           </select> 
                           </p>
			  <p>
                           <label for="telephone"> <font color="font">* </font>电话: </label> 
                           <input name="telephone"  type="text" class="formbox">
                         </p>
			  <p>
                           <label for="email"> <font color="font">* </font>邮箱: </label> 
                           <input name="email"  type="text" class="formbox">
                         </p>
                         <p>
                           <label for="lecture"><font color="font">* </font> 报告信息: </label>
			   <input type="radio" name="lecture" value="lecture-oral" onclick="clickshow()"/>口头报告 &nbsp;&nbsp;

			   <input type="radio"  name="lecture" value="poster"    onclick="clickshow()" />张贴海报 &nbsp;&nbsp;

			   <input type="radio"  name="lecture" value="lecture-no"   onclick="clickhide()"/>无 &nbsp;&nbsp;

                         </p>
			<p id="p1" style="display: none">
                           <a href="./documents/abstract.docx" >1. 模版下载(点击下载)</a>
                           &nbsp;&nbsp;&nbsp;
                           <label for="uploadFile">2. 上传文件:  </label> 
                           <input type="file" name="uploadFile"  class="formbox" size='20' >
                           </br>
                           <font color="red"> *请报告人和海报张贴者按照模版格式填写报告以及海报信息. </font>
                           <p><strong><font color="red">*</font> 酒店信息：</strong> </p>
                        </p>
                           <strong>飞天大酒店</strong> </br>
			   <input type="radio" value="feitian1" name="hotel" onclick="clicktimeShow()" /> 单人间 (500元/间) &nbsp;
		           <input type="radio" value="feitian2" name="hotel" onclick="clicktimeShow()"/> 标准间<font color="red">合住</font>(450元/间)&nbsp;
		           <input type="radio" value="feitian3" name="hotel" onclick="clicktimeShow()"/> 标准间<font color="red">单住</font>(450元/间)&nbsp;
                           </br>
                           <strong> 萃英大酒店</strong> </br>
			   <input type="radio" value="cuiying1" name="hotel" onclick="clicktimeShow()"/> 单人间 (280元/间) &nbsp;
		           <input type="radio" value="cuiying2" name="hotel" onclick="clicktimeShow()"/> 标准间<font color="red">合住</font>(280元/间)&nbsp;
		           <input type="radio" value="cuiying3" name="hotel" onclick="clicktimeShow()"/> 标准间<font color="red">单住</font>(280元/间)&nbsp;
                           </br>
                           <strong> 东方大酒店</strong> </br>
			   <input type="radio" value="dongfang1" name="hotel" onclick="clicktimeShow()"/> 单人间 (240元/间) &nbsp;
		           <input type="radio" value="dongfang2" name="hotel" onclick="clicktimeShow()"/> 标准间<font color="red">合住</font>(220元/间)&nbsp;
		           <input type="radio" value="dongfang3" name="hotel" /> 标准间<font color="red">单住</font>(220元/间)&nbsp;
                           </br>
                           </p>
                           <p id='time' style='display: none;'>
                           <label for="arrivalTime"> <font color="font">* </font> 入住时间: </label> 
                           <input name="arrivalTime" id="datepicker1" type="text" class="formbox" size='10'>
                           &nbsp;&nbsp;&nbsp;
                           <label for="departureTime">  离开时间: </label> 
                           <input name="departureTime" id="datepicker2" type="text" class="formbox" size='10' > </br>
                           </p>
                           <p>
                           <input type="radio" value="selfcare" name="hotel" onclick="clicktimeHide()"/> <strong> 住宿自理 </strong>
                           </p>
                          
<!--                          <p> <strong>注册费：</strong> </br>
                           <p><label for="meetingfee"><font color="font">* </font> 注册费:  &nbsp;
                           </label>
			   <input  type="radio" value="cash" name="meetingfee" onclick="clickradioHide()"/> 现场缴纳 &nbsp;&nbsp;
		           <input  type="radio" value="remittance" name="meetingfee" onclick="clickradioShow()"  /> 汇款缴纳
                           </p>
                           <p id="bill" style="display: none;"> 
                           <label for="uploadBill">上传票据:  </label> 
                           <input type="file" name="uploadBill"  class="formbox" size='20' >
                           </p>
                          </p> -->
                        <p> <label for= "remark"> <strong> 备注：</strong> </label> </br>
                           <textarea name="remark" id="remark" rows="7" cols="60"> </textarea>
                        </p>
			<p>
                           <input name="send" id="send" type="submit" value="注册"> &nbsp;&nbsp;&nbsp;
                          <font color="red">*</font>为必填项 
                        </p>
                        </form>
		</div>
              <?php include('./includes/nav.inc.php');?>
		<br class="clearfix" />
	</div>
                <?php include('./includes/bottom.inc.php');?>
</div>
</body>
</html>
