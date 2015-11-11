<?php
require_once('./includes/PhpSolutions/File/upload.php');
require_once ('connection.php');
//check out the suspected information
foreach ($_POST as $key =>$value) {
$temp=is_array($value) ? $value : trim ($value);
if (empty($temp) && in_array($key, $required)) {
	$missing[]=$key;
	}
elseif (in_array($key, $expected)) {
	${$key}=$temp;
	}
     }
    switch ($gender){
      case "female":
        $gender="女";
        break;
      case "male":
        $gender="男";
        break;
      default:
        $gender="";
    } 
    switch ($lecture){
      case "lecture-oral":
        $lecture="口头报告";
        break;
      case "poster":
        $lecture="海报";
        break;
      case "lecture-no":
        $lecture="无";
        break;
      default:
        $lecture="";
    } 
    switch ($title){
      case "teacher":
        $title="在职人员";
        break;
      case "graduate":
        $title="学生";
        break;
      default:
        $title="";
    } 
    switch ($hotel){
      case "feitian1":
        $hotel="飞天单间";
        break;
      case "feitian2":
        $hotel="飞天标间合住";
        break;
      case "feitian3":
        $hotel="飞天标间单住";
        break;
      case "cuiying1":
        $hotel="萃英单间";
        break;
      case "cuiying2":
        $hotel="萃英标间合住";
        break;
      case "cuiying3":
        $hotel="萃英标间单住";
        break;
      case "dongfang1":
        $hotel="东方单间";
        break;
      case "dongfang2":
        $hotel="东方标间合住";
        break;
      case "dongfang3":
        $hotel="东方标间单住";
      case "selfcare":
        $hotel="住宿自理";
        break;
      default:
        $hotel="";
    } 

    switch ($meetingfee){
      case "cash":
        $meetingfee="现场缴纳";
        break;
      case "remittance":
        $meetingfee="汇款缴纳";
        break;
      default:
        $meetingfee="";
    } 


