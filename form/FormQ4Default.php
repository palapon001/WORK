<h1>ข้อมูลหน่วยงาน</h1>
<?php
echo generateFormField("agency_name1", "ชื่อหน่วยงาน", "กรอกชื่อหน่วยงาน", true, true, "");
echo generateFormField("agency_name2", "ชื่อหน่วยงานต้นสังกัด", "กรอกชื่อหน่วยงานต้นสังกัด", true, true, "");
echo generateFormField("community", "ชื่อชุมชน (ถ้ามี)", "", false, true, "" ,'hidden');
echo generateFormField("loc_community", "", "", false, false, "---", 'hidden');
echo generateFormField("loc_agency", "ที่ตั้งของหน่วยงาน", "กรอกที่ตั้งของหน่วยงาน", true, true, "");
echo generateFormField("business", "บริบทการดำเนินธุรกิจ (สำหรับองค์กรธุรกิจ)", "กรอกบริบทการดำเนินธุรกิจ", false, false, "");
?>

