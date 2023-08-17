<?php
include 'assets/php/createVarJSON.php';
include 'assets/php/generateFormCheck.php';
?>
<h1>ข้อมูลการออกกำลังกาย</h1>
<!-- location form -->
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
    'กรุณาเลือกข้อมูลสถานที่'
);
echo $locationHTML;
?>
<!-- end location form -->

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
                        <input type="checkbox" class="form-check-input" name="selected_hours[]" id="hours-<?php echo $hour; ?>" value="<?php echo $label; ?>"><?php echo $label; ?>
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
                        <input type="checkbox" class="form-check-input" name="selected_hours[]" id="hours-<?php echo $hour; ?>" value="<?php echo $label; ?>"><?php echo $label; ?>
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
<!-- end period form -->

<!-- reason1 form -->
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
$reason1HTML = generateFormCheck($reason1, 'reason1', 'เพราะเหตุผลใดคุณจึงออกกำลังกายหรือเล่นกีฬา (ตอบได้มากกว่า 1 ข้อ)', ' กรุณาเลือกข้อมูล');
echo $reason1HTML;
?>
<!-- end reason1 form -->

<!-- reason2 form -->
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
$reason2HTML = generateFormCheck($reason2, "reason2", "เพราะเหตุผลใดคุณจึงไม่ออกกำลังกายหรือเล่นกีฬา (ตอบได้มากกว่า 1 ข้อ)", "กรุณาเลือกเหตุผล");
echo $reason2HTML;
?>
<!-- end reason2 form -->

<!-- motivation form -->
<div class="form-control mb-3">
    <p>คุณคิดว่าอะไรที่จูงใจให้คุณ และครอบครัว หรือคนรอบข้างคุณ มาออกกำลังกายหรือเล่นกีฬา (ตอบเพียงคำตอบเดียว)</p>
    <select class="form-select mb-3" id="motiOptions" name="motiOptions" onchange="showInputField('motiOptions','motiField','motiInput')">
        <option selected disabled>โปรดเลือก</option>
        <option value="ความรู้ในการออกกำลังกาย">ความรู้ในการออกกำลังกาย</option>
        <option value="ทัศนคติในการออกกำลังกาย">ทัศนคติในการออกกำลังกาย</option>
        <option value="สนามกีฬาหรือสถานที่มีความสวยงามมีมาตรฐาน">สนามกีฬาหรือสถานที่มีความสวยงามมีมาตรฐาน</option>
        <option value="ผู้นำการออกกำลังกาย">ผู้นำการออกกำลังกาย</option>
        <option value="การจัดกิจกรรมที่น่าสนใจ">การจัดกิจกรรมที่น่าสนใจ</option>
        <option value="ดารา/นักร้อง/บุคคลที่มีชื่อเสียง">ดารา/นักร้อง/บุคคลที่มีชื่อเสียง</option>
        <option value="ญาติพี่น้อง/เพื่อน">ญาติพี่น้อง/เพื่อน</option>
        <option value="ไม่มีสถานที่อาสาสมัครทางการกีฬามาให้ความรู้">ไม่มีสถานที่อาสาสมัครทางการกีฬามาให้ความรู้</option>
        <option value="other">อื่น ๆ</option>
    </select>
    <div id="motiField" style="display: none;">
        <label for="motiInput">โปรดระบุ:</label>
        <input type="text" id="motiInput" name="motiInput" class="form-control" required>
    </div>
    <div class="alert alert-danger mt-3" id="emptyAlert-motiOptions">
        กรุณากรอกข้อมูล
    </div>
</div>
<!-- end motivation form -->

<!-- exercise type form -->
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
$exerciseHTML = generateFormCheck($exerciseArray, 'exer', 'รายการตัวเลือก ประเภทการออกกำลังกายเพื่อสุขภาพ (ตอบได้มากกว่า 1 ข้อ)', 'กรุณาเลือกรายการ');
echo $exerciseHTML;
?>
<!-- end exercise type form -->

<!-- pulse after exercise form -->
<div class="form-control mb-3">
    <p>ชีพจรหลังการออกกำลังกาย (หากท่านทราบข้อมูล)* </p>
    <input name="pulseAfter" type="text" id="pulseAfter" class="form-control">
</div>
<!-- end pulse after exercise form -->

<!-- week exercise form -->
<div class="form-control mb-3">
    <p>จำนวนวันที่ออกกำลังกายต่อสัปดาห์ </p>
    <input name="week" type="number" id="week" class="form-control" required>
    <div class="alert alert-danger mt-3" id="emptyAlert-week">
        กรุณากรอกข้อมูล
    </div>
