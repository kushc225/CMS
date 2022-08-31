<?php 

if(!isset($_SESSION['role'])){
    header("Location : http://localhost/index/com/login.php");
}
session_start();
$conn=mysqli_connect("localhost","root","","k_jru") or die("connection Failed");
$sno=$_SESSION['sno'];
$e_no=$_POST['e_no'];
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$gender=$_POST['gender'];
$mobile_no=$_POST['mobile_no'];
$email=$_POST['email'];
$password=$_POST['password'];
$address=$_POST['address'];

$sql="UPDATE `user_table` SET `e_no`='$e_no', `f_name`='$f_name', `l_name`='$l_name', `gender`='$gender', `mobile_no`='$mobile_no', `email`='$email', `password`='$password', `address`='$address' WHERE sno='$sno' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo '<div class="alert alert-success">Profile is Updated</div>';
}else{
    echo '<div class="alert alert-danger">Failed to Update Profile</div>';

}

?>