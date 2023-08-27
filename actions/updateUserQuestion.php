<meta charset="UTF-8">
<?php
include('../condb.php');  
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม 
$qid = $_POST['qid'];
$user = $_POST["username"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$level = $_POST['level'];
$sex = $_POST["sex"];
$province_id = $_POST["province_id"];
$amphure_id = $_POST["amphure_id"];
$age = $_POST["age"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$pressure = $_POST["pressure"];
$pulse = $_POST["pulse"];
$location = $_POST["location"] ;
$period = $_POST["period"];
$reason1 = $_POST["reason1"];
$reason2 = $_POST["reason2"] ;
$exer = $_POST["exer"] ;
$pulseAfter = $_POST["pulseAfter"];
$week = $_POST["week"];
$duration = $_POST["duration"];

$agency_name1 = $_POST["agency_name1"];
$agency_name2 = $_POST["agency_name2"];
$community = $_POST["community"];
$loc_community = $_POST["loc_community"];
$loc_agency = $_POST["loc_agency"];
$business = $_POST["business"];

$exper_sports = $_POST["exper_sports"];
$res = $_POST["res"] ;
$pub_res = $_POST["pub_res"];

$train_exper_exer = $_POST["train_exper_exer"] ;
$train_exper = $_POST["train_exper"] ;

$vol_exper = $_POST["vol_exper"];

$org_heal = $_POST["org_heal"];
$pro_org_exer = $_POST["pro_org_exer"];
$activity = $_POST["activity"];

$eduOptions = $_POST["eduOptions"];
$occOptions = $_POST["occOptions"];
$maryOptions = $_POST["maryOptions"];
$nationOptions = $_POST["nationOptions"];
$congenOptions = $_POST["congenOptions"];
$motiOptions = $_POST["motiOptions"];
$intensityOptions = $_POST["intensityOptions"];



//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE question
SET
    username = '$user',
    name = '$name',
    surname = '$surname',
    level = '$level',
    sex = '$sex',
    province_id = '$province_id',
    amphure_id = '$amphure_id',
    age = '$age',
    height = '$height',
    weight = '$weight',
    pressure = '$pressure',
    pulse = '$pulse',
    location = '$location',
    period = '$period',
    reason1 = '$reason1',
    reason2 = '$reason2',
    exer = '$exer',
    pulseAfter = '$pulseAfter',
    week = '$week',
    duration = '$duration',
    agency_name1 = '$agency_name1',
    agency_name2 = '$agency_name2',
    community = '$community',
    loc_community = '$loc_community',
    loc_agency = '$loc_agency',
    business = '$business',
    exper_sports = '$exper_sports',
    res = '$res',
    pub_res = '$pub_res',
    train_exper_exer = '$train_exper_exer',
    train_exper = '$train_exper',
    vol_exper = '$vol_exper',
    org_heal = '$org_heal',
    pro_org_exer = '$pro_org_exer',
    activity = '$activity',
    eduOptions = '$eduOptions',
    occOptions = '$occOptions',
    maryOptions = '$maryOptions',
    nationOptions = '$nationOptions',
    congenOptions = '$congenOptions',
    motiOptions = '$motiOptions',
    intensityOptions = '$intensityOptions'
WHERE
    qid = $qid";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " );

mysqli_close($con); //ปิดการเชื่อมต่อ database 

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
?>