<?php
include 'assets/php/generateFormCheck.php';
$defaultValueLocationFetch = $foundUser == 1 ? $locationFetch : '';
$defaultValueReason1Fetch = $foundUser == 1 ? $reason1Fetch : '';
$defaultValueReason2Fetch = $foundUser == 1 ? $reason2Fetch : '';
$defaultValueExerFetch = $foundUser == 1 ? $exerFetch : ''; 
?>
<h1>ข้อมูลการออกกำลังกาย</h1>
<!-- location form -->
<div>
    <?php
    $locations = array(
        "บ้าน/บริเวณที่พักอาศัย",
        "ที่ทำงาน",
        "โรงเรียน/สถานศึกษา",
        "พื้นที่ทำการเกษตร เช่น สวน ไร่ นา เป็นต้น",
        "สนามกีฬาประจำตำบล/อำเภอ/จังหวัด",
        "ฟิตเนสหรือยิม",
        "สวนสาธารณะ",
        "ถนน/ทางสาธารณะ/ซอย"
    );
    $locationHTML = generateFormCheck(
        $locations,
        'location',
        'สถานที่ใดที่คุณใช้ออกกำลังกายหรือเล่นกีฬาเป็นประจำ (ตอบได้มากกว่า 1 คำตอบ)',
        'กรุณาเลือกข้อมูลสถานที่',
        $foundUser,
        $defaultValueLocationFetch
    );
    echo $locationHTML;
    ?>
</div>

