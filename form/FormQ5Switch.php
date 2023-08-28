<?php 
$defaultValueExper_sports = $foundUser == 1 ? $exper_sports : '';
$defaultValueRes = $foundUser == 1 ? $res : '';
$defaultValuePub_res = $foundUser == 1 ? $pub_res : ''; 
switch ($_SESSION["level"]) {
    case "Trainers": ?>
        <h1>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</h1>
        <!-- exper_sports form -->
        <div class="form-control mb-3">
            <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพ</p>
            <div class="input-group">
                <textarea name="exper_sports_input" type="text" id="exper_sports_input" class="form-control" required><?php echo $defaultValueRes; ?></textarea>
            </div>
            <button type="button" class="btn btn-primary mt-3" id="add-exper_sports_input" onclick="createInputForm('ชื่อสาขา','exper_sports','formContainer-exper_sports_input');" disabled>เพิ่มข้อมูลสาขา</button>
            <div class="form-group mt-3" id="formContainer-exper_sports_input">
            </div>
            <div class="alert alert-danger mb-3" id="emptyAlert-exper_sports_input" style="display: none;">
                กรุณากรอกสาขาความเชี่ยวชาญ
            </div>
        </div>
        <!-- end exper_sports form -->
        <input name="res[]" type="hidden" id="res" value="---">
        <input name="resInput" type="hidden" id="resInput" value="---">
        <input name="pub_res[]" type="hidden" id="pub_res" value="---">
        <input name="pub_res_input" type="hidden" id="pub_res_input" value="---">
        <?php break; ?>
    <?php
    default: ?>
        <?php include 'FormQ5Default.php'; ?>
<?php } ?>
<!-- Your existing HTML code -->
<script src="assets/js/createInputForm.js"></script>
<script>
    $(document).ready(function() {
        const formIds = [
            "exper_sports_input", "resInput", "pub_res_input"
        ];

        formIds.forEach(id => $(`#${id}`).on("input change", checkAndUpdate));

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
            formIds.forEach(id => toggleAlert(`#emptyAlert-${id}`, `#add-${id}`, $(`#${id}`).val().trim() === ""));
        }

        // เรียกใช้งานตรวจสอบและแสดงเริ่มต้น
        checkAndUpdate();
    });
</script>
