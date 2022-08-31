<?php
if (file_exists("conn/conn.php")) {
    header("Location: ../login.php");
}

$GLOBALS['f_name'] = $_POST['f_name'];
$GLOBALS['l_name'] = $_POST['l_name'];
$GLOBALS['gender'] = $_POST['gender'];
$GLOBALS['url'] = $_POST['url'];
$GLOBALS['companyName'] = $_POST['companyName'];
$GLOBALS['databaseName'] = $_POST['databaseName'];
$GLOBALS['databaseUsername'] = $_POST['databaseUsername'];
$GLOBALS['phoneNumber'] = $_POST['phoneNumber'];
$GLOBALS['databasePassword'] = $_POST['databasePassword'];
$GLOBALS['databaseEmailId'] = $_POST['databaseEmailId'];

// $url = $_POST['url'];
// $companyName = $_POST['companyName'];
// $databaseName = $_POST['databaseName'];
// $databaseUsername = $_POST['databaseUsername'];
// $phoneNumber = $_POST['phoneNumber'];
// $databasePassword = $_POST['databasePassword'];
// $databaseEmailId = $_POST['databaseEmailId'];

function fireQuery()
{
    $f_name =  $GLOBALS['f_name'];
    $l_name =  $GLOBALS['l_name'];
    $gender =  $GLOBALS['gender'];
    $url = $GLOBALS['url'];
    $databasePassword = $GLOBALS['databasePassword'];
    $databaseName = $GLOBALS['databaseName'];
    $databaseUsername = $GLOBALS['databaseUsername'];
    $companyName = $GLOBALS['companyName'];
    $phoneNumber = $GLOBALS['phoneNumber'];
    $databaseEmailId = $GLOBALS['databaseEmailId'];


    $con = mysqli_connect($url, $databaseUsername, $databasePassword) or die(mysqli_error($con));
    $sql = "CREATE DATABASE `$databaseName`";
    $result = mysqli_query($con, $sql) or die("<div class='alert alert-danger' role='alert'>Database Already Exist... Please Delete Database or choose another name!</div>");

    $conn = mysqli_connect($url, $databaseUsername, $databasePassword, $databaseName) or die("connection failed 2");
    $flag = 1;

    $sql = " CREATE  TABLE `complaint` (
        `sno` int(115) NOT NULL,
        `c_id` varchar(225) NOT NULL,
        `com_des` varchar(225) NOT NULL,
        `e_no` varchar(225) NOT NULL,
        `com_cate` varchar(225) NOT NULL,
        `status` varchar(225) NOT NULL,
        `dt` datetime NOT NULL DEFAULT current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 2;
    }

    $sql = " CREATE  TABLE `com_type` (
        `sno` int(115) NOT NULL,
        `complaint_name` varchar(225) NOT NULL,
        `d_id` varchar(225) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 3;
    }


    $sql = " CREATE  TABLE `department` (
        `sno` int(115) NOT NULL,
        `dep_name` varchar(225) NOT NULL,
        `d_id` varchar(224) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 4;
    }


    $sql = " CREATE  TABLE `forwarded_com` (
        `sno` int(115) NOT NULL,
        `e_no` varchar(225) NOT NULL,
        `c_id` varchar(225) NOT NULL,
        `dt` datetime NOT NULL DEFAULT current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 5;
    }


    $sql = " CREATE  TABLE `user_table` (
        `sno` int(225) NOT NULL,
        `f_name` varchar(225) NOT NULL,
        `l_name` varchar(225) NOT NULL,
        `gender` varchar(224) NOT NULL,
        `email` varchar(222) NOT NULL,
        `mobile_no` int(222) NOT NULL,
        `address` varchar(222) NOT NULL,
        `role` int(222) NOT NULL,
        `dep` varchar(222) NOT NULL,
        `dt` datetime NOT NULL DEFAULT current_timestamp(),
        `password` int(222) NOT NULL,
        `e_no` varchar(115) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 6;
    }

    $sql = "INSERT INTO `user_table` (`f_name`, `l_name`, `gender`, `email`, `mobile_no`, `address`, `role`, `dep`, `dt`, `password`, `e_no`) VALUES ('$f_name', '$l_name', '$gender', '$databaseEmailId', '$phoneNumber', 'Tapkara', '1', 'none', current_timestamp(), '$databasePassword', '$databaseEmailId');";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = "insert command failed";
    }

    $sql = " ALTER  TABLE `complaint`
        ADD PRIMARY KEY (`sno`);";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 7;
    }

    $sql = " ALTER  TABLE `com_type`
        ADD PRIMARY KEY (`sno`);";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 8;
    }

    $sql = " ALTER  TABLE `department`
        ADD PRIMARY KEY (`sno`);";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 9;
    }

    $sql = " ALTER  TABLE `forwarded_com`
        ADD PRIMARY KEY (`sno`);";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 10;
    }

    $sql = " ALTER  TABLE `user_table`
        ADD PRIMARY KEY (`sno`),
        ADD UNIQUE KEY `mobile_no` (`mobile_no`),
        ADD UNIQUE KEY `email` (`email`);";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 11;
    }


    $sql = " ALTER  TABLE `complaint`
        MODIFY `sno` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 12;
    }

    $sql = " ALTER  TABLE `com_type`
        MODIFY `sno` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 13;
    }

    $sql = " ALTER  TABLE `department`
        MODIFY `sno` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 14;
    }


    $sql = " ALTER  TABLE `forwarded_com`
        MODIFY `sno` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return $flag = 15;
    }


    if ($flag == 1) {
        echo 1;
    } else {
        echo 0;
    }
}

$url = $GLOBALS['url'];
$databasePassword = $GLOBALS['databasePassword'];
$databaseName = $GLOBALS['databaseName'];
$databaseUsername = $GLOBALS['databaseUsername'];
$d = "$";
$cdn = '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
$conn = "conn";
if (!file_exists('../conn/conn.php')) {
    touch('../conn/conn.php');
    $file = fopen("../conn/conn.php", "w");
    $txt = "<?php 
    $d$conn = mysqli_connect('$url','$databaseUsername','$databasePassword','$databaseName') or die('Failed to Connect with Database');
    ?>
$cdn
";
fwrite($file, $txt);
readfile("../conn/conn.php");
echo "File has been created";
} else {
echo "file is already present please rename it";
}
if (!file_exists('../includes/conn.php')) {
touch('../includes/conn.php');
$file = fopen("../includes/conn.php", "w");
$txt = "<?php 
    $d$conn = mysqli_connect('$url','$databaseUsername','$databasePassword','$databaseName') or die('Failed to Connect with Database');
    ?>
$cdn
";
fwrite($file, $txt);
readfile("../includes/conn.php");
echo "File has been created";
} else {
echo "file is already present please rename it";
}


echo fireQuery();