<!-- <?php 
// $sql = "SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";";
// $sql = "START TRANSACTION;";
// $sql = "SET time_zone = "+00:00";";


// function fireQuery()
// {


    //     $con = mysqli_connect("localhost", "root", "") or die("connection failed 1");
    //     $sql = "CREATE DATABASE `accx`";
    //     $result = mysqli_query($con, $sql) or die(mysqli_error($con));

    //     $conn = mysqli_connect("localhost", "root", "", "accx") or die("connection failed 2");
    //     $flag = 1;

    //     $sql = " CREATE  TABLE `complaint` (
    //     `sno` int(115) NOT NULL,
    //     `c_id` varchar(225) NOT NULL,
    //     `com_des` varchar(225) NOT NULL,
    //     `e_no` varchar(225) NOT NULL,
    //     `com_cate` varchar(225) NOT NULL,
    //     `status` varchar(225) NOT NULL,
    //     `dt` datetime NOT NULL DEFAULT current_timestamp()
    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 2;
    //     }

    //     $sql = " CREATE  TABLE `com_type` (
    //     `sno` int(115) NOT NULL,
    //     `complaint_name` varchar(225) NOT NULL,
    //     `d_id` varchar(225) NOT NULL
    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 3;
    //     }


    //     $sql = " CREATE  TABLE `department` (
    //     `sno` int(115) NOT NULL,
    //     `dep_name` varchar(225) NOT NULL,
    //     `d_id` varchar(224) NOT NULL
    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 4;
    //     }


    //     $sql = " CREATE  TABLE `forwarded_com` (
    //     `sno` int(115) NOT NULL,
    //     `e_no` varchar(225) NOT NULL,
    //     `c_id` varchar(225) NOT NULL,
    //     `dt` datetime NOT NULL DEFAULT current_timestamp()
    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 5;
    //     }


    //     $sql = " CREATE  TABLE `user_table` (
    //     `sno` int(225) NOT NULL,
    //     `f_name` varchar(225) NOT NULL,
    //     `l_name` varchar(225) NOT NULL,
    //     `gender` varchar(224) NOT NULL,
    //     `email` varchar(222) NOT NULL,
    //     `mobile_no` int(222) NOT NULL,
    //     `address` varchar(222) NOT NULL,
    //     `role` int(222) NOT NULL,
    //     `dep` varchar(222) NOT NULL,
    //     `dt` datetime NOT NULL DEFAULT current_timestamp(),
    //     `password` int(222) NOT NULL,
    //     `e_no` varchar(115) NOT NULL
    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 6;
    //     }

    //     $sql = " ALTER  TABLE `complaint`
    //     ADD PRIMARY KEY (`sno`);";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 7;
    //     }

    //     $sql = " ALTER  TABLE `com_type`
    //     ADD PRIMARY KEY (`sno`);";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 8;
    //     }

    //     $sql = " ALTER  TABLE `department`
    //     ADD PRIMARY KEY (`sno`);";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 9;
    //     }

    //     $sql = " ALTER  TABLE `forwarded_com`
    //     ADD PRIMARY KEY (`sno`);";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 10;
    //     }

    //     $sql = " ALTER  TABLE `user_table`
    //     ADD PRIMARY KEY (`sno`),
    //     ADD UNIQUE KEY `mobile_no` (`mobile_no`),
    //     ADD UNIQUE KEY `email` (`email`);";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 11;
    //     }


    //     $sql = " ALTER  TABLE `complaint`
    //     MODIFY `sno` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 12;
    //     }

    //     $sql = " ALTER  TABLE `com_type`
    //     MODIFY `sno` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 13;
    //     }

    //     $sql = " ALTER  TABLE `department`
    //     MODIFY `sno` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 14;
    //     }


    //     $sql = " ALTER  TABLE `forwarded_com`
    //     MODIFY `sno` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 15;
    //     }


    //     $sql = " ALTER  TABLE `user_table`
    //     MODIFY `sno` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
    //   COMMIT;";
    //     $result = mysqli_query($conn, $sql);
    //     if (!$result) {
    //         $flag = 16;
    //     }
    //     return $flag;
// }