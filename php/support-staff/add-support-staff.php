<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $conn = mysqli_connect("localhost", "root", "", "k_jru");
  $e_no = $_POST['e_no'];
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $gender = $_POST['gender'];
  $mobile_no = $_POST['mobile_no'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $dep = $_POST['dep'];

  $sql = "INSERT INTO `user_table` (`e_no`,`f_name`,`l_name`,`gender`,`email`,`mobile_no`,`address`,`role`,`dep`,`dt`,`password`) VALUES ('$e_no','$f_name','$l_name','$gender','$email','$mobile_no','$address','4','$dep',CURRENT_TIMESTAMP(),'$password')";

  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
          User has been Added Successfully...
        </div>
      </div>';
  } else {
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
          Failed to Add User.. 
          Please Check Your Registration Number, It Must Be Unique.
        </div>
      </div>';
  }
}


?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>Add Support Staff</title>
</head>

<body>
  <div class="container" style="background-color: #FF850A;">
    <h2 class="text-center my-2 text-white">Enter The Following Details</h2>
    <form autocomplete="false" action="add-support-staff.php" method="post">
      <div class="row text-white">
        <div class="col">
          <label for="registrationNo" class="form-label  my-2">Registration No..</label>
          <input type="text" class="form-control " required name="e_no">
        </div>
        <div class="col">
          <label for="f_name" class="form-label my-2">First Name</label>
          <input type="text" value="" class="form-control" required name="f_name">
        </div>
      </div>
      <div class="row text-white">
        <div class="col">
          <label for="l_name" class="form-label my-2">Last Name</label>
          <input type="text" class="form-control " value="" required name="l_name">
        </div>

        <div class="col">

          <label for="gender" class="form-label  my-2">Gender</label>
          <select class="form-select " name="gender">
            <option value="M">Male</option>
            <option value="F">Famale</option>
          </select>
        </div>
      </div>

      <div class="row text-white">
        <div class="col">
          <label for="mobile_no" class="form-label my-2">Mobile_no</label>
          <input type="text" class="form-control" required name="mobile_no">
        </div>
        <div class="col">

          <label for="email" class="form-label my-2">E-mail</label>
          <input type="text" class="form-control " name="email" required>
        </div>
      </div>

      <div class="row text-white">
        <div class="col">
          <label for="address" class="form-label my-2">Address</label>
          <input type="text" class="form-control " required name="address">
        </div>
        <div class="col">

          <label for="password" class="form-label my-2 ">Password</label>
          <input type="password" class="form-control " required name="password">
        </div>
      </div>

      <div class="row text-white">
        <div class="col">
          <label for="department" class="form-label my-2">Choose Department</label>
          <select class="form-select " name="dep">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "k_jru");

            $sql = "SELECT * FROM department";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo ' <option value=' . $row['dep_name'] . '>' . $row['dep_name'] . '</option>';
              }
            }
            ?>
          </select>
        </div>
      </div>

      <button type="submit" id="submit-su-staff-info" class="btn btn-info my-2 text-white d-flex justify-content-center">Submit</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>