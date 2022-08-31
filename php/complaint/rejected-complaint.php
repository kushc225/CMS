<?php 

$conn=mysqli_connect("localhost","root","","k_jru");

$reasonForRejection=$_POST['reasonForRejection'];
$c_id=$_POST['c_id'];


$sql="INSERT INTO `rejected_com` (`c_id`,`des`,`dt`) VALUES ('$c_id','$reasonForRejection',CURRENT_TIMESTAMP());";
$result=mysqli_query($conn,$sql);
if($result){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Status Changed Successfully...</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed to Change the Status...</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

