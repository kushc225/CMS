<?php

require '../../conn/conn.php';
$e_no=mysqli_real_escape_string($conn,$_POST['e_no']);
$comId=mysqli_real_escape_string($conn,$_POST['comId']);
$email='';


$sql = "SELECT * FROM user_table WHERE e_no = '$e_no'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $email=$row['email'];
  }
}



$sql = "INSERT INTO `forwarded_com` ( `e_no`, `c_id`, `dt`) VALUES ( '$e_no', '$comId', current_timestamp());";

$result=mysqli_query($conn,$sql);
if($result){
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
}else{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Database Problem</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}



?> 

