<h1>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</h1>

<!-- org_heal form -->
<div class="form-control mb-3">
    <p>ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ</p>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="org_heal" value="มี" id="org_heal" <?php if ($foundUser == 1 && $org_heal == "มี") echo "checked"; ?>>
        <label class="form-check-label" for="org_heal">
            มี
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="org_heal" value="ไม่มี" id="org_heal" <?php if ($foundUser == 1 && $org_heal == "ไม่มี") echo "checked"; ?>>
        <label class="form-check-label" for="org_heal">
            ไม่มี
        </label>
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-org_heal" style="display: none;">
        กรุณาเลือกข้อมูล
    </div>
</div>
<!-- end org_heal form -->

<?php  
$defaultValueProOrgExer = $foundUser == 1 ? $pro_org_exer : '';
$defaultValueActivityName = $foundUser == 1 ? $activity : ''; 
echo generateFormField("proOrgExer", "โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ", "", true, true, $defaultValueProOrgExer);
echo generateFormField("activityName", "กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม", "", true, true, $defaultValueActivityName);
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
