<?php 

$conn=mysqli_connect("localhost","root","","k_jru");
$sno=$_POST['sno'];

$sql="DELETE FROM com_type WHERE sno='$sno'";

$result=mysqli_query($conn,$sql);

if($result){
    echo 1;
}else{
    echo 0;
}


?>