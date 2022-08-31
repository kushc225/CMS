<?php 

require '../../../conn/conn.php';
$FCLimit= mysqli_real_escape_string($conn,$_POST['FCLimit']);
$FCPageNumber= mysqli_real_escape_string($conn,$_POST['FCPageNumber']);
$sql = "SELECT * FROM `forwarded_com`";
$result = mysqli_query($conn,$sql);

$FCClickPoint = ceil(mysqli_num_rows($result)/$FCLimit);


$output ='<div class="d-flex justify-content-center">';
$output.='<button style="background:#ffd800;" onclick="FCPrevAndNext(-1)" class="btn text-white">Prev</button>';
for($i=1;$i<=$FCClickPoint;$i++){
  if($i==$FCPageNumber){
    $output .='<button style="background: orange;" id="'.$i.'" class="btn text-white mx-1 FC">'.$i.'</button>';
  }else{
    $output .='<button style="background:#ffd800;" id="'.$i.'" class="btn  text-white mx-1 FC">'.$i.'</button>';
  }
  echo "<input type='text' value='$FCClickPoint' class='d-none FCClickPoint'>";
}
$output.='<button style="background:#ffd800;" onclick="FCPrevAndNext(1)" class="btn text-white">Next</button> </div>';
echo $output;

?>