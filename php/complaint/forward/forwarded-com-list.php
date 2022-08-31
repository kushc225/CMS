<?php 
session_start();
if(!($_SESSION['role']==1)){
    header("Location: http://localhost/index/com/login.php");
}
require '../../../conn/conn.php';

$FCLimit= mysqli_real_escape_string($conn,$_POST['FCLimit']);
$FCPageNumber= mysqli_real_escape_string($conn,$_POST['FCPageNumber']);

$offset=ceil($FCPageNumber-1)*$FCLimit;

$sql = "SELECT * FROM user_table INNER JOIN forwarded_com ON user_table.e_no=forwarded_com.e_no LIMIT $offset,$FCLimit";


$result=mysqli_query($conn,$sql) or die("Query Failed");
$output = '';
if(mysqli_num_rows($result)>0){
  $output.='<table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Sno</th>
              <th scope="col">Name</th>
              <th scope="col">E_mail</th>
            </tr>
          </thead>   <tbody>';
          $sno=0;
    while($row=mysqli_fetch_assoc($result)){
      $sno++;
      $output.='
      <tr>
      <th scope="row">'.$sno.'</th>
      <td>'.$row['f_name'].' '.$row['l_name'].'</td>
      <td>'.$row['email'].'</td>
    </tr>
      ';
    }
    $output.=' </tbody>
    </table>';
    echo $output;
}else{
    echo '<div class="alert alert-danger">No Forwarded Complaint Found...</div>';
}
?>