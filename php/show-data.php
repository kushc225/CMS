<?php 

require '../conn/conn.php';
session_start();
$sql="SELECT * FROM user_table";
$output='';
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $output= '<table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Enorllment Number</th>
      <th scope="col">Gender</th>
      <th scope="col">Mobile No</th>
      <th scope="col">E-mail</th>
      <th scope="col">Address</th>
      <th scope="col">Department</th>
      <th scope="col">Role</th>';
      
      if($_SESSION['role']==1){
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
        <td>'.$row['f_name'].'  ' .$row['l_name'].'</td>
        <td>'.$row['e_no'].'</td>
        <td>'.$row['gender'].'</td>
        <td>'.$row['mobile_no'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['address'].'</td>
        <td>'.$row['dep'].'</td>
        <td>'.$row['role'].'</td>';
      
      if($_SESSION['role']==1){
        $output.='<td><a class="btn btn-danger text-light edit" data-bs-toggle="modal" data-bs-target="#exampleModal" data-eid='.$row['sno'].' >Edit</a> <a class="btn btn-primary del text-light" data-did='.$row['sno'].'>Delete</a></td>';
      }
      $output.='</tr>';
    }
    
    $output.='</tbody> </table>';
    echo $output;
}else{
     echo 0;
}

?>