<?php 

require '../fun.php';
    // $conn=mysqli_connect("localhost","root","","k_jru") or die("connection failed");
    require '../../conn/conn.php';
    $newDepart=$_POST['newDepart'];
    $d_id=ss();
    $sql="INSERT INTO `department` (`dep_name`,`d_id`) VALUES ('$newDepart','$d_id')";

    $result=mysqli_query($conn,$sql);

    if($result){
        echo 1;
    }else{
        echo 0;
    }