</div>
<!-- end week exercise form -->

<!-- exercise intensity form -->
<div class="form-control mb-3">
    <p>ความหนักของการออกกำลังกาย</p>
    <select class="form-select mb-3" id="intensityOptions" name="intensityOptions">
        <option selected disabled>โปรดเลือก</option>
        <option value="ระดับปานกลาง">ระดับปานกลาง=อัตราการหายใจ หรืออัตราการเต้นของหัวใจเพิ่มขึ้นจากปกติเล็กน้อย</option>
        <option value="ระดับหนัก">ระดับหนัก=อัตราการหายใจ หรืออัตราการเต้นของหัวใจเพิ่มขึ้นอย่างมาก</option>
    </select>
    <div class="alert alert-danger mt-3" id="emptyAlert-intensity">
        กรุณากรอกข้อมูล
    </div>
</div>
<!-- end exercise intensity form -->

<!-- duration of exercise form -->
<div class="form-control mb-3">
    <p>ระยะเวลาการออกกำลังกาย</p>
    <input name="duration" type="number" id="duration" class="form-control" required>
    <div class="alert alert-danger mt-3" id="emptyAlert-duration">
        กรุณากรอกข้อมูล
    </div>
</div>
<!-- end duration of exercise form -->
<script>
    $(document).ready(function() {
        $("#success").prop('disabled', true);

        $("<?php echoTAGID('location-', 1, count($locations));
            echoTAGID('hours-', 0, 24);
            echoTAGID('reason1-', 1, count($reason1));
            echoTAGID('reason2-', 1, count($reason2));
            echoTAGID('exer-', 1, count($exerciseArray)); ?> #week, #intensityOptions, #motiOptions, #duration ").on("input change ", function() {
            <?php 
                echoCreateVar('location', 1, count($locations));
                echoCreateVar('hours', 0, 24);
                echoCreateVar('reason1', 1, count($reason1));
                echoCreateVar('reason2', 1, count($reason2));
                echoCreateVar('exer', 1, count($exerciseArray));
            ?>
            var week = $("#week").val();
            var intensityOptions = $("#intensityOptions").val();
            var motiOptions = $("#motiOptions").val();
            var duration = $("#duration").val();

            if (<?php echoIFVar('location', 1, count($locations)); ?>) {
                $("#emptyAlert-location").show()
            } else {
                $("#emptyAlert-location").hide()
            }

            if (<?php echo echoIFVar('hours', 0, 24); ?>) {
                $("#emptyAlert-hours").show()
            } else {
                $("#emptyAlert-hours").hide()
            }

            if (<?php echo echoIFVar('reason1', 1, count($reason1)); ?>) {
                $("#emptyAlert-reason1").show()
            } else {
                $("#emptyAlert-reason1").hide()
            }

            if (<?php echo echoIFVar('reason2', 1, count($reason2)); ?>) {
                $("#emptyAlert-reason2").show()
            } else {
                $("#emptyAlert-reason2").hide()
            }

            if (<?php echo echoIFVar('exer', 1, count($exerciseArray)); ?>) {
                $("#emptyAlert-exer").show()
            } else {
                $("#emptyAlert-exer").hide()
            }

            if (week.trim() === "") {
                $("#emptyAlert-week").show()
            } else {
                $("#emptyAlert-week").hide()
            }

            if (intensityOptions === null) {
                $("#emptyAlert-intensity").show()
            } else {
                $("#emptyAlert-intensity").hide()
            }

            if (motiOptions === null) {
                $("#emptyAlert-motiOptions").show()
            } else {
                $("#emptyAlert-motiOptions").hide()
            }

            if (duration.trim() === "") {
                $("#emptyAlert-duration").show()
            } else {
                $("#emptyAlert-duration").hide()
            }

            if (week.trim() === "" ||
                intensityOptions === null ||
                motiOptions === null ||
                duration.trim() === ""||
                (<?php echoIFVar('location', 1, count($locations)); ?>) ||
                (<?php echo echoIFVar('hours', 0, 24); ?>) ||
                (<?php echo echoIFVar('reason1', 1, count($reason1)); ?>)||
                (<?php echo echoIFVar('reason2', 1, count($reason2)); ?>)||
                (<?php echo echoIFVar('exer', 1, count($exerciseArray)); ?>)
            ) {
                $("#success").prop('disabled', true);
            } else {
                $("#success").prop('disabled', false);
            }
        });


    });
</script>