<!-- period form -->
<div class="form-control mb-3">
    <p>ช่วงเวลาที่คุณออกกำลังกายหรือเล่นกีฬาเป็นประจำ (ตอบได้มากกว่า 1 คำตอบ)</p>
    <div class="row">
        <div class="col">
            <?php
            for ($hour = 0; $hour < 12; $hour++) {
                $label = sprintf('%02d:00 - %02d:00', $hour, $hour + 1);
            ?>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="selected_hours[]" id="hours-<?php echo $hour; ?>" value="<?php echo $label; ?>" <?php if ($foundUser == 1 && $periodFetch == $label) echo "checked"; ?>><?php echo $label; ?>
                    </label>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col">
            <?php
            for ($hour = 12; $hour < 24; $hour++) {
                $label = sprintf('%02d:00 - %02d:00', $hour, $hour + 1);
            ?>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="selected_hours[]" id="hours-<?php echo $hour; ?>" value="<?php echo $label; ?>" <?php if ($foundUser == 1 && $periodFetch == $label) echo "checked"; ?>><?php echo $label; ?>
                    </label>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="alert alert-danger mt-3" id="emptyAlert-hours">
        กรุณาเลือกข้อมูลช่วงเวลา
    </div>
</div>

<!-- reason1 form -->
<div>
    <?php
    $reason1 = array(
        "ต้องการให้ร่างกายแข็งแรง",
        "เป็นงานต้องทำ/เป็นอาชีพ",
        "ทำกิจกรรมร่วมกับเพื่อน/เพื่อนชวน",
        "รักษา/บรรเทาอาการเจ็บป่วย",
        "ใช้เวลาว่างให้เป็นประโยชน์",
        "ต้องการรูปร่างที่ดี/หุ่นดี",
        "กำลังเป็นที่นิยม/ตามกระแสนิยม",
        "ควบคุมน้ำหนัก/ลดน้ำหนัก",
        "คลายเครียด/พักผ่อน",
        "ชอบในกีฬานั้นๆ",
        "ชอบออกกำลังกาย"
    );
    $reason1HTML = generateFormCheck(
        $reason1,
        'reason1',
        'เพราะเหตุผลใดคุณจึงออกกำลังกายหรือเล่นกีฬา (ตอบได้มากกว่า 1 ข้อ)',
        ' กรุณาเลือกข้อมูล',
        $foundUser,
        $defaultValueReason1Fetch
    );
    echo $reason1HTML;
    ?>
</div>

<!-- reason2 form -->
<div>
    <?php
    $reason2 = array(
        "ขี้เกียจ",
        "ไม่มีเวลา",
        "ป่วย",
        "ไม่ชอบการออกกำลังกาย",
        "ไม่มีความรู้",
        "น่าเบื่อหน่าย",
        "พิการ",
        "ไม่มีสถานที่",
        "ไม่จำเป็นต่อตนเอง",
        "ขาดแรงจูงใจ",
        "สถานการณ์โรคอุบัติใหม่/สถานการณ์วิกฤต"
    );
    $reason2HTML = generateFormCheck(
        $reason2,
        "reason2",
        "เพราะเหตุผลใดคุณจึงไม่ออกกำลังกายหรือเล่นกีฬา (ตอบได้มากกว่า 1 ข้อ)",
        "กรุณาเลือกเหตุผล",
        $foundUser,
        $defaultValueReason2Fetch
    );
    echo $reason2HTML;
    ?>
</div>

<!-- motivation form -->
<div class="form-control mb-3">
    <p>คุณคิดว่าอะไรที่จูงใจให้คุณ และครอบครัว หรือคนรอบข้างคุณ มาออกกำลังกายหรือเล่นกีฬา (ตอบเพียงคำตอบเดียว)</p>
    <select class="form-select mb-3" id="motiOptions" name="motiOptions" onchange="showInputField('motiOptions','motiField','motiInput')">
        <option selected disabled>โปรดเลือก</option>
        <option value="ความรู้ในการออกกำลังกาย" <?php if ($foundUser == 1 && $motiOptions == "ความรู้ในการออกกำลังกาย") echo "selected"; ?>>ความรู้ในการออกกำลังกาย</option>
        <option value="ทัศนคติในการออกกำลังกาย" <?php if ($foundUser == 1 && $motiOptions == "ทัศนคติในการออกกำลังกาย") echo "selected"; ?>>ทัศนคติในการออกกำลังกาย</option>
        <option value="สนามกีฬาหรือสถานที่มีความสวยงามมีมาตรฐาน" <?php if ($foundUser == 1 && $motiOptions == "สนามกีฬาหรือสถานที่มีความสวยงามมีมาตรฐาน") echo "selected"; ?>>สนามกีฬาหรือสถานที่มีความสวยงามมีมาตรฐาน</option>
        <option value="ผู้นำการออกกำลังกาย" <?php if ($foundUser == 1 && $motiOptions == "ผู้นำการออกกำลังกาย") echo "selected"; ?>>ผู้นำการออกกำลังกาย</option>
        <option value="การจัดกิจกรรมที่น่าสนใจ" <?php if ($foundUser == 1 && $motiOptions == "การจัดกิจกรรมที่น่าสนใจ") echo "selected"; ?>>การจัดกิจกรรมที่น่าสนใจ</option>
        <option value="ดารา/นักร้อง/บุคคลที่มีชื่อเสียง" <?php if ($foundUser == 1 && $motiOptions == "ดารา/นักร้อง/บุคคลที่มีชื่อเสียง") echo "selected"; ?>>ดารา/นักร้อง/บุคคลที่มีชื่อเสียง</option>
        <option value="ญาติพี่น้อง/เพื่อน" <?php if ($foundUser == 1 && $motiOptions == "ญาติพี่น้อง/เพื่อน") echo "selected"; ?>>ญาติพี่น้อง/เพื่อน</option>
        <option value="ไม่มีสถานที่อาสาสมัครทางการกีฬามาให้ความรู้" <?php if ($foundUser == 1 && $motiOptions == "ไม่มีสถานที่อาสาสมัครทางการกีฬามาให้ความรู้") echo "selected"; ?>>ไม่มีสถานที่อาสาสมัครทางการกีฬามาให้ความรู้</option>
        <option value="other" <?php if ($foundUser == 1 && $motiOptions == "other") echo "selected"; ?>>อื่น ๆ</option>
    </select>
    <div id="motiField" style="display: none;">
        <label for="motiInput">โปรดระบุ:</label>
        <input type="text" id="motiInput" name="motiInput" class="form-control" value="<?php echo $foundUser == 1 ? $motiOptions : ''; ?>" required>
    </div>
    <div class="alert alert-danger mt-3" id="emptyAlert-motiOptions">
        กรุณากรอกข้อมูล
    </div>
</div>

<!-- exercise type form -->
<div>
    <?php
    $exerciseArray = array(
        "เดิน",
        "วิ่ง",
        "โยคะ",
        "ฟุตซอล",
        "ปั่นจักรยาน",
        "กระโดยเชือก",
        "ฟุตบอล",
        "แบดมินตัน",
        "เต้นแอโรบิค",
        "บาสเกตบอล",
        "เพาะกายและฟิตเนส",
        "เซปักตะกร้อ",
        "เปตอง",
        "รำมวยจีน",
        "ว่ายน้ำ",
        "ลีลาศ",
        "มวยไทย",
        "เทนนิส",
        "กอล์ฟ",
        "ไทเก็ก",
        "เทควันโด",
        "สนุ๊กเกอร์",
        "มวยสากล"
    );
    $exerciseHTML = generateFormCheck(
        $exerciseArray,
        'exer',
        'รายการตัวเลือก ประเภทการออกกำลังกายเพื่อสุขภาพ (ตอบได้มากกว่า 1 ข้อ)',
        'กรุณาเลือกรายการ',
        $foundUser,
        $defaultValueExerFetch
    );
    echo $exerciseHTML;
    ?>
</div>

<!-- pulse after exercise form -->
<div class="form-control mb-3">
    <p>ชีพจรหลังการออกกำลังกาย (หากท่านทราบข้อมูล)* </p>
    <input name="pulseAfter" type="text" id="pulseAfter" class="form-control" placeholder="เช่น 60" value="<?php echo $foundUser == 1 ? $pulseAfter : ''; ?>">
</div>

<!-- week exercise form -->
<div class="form-control mb-3">
    <p>จำนวนวันที่ออกกำลังกายต่อสัปดาห์ </p>
    <input name="week" type="number" id="week" class="form-control" value="<?php echo $foundUser == 1 ? $week : ''; ?>" required>
    <div class="alert alert-danger mt-3" id="emptyAlert-week">
        กรุณากรอกข้อมูล
    </div>
</div>

<!-- exercise intensity form -->
<div class="form-control mb-3">
    <p>ความหนักของการออกกำลังกาย</p>
    <select class="form-select mb-3" id="intensityOptions" name="intensityOptions">
        <option selected disabled>โปรดเลือก</option>
        <option value="ระดับปานกลาง" <?php if ($foundUser == 1 && $intensityOptions == "ระดับปานกลาง") echo "selected"; ?>>ระดับปานกลาง=อัตราการหายใจ หรืออัตราการเต้นของหัวใจเพิ่มขึ้นจากปกติเล็กน้อย</option>
        <option value="ระดับหนัก" <?php if ($foundUser == 1 && $intensityOptions == "ระดับหนัก") echo "selected"; ?>>ระดับหนัก=อัตราการหายใจ หรืออัตราการเต้นของหัวใจเพิ่มขึ้นอย่างมาก</option>
    </select>
    <div class="alert alert-danger mt-3" id="emptyAlert-intensity">
        กรุณากรอกข้อมูล
    </div>
</div>

<!-- duration of exercise form -->
<div class="form-control mb-3">
    <p>ระยะเวลาการออกกำลังกาย</p>
    <input name="duration" type="number" id="duration" class="form-control" placeholder="เช่น 70 นาที" required value="<?php echo $foundUser == 1 ? $duration : ''; ?>">
    <div class="alert alert-danger mt-3" id="emptyAlert-duration">
        กรุณากรอกข้อมูล
    </div>
</div>

<?php
function createVarArray($name, $start, $end)
{
    $result = [];
    for ($i = $start; $i <= $end; $i++) {
        $result[] = "'$name$i'";
    }
    if (count($result) > 0) {
        $result[count($result) - 1] .= "\n \t";
    }
    return $result;
}

function echoALLVAR()
{
    $result = [];
    $result[] = implode(', ', createVarArray('location-', 1, count($GLOBALS['locations'])));
    $result[] = implode(', ', createVarArray('hours-', 0, 24));
    $result[] = implode(', ', createVarArray('reason1-', 1, count($GLOBALS['reason1'])));
    $result[] = implode(', ', createVarArray('reason2-', 1, count($GLOBALS['reason2'])));
    $result[] = implode(', ', createVarArray('exer-', 1, count($GLOBALS['exerciseArray'])));
    echo implode(', ', $result);
}
?>

<script>
    $(document).ready(function() {
        const checkboxIds = [<?php echoALLVAR() ?>];
        const inputIds = ["locationInput", "reason1Input", "reason2Input", "exerInput", "week", "intensityOptions", "motiOptions", "duration"];

        checkboxIds.forEach(id => $(`#${id}`).on("input change", checkAndUpdate));
        inputIds.forEach(id => $(`#${id}`).on("input change", checkAndUpdate));

        function checkAndUpdate() {
            const isChecked = id => $(`#${id}`).prop('checked');
            const isInputEmpty = id => $(`#${id}`).val().trim() === '';

            const locationCheckboxes = checkboxIds.slice(0, 8).map(isChecked);
            const hoursCheckboxes = checkboxIds.slice(8, 33).map(isChecked);
            const reason1Checkboxes = checkboxIds.slice(33, 44).map(isChecked);
            const reason2Checkboxes = checkboxIds.slice(44, 55).map(isChecked);
            const exerCheckboxes = checkboxIds.slice(55).map(isChecked);

            const locationInputEmpty = isInputEmpty('locationInput');
            const reason1InputEmpty = isInputEmpty('reason1Input');
            const reason2InputEmpty = isInputEmpty('reason2Input');
            const exerInputEmpty = isInputEmpty('exerInput');

            const week = $("#week").val().trim();
            const intensityOptions = $("#intensityOptions").val();
            const motiOptions = $("#motiOptions").val();
            const duration = $("#duration").val().trim();

            const isWeekEmpty = week === '';
            const isIntensityEmpty = intensityOptions === null;
            const isMotiEmpty = motiOptions === null;
            const isDurationEmpty = duration === '';

            const locationEmpty = locationCheckboxes.every(checkbox => !checkbox) && locationInputEmpty;
            const hoursEmpty = hoursCheckboxes.every(checkbox => !checkbox);
            const reason1Empty = reason1Checkboxes.every(checkbox => !checkbox) && reason1InputEmpty;
            const reason2Empty = reason2Checkboxes.every(checkbox => !checkbox) && reason2InputEmpty;
            const exerEmpty = exerCheckboxes.every(checkbox => !checkbox) && exerInputEmpty;


            // Show/hide alerts as needed
            toggleAlert("#emptyAlert-location", locationEmpty);
            toggleAlert("#emptyAlert-hours", hoursEmpty);
            toggleAlert("#emptyAlert-reason1", reason1Empty);
            toggleAlert("#emptyAlert-reason2", reason2Empty);
            toggleAlert("#emptyAlert-exer", exerEmpty);
            toggleAlert("#emptyAlert-week", isWeekEmpty);
            toggleAlert("#emptyAlert-intensity", isIntensityEmpty);
            toggleAlert("#emptyAlert-motiOptions", isMotiEmpty);
            toggleAlert("#emptyAlert-duration", isDurationEmpty);
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