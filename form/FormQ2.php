<h1>ข้อมูลสุขภาพ</h1>
<!-- height form -->
<div class="form-control mb-3">
    <div class="input-group mb-3">
        <span class="input-group-text">ส่วนสูง</span>
        <input name="height" type="number" id="height" class="form-control" min="50" max="300" required>
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-height">
        กรุณากรอกข้อมูลส่วนสูง
    </div>
    <div class="alert alert-warning mb-3" id="emptyAlertWarning-height" style="display: none;">
        กรุณากรอกข้อมูลให้ถูกต้อง
    </div>
</div>
<!-- end height form -->

<!-- weight form -->
<div class="form-control mb-3">
    <div class="input-group mb-3">
        <span class="input-group-text">น้ำหนัก</span>
        <input name="weight" type="text" id="weight" class="form-control" min="1" max="1000" required>
    </div>
    <div class="alert alert-danger mb-3 " id="emptyAlert-weight">
        กรุณากรอกข้อมูลน้ำหนัก
    </div>
    <div class="alert alert-warning mb-3" id="emptyAlertWarning-weight" style="display: none;">
        กรุณากรอกข้อมูลให้ถูกต้อง
    </div>
</div>
<!-- end weight form -->

<!-- pressure form -->
<div class="form-control mb-3">
    <div class="input-group mb-3">
        <span class="input-group-text">ความดัน</span>
        <input name="pressure" type="text" id="pressure" class="form-control" required>
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-pressure">
        กรุณากรอกข้อมูลความดัน
    </div>
</div>
<!-- end pressure form -->

<!-- pulse form -->
<div class="form-control mb-3">
    <div class="input-group mb-3">
        <span class="input-group-text">ชีพจร (ครั้ง/นาที)
        </span>
        <input name="pulse" type="text" id="pulse" class="form-control" required>
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-pulse">
        กรุณากรอกข้อมูลชีพจร
    </div>
</div>
<!-- end pulse form -->

<!-- congenital disease form -->
<div class="form-control mb-3">
    <p>โรคประจำตัว</p>
    <select class="form-select mb-3" id="congenOptions" name="congenOptions" onchange="showInputField('congenOptions','congenField','congenInput')">
        <option selected disabled>โปรดเลือก</option>
        <option value="มี">มี</option>
        <option value="ไม่มี">ไม่มี</option>
        <option value="other">อื่น ๆ</option>
    </select>
    <div id="congenField" style="display: none;">
        <label for="congenInput">โปรดระบุ:</label>
        <input type="text" id="congenInput" name="congenInput" class="form-control" required>
    </div>

    <div class="alert alert-danger mb-3" id="emptyAlert-congen">
        กรุณากรอกข้อมูลโรคประจำตัว
    </div>
</div>

<!-- end congenital disease form -->

<!-- <script>
    $(document).ready(function() {
        $("#next2").prop('disabled', true);
        $("#height, #weight, #pressure, #pulse, #congenOptions").on("input change", function() {
            var height = $("#height").val();
            var weight = $("#weight").val();
            var pressure = $("#pressure").val();
            var pulse = $("#pulse").val();
            var congenOptions = $("#congenOptions").val();

            if (height.trim() === "") {
                $("#emptyAlert-height").show();
            } else {
                $("#emptyAlert-height").hide();
            }

            if (weight.trim() === "") {
                $("#emptyAlert-weight").show();
            } else {
                $("#emptyAlert-weight").hide();
            }

            if (pressure.trim() === "") {
                $("#emptyAlert-pressure").show();
            } else {
                $("#emptyAlert-pressure").hide();
            }

            if (pulse === "") {
                $("#emptyAlert-pulse").show();
            } else {
                $("#emptyAlert-pulse").hide();
            }

            if (congenOptions === null) {
                $("#emptyAlert-congen").show();
            } else {
                $("#emptyAlert-congen").hide();
            }


            if (height.trim() === "" ||
                weight.trim() === "" ||
                pressure.trim() === "" ||
                pulse.trim() === "" ||
                congenOptions === null
            ) {
                $("#next2").prop('disabled', true);
            } else {
                $("#next2").prop('disabled', false);
            }
        });

    });
</script> -->

<script>
    $(document).ready(function() {
        const inputIds = [
            "height", "weight", "pressure", "pulse"
        ];

        const selectIds = [
            "congenOptions"
        ];

        const nextButton = $("#next2");

        inputIds.forEach(id => $(`#${id}`).on("input change", checkAndUpdate));
        selectIds.forEach(id => $(`#${id}`).on("change", checkAndUpdate));

        function checkAndUpdate() {
            const inputValues = inputIds.map(id => $(`#${id}`).val().trim());
            const selectValues = selectIds.map(id => $(`#${id}`).val());

            const isHeightEmpty = inputValues[0] === "";
            const isWeightEmpty = inputValues[1] === "";
            const isPressureEmpty = inputValues[2] === "";
            const isPulseEmpty = inputValues[3] === "";

            const heightValue = parseFloat(inputValues[0]);
            const weightValue = parseFloat(inputValues[1]);

            const isHeightInvalid = heightValue <= 25 || heightValue >= 999 || isNaN(heightValue) || !Number.isFinite(heightValue);
            const isWeightInvalid = weightValue <= 0 || weightValue >= 999 || isNaN(weightValue) || !Number.isFinite(weightValue);

            const isCongenEmpty = selectValues[0] === null;

            const isDisabled = isHeightEmpty || isWeightEmpty || isPressureEmpty ||
                isPulseEmpty || isCongenEmpty ||
                isHeightInvalid || isWeightInvalid;

            nextButton.prop('disabled', isDisabled);

            toggleAlert("#emptyAlertWarning-height", !isHeightEmpty && isHeightInvalid);
            toggleAlert("#emptyAlertWarning-weight", !isWeightEmpty && isWeightInvalid);
            toggleAlert("#emptyAlert-weight", isWeightEmpty);
            toggleAlert("#emptyAlert-height", isHeightEmpty);
            toggleAlert("#emptyAlert-pressure", isPressureEmpty);
            toggleAlert("#emptyAlert-pulse", isPulseEmpty);
            toggleAlert("#emptyAlert-congen", isCongenEmpty);
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