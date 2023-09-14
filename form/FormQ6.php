<h1>ข้อมูลประสบการณ์การอบรม</h1>
<?php
include 'assets/php/customGenarateFormField.php' ;
$defaultValueTrainExperExer = $foundUser == 1 ? $train_exper_exer : '';
$defaultValueTrainExper = $foundUser == 1 ? $train_exper : ''; 
echo generateFormField("trainExperExerInput", "ประสบการณ์การอบรมทางด้านการออกกำลังกายเพื่อสุขภาพ", "กรอกข้อมูลประสบการณ์", true, true, $defaultValueTrainExperExer, "text", customGenarateFormField('ประสบการณ์', 'trainExperExer'));
echo generateFormField("trainExperInput", "ประสบการณ์การอบรมในสาขาความเชี่ยวชาญ", "กรอกข้อมูลประสบการณ์", true, true, $defaultValueTrainExper, "text", customGenarateFormField('ประสบการณ์', 'trainExper'));
?>
<script src="assets/js/createInputForm.js"></script>
<script>
    $(document).ready(function() {
        const formIds = [
            "trainExperExerInput", "trainExperInput"
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