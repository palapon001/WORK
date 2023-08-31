<?php
include('../condb.php');

$user_id = $_REQUEST["user_id"];

$sql = "DELETE FROM question WHERE username = '$user_id'";
$result = mysqli_query($con, $sql) or die("Error in query: $sql");

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('ลบเสร็จสิ้น');";
  echo "window.history.back(); ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('เกิดข้อผิดพลาด กรุณาลบอีกครั้ง');";
  echo "</script>";
}
?>
