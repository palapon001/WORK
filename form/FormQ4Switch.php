<?php
include 'assets/php/generateFormField.php';

switch ($_SESSION["level"]) {
    case "Trainers":
        ?>
        <!-- Trainers form -->
        <h1>ข้อมูลหน่วยงาน</h1>
        <?php
        echo generateFormField("agency_name1", "ชื่อหน่วยงาน", "กรอกชื่อหน่วยงาน", true, true);
        echo generateFormField("agency_name2", "ชื่อหน่วยงานต้นสังกัด", "กรอกชื่อหน่วยงานต้นสังกัด", true, true);
        echo generateFormField("community", "ชื่อชุมชน", "", false, false, "---");
        echo generateFormField("loc_community", "ที่ตั้งชุมชน", "", false, false, "---");
        echo generateFormField("loc_agency", "ที่ตั้งของหน่วยงาน", "กรอกที่ตั้งของหน่วยงาน", true, true);
        echo generateFormField("business", "บริบทการดำเนินธุรกิจ", "", false, false, "---");
        break;

    case "Sport-professionals":
        ?>
        <!-- Sport-professionals form -->
        <h1>ข้อมูลหน่วยงาน</h1>
        <?php
        echo generateFormField("agency_name1", "ชื่อหน่วยงาน", "กรอกชื่อหน่วยงาน", true, true, "");
        echo generateFormField("agency_name2", "ชื่อหน่วยงานต้นสังกัด", "กรอกชื่อหน่วยงานต้นสังกัด", true, true, "");
        echo generateFormField("community", "ชื่อชุมชน", "", false, false, "---");
        echo generateFormField("loc_community", "ที่ตั้งชุมชน", "", false, false, "---");
        echo generateFormField("loc_agency", "ที่ตั้งของหน่วยงาน", "กรอกที่ตั้งของหน่วยงาน", true, true, "");
        echo generateFormField("business", "บริบทการดำเนินธุรกิจ", "", false, false, "---");
        break;

    case "Suppliers/Partners":
        ?>
        <!-- Suppliers/Partners form -->
        <h1>ข้อมูลหน่วยงาน</h1>
        <?php
        echo generateFormField("agency_name1", "ชื่อหน่วยงาน", "กรอกชื่อหน่วยงาน", true);
        echo generateFormField("agency_name2", "ชื่อหน่วยงานต้นสังกัด", "กรอกชื่อหน่วยงานต้นสังกัด", true);
        echo generateFormField("community", "ชื่อชุมชน", "", false, false, "---");
        echo generateFormField("loc_community", "ที่ตั้งชุมชน", "", false, false, "---");
        echo generateFormField("loc_agency", "ที่ตั้งของหน่วยงาน", "กรอกที่ตั้งของหน่วยงาน", true);
        echo generateFormField("business", "บริบทการดำเนินธุรกิจ (สำหรับองค์กรธุรกิจ)", "กรอกบริบทการดำเนินธุรกิจ", false);
        break;

    case "Community":
        ?>
        <!-- Community form -->
        <h1>ข้อมูลหน่วยงาน</h1>
        <?php
        echo generateFormField("community", "ชื่อชุมชน", "กรอกชื่อชุมชน", true);
        echo generateFormField("loc_community", "ที่ตั้งของชุมชน", "กรอกที่ตั้งของชุมชน", true);
        echo generateFormField("agency_name1", "", "", false, false, "---",'hidden');
        echo generateFormField("agency_name2", "", "", false, false, "---",'hidden');
        echo generateFormField("loc_agency", "", "", false, false, "---",'hidden');
        echo generateFormField("business", "", "", false, false, "---",'hidden');
        break;

    default:
        include 'FormQ4Default.php';
}
?>

<script>
    $(document).ready(function() {
        const inputIds = [
            "agency_name1", "agency_name2", "community","loc_community","loc_agency", "business"
        ];

        const nextButton = $("#next2");

        inputIds.forEach(id => $(`[name="${id}"]`).on("input change", checkAndUpdate));

        function checkAndUpdate() {
            const isDisabled = inputIds.some(id => $(`[name="${id}"]`).val().trim() === "");

            nextButton.prop('disabled', isDisabled);

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