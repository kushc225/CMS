<?php 

$conn=mysqli_connect("localhost","root","","k_jru");
$dep_name=$_POST['comCate'];
$sql="SELECT * FROM `user_table` WHERE `role`='4' AND `dep`='$dep_name'"; 
$result=mysqli_query($conn,$sql); 
$output='';
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $output.='<select id="selectedPerson"  class="form-select">';
    while($row=mysqli_fetch_assoc($result)){
                  $output.='
                  <option  value='.$row['e_no'].' class="getEno">'.$row['f_name'].' '.$row['l_name'].'</option>
                  ';
                }
                $output.='</select> ';  
    echo $output;
}else{
         echo '<div class="alert alert-danger">No Supporting Staff Added Yet!</div>';
    }
?>


<!-- 
$output.='<option  value='.$row['email'].'>'.$row['f_name'].' '.$row['l_name'].'</option>   
                            <input type="hidden" id="getEno" value='.$row['e_no'].'>
                  '; -->