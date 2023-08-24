<h1>ข้อมูลประสบการณ์การเป็นอาสาสม้คร</h1>
<!-- vol_exper form -->
<div class="form-control mb-3">
    <p>ประสบการณ์ในการเป็นอาสาสมัคร</p>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="vol_exper" value="มี" id="vol_exper" <?php if ($foundUser == 1 && $vol_exper == "มี") echo "checked"; ?>>
        <label class="form-check-label" for="vol_exper">
            มี
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="vol_exper" value="ไม่มี" id="vol_exper" <?php if ($foundUser == 1 && $vol_exper == "ไม่มี") echo "checked"; ?>>
        <label class="form-check-label" for="vol_exper">
            ไม่มี
        </label>
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-vol_exper" style="display: none;">
        กรุณากรอกงานวิจัย
    </div>
</div>  
<!-- end vol_exper form -->

<script>
    $(document).ready(function() {
        const radioName = "vol_exper";

        $(`input[name=${radioName}]`).on("change", checkAndUpdate);

        function checkAndUpdate() {
            const selectedValue = $(`input[name=${radioName}]:checked`).val();
            const isDisabled = selectedValue === undefined;

            toggleAlert("#emptyAlert-vol_exper", isDisabled);
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
