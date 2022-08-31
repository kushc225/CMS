

<?php 
    require '../conn/conn.php';
    $limit=$_POST['limit'];
    $pageNumber = $_POST['pageNumber'];
    
    $offset = ($pageNumber-1)*$limit;


    $sql = "SELECT * FROM patient LIMIT $offset,$limit";
    $result = mysqli_query($conn,$sql);
    $output='';
    if(mysqli_num_rows($result)>0){
        $output.='<table class="table">
            <thead>
              <tr>
                <th scope="col">Sno</th>
                <th scope="col">Name</th>
                <th scope="col">phone</th>
              </tr>
            </thead>
            <tbody>';
            $sno=0;
        while($row = mysqli_fetch_assoc($result)){
            $sno++;
            $output.='<tr>
            <th scope="row">'.$sno.'</th>
            <td>'.$row['name'].'</td>
            <td>'.$row['phone'].'</td>
          </tr>';
            
        }
        $output.='</tbody>
        </table>';
        echo $output;
    }else{
        echo '<div class="alert alert-danger">No Data Found...</div>';
    }


?>