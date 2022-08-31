<?php

require '../../conn/conn.php';
session_start();


$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$searchFor = mysqli_real_escape_string($conn, $_POST['searchFor']);
$limit = mysqli_real_escape_string($conn, $_POST['limit']);
$searchPageNumber = mysqli_real_escape_string($conn, $_POST['searchPageNumber']);
$selectOption = mysqli_real_escape_string($conn, $_POST['selectOption']);

$offset = ceil(($searchPageNumber - 1) * $limit);
if ($searchFor == '1') {
  $sql = "SELECT * FROM `user_table` WHERE `e_no` LIKE '%$searchTerm%'";
} else {
  if ($selectOption == 'all') {
    $sql = "SELECT * FROM `complaint` WHERE `c_id` LIKE '%$searchTerm%' LIMIT $offset,$limit";
  } else {
    $sql = "SELECT * FROM `complaint` WHERE `c_id` LIKE '%$searchTerm%' AND `status` = '$selectOption' LIMIT $offset,$limit";
  }
}

$result = mysqli_query($conn, $sql);
if ($searchFor == '2') {
  if (mysqli_num_rows($result) > 0) {
    $output = '<table class="table table-hover table-info text-dark">
        <thead>
          <tr>
            <th class="thead-dark" scope="col">Sno</th>
            <th class="thead-dark" scope="col">Registration No</th>
            <th class="thead-dark" scope="col">Complaint Id</th>
            <th class="thead-dark" scope="col">Description</th>
            <th class="thead-dark" scope="col">Complaint Category</th>
            <th class="thead-dark" scope="col">Status</th>
            <th class="thead-dark" scope="col">Data And Time</th>';

    if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
      $output .= '<th scope="col">Events</th>';
    }
    $output .= '</tr>
        </thead>
        <tbody>';
    $sno = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $sno++;
      $output .= ' <tr>
              <th scope="row">' . $sno . '</th>
              <td>' . $row['e_no'] . '</td>
              <td>' . $row['c_id'] . '</td>
              <td>' . $row['com_des'] . '</td>
              <td>' . $row['com_cate'] . '</td>
              <td>' . $row['status'] . '</td>
              <td>' . $row['dt'] . '</td>';

      if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
        $output .= '<td><a class="btn editUserCom" data-bs-toggle="modal" data-bs-target="#exampleModal7" data-cid=' . $row['c_id'] . ' data-edituserid=' . $row['sno'] . ' ><i class="fas fa-edit text-success"></i></a> <i data-bs-toggle="modal" data-bs-target="#exampleModal8" data-comtype=' . $row['com_cate'] . ' data-comid=' . $row['c_id'] . ' class="fas fa-share mx-2 text-danger assignTo"></i> ';
        $output .= '</td>';
      }
      $output .= '</tr>';
    }

    $output .= '</tbody> </table>';
    echo $output;
  } else {
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
           No Complaint Id Matched With this C_Id.
          </div>
        </div>';
  }
} else {
  if (mysqli_num_rows($result) > 0) {
    $output = '<table class="table table-hover table-info text-dark table-striped">
    <thead>
      <tr>
        <th class="thead-dark" scope="col">Sno</th>
        <th class="thead-dark" scope="col">Registration No</th>
        <th class="thead-dark" scope="col">Name</th>
        <th class="thead-dark" scope="col">Mobile no</th>
        <th class="thead-dark" scope="col">E-mail</th>
        <th class="thead-dark" scope="col">Address</th>';

    if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
      $output .= '<th scope="col">Events</th>';
    }
    $output .= '</tr>
    </thead>
    <tbody>';
    $sno = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $sno++;
      $output .= '<tr>
          <th scope="row">' . $sno . '</th>
          <td>' . $row['e_no'] . '</td>
          <td>' . $row['f_name'] . ' ' . $row['l_name'] . '</td>
          <td>' . $row['mobile_no'] . '</td>
          <td>' . $row['email'] . '</td>
          <td>' . $row['address'] . '</td>';
      if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
        $output .= '<td><button class="btn btn-primary">Edit</button><button class="btn btn-dark mx-1" >Del</button></td>';
      }
      $output .= ' </tr>';
    }
    $output .= '</tbody></table>';

    echo $output;
  } else {
    echo '<div class="alert alert-danger my-5 d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    No Enrollment Number is Available.
  </div>
</div>';
  }
}