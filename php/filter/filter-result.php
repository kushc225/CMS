<?php 

session_start();
$conn=mysqli_connect("localhost","root","","k_jru");
$statusF=mysqli_real_escape_string($conn,$_POST['statusF']);
$limitF =mysqli_real_escape_string($conn,$_POST['limitF']);
$pageNumberF=mysqli_real_escape_string($conn,$_POST['pageNumberF']);

$offset = ($pageNumberF-1)*$limitF;
if($statusF=="all"){
    $sql="SELECT * FROM `complaint` ORDER BY `sno` DESC LIMIT $limitF";

}else{
    $sql="SELECT * FROM `complaint` WHERE `status`='$statusF' ORDER BY `sno` DESC LIMIT $offset,$limitF";
}
$output='';
$result=mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num>0){
  $output= '<table class="table table-hover table-info text-dark">
<thead>
  <tr>
    <th class="thead-dark" scope="col">Sno</th>
    <th class="thead-dark" scope="col">Registration No</th>
    <th class="thead-dark" scope="col">Complaint Id</th>
    <th class="thead-dark" scope="col">Description</th>
    <th class="thead-dark" scope="col">Complaint Category</th>
    <th class="thead-dark" scope="col">Status</th>
    <th class="thead-dark" scope="col">Data And Time</th>';
    
    if($_SESSION['role']==1 || $_SESSION['role']==2){
      $output.='<th scope="col">Events</th>';
    }
  $output.='</tr>
</thead>
<tbody>';
$sno=0;
  while($row=mysqli_fetch_assoc($result)){
      $sno++;
      $output.=' <tr>
      <th scope="row">'.$sno.'</th>
      <td>'.$row['e_no'].'</td>
      <td>'.$row['c_id'].'</td>
      <td>'.$row['com_des'].'</td>
      <td>'.$row['com_cate'].'</td>
      <td>'.$row['status'].'</td>
      <td>'.$row['dt'].'</td>';
    
    if($_SESSION['role']==1 || $_SESSION['role']==2){
      $output.='<td><a class="btn editUserCom" data-bs-toggle="modal" data-bs-target="#exampleModal7" data-cid='.$row['c_id'].' data-edituserid='.$row['sno'].' ><i class="fas fa-edit text-success"></i></a> <i data-bs-toggle="modal" data-bs-target="#exampleModal8" data-comtype='.$row['com_cate'].' data-comid='.$row['c_id'].' class="fas fa-share mx-2 text-danger assignTo"></i> ';
      $output.='</td>';
    }
    $output.='</tr>';
  }
  if($statusF=='all'){
  $sql = "SELECT * FROM complaint";
  }else{
    $sql = "SELECT * FROM complaint WHERE `status`='$statusF'";
  }
  $result=mysqli_query($conn,$sql);
  $maxPage=ceil(mysqli_num_rows($result)/$limitF);
  $output.='</tbody> </table> <input class="d-none" id="maxPage" value='.$maxPage.'>';
  echo $output;
}else{
   echo '<div class="alert alert-danger">No Complaint Found Yet!</div>';
}


?>