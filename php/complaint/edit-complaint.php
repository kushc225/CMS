  <?php 
    
    // require '../conn/conn.php';
    $conn=mysqli_connect("localhost","root","","k_jru") or die("Connection Falied");
    $sno=$_POST['edituserid'];
    $output='';
    $sql="SELECT * FROM complaint WHERE sno ='$sno'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
              $output.='
                <input class="form-control" value='.$row['c_id'].' disabled>
                <input class="form-control my-2" value='.$row['e_no'].' disabled>
                <select class="form-select" id="changeStatus">';
                $getStatus=$row['status'];
                if($getStatus=='Pending'){
                 $output.='  <option class="op" selected>Pending</option>
                    <option class="op" data-bs-toggle="modal" data-bs-target="#exampleModal8"  id="rejected" >Rejected</option>
                    <option class="op">Resolved</option>';
                }else if($getStatus=='Rejected'){
                    $output.='  <option class="op" >Pending</option>
                    <option class="op"  data-bs-toggle="modal" data-bs-target="#exampleModal8"  id="rejected" selected>Rejected</option>
                    <option class="op">Resolved</option>';
                }else{
                    $output.='  <option class="op" >Pending</option>
                    <option class="op" data-bs-toggle="modal" data-bs-target="#exampleModal8"  id="rejected"  >Rejected</option>
                    <option class="op" selected >Resolved</option>';
                }
                    $output.=' </select>';
          }
      echo $output;
    }else{
        echo '<div class="alert alert-danger">Failed to Load Data<div>';
    } 
  
  
  ?>