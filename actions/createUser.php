<?php
include('../condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$user = $_POST["user"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$bday = $_POST["bday"];
$level = $_POST["level"];
// เช็คว่ามีข้อมูลนี้อยู่หรือไม่
$check = "select * from work_login  where username = '$user' ";
$result1 = mysqli_query($con, $check) or die("$check");
$num = mysqli_num_rows($result1);
if ($num > 0) {
	//ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
	echo "<script>";
	echo "alert(' username นี้มีการใช้งานแล้ว  !');";
	echo "window.location='index.php';";
	echo "</script>";
} else {
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO work_login(username,password,name,surname,bday,level,status)
			 VALUES('$user','$pass','$name', '$surname','$bday','$level',1)";

	$result = mysqli_query($con, $sql) or die("Error in query: $sql ");
}
//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('สำเร็จ');";
	echo "window.history.back(); ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ผิดพลาด ');";
	echo "</script>";
}
