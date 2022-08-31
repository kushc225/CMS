<?php 

// $conn=mysqli_connect("localhost","root","","k_jru");
require '../../conn/conn.php';
 $sno=$_POST['sno'];
 $d_id=$_POST['d_id'];

  $sql="DELETE FROM department WHERE sno='$sno';";

 $sql.="DELETE FROM com_type WHERE d_id='$d_id';";
$result=mysqli_multi_query($conn, $sql);


if($result){
    echo 1;
}else{
    echo 0;
}