<?php

require '../../conn/conn.php';

$userType = mysqli_real_escape_string($conn, $_POST['userType']);
$pageNumber = mysqli_real_escape_string($conn, $_POST['userPageNumber']);
$limit = mysqli_real_escape_string($conn, $_POST['limit']);


if ($userType == 'all') {
  $sql = "SELECT * FROM `user_table`";
} else {
  $sql = "SELECT * FROM `user_table` WHERE `role`= '$userType' ";
}
$result = mysqli_query($conn, $sql);
$clickPoint = ceil(mysqli_num_rows($result) / $limit);

// $output = '<div class="d-flex justify-content-center">';
// $output .= '<button style="background:#ffd800;" onclick="userFilterPrevAndNext(-1)" class="btn text-white mx-1 ">Prev</button>';
// for ($i = 1; $i <= $clickPoint; $i++) {
//   if ($i == $pageNumber) {
//     $output .= '<button style="background: orange;" id="' . $i . '" class="btn text-white mx-1 userFilterPage">' . $i . '</button>';
//   } else {
//     $output .= '<button style="background:#ffd800;" id="' . $i . '" class="btn  text-white mx-1 userFilterPage">' . $i . '</button>';
//   }
//   echo "<input type='text' value='$clickPoint' class='d-none userClickPoint'>";
// }
// $output .= '<button style="background:#ffd800;" onclick="userFilterPrevAndNext(1)" class="btn text-white mx-1 ">Next</button> </div>';
// if ($pageNumber != $clickPoint) {
//   $output .= '<span style="font-size:30px; color: #c02537 !important;">..</span> </div>';
// }




$output = '<div class="d-flex justify-content-center my-1 mainContainer">
  <div class="box1">
  <div class="smallBox">
  ';
$output .= '<button  onclick="userFilterPrevAndNext(-1)" class="sameP nextPrevBtn mx-1">Prev</button>';

if ($pageNumber != 1) {
  $output .= '<span style="color:aqua; font-size:20px;" >..</span>';
}

if ($clickPoint == 1) {
  $output .= ' <button  id="1" class="sameP current mx-1 page">1</button>';
} else if ($pageNumber == 1) {
  for ($i = 1; $i <= 2; $i++) {
    if ($i == $pageNumber) {
      $output .= ' <button  id="' . $i . '" class="sameP current mx-1 page">' . $i . '</button>';
    } else {
      $output .= ' <button  id="' . $i . '" class="sameP mx-1 page">' . $i . '</button>';
    }
  }
} else if ($clickPoint == $pageNumber) {
  for ($i = $pageNumber - 1; $i <= $clickPoint; $i++) {
    if ($i == $pageNumber) {
      $output .= ' <button id="' . $i . '" class="sameP current mx-1 page">' . $i . '</button>';
    } else {
      $output .= ' <button  id="' . $i . '" class="sameP mx-1 page">' . $i . '</button>';
    }
  }
} else {
  for ($i = $pageNumber - 1; $i <= $pageNumber + 1; $i++) {
    if ($i == $pageNumber) {
      $output .= ' <button  id="' . $i . '" class="sameP current mx-1 page">' . $i . '</button>';
    } else {
      $output .= ' <button  id="' . $i . '" class="sameP mx-1 page">' . $i . '</button>';
    }
  }
}

if ($pageNumber != $clickPoint) {
  $output .= '<span style="color:aqua; font-size:20px;">..</span>';
}


$output .= '<button  onclick="userFilterPrevAndNext(1)" class="sameP nextPrevBtn mx-1">Next</button> </div>
  </div>
  </div>
  
  ';
echo "<input type='text' value='$clickPoint' class='d-none userClickPoint'>";
echo $output;