<?php

require '../../../conn/conn.php';
session_start();

$limit = mysqli_real_escape_string($conn, $_POST['limit']);
$pageNumber = mysqli_real_escape_string($conn, $_POST['pageNumber']);
$status = mysqli_real_escape_string($conn, $_POST['status']);

if ($status == 'all') {
  $sql = "SELECT * FROM `complaint` ";
} else {
  $sql = "SELECT * FROM `complaint` WHERE `status` = '$status'";
}
$result = mysqli_query($conn, $sql);
$clickPoint = ceil(mysqli_num_rows($result) / $limit);
$num = mysqli_num_rows($result);

if ($num != 0) {
  $output = '<div class="d-flex justify-content-center my-1 mainContainer">
<div class="box1">
<div class="smallBox">
';
  $output .= '<button  onclick="prevAndNext(-1)" class="sameP nextPrevBtn mx-1">Prev</button>';

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


  $output .= '<button  onclick="prevAndNext(1)" class="sameP nextPrevBtn mx-1">Next</button> </div>
</div>
</div>

';
  echo "<input type='text' value='$clickPoint' class='d-none userClickPoint'>";
  echo $output;
}