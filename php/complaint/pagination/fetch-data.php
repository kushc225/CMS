<?php

require '../../../conn/conn.php';
session_start();


$limit = mysqli_real_escape_string($conn, $_POST['limit']);
$pageNumber = mysqli_real_escape_string($conn, $_POST['pageNumber']);
$status = mysqli_real_escape_string($conn, $_POST['status']);

$offset = ceil(($pageNumber - 1) * $limit);

if ($status == "all") {
  $sql = "SELECT * FROM `complaint` ORDER BY sno DESC LIMIT $offset,$limit ";
} else {
  $sql = "SELECT * FROM `complaint` WHERE `status`='$status' ORDER BY sno DESC LIMIT $offset,$limit ";
}

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  $output = '<table class="table my-2" style="color:#124bff;">
      <thead>
        <tr class="tableClass">

          <th class="thead-dark" scope="col">SELECT</th>
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
  $sno = $offset;
  while ($row = mysqli_fetch_assoc($result)) {
    $sno++;
    $output .= ' <tr class="tableClass my-5">
            <td><input type="checkbox" style="width: 44px; height: 20px;" class="deleteCheckedCB" value=' . $row['sno'] . ' ></td>
            <th scope="row">' . $sno . '</th>
            <td>' . $row['e_no'] . '</td>
            <td>' . $row['c_id'] . '</td>
            <td>' . $row['com_des'] . '</td>
            <td>' . $row['com_cate'] . '</td>
            <td>' . $row['status'] . '</td>
            <td>' . $row['dt'] . '</td> ';


    if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
      $output .= '<td><a class="btn editUserCom" data-bs-toggle="modal" data-bs-target="#exampleModal7" data-cid=' . $row['c_id'] . ' data-edituserid=' . $row['sno'] . ' ><i class="fas fa-edit text-success"></i></a> <i data-bs-toggle="modal" data-bs-target="#exampleModal8" data-comtype=' . $row['com_cate'] . ' data-comid=' . $row['c_id'] . ' class="fas fa-share mx-2 text-danger assignTo"></i> ';
      $output .= '</td>';
    }
    $output .= '</tr>';
  }

  $output .= '</tbody> </table>';
  // pagination code 


  echo $output;
} else {
  echo '<div class="alert alert-danger my-5">No Complaint Found Yet!</div>';
}


// <th class="thead-dark" scope="col">SELECT</th>
// <th scope="row"><input type="checkbox" class="delInfo"  value="' . $row['sno'] . '"></th>