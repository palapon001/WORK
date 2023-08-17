
<?php 
 function createVarJSON($name,$start,$end){
    $JSON = [];
            for ($start; $start <= $end; $start++) {
                $JSON[] = "#$name" . $start;
            }
            echo json_encode($JSON);
 }
?>

<script>
    $(document).ready(function() {
        $("#success").prop('disabled', true);
        var locationCheckboxes = <?php createVarJSON('loc',1,8)   ?>;
        var hoursCheckboxes = <?php
            $checkboxes = [];
            for ($hour = 0; $hour < 24; $hour++) {
                $checkboxes[] = "#hours" . $hour;
            }
            echo json_encode($checkboxes);
        ?>;

        var emptyAlertLocation = $("#emptyAlert-location");
        var emptyAlertHours = $("emptyAlert-hours");
        var successButton = $("#success");

        function updateSuccessButtonState(arrayCheckboxs) {
            var allLocationUnchecked = arrayCheckboxs.every(function(checkbox) {
                return !checkbox.prop("checked");
            });

            if (allLocationUnchecked) {
                successButton.prop('disabled', true);
            } else {
                successButton.prop('disabled', false);
            }
        }

        function updateEmptyAlerts(arrayCheckboxs,alertID) {
            var allLocationUnchecked = arrayCheckboxs.every(function(checkbox) {
                return !checkbox.prop("checked");
            });

            alertID.toggle(allLocationUnchecked);
        }

        // ตรวจสอบเหตุการณ์ "input" หรือ "change" สำหรับแต่ละ checkbox
        locationCheckboxes.forEach(function(checkbox) {
            checkbox.on("input change", function() {
                updateSuccessButtonState(locationCheckboxes);
                updateEmptyAlerts(locationCheckboxes,emptyAlertLocation);
            });
        });
    });
</script>
