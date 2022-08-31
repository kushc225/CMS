<?php 
require  '../conn/conn.php';
$d_id=$_POST['d_id'];
$sql="SELECT * FROM com_default WHERE d_id='$d_id'";
$result=mysqli_query($conn,$sql);
$ouput='';
if(mysqli_num_rows($result)>0){
    while($row=mysqli_num_rows($result)){
        $ouput.='';
    }
    echo $ouput;
}else{
    echo "No Data Found";
}

?>