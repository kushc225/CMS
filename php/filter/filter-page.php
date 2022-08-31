<?php 

    require '../../conn/conn.php';
    $limit = mysqli_real_escape_string($conn,$_POST['limitF']);
    $statusF = mysqli_real_escape_string($conn,$_POST['statusF']);
    $pageNumberF = mysqli_real_escape_string($conn,$_POST['pageNumberF']);
    if($statusF=="all"){
        $sql = "SELECT * FROM complaint";
    }else{
        $sql = "SELECT * FROM complaint WHERE status = '$statusF'";
    }
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $output='<div class="container d-flex justify-content-center">';
    $clickPoint = ceil($num/$limit);
    $output.='<button style="background:#ffd800;" class="btn mx-1"  onclick="changePageF(-1)" id="prevF">Prev</button>';
    for ($i=1; $i <= $clickPoint; $i++) { 
        if($i==$pageNumberF){
            $output.='<button style="background:orange;" class="btn mx-1 pageF" id='.$i.'>'.$i.'</button>';
        }else{
            $output.='<button style="background:#ffd800;" class="btn mx-1 pageF" id='.$i.'>'.$i.'</button>';
        }
    }
    $output.='<button style="background:#ffd800;" class="btn mx-1 " onclick="changePageF(1)" id="nextF">Next</button> </div>';
    echo $output;
?>