<?php
use PhpSolutions\Authenticate\CheckPassword;

require_once './includes/PhpSolutions/Authenticate/CheckPassword.php';
$usernameMinChars = 6;
$errors = array();
if (strlen($username) < $usernameMinChars) {
    $errors[] = "用户名中至少包含 $usernameMinChars 个字符";
}
if (preg_match('/\s/', $username)) {
    $errors[] = '用户名中请不要包含空格';
}
$checkPwd = new CheckPassword($password, 6);
//$checkPwd->requireMixedCase();
$checkPwd->requireNumbers(0);
$checkPwd->requireSymbols();
$passwordOK = $checkPwd->check();
if (!$passwordOK) {
    $errors = array_merge($errors, $checkPwd->getErrors());
}
if ($password != $retyped) {
    $errors[] = "两次密码不匹配";
}
if (!$errors) {
    // encrypt password using default encryption
    $password = password_hash($password, PASSWORD_DEFAULT);
    // open the file in append mode
    $file = fopen($userfile, 'a+');
    // if filesize is zero, no names yet registered
    // so just write the username and password to file as CSV
    if (filesize($userfile) === 0) {
        fputcsv($file, array($username, $password));
        $result = "$username 成功注册";
    } else {
        // if filesize is greater than zero, check username first
        // move internal pointer to beginning of file
        rewind($file);
        // loop through file one line at a time
        while (($data = fgetcsv($file)) !== false) {
            if ($data[0] == $username) {
                $errors[] = "$username 已被注册，请选用其他用户名";
                break;
            }
        }
        // if $result not set, username is OK
        if (!isset($result)&& !$errors) {
            // insert new record
            fputcsv($file, array($username, $password));
            $result = "$username 成功注册";
        }
        // close the file
        fclose($file);
    }
}
