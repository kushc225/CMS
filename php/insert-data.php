<?php 
session_start();
require '../conn/conn.php';
require 'fun.php';
$e_no=mysqli_real_escape_string($conn,$_POST['e_no']);
$f_name=mysqli_real_escape_string($conn,$_POST['f_name']);
$l_name=mysqli_real_escape_string($conn,$_POST['l_name']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$mobile_no=mysqli_real_escape_string($conn,$_POST['mobile_no']);
$role=mysqli_real_escape_string($conn,$_POST['role']);
$dep=mysqli_real_escape_string($conn,$_POST['dep']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$pass=mysqli_real_escape_string($conn,$_POST['pass']);

 $sql="INSERT INTO `user_table` ( `f_name`, `l_name`, `gender`, `email`, `mobile_no`, `address`, `role`, `dep`, `dt`, `password`,`e_no`) VALUES ( '$f_name', '$l_name', '$gender', '$email', '$mobile_no', '$address', '$role', '$dep', current_timestamp(), '$pass','$e_no');";

 $result=mysqli_query($conn,$sql);
 if($role=='2'){
        if($result){
                // $d_id=genDid();
                $sql="INSERT INTO `department` (`dep_name`,) VALUES ('$dep');";
                $result=mysqli_query($conn,$sql);
        }
    }

if($result){
    echo 1;
}else{
    echo 0;
}
?>