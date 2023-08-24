<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$user = $_POST["user"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$bday = $_POST["bday"];
$level = $_POST["level"];

//เพิ่มเข้าไปในฐานข้อมูล
$sql = "UPDATE work_login 
        SET password = '$pass', 
            name = '$name', 
            surname = '$surname', 
            bday = '$bday', 
            level = '$level', 
            status = 1
        WHERE username = '$user'";
        
$result = mysqli_query($con, $sql) or die("Error in query: $sql " );
  
//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('สำเร็จ');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ผิดพลาด ');";
	echo "</script>";
}
