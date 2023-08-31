<?php
include('../condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$user = $_POST["user"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$bday = $_POST["bday"];
$level = $_POST["level"];
$status = $_POST["status"];

//เพิ่มเข้าไปในฐานข้อมูล
$sql = "UPDATE work_login 
        SET password = '$pass', 
            name = '$name', 
            surname = '$surname', 
            bday = '$bday', 
            level = '$level', 
            status = '$status'
        WHERE username = '$user'";

$result = mysqli_query($con, $sql) or die("Error in query: $sql ");

//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>check_question</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
</head>

<body>
	<?php
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	if ($result) {
		echo "<script type='text/javascript'>";
		echo "Swal.fire({
				title: 'สำเร็จ!',
				icon: 'success'
				}).then(() => {
				window.history.back();
			});";
		echo "</script>";
	} else {
		echo "<script type='text/javascript'>";
		echo "Swal.fire({
				title: 'ผิดพลาด!', 
				icon: 'error'
				}).then(() => {
				window.history.back();
			});";
		echo "</script>";
	}
	?>
</body>

</html>