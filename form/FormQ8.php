<h1>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</h1>

<!-- org_heal form -->
<div class="form-control mb-3">
    <p>ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ</p>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="org_heal" value="มี" id="org_heal">
        <label class="form-check-label" for="flexRadioDefault">
            มี
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="org_heal" value="ไม่มี" id="org_heal">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่มี
        </label>
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-org_heal" style="display: none;">
        กรุณากรอกงานวิจัย
    </div>
</div>
<!-- end org_heal form -->

<?php 
echo generateFormField("proOrgExer", "โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ", "", true, true, "");
echo generateFormField("activityName", "กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม", "", true, true, "");
?>

<script>
    $(document).ready(function() {
        const radioName = "org_heal";
        const formIds = [
            "proOrgExer", "activityName"
        ];

        $(`input[name=${radioName}]`).on("change", checkAndUpdate);

        formIds.forEach(id => $(`[name="${id}"]`).on("input change", checkAndUpdate));

        function checkAndUpdate() {
            checkRadio();
            formIds.forEach(id => toggleAlert(`#emptyAlert-${id}`, $(`#${id}`).val().trim() === ""));
        }

        function checkRadio() {
            const selectedValue = $(`input[name=${radioName}]:checked`).val();
            const isRadioDisabled = selectedValue === undefined;

            toggleAlert("#emptyAlert-org_heal", isRadioDisabled);
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
