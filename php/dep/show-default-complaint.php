<?php 

// $conn=mysqli_connect("localhost","root","","k_jru") or die("connection falied");
require '../../conn/conn.php';
$d_id=$_POST['d_id'];
$dep_name="";
$sql="SELECT dep_name FROM department WHERE d_id='$d_id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $dep_name=$row['dep_name'];
  }
}


$sql="SELECT * FROM com_type WHERE d_id='$d_id'";

$output='';
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    $output.='<table class="table table-dark table-hover">
<thead>
  <tr>
    <th scope="col">Sno</th>
    <th scope="col">Department Name - '.$dep_name.'</th>
    <th scope="col">Events</th>
  </tr>
</thead>
<tbody>';
    $sno=1;
    while($row=mysqli_fetch_assoc($result)){
        $output.='<tr>
        <td>'.$sno++.'</td>
        <th scope="row">'.$row['complaint_name'].'</th>
        <th scope="row">
        <a class="btn btn-light del text-dark" data-did='.$row['sno'].'>Delete</a>
        </th>
      </tr>';
    }
    $output.='</tbody></table>';
    echo $output;
}else{
    echo '<div class="alert alert-danger">No Default Records Found</div>';
}