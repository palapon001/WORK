<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$user = $_POST["user"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$sex = $_POST["sex"];
$province_id = $_POST["province_id"];
$amphure_id = $_POST["amphure_id"];
$age = $_POST["age"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$pressure = $_POST["pressure"];
$pulse = $_POST["pulse"];
$location = $_POST["location"] ?? [];
$period = $_POST["selected_hours"] ?? [];
$reason1 = $_POST["reason1"] ?? [];
$reason2 = $_POST["reason2"] ?? [];
$exer = $_POST["exer"] ?? [];
$pulseAfter = $_POST["pulseAfter"];
$week = $_POST["week"];
$duration = $_POST["duration"];

//F4
$agency_name1 = $_POST["agency_name1"];
$agency_name2 = $_POST["agency_name2"];
$community = $_POST["community"];
$loc_community = $_POST["loc_community"];
$loc_agency = $_POST["loc_agency"];
$business = $_POST["business"];

//F5
$exper_sports = $_POST["exper_sports"];
$res = $_POST["res"];
$pub_res = $_POST["pub_res"];

//F6
$train_exper_exer = $_POST["train_exper_exer"];
$train_exper = $_POST["train_exper"];

//F7
$vol_exper = $_POST["vol_exper"];

//F8
$org_heal = $_POST["org_heal"];
$pro_org_exer = $_POST["pro_org_exer"];
$activity = $_POST["activity"];

//Options
$eduOptions = $_POST["eduOptions"];
$occOptions = $_POST["occOptions"];
$maryOptions = $_POST["maryOptions"];
$nationOptions = $_POST["nationOptions"];
$congenOptions = $_POST["congenOptions"];
$motiOptions = $_POST["motiOptions"];
$intensityOptions = $_POST["intensityOptions"];

//Input
$eduInput = $_POST["eduInput"];
$occInput = $_POST["occInput"];
$maryInput = $_POST["maryInput"];
$nationInput = $_POST["nationInput"];
$congenInput = $_POST["congenInput"];
$locationInput = $_POST["locationInput"];
$motiInput = $_POST["motiInput"];
$reason1Input = $_POST["reason1Input"];
$reason2Input = $_POST["reason2Input"];
$exerInput = $_POST["exerInput"];
$resInput = $_POST["resInput"];
//echo ข้อมูล

echo "user = " . $user . '<br>';
echo "name = " . $name . '<br>';
echo "surname = " . $surname . '<br>';
echo "sex = " . $sex . '<br>';
echo "province_id = " . $province_id . '<br>';
echo "amphure_id = " . $amphure_id . '<br>';
echo "age = " . $age . '<br>';
echo "eduOptions = " . $eduOptions . '<br>';
echo "eduInput = " . $eduInput . '<br>';
echo "occOptions = " . $occOptions . '<br>';
echo "occInput = " . $occInput . '<br>';
echo "maryOptions = " . $maryOptions . '<br>';
echo "maryInput = " . $maryInput . '<br>';
echo "nationOptions = " . $nationOptions . '<br>';
echo "nationInput = " . $nationInput . '<br>';

echo "height = " . $height . '<br>';
echo "weight = " . $weight . '<br>';
echo "pressure = " . $pressure . '<br>';
echo "pulse = " . $pulse . '<br>';
echo "congenOptions = " . $congenOptions . '<br>';
echo "congenInput = " . $congenInput . '<br>';

echo "location = " . serialize($location) . '<br>';
echo "locationInput = " . $locationInput . '<br>';
echo "period = " . serialize($period) . '<br>';
echo "reason1 = " . serialize($reason1) . '<br>';
echo "reason1Input = " . $reason1Input . '<br>';
echo "reason2 = " . serialize($reason2) . '<br>';
echo "reason2Input = " . $reason2Input . '<br>';
echo "motiOptions = " . $motiOptions . '<br>';
echo "motiInput = " . $motiInput . '<br>';
echo "exer = " . serialize($exer) . '<br>';
echo "exerInput = " . $exerInput . '<br>';
echo "resInput = " . $resInput . '<br>';
echo "pulseAfter = " . $pulseAfter . '<br>';
echo "week = " . $week . '<br>';
echo "intensityOptions = " . $intensityOptions . '<br>';
echo "duration = " . $duration . '<br>';

//export object

if (!empty($_POST['location'])) {
	$location_data = unserialize(serialize($location));
	foreach ($location_data  as $loc) {
		echo "location_data = " . $loc . '<br>';
	}
} else {
	echo 'location empty' . '<br>';
}

if (!empty($_POST['period'])) {
	$period_data = unserialize(serialize($period));
	foreach ($period_data  as $per) {
		echo "period_data = " . $per . '<br>';
	}
} else {
	echo 'period empty' . '<br>';
}

if (!empty($_POST['reason1'])) {
	$reason1_data = unserialize(serialize($reason1));
	foreach ($reason1_data  as $rea1) {
		echo "reason1_data = " . $rea1 . '<br>';
	}
} else {
	echo 'reason1 empty' . '<br>';
}

if (!empty($_POST['reason2'])) {
	$reason2_data = unserialize(serialize($reason2));
	foreach ($reason2_data  as $rea2) {
		echo "reason2_data = " . $rea2 . '<br>';
	}
} else {
	echo 'reason2 empty' . '<br>';
}

if (!empty($_POST['exer'])) {
	$exer_data = unserialize(serialize($exer));
	foreach ($exer_data  as $exe) {
		echo "exer_data = " . $exe . '<br>';
	}
} else {
	echo 'exer empty' . '<br>';
}

if (!empty($_POST['res'])) {
	$res_data = unserialize(serialize($res));
	foreach ($res_data  as $res_d) {
		echo "res_data = " . $res_d . '<br>';
	}
} else {
	echo 'res_data empty' . '<br>';
}

//F4
echo "agency_name1 = " . $agency_name1 . '<br>';
echo "agency_name2 = " . $agency_name2 . '<br>';
echo "community = " . $community . '<br>';
echo "loc_agency = " . $loc_agency . '<br>';
echo "business = " . $business . '<br>';

// F5
echo "exper_sports = " . $exper_sports . '<br>';
echo "res = " . serialize($res) . '<br>';
echo "pub_res = " . $pub_res . '<br>';

// F6
echo "train_exper_exer = " . $train_exper_exer . '<br>';
echo "train_exper = " . $train_exper . '<br>';

// F7
echo "vol_exper = " . $vol_exper . '<br>';

// F8
echo "org_heal = " . $org_heal . '<br>';
echo "pro_org_exer = " . $pro_org_exer . '<br>';
echo "activity = " . $activity . '<br>';

//func check null
function checkOption($option, $checkText, $IP)
{
	if ($option == $checkText) {
		return $IP;
	} else {
		return $option;
	}
}

function checkEmpty($array, $arrayIP)
{
	$countArray = count($array);
	if (empty($array)) {
		return $arrayIP;
	} else {
		if ($arrayIP == '') {
			return implode(",", $array);
		} else {
			return implode(",", $array) . ',' . $arrayIP;
		}
	}
}

$checkLoc = checkEmpty($location, $locationInput);
$checkPer = implode(",", $period);
$checkRes1 = checkEmpty($reason1, $reason1Input);
$checkRes2 = checkEmpty($reason2, $reason2Input);
$checkExer = checkEmpty($exer, $exerInput);
$checkRes = checkEmpty($res, $resInput);

$checkEDU = checkOption($eduOptions, 'other', $eduInput);
$checkOCC = checkOption($occOptions, 'other', $eduInput);
$checkMary = checkOption($maryOptions, 'other', $maryInput);
$checkNation = checkOption($nationOptions, 'other', $nationInput);
$checkCongen = checkOption($congenOptions, 'other', $congenInput);
$checkMoti = checkOption($motiOptions, 'other', $motiInput);

// เช็คว่ามีข้อมูลนี้อยู่หรือไม่
$check = "select * from question  where username = '$user' ";
$result1 = mysqli_query($con, $check) or die("$check");
$num = mysqli_num_rows($result1);
if ($num > 0) {
	//ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
	echo "<script>";
	echo "alert(' username นี้ทำแบบสอบถามแล้ว  !');";
	echo "window.location='page.php';";
	echo "</script>";
} else {
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO question(username,name,surname,sex,province_id,amphure_id,age,height,weight,pressure,
								 pulse,location,period,reason1,reason2,exer,pulseAfter,week,duration,agency_name1,agency_name2,
								 community,loc_community,loc_agency,business,exper_sports,res,pub_res,train_exper_exer,train_exper,vol_exper,
								 org_heal,pro_org_exer,activity,eduOptions,occOptions,maryOptions,nationOptions,congenOptions,
								 motiOptions,intensityOptions)
			 VALUES('$user','$name', '$surname','$sex','$province_id','$amphure_id','$age','$height','$weight','$pressure',
								 '$pulse','$checkLoc','$checkPer','$checkRes1','$checkRes2','$checkExer','$pulseAfter','$week','$duration','$agency_name1','$agency_name2',
								 '$community','$loc_community','$loc_agency','$business','$exper_sports','$checkRes','$pub_res','$train_exper_exer','$train_exper','$vol_exper',
								 '$org_heal','$pro_org_exer','$activity','$checkEDU','$checkOCC','$checkMary','$checkNation','$checkCongen',
								 '$checkMoti','$intensityOptions')";

	$result = mysqli_query($con, $sql) or die("Error in query: $sql ");
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
