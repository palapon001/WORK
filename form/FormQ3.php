<h1>ข้อมูลการออกกำลังกาย</h1>
<!-- location form -->
<div class="form-control mb-3">
    <p>สถานที่ใดที่คุณใช้ออกกำลังกายหรือเล่นกีฬาเป็นประจำ (ตอบได้มากกว่า 1 คำตอบ)</p>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="location[]" value="บ้าน/บริเวณที่พักอาศัย" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            บ้าน/บริเวณที่พักอาศัย
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="location[]" value="ที่ทำงาน" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ที่ทำงาน
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="location[]" value="โรงเรียน/สถานศึกษา" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            โรงเรียน/สถานศึกษา
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="location[]" value="พื้นที่ทำการเกษตร เช่น สวน ไร่ นา เป็นต้น" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            พื้นที่ทำการเกษตร เช่น สวน ไร่ นา เป็นต้น
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="location[]" value="สนามกีฬำประจำตำบล/อำเภอ/จังหวัด" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            สนามกีฬำประจำตำบล/อำเภอ/จังหวัด
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="location[]" value="ฟิตเนสหรือยิม" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ฟิตเนสหรือยิม
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="location[]" value="สวนสาธารณะ" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            สวนสาธารณะ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="location[]" value="ถนน/ทางสาธารณะ/ซอย" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ถนน/ทางสาธารณะ/ซอย
        </label>
    </div>
    <input type="text" class="form-control" id="textInput" name="locationInput" placeholder="อื่น ๆ โปรดระบุ">
</div>
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
                        <input type="checkbox" class="form-check-input" name="selected_hours[]" value="<?php echo $label; ?>"><?php echo $label; ?>
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
                        <input type="checkbox" class="form-check-input" name="selected_hours[]" value="<?php echo $label; ?>"><?php echo $label; ?>
                    </label>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- end period form -->

<!-- reason1 form -->
<div class="form-control mb-3">
    <p>เพราะเหตุผลใดคุณจึงออกกำลังกายหรือเล่นกีฬา (ตอบได้มากกว่า 1 ข้อ) </p>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="ต้องการให้ร่างกายแข็งแรง" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ต้องการให้ร่างกายแข็งแรง
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="เป็นงานต้องทำ/เป็นอาชีพ" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            เป็นงานต้องทำ/เป็นอาชีพ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="ทำกิจกรรมร่วมกับเพื่อน/เพื่อนชวน" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ทำกิจกรรมร่วมกับเพื่อน/เพื่อนชวน
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="รักษา/บรรเทาอาการเจ็บป่วย" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            รักษา/บรรเทาอาการเจ็บป่วย
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="ใช้เวลาว่างให้เป็นประโยชน์" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ใช้เวลาว่างให้เป็นประโยชน์
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="ต้องการรูปร่างที่ดี/หุ่นดี" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ต้องการรูปร่างที่ดี/หุ่นดี
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="กำลังเป็นที่นิยม/ตามกระแสนิยม" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            กำลังเป็นที่นิยม/ตามกระแสนิยม
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="ควบคุมน้ำหนัก/ลดน้ำหนัก" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ควบคุมน้ำหนัก/ลดน้ำหนัก
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="คลายเครียด/พักผ่อน" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            คลายเครียด/พักผ่อน
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="ชอบในกีฬานั้นๆ" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ชอบในกีฬานั้นๆ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason1[]" value="ชอบออกกำลังกาย" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ชอบออกกำลังกาย
        </label>
    </div>
    <input type="text" class="form-control" id="textInput" name="reason1Input" placeholder="อื่น ๆ โปรดระบุ" require>
</div>
<!-- end reason1 form -->

<!-- reason2 form -->
<div class="form-control mb-3">
    <p>เพราะเหตุผลใดคุณจึงไม่ออกกำลังกายหรือเล่นกีฬา (ตอบได้มากกว่า 1 ข้อ) </p>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="ขี้เกียจ" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ขี้เกียจ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="ไม่มีเวลา" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่มีเวลา
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="ป่วย" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ป่วย
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="ไม่ชอบการออกกำลังกาย" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่ชอบการออกกำลังกาย
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="ไม่มีความรู้" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่มีความรู้
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="น่าเบื่อหน่าย" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            น่าเบื่อหน่าย
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="พิการ" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            พิการ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="ไม่มีสถานที่" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่มีสถานที่
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="ไม่จำเป็นต่อตนเอง" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่จำเป็นต่อตนเอง
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="ขาดแรงจูงใจ" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ขาดแรงจูงใจ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="reason2[]" value="สถานการณ์โรคอุบัติใหม่/ สถานการณ์วิกฤต" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            สถานการณ์โรคอุบัติใหม่/ สถานการณ์วิกฤต
        </label>
    </div>
    <input type="text" class="form-control" id="textInput" name="reason2Input" placeholder="อื่น ๆ โปรดระบุ" require>
</div>
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
</div>
<!-- end motivation form -->

<!-- exercise type form -->
<div class="form-control mb-3">
    <p>รายการตัวเลือก ประเภทการออกกำลังกายเพื่อสุขภาพ (ตอบได้มากกว่า 1 ข้อ) </p>
    <div class="row">
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="เดิน" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เดิน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="วิ่ง" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    วิ่ง
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="โยคะ" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    โยคะ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="ฟุตซอล" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ฟุตซอล
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="ปั่นจักรยาน" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ปั่นจักรยาน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="กระโดยเชือก" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    กระโดยเชือก
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="ฟุตบอล" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ฟุตบอล
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="แบดมินตัน" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    แบดมินตัน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="เต้นแอโรบิค" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เต้นแอโรบิค
                </label>
            </div>
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="บาสเกตบอล" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    บาสเกตบอล
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="เพาะกายและฟิตเนส" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เพาะกายและฟิตเนส
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="เซปักตะกร้อ" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เซปักตะกร้อ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="เปตอง" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เปตอง
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="รำมวยจีน" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    รำมวยจีน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="ว่ายน้ำ" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ว่ายน้ำ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="ลีลาศ" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ลีลาศ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="มวยไทย" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    มวยไทย
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="เทนนิส" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เทนนิส
                </label>
            </div>
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="กอล์ฟ" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    กอล์ฟ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="ไทเก็ก" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ไทเก็ก
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="เทควันโด" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เทควันโด
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="สนุ๊กเกอร์" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    สนุ๊กเกอร์
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exer[]" value="มวยสากล" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    มวยสากล
                </label>
            </div>

        </div>

    </div>
    <input type="text" class="form-control" id="textInput" name="exerInput" placeholder="อื่น ๆ โปรดระบุ" require>
</div>
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
</div>
<!-- end week exercise form -->

<!-- exercise intensity form -->
<div class="form-control mb-3">
    <p>ความหนักของการออกกำลังกาย</p>
    <select class="form-select mb-3" id="intensityOptions" name="intensityOptions" >
        <option selected disabled>โปรดเลือก</option>
        <option value="ระดับปานกลาง">ระดับปานกลาง=อัตราการหายใจ หรืออัตราการเต้นของหัวใจเพิ่มขึ้นจากปกติเล็กน้อย</option>
        <option value="ระดับหนัก">ระดับหนัก=อัตราการหายใจ หรืออัตราการเต้นของหัวใจเพิ่มขึ้นอย่างมาก</option>
    </select>
</div>
<!-- end exercise intensity form -->

<!-- duration of exercise form -->
<div class="form-control mb-3">
    <p>ระยะเวลาการออกกำลังกาย</p>
    <input name="duration" type="number" id="duration" class="form-control" required>
</div>
<!-- end duration of exercise form -->