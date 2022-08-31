<?php
require '../../conn/conn.php';
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$searchFor = mysqli_real_escape_string($conn, $_POST['searchFor']);
$searchPageNumber = mysqli_real_escape_string($conn, $_POST['searchPageNumber']);
$limit = mysqli_real_escape_string($conn, $_POST['limit']);


$sql = "SELECT * FROM `complaint` WHERE `c_id` LIKE '%$searchTerm%'";




$result = mysqli_query($conn, $sql);

$clickPoint = ceil(mysqli_num_rows($result) / $limit);
$output = '<button class="btn  mx-1 my-1 text-white searchPrevPage" style="background:#ffd800;">Prev</button>';
for ($i = 1; $i <= $clickPoint; $i++) {
    if ($i == $searchPageNumber) {
        $output .= '<button class="btn mx-1 my-1 text-white searchPage" style="background:orange;" value=' . $i . ' id=' . $i . '>' . $i . '</button>';
    } else {
        $output .= '<button class="btn mx-1 my-1 text-white searchPage" style="background:#ffd800;" value=' . $i . ' id=' . $i . '>' . $i . '</button>';
    }
}
$output .= '<button class="btn mx-1 my-1 text-white searchNextPage " style="background:#ffd800;">Next</button>';
$output .= '<input class="d-none" id="searchedPageId" value=' . $clickPoint . ' >';

echo $output;