// set the maximum upload size in bytes
use PhpSolutions\File\Upload;
// set the maximum upload size in bytes
$max = 60000*1024; // 60 MB
if (isset($_FILES['uploadFile'])) {
    // define the path to the upload folder
    $destinationFile = 'uploads/file/';
    try {
        $loaderFile = new Upload($destinationFile, 'uploadFile');
        $loaderFile->setMaxSize($max);
        $loaderFile->allowAllTypes();
        $loaderFile->upload();
        $uploadFile1 =$loaderFile->getName();
        $resultFile = $loaderFile->getMessages();
        $_SESSION['uploadFile']=$uploadFile1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
        if (!empty($uploadFile1)){
            $uploadsFile =$destinationFile.$uploadFile1;
        }else {
            $uploadsFile="";
        }
}

if (isset($_FILES['uploadBill'])) {
    // define the path to the upload folder
    $destinationBill = 'uploads/bill/';
    try {
        $loaderBill = new Upload($destinationBill, 'uploadBill');
        $loaderBill->setMaxSize($max);
        $loaderBill->allowAllTypes();
        $loaderBill->upload();
        $uploadBill1 =$loaderBill->getName();
        $resultBill = $loaderBill->getMessages();
        $_SESSION['uploadBill']=$uploadBill1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
        if (!empty($uploadBill1)){
            $uploadsBill =$destinationBill.$uploadBill1;
        } else {
            $uploadsBill="";
        }
}
?>
<!--//创建注册信息-->
                <table border="1" cellpadding="3">
                <tr>
                    <th colspan="2"> 注册信息</th>
                </tr>
                <tr>
                   <td><font color="red"> *</font> 姓名: </td> 
                   <td> 
                       <?php if ($missing && in_array('name', $missing)){
                              $testy=true;
                              echo '<font color="red"> 请输入姓名 </font>';}
                              else {
                               echo $name; 
                              }
                        ?>
                  </td>
                </tr>
                <tr>
                   <td><font color="red"> *</font> 性别: </td> 
                   <td> 
                       <?php if ($gender==""){
                              $testy=true;
                              echo '<font color="red"> 请选择性别 </font>';}
                              else {
                              echo $gender; 
                              }
                        ?>
                  </td>
                </tr>
                <tr>
                   <td><font color="red"> *</font> 单位: </td> 
                   <td> 
                       <?php if ($missing && in_array('unit', $missing)){
                              $testy=true;
                              echo '<font color="red"> 请输入单位信息 </font>';}
                              else {
                              echo $unit; 
                              }
                        ?>
                  </td>
                </tr>
                <tr>
                   <td><font color="red"> *</font> 职称: </td> 
                   <td> 
                       <?php if ($title==""){
                              $testy=true;
                              echo '<font color="red"> 请选择职称 </font>';}
                              else {
                              echo $title; 
                              }
                        ?>
                  </td>
                </tr>
                <tr>
                   <td><font color="red"> *</font> 电话： </td> 
                   <td> 
                       <?php if ($missing && in_array('telephone', $missing)){
                              $testy=true;
                              echo '<font color="red"> 请输入电话号码 </font>';}
                              else {
                              echo $telephone; 
                              }
                        ?>
                  </td>
                </tr>
                <tr>
                   <td><font color="red"> *</font> 邮箱： </td> 
                   <td> 
                       <?php if ($missing && in_array('email', $missing)){
                              $testy=true;
                              echo '<font color="red"> 请输入邮箱 </font>';}
                              else {
                              echo $email; 
                              }
                        ?>
                  </td>
                </tr>
                   <td><font color="red"> *</font> 报告信息： </td> 
                   <td> 
                       <?php if ($lecture==""){
                              $testy=true;
                              echo '<font color="red"> 请选择报告信息 </font>';}
                              else {
                              echo $lecture; 
                              }
                        ?>
                  </td>
                </tr>
                <tr>
                   <td>上传文件： </td> 
                   <td> 
                       <?php if ($uploadFile1==""){
                              echo '无上传文件';}
                              else {
                               echo "<a href=$uploadsFile>下载</a>"; 
                              }
                        ?>
                  </td>
                </tr>
                <tr>
                   <td><font color="red"> *</font> 酒店信息： </td> 
                   <td> 
                       <?php if ($hotel==""){
                              $testy=true;
                              echo '<font color="red"> 请选择酒店信息 </font>';
                              echo '</td>';
                              echo '</tr>';
                              }
                              elseif ($hotel=="住宿自理"){
                              echo $hotel; 
                              $arrivalTime="无";
                              $departureTime="无";
                              echo '</td>';
                              echo '</tr>';
                              }
                              else{ 
                              echo $hotel;
                              echo '</td>';
                              echo '</tr>'; ?>
                              <tr>
                                 <td><font color="red"> *</font> 入住时间： </td> 
                                 <td> 
                                     <?php if ($missing && in_array('arrivalTime', $missing)){
                                            $testy=true;
                                            echo '<font color="red"> 请选择到达时间</font>';}
                                            else {
                                            echo $arrivalTime; 
                                            }
                                      ?>
                                </td>
                              </tr>
                              <tr>
                                 <td>离开时间： </td> 
                                 <td> 
                                     <?php if ($missing && in_array('departureTime', $missing)){
                                            echo '无离开时间';}
                                            else {
                                            echo $departureTime; 
                                            }
                                      ?>
                                </td>
                              </tr>
                            <?php } ?>
                <tr>
                   <td><font color="red"> *</font> 注册费： </td> 
                   <td> 
                       <?php if ($meetingfee==""){
                              $testy=true;
                              echo '<font color="red">请输入缴费信息</font>';}
                              else {
                              echo $meetingfee;
                              }
                        ?>
                  </td>
                 </tr>
                 <tr>
                   <td> 票据信息： </td> 
                   <td> 
                       <?php if ($uploadBill1==""){
                              echo '无票据信息';}
                              else {
                              echo "<a href=$uploadsBill>下载</a>"; 
                              }
                        ?>
                  </td>
                </tr>
                
                 <tr>
                   <td>备注信息： </td> 
                   <td> 
                       <?php if ($remark==""){
                              echo '无备注信息';}
                              else {
                              echo $remark; 
                              }
                        ?>
                  </td>
                </tr>
                </table>
<?php unset($errord);?>
<?php if (!$testy) {
        $conn=dbConnect('write');
        $conn->query("set names utf8");
        $stmt=$conn->stmt_init();
        $checkRegist='SELECT email, uploadFile FROM regist WHERE email= ?';
        if ($stmt->prepare($checkRegist)){
           $stmt->bind_param('s', $email);
           $ok=$stmt->execute(); 
           $stmt->store_result();
           $resultNum= $stmt->num_rows;
           $stmt->bind_result($gg, $fileDel);
           $stmt->fetch();
           $stmt->free_result();
        }
           
        if ($conn->connect_errno) {
           $errord[]=$conn->connect_errno;
        } 
        if (!empty($_GET['user_id'])&& $resultNum>0){ 
           $sql= "update regist set name = ?, gender = ?, unit = ?, title = ?, telephone = ?, email = ?, arrivalTime = ?, departureTime = ?, lecture = ?, uploadFile = ?, hotel = ?, meetingfee = ?, uploadBill = ?, remark = ?  where id = ? ";
    if ($stmt->prepare($sql)) {
        $stmt->bind_param("ssssssssssssssi", $name, $gender, $unit, $title, $telephone, $email, $arrivalTime, $departureTime, $lecture, $uploadsFile,  $hotel, $meetingfee, $uploadsBill, $remark, $_GET['user_id']);
        $stmt->execute();
        if ($stmt->affected_rows>0) {
            $ok=true;
        } else {
           $errord[]=$stmt->error;
        }
     }    
        $stmt->close();
   } elseif($resultNum==0){
           $sql= "insert into regist (name, gender, unit, title, telephone, email, arrivalTime, departureTime, lecture, uploadFile, hotel, meetingfee, uploadBill, remark) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt->prepare($sql)) {
        $stmt->bind_param("ssssssssssssss", $name, $gender, $unit, $title, $telephone, $email, $arrivalTime, $departureTime, $lecture, $uploadsFile,  $hotel, $meetingfee, $uploadsBill, $remark);
        $stmt->execute();
        if ($stmt->affected_rows>0) {
            $ok=true;
        } else {
           $errord[]=$stmt->error;
        }
        $stmt->close();
   }
    } else {
      $errord[]="该邮箱已被注册, 如许修改信息，请访问 “个人信息”"; }
}

//tesitify the email
/*if (!empty($email)) {
	$validemail= filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($validemail) {
	   $headers.="\r\nReply-To: $validemail";
	} else {
           $errors['email']=true;
          }
}
*/



