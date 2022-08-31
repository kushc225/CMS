<?php


function ss(){
    // require '../conn/conn.php';
    $conn=mysqli_connect("localhost","root","","k_jru") or die("connection failed");
   $sql="SELECT * FROM department ORDER BY sno DESC LIMIT 1";
   $result=mysqli_query($conn,$sql);
    $num1="";
   $num=mysqli_num_rows($result);
   if($num>0){
       while($row=mysqli_fetch_assoc($result)){
       $num1.= $row['d_id'];
       $num1++;
       }
   }else{
       $num1=1000;
   }
   return $num1;
};

?>