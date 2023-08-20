<?php
include('condb.php');
$sql = "SELECT * FROM question WHERE province_id={$_GET['province_id']} and level={$_GET['level']}";
$query = mysqli_query($con, $sql);
$json = array();
while($result = mysqli_fetch_assoc($query)) {    
array_push($json, $result);
}
echo json_encode($json);