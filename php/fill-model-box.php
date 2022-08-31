<?php 

require '../conn/conn.php';
$sno=$_POST['getSno'];
$ouput='';
$sql="SELECT * FROM user_table WHERE sno='$sno'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)){
    while($row=mysqli_fetch_assoc($result)){
        $ouput.='
        <input type="hidden" class="form-control" value="'.$row['sno'].'" id="sno">

        <label for="e_no" class="form-label">Enrollment Number</label>
        <input type="text" class="form-control" value="'.$row['e_no'].'" id="e_no">
        <br>
        <label for="f_name" class="form-label">First Name</label>
        <input type="text" class="form-control" value="'.$row['f_name'].'" id="f_name">
        <br>
        <label for="l_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="'.$row['l_name'].'" id="l_name">
        <br>
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" class="form-select">
                          <option value="M" selected>Male</option>
                          <option value="F" >Female</option>
              </select>
        <br>
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" value="'.$row['email'].'" id="email">
        <br>
        <label for="dep" class="form-label">Department</label>
        <input type="text" class="form-control" value="'.$row['dep'].'" id="dep">
        <br>
        <label for="mobile_no" class="form-label">Mobile Number</label>
        <input type="text" class="form-control" value="'.$row['mobile_no'].'" id="mobile_no">
        <br> 
        <label for="mobile_no" class="form-label">Address</label>
        <input type="text" class="form-control" value="'.$row['address'].'" id="address">
        <br> 
        
        <label for="#role" class="form-label">Role</label>
            <select id="role" class="form-select">';
            $role1=$row['role'];
            if($role1=='1'){
             $ouput.='<option value="1" selected>Admin</option>
                <option value="2" >Department</option>
                <option value="3" >Student</option>
                <option value="4" >Support Staff</option>
                </select>';
            }else if($role1=='2'){
                $ouput.='<option value="1" >Admin</option>
                   <option value="2" selected >Department</option>
                   <option value="3" >Student</option>
                   <option value="4" >Support Staff</option>
                   </select>';
               }else if($role1=='3') {
                $ouput.='<option value="1" >Admin</option>
                <option value="2"  >Department</option>
                <option value="3" selected >Student</option>
                <option value="4"  >Support Staff</option>
                </select>';
               }else{
                $ouput.='<option value="1" >Admin</option>
                <option value="2"  >Department</option>
                <option value="3"  >Student</option>
                <option value="4" selected >Support Staff</option>
                </select>';
               }

    }
    echo $ouput;
}else{
    echo 0;
}


?>