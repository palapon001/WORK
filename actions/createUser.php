<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>createUser</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
</head>

<body>
	<?php
	include('../condb.php');  //ไฟล์เชื่อมต่อกับ database 
	//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
	$user = $_POST["user"];
	$pass = md5($_POST["pass"]);
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$bday = $_POST["bday"];
	$level = $_POST["level"];

	function formatLevel($level) {
		switch ($level) {
			case 'InterestedIndividual':
				return 'Interested-Individual';
			case 'SportProfessionals':
				return 'Sport-professionals';
			default:
				return $level;
		}
	}
	
	// ใช้ฟังก์ชันเพื่อแปลงค่าตามเงื่อนไข
	$level = formatLevel($level);
	
	
	// เช็คว่ามีข้อมูลนี้อยู่หรือไม่
	$check = "select * from work_login  where username = '$user' ";
	$result = mysqli_query($con, $check) or die("$check");
	$num = mysqli_num_rows($result);
	if ($num > 0) {
		//ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน 
		echo "<script type='text/javascript'>";
		echo "Swal.fire({
				title: 'username นี้มีการใช้งานแล้ว  !',
				icon: 'warning'
				}).then(() => {
				window.history.back();
			});";
		echo "</script>";

	} else {
		//เพิ่มเข้าไปในฐานข้อมูล
		$sql = "INSERT INTO work_login(username,password,name,surname,bday,level,status)
			 VALUES('$user','$pass','$name', '$surname','$bday','$level',1)";

		$result = mysqli_query($con, $sql) or die("Error in query: $sql ");

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
					text: 'ไม่สามารถเพิ่มข้อมูลผู้ใช้ได้',
					icon: 'error'
					}).then(() => {
					window.history.back();
				});";
			echo "</script>";
		}
	}

	//ปิดการเชื่อมต่อ database
	mysqli_close($con); 
	?>
</body>

</html>