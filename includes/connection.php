<?php 
function dbConnect($usertype){
	$host='localhost';
        $db='register';
        if ($usertype == 'read'){
            $user='psread';
            $pwd='At6tyYt693Tdqt6L';
       }
        elseif ($usertype == 'write'){
            $user='pswrite';
            $pwd='fC2XL637T2n36Rpx';
        }else{
            exit('Unrecognized user'); 
        }
        $conn= new mysqli($host, $user, $pwd, $db);
        if ($conn->connect_error){
            exit($conn->connect_error);
        }
        return $conn;
}

