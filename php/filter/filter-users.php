<?php

require '../../conn/conn.php';
// $conn = mysqli_connect("localhost", "root", "", "k_jru");

session_start();
$userType = mysqli_real_escape_string($conn, $_POST['userType']);
$limit = mysqli_real_escape_string($conn, $_POST['limit']);
$userPageNumber = mysqli_real_escape_string($conn, $_POST['userPageNumber']);

$offset = ceil(($userPageNumber - 1) * $limit);
if ($userType == 'all') {
  $sql = "SELECT * FROM `user_table` ORDER BY sno DESC LIMIT  $offset,$limit";
} else {
  $sql = "SELECT * FROM user_table  WHERE `role`='$userType' ORDER BY sno DESC LIMIT $offset,$limit";
}
$output = '';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $output = '<table class="table my-2" style="color:#124bff;">
  <thead>
    <tr class="tableClass">
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">E Number</th>
      <th scope="col">Gender</th>
      <th scope="col">Mobile No</th>
      <th scope="col">E-mail</th>
      <th scope="col">Address</th>
      <th scope="col">Role</th>
      <th scope="col">Department</th>';

  if ($_SESSION['role'] == 1) {
    $output .= '<th scope="col">Events</th>';
  }
  $output .= '</tr>
  </thead>
  <tbody>';
  $sno = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $sno++;
    $output .= ' <tr class="tableClass">
        <th scope="row">' . $sno . '</th>
        <td>' . $row['f_name'] . '  ' . $row['l_name'] . '</td>
        <td>' . $row['e_no'] . '</td>
        <td>' . $row['gender'] . '</td>
        <td>' . $row['mobile_no'] . '</td>
        <td>' . $row['email'] . '</td>
        <td>' . $row['address'] . '</td>';

    if ($row['role'] == '1') {
      $output .= '<td>Admin</td>';
    } else if ($row['role'] == '2') {
      $output .= '<td>Faculty</td>';
    } else if ($row['role'] == '3') {
      $output .= '<td>Student</td>';
    } else {
      $output .= '<td>Support Staff</td>';
    }

    $output .= '<td>' . $row['dep'] . '</td>';

    if ($_SESSION['role'] == 1) {
      $output .= '<td><a class="btn text-light edit" data-bs-toggle="modal" data-bs-target="#exampleModal" data-eid=' . $row['sno'] . ' ><i class="fas fa-edit text-success"></i></a> <a class="btn del text-light" data-did=' . $row['sno'] . '><i class="fas fa-trash text-danger"></a></td>';
    }
    $output .= '</tr>';
  }

  $output .= '</tbody> </table>';
  echo $output;
} else {
  echo '<div class="alert alert-danger my-2" role="alert">
     <strong>Sorry </strong> No Entry Found...  
   </div>';
}