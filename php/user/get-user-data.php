<?php

session_start();
require '../../conn/conn.php';
$sno = $_SESSION['sno'];
$sql = "SELECT * FROM `user_table` WHERE sno='$sno'";
$output = '';
$result = mysqli_query($conn, $sql);
echo mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $output .= ' 
        <div class="container" style="background:#FF850A;">
        <h3 class="my-3 d-flex justify-content-center text-white">Edit Your Profile ' . $row['f_name'] . ' ' . $row['l_name'] . '</h3>
          <div class="row text-white my-2">
            <div class="col">
              <label for="e_no" class="form-label">Enrollment Number</label>
              <input type="text" class="form-control" value=' . $row['e_no'] . ' id="e_no">
              </div>
              <div class="col">
              <label for="f_name" class="form-label">First Name</label>
              <input type="text" class="form-control" value=' . $row['f_name'] . ' id="f_name">
              </div>
              </div>
              <div class="row text-white my-2">
              <div class="col">
              <label for="l_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" value=' . $row['l_name'] . ' id="l_name">
          </div>
        ';
    if ($row['gender'] == 'M' || $row['gender'] == 'm') {

      $output .= '
              <div class="col">
              <label for="gender" class="form-label">Gender</label>
              <select class="form-select" id="gender" aria-label="Default select example">
              <option value="M" selected>Male</option>
              <option value="F">Female</option>
              </select></div></div>
              ';
    } else {
      $output .= '
                <div class="col">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" aria-label="Default select example">
                <option value="M" >Male</option>
                <option value="F" selected>Female</option>
                </select> </div>
                </div>
                ';
    }

    $output .= ' <div class="row text-white my-2">
            <div class="col">
              <label for="mobile_no" class="form-label">Phone Number</label>
              <input type="text" class="form-control" value=' . $row['mobile_no'] . ' id="mobile_no">
            </div>
            <div class="col">
              <label for="email" class="form-label">E-mail</label>
              <input type="text" class="form-control" value=' . $row['email'] . ' id="email">
            </div>
        </div>
              <div class="row text-white my-2">
              <div class="col">
              <label for="password" class="form-label">Paasword</label>
              <input type="text" class="form-control" value=' . $row['password'] . ' id="password">
              </div>
              <div class="col">
         
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" value=' . $row['address'] . ' id="address">
              </div>
              </div>
              <div class-"d-flex justify-content-center">
              <button class="btn btn-dark w-25 my-5" id="updateMyProfile" >Update Changes</button>
          </div>
          </div>
      ';
  }

  echo $output;
} else {
  echo '<div class="alert alert-danger ">No Data found...</div>';
}