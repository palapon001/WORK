<?php
include 'assets/php/generateFormField.php';
$defaultValueAgency_name1 = $foundUser == 1 ? $agency_name1 : '';
$defaultValueAgency_name2 = $foundUser == 1 ? $agency_name2 : '';
$defaultValueCommunity = $foundUser == 1 ? $community : '';
$defaultValueLoc_community = $foundUser == 1 ? $loc_community : '';
$defaultValueLoc_agency = $foundUser == 1 ? $loc_agency : '';
$defaultValueBusiness = $foundUser == 1 ? $business : '';
switch ($_SESSION["level"]) {
    case "Trainers":
?>
        <!-- Trainers form -->
        <h1>ข้อมูลหน่วยงาน</h1>
    <?php
        echo generateFormField("agency_name1", "ชื่อหน่วยงาน", "กรอกชื่อหน่วยงาน", true, true, $defaultValueAgency_name1);
        echo generateFormField("agency_name2", "ชื่อหน่วยงานต้นสังกัด", "กรอกชื่อหน่วยงานต้นสังกัด", true, true, $defaultValueAgency_name2);
        echo generateFormField("community", "ชื่อชุมชน", "", false, false, "---", 'hidden');
        echo generateFormField("loc_community", "ที่ตั้งชุมชน", "", false, false, "---", 'hidden');
        echo generateFormField("loc_agency", "ที่ตั้งของหน่วยงาน", "กรอกที่ตั้งของหน่วยงาน", true, true, $defaultValueLoc_agency);
        echo generateFormField("business", "บริบทการดำเนินธุรกิจ", "", false, false, "---", 'hidden');
        break;

    case "Sport-professionals":
    ?>
        <!-- Sport-professionals form -->
        <h1>ข้อมูลหน่วยงาน</h1>
    <?php
        echo generateFormField("agency_name1", "ชื่อหน่วยงาน", "กรอกชื่อหน่วยงาน", true, true, $defaultValueAgency_name1);
        echo generateFormField("agency_name2", "ชื่อหน่วยงานต้นสังกัด", "กรอกชื่อหน่วยงานต้นสังกัด", true, true, $defaultValueAgency_name2);
        echo generateFormField("community", "ชื่อชุมชน", "", false, false, "---", 'hidden');
        echo generateFormField("loc_community", "ที่ตั้งชุมชน", "", false, false, "---", 'hidden');
        echo generateFormField("loc_agency", "ที่ตั้งของหน่วยงาน", "กรอกที่ตั้งของหน่วยงาน", true, true, $defaultValueLoc_agency);
        echo generateFormField("business", "บริบทการดำเนินธุรกิจ", "", false, false, "---", 'hidden');
        break;

    case "Suppliers/Partners":
    ?>
        <!-- Suppliers/Partners form -->
        <h1>ข้อมูลหน่วยงาน</h1>
    <?php
        echo generateFormField("agency_name1", "ชื่อหน่วยงาน", "กรอกชื่อหน่วยงาน", true, true, $defaultValueAgency_name1);
        echo generateFormField("agency_name2", "ชื่อหน่วยงานต้นสังกัด", "กรอกชื่อหน่วยงานต้นสังกัด", true, true, $defaultValueAgency_name2);
        echo generateFormField("community", "ชื่อชุมชน", "", false, false, "---", 'hidden');
        echo generateFormField("loc_community", "ที่ตั้งชุมชน", "", false, false, "---", 'hidden');
        echo generateFormField("loc_agency", "ที่ตั้งของหน่วยงาน", "กรอกที่ตั้งของหน่วยงาน", true, true, $defaultValueLoc_community);
        echo generateFormField("business", "บริบทการดำเนินธุรกิจ (สำหรับองค์กรธุรกิจ)", "กรอกบริบทการดำเนินธุรกิจ", false,false,$defaultValueBusiness);
        break;

    case "Community":
    ?>
        <!-- Community form -->
        <h1>ข้อมูลหน่วยงาน</h1>
<?php
        echo generateFormField("community", "ชื่อชุมชน", "กรอกชื่อชุมชน", true,true,$defaultValueCommunity);
        echo generateFormField("loc_community", "ที่ตั้งของชุมชน", "กรอกที่ตั้งของชุมชน", true,true,$defaultValueLoc_community);
        echo generateFormField("agency_name1", "", "", false, false, "---", 'hidden');
        echo generateFormField("agency_name2", "", "", false, false, "---", 'hidden');
        echo generateFormField("loc_agency", "", "", false, false, "---", 'hidden');
        echo generateFormField("business", "", "", false, false, "---", 'hidden');
        break;

    default:
        include 'FormQ4Default.php';
}
?>

<script>
    $(document).ready(function() {
        const inputIds = [
            "agency_name1", "agency_name2", "community", "loc_community", "loc_agency", "business"
        ];


        inputIds.forEach(id => $(`[name="${id}"]`).on("input change", checkAndUpdate));

        function checkAndUpdate() {
            inputIds.forEach(id => toggleAlert(`#emptyAlert-${id}`, $(`[name="${id}"]`).val().trim() === ""));
        }

        function toggleAlert(alertId, show) {
            if (show) {
                $(alertId).show();
            } else {
                $(alertId).hide();
            }
        }

        // Initial update to set the initial state
        checkAndUpdate();
    });
</script>