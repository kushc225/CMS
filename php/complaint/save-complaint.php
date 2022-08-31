<?php 

// INSERT INTO `complaint` (`sno`, `c_id`, `com_des`, `e_no`, `com_cate`, `status`, `dt`) VALUES (NULL, 'm-000001', 'Water is Not Clean and Mesh is also Dirty.', 'admid', 'M', 'Pending', current_timestamp());

    session_start();
    $conn=mysqli_connect("localhost","root","","k_jru");

    $userAllComplaintMerged=$_POST['userAllComplaintMerged'];
    $e_no=$_SESSION['e_no'];
    $getComplaintType=$_POST['getComplaintType'];
    $getDepartmentName="";


// Generate Complaint Id 
    function generateComId(){
        $num="";
        // $getComplaintType=1000;
        $getComplaintType=$_POST['getComplaintType'];
        $conn=mysqli_connect("localhost","root","","k_jru");

      
        
        $sql1="SELECT * FROM department WHERE d_id='$getComplaintType'";
        $result1 =mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result1)>0){
            while($row=mysqli_fetch_assoc($result1)){
               $getDepartmentName= $row['dep_name'];
            }
        }



        $sql="SELECT * FROM complaint ORDER BY sno DESC LIMIT 1";  
        $result =mysqli_query($conn,$sql);
        $num3="";
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $num=$row['c_id'];
                $num++;        
                if($num[0]!=$getDepartmentName[0]){
                    $num3=str_replace($num[0],$getDepartmentName[0],$num);
                }else{
                    $num3=$num;
                }
            }
        }else{
            $num3=$getDepartmentName[0]."-000001";
        }
        
        return $num3;
    }



$com_id=generateComId();


        function getDepName(){
            $conn=mysqli_connect("localhost","root","","k_jru");
             $getComplaintType=$_POST['getComplaintType'];
            $getDepartmentName="";
            $sql1="SELECT * FROM department WHERE d_id='$getComplaintType'";
            $result1 =mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1)>0){
                while($row=mysqli_fetch_assoc($result1)){
                   $getDepartmentName= $row['dep_name'];
                }
            }
            return $getDepartmentName;
        }

        $dpname=getDepName();

$sql="INSERT INTO `complaint` ( `c_id`, `com_des`, `e_no`, `com_cate`, `status`, `dt`) VALUES ('$com_id', '$userAllComplaintMerged', '$e_no', '$dpname', 'Pending', current_timestamp());";


$result=mysqli_query($conn,$sql);

if($result){
    echo 1;
}else{
    echo 0;
}


?>