

<?php 

// session_start();
// if(!isset($_SESSION['name')){
    //     header("Location: http://localhost/index/com/index.php");
    // }
    require '../conn/conn.php';
    $getId=$_POST['getId'];
    $limit=$_POST['limit'];
    $pageNumber = $getId;
    $offset = ($pageNumber-1)*$limit;
    
    $sql = "SELECT * FROM `patient` LIMIT $offset,$limit";
    $result = mysqli_query($conn,$sql);
   
    if(mysqli_num_rows($result)>0){
        $output= '<table class="table table-hover table-info text-dark">
      <thead>
        <tr>
          <th class="thead-dark" scope="col">Sno</th>
          <th class="thead-dark" scope="col">Registration No</th>
          <th class="thead-dark" scope="col">Complaint Id</th>
          <th class="thead-dark" scope="col">Description</th>';
        $output.='</tr>
      </thead>
      <tbody>';
      $sno=0;
        while($row=mysqli_fetch_assoc($result)){
            $sno++;
            $output.=' <tr>
            <th scope="row">'.$sno.'</th>
            <td>'.$row['name'].'</td>
            <td>'.$row['age'].'</td>
            <td>'.$row['eid'].'</td>';
            $output.='</td>';
          $output.='</tr>';
        }
        
        $output.='</tbody> </table>';
    
        // pagination code 
        $sql = "SELECT * FROM `patient`";
        $result = mysqli_query($conn,$sql);
        $clickPoint = ceil(mysqli_num_rows($result)/$limit);
        $output.='
            <div id="void">
        ';
        for($i=1;$i<=$clickPoint;$i++){
          if($i==$pageNumber){
            $output .='<button id="'.$i.'" class="btn btn-dark mx-1 my-1 page">'.$i.'</button>';
          }else{
            $output .='<button id="'.$i.'" class="btn btn-primary mx-1 page">'.$i.'</button>';
          }
        }
        $output.='</div>';
        echo $output;
    }else{
         echo '<div class="alert alert-danger">No Complaint Found Yet!</div>';
    }
        
?>
