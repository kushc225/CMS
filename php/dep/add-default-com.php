<?php 

            // $conn=mysqli_connect("localhost","root","","k_jru") or die("connection failed");
            require '../../conn/conn.php';

            $d_id=$_POST['d_id'];
            $defaultCom=$_POST['defaultCom'];

            $sql="INSERT INTO `com_type` (`complaint_name`,`d_id`) VALUES ('$defaultCom','$d_id')";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo 1;
            }else{
                echo 0;
            }