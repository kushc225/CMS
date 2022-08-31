
<?php 
    require '../conn/conn.php';
    
    $limit = $_POST['limit'];
    $sql = "SELECT * FROM patient";
    $result = mysqli_query($conn,$sql);
    $num  = mysqli_num_rows($result);

    $clickPoint = $num/$limit;
    $output = '';
    for ($i=1; $i <= $clickPoint; $i++) { 
        $output.='<button class="btn btn-primary mx-1 my-1 page" value='.$i.' id='.$i.'>'.$i.'</button>';
    }
    echo $output;
?>