<?php 

    require '../../../conn/conn.php';
    $limit= $_POST['limit'];
    $sql = "SELECT * FROM complaint";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $ans = ceil($num/$limit);
    echo $ans;
?>