<?php
include('../condb.php');
$user_id = $_REQUEST["user_id"];

$sql = "DELETE FROM work_login WHERE username ='$user_id' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('ลบ เสร็จสิ้น');";
  echo "window.history.back(); ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('ผิดพลาด ');";
  echo "</script>";
}
