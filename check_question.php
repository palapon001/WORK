<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$user = $_POST["user"];
$name = $_POST["name"];
$surname = $_POST["surname"];

//print ข้อมูล
echo "user = ".$user .'<br>';
echo "name = ".$name .'<br>';
echo "surname = ".$surname .'<br>';
// เช็คว่ามีข้อมูลนี้อยู่หรือไม่
$check = "select * from question  where username = '$user' ";
$result1 = mysqli_query($con,$check) or die("$check");
  $num=mysqli_num_rows($result1); 
  if($num > 0)   		
  {
//ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
	   echo "<script>";
	   echo "alert(' username นี้ทำแบบสอบถามแล้ว  !');";
	   echo "window.location='page.php';";
		 echo "</script>";

  }else{
//เพิ่มเข้าไปในฐานข้อมูล
$sql = "INSERT INTO question(username,name,surname)
			 VALUES('$user','$name', '$surname')";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " );
  }
//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('สำเร็จ');";
	echo "window.location = 'page.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ผิดพลาด ');";
	echo "</script>";
}
?>