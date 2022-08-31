<?php 

require '../conn/conn.php';

$sno=mysqli_real_escape_string($conn,$_POST['sno']);
$e_no=mysqli_real_escape_string($conn,$_POST['e_no']);
$f_name=mysqli_real_escape_string($conn,$_POST['f_name']);
$l_name=mysqli_real_escape_string($conn,$_POST['l_name']);
$mobile_no=mysqli_real_escape_string($conn,$_POST['mobile_no']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$dep=mysqli_real_escape_string($conn,$_POST['dep']);
$role=mysqli_real_escape_string($conn,$_POST['role']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
  $sql="UPDATE  `user_table` SET `e_no`='$e_no', `f_name`='$f_name',`l_name`='$l_name',`mobile_no`='$mobile_no',`gender`='$gender',`email`='$email',`address`='$address',`dep`='$dep',role='$role' WHERE `sno`='$sno';";
$result=mysqli_query($conn,$sql);
if($result){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>User Information Updated</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed to Update User Information!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>