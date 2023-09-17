<?php include 'assets/php/customGenarateFormField.php'; ?>
<h2>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</h2>
<!-- orgHeal form -->
<div class="form-control mb-3">
    <?php if ($_SESSION["level"] == 'Personnel/Support-Staff') { ?>
        <p>ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="orgHealInput" value="มี" id="orgHeal" <?php if ($foundUser == 1 && $org_heal == "มี") echo "checked"; ?>>
            <label class="form-check-label" for="orgHeal">
                มี
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="orgHealInput" value="ไม่มี" id="orgHeal" <?php if ($foundUser == 1 && $org_heal == "ไม่มี") echo "checked"; ?>>
            <label class="form-check-label" for="orgHeal">
                ไม่มี
            </label>
        </div>
        <div class="alert alert-danger mb-3" id="emptyAlert-orgHeal" style="display: none;">
            กรุณาเลือกข้อมูล
        </div>
    <?php } else {
        $defaultValueOrgHeal = $foundUser == 1 ? $org_heal : '';
        echo generateFormField("orgHealInput", "ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ", "", true, true, $defaultValueOrgHeal, "text", customGenarateFormField('โครงการ', 'orgHeal'));
    } ?>
</div>
<!-- end orgHeal form -->
<?php
$defaultValueProOrgExer = $foundUser == 1 ? $pro_org_exer : '';
$defaultValueActivityName = $foundUser == 1 ? $activity : '';
?>
<div class="form-control mb-3">
<?php echo generateFormField("proOrgExerInput", "โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ", "", true, true, $defaultValueProOrgExer, "text", customGenarateFormField('โครงการ', 'proOrgExer')); ?>
</div>
<div class="form-control mb-3">
<?php echo generateFormField("activityNameInput", "กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม", "", true, true, $defaultValueActivityName, "text", customGenarateFormField('โครงการ/กิจกรรม', 'activityName')); ?>
</div>
<?php
$formIds = ["proOrgExerInput","activityNameInput"];

if ($_SESSION["level"] !== 'Personnel/Support-Staff') {
    array_unshift($formIds, "orgHealInput");
}
?>



<script src="assets/js/createInputForm.js"></script>
<script>
    $(document).ready(function() {
        const radioName = "orgHealInput";
        const formIds = <?php echo json_encode($formIds); ?>;

        $(`input[name=${radioName}]`).on("change", checkAndUpdate);

        formIds.forEach(id => $(`[id="${id}"]`).on("input change", checkAndUpdate));

        function checkRadio() {
            const selectedValue = $(`input[name=${radioName}]:checked`).val();
            const isRadioDisabled = selectedValue === undefined;

            toggleAlert("#emptyAlert-orgHeal", '', isRadioDisabled);
        }

        function toggleAlert(alertId, addId, shouldShow) {
            const alertElement = $(alertId);
            const addButton = $(addId);

            if (shouldShow) {
                alertElement.show();
                addButton.prop("disabled", true);
            } else {
                alertElement.hide();
                addButton.prop("disabled", false);
            }
        }

        function checkAndUpdate() {
            checkRadio();
            formIds.forEach(id => toggleAlert(`#emptyAlert-${id}`, `#add-${id}`, $(`#${id}`).val().trim() === ""));
        }

        // อัปเดตค่าเริ่มต้นเพื่อตั้งค่าสถานะเริ่มต้น
        checkAndUpdate();
    });
</script>