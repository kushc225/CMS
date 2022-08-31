<?php 

// $conn=mysqli_connect("localhost","root","","k_jru") or die("connection failed");
require '../conn/conn.php';

$d_id=$_POST['d_id'];
$output='';
$sql="SELECT * FROM `com_type` WHERE d_id = '$d_id'";

$result=mysqli_query($conn,$sql);

$zz=0;
$c="c";
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $zz++;
      $output.='<input type="checkbox" id=c'.$zz.'> <input type="hidden" id=c-'.$zz.' value="'.$row['complaint_name'].'"> <label for="c'.$zz.'" class="form-label getText">'.$row['complaint_name'].'</label> <br>';
    }
    $output.='<input type="checkbox" id="ss" onclick="check()">  <label for="ss">Describe Your Problem</label> <br>
     <textarea  style="display:none;" class="form-control userDes" name="userText" id="userText" cols="30" rows="10"></textarea>
     ';
     echo  '<input type="hidden"  value='.$zz.'  id="getTotalNumberOfDefaultOption">'; 
    echo $output;
}else{
    $zz++;
    $output.='<input type="checkbox" id="ss" onclick="check()">  <label for="ss">Describe Your Problem</label> <br>
    <textarea  style="display:none;" class="form-control userDes" name="userText" id="userText" cols="30" rows="10"></textarea>';
    echo  '<input type="hidden"  value='.$zz.'  id="getTotalNumberOfDefaultOption">'; 
    echo $output;
}