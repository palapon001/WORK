<?php
include('../../condb.php');
$sql = "SELECT * FROM question 
        INNER JOIN provinces
        ON question.province_id = provinces.id
        WHERE province_id={$_GET['province_id']} and level={$_GET['level']}";
$query = mysqli_query($con, $sql);
$json = array();
while ($result = mysqli_fetch_assoc($query)) {
    array_push($json, $result);
}
echo json_encode($json);
