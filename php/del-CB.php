<?php
session_start();
if ($_SESSION['role'] != 1 || $_SESSION['role'] != 2) {
    header("Location: http:localhost/index/com/index.php");
}

include '../../../conn/conn.php';
$arr = mysqli_real_escape_string($conn, $arr);

$cnt = strlen($arr);
$result;
$flag = 1;
echo $arr;
// for ($i = 0; $i < $cnt; $i++) {
//     $sql = "DELETE FROM complaint WHERE sno = '$arr[$i]'";
//     $result  = mysqli_query($conn, $sql);
//     if (!$result) {
//         $flag = 0;
//     }
// }

// if ($flag == 1) {
//     echo "<div class='alert alert-success'>Deleted successfully...</div>";
// } else {
//     echo "<div class='alert alert-danger'>Failed to delete</div>";
// }