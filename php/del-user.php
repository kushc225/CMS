<?php 
require '../conn/conn.php';

$sno=$_POST['sno'];
$sql="DELETE FROM `user_table` WHERE `sno`='$sno';";
$result=mysqli_query($conn,$sql);
if($result){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>User has been Deleted Successfully...</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed to Delete User.</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>