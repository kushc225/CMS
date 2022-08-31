<?php
            // $conn=mysqli_connect("localhost","root","","k_jru") or die("connection failed");
            require '../../conn/conn.php';
            $sql="SELECT * FROM department ORDER BY sno DESC";
            $output='';
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $output.= '<table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Department Id</th>
                    <th scope="col">Events</th>
                  </tr>
                </thead>
                <tbody>';
                $sno=0;
                while($row=mysqli_fetch_assoc($result)){
                    $sno++;
                    $output.='<tr>
                    <th scope="row">'.$sno.'</th>
                    <td>'.$row['dep_name'].'</td>
                    <td>'.$row['d_id'].'</td>
                    <td><a class="btn btn-dark del_dep text-light" data-default_id='.$row['d_id'].' data-del_dep='.$row['sno'].'>Delete</a>
                    
                    <a class="btn btn-primary addDefault text-light" data-bs-toggle="modal" data-bs-target="#exampleModal5" data-aid='.$row['d_id'].'>Add Default</a>

                    <a class="btn btn-success text-light showDefalutComplaintList"  data-sid='.$row['d_id'].'>Show Default Values</a>
                    </td>
                  </tr>';
                }
                $output.=' </tbody>
                </table>';
                echo $output;
            }else{
                echo "No Data found";
            }