<h1>ข้อมูลประสบการณ์การอบรม</h1>
<?php 
echo generateFormField("trainExperExer", "ประสบการณ์การอบรมทางด้านการออกกำลังกายเพื่อสุขภาพ", "กรอกข้อมูลประสบการณ์", true, true, "");
echo generateFormField("trainExper", "ประสบการณ์การอบรมในสาขาความเชี่ยวชาญ", "กรอกข้อมูลประสบการณ์", true, true, "");
?>

<script>
    $(document).ready(function() {
        const formIds = [
            "trainExperExer", "trainExper"
        ];

        formIds.forEach(id => $(`[name="${id}"]`).on("input change", checkAndUpdate));

        function checkAndUpdate() {
            formIds.forEach(id => toggleAlert(`#emptyAlert-${id}`, $(`#${id}`).val().trim() === ""));
        }

        function toggleAlert(alertId, show) {
            const alertElement = $(alertId);
            
            if (show) {
                alertElement.show();
            } else {
                alertElement.hide();
            }
        }

        // อัปเดตค่าเริ่มต้นเพื่อตั้งค่าสถานะเริ่มต้น
        checkAndUpdate();
    });
</script>
