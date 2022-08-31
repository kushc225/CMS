<?php 
$conn=mysqli_connect("localhost","root","","k_jru") or die("Connection Failed");
$subject="testing";
$msg = "This is only for Testing Purpose!";
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: ravankr.info@gmail.com';
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$send=mail($email,$subject,$msg,$headers);
if($send){
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Email has been send to your Email '.$email.'</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed to Send Email to '.$email.'</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}


?>