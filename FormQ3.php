<h1>ข้อมูลการออกกำลังกาย</h1>
<!-- location form -->
<div class="form-control mb-3">
    <p>สถานที่ใดที่คุณใช้ออกกำลังกายหรือเล่นกีฬาเป็นประจำ (ตอบได้มากกว่า 1 คำตอบ)</p>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            บ้าน/บริเวณที่พักอาศัย
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ที่ทำงาน
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            โรงเรียน/สถานศึกษา
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            พื้นที่ทำการเกษตร เช่น สวน ไร่ นา เป็นต้น
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            สนามกีฬำประจำตำบล/อำเภอ/จังหวัด
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ฟิตเนสหรือยิม
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            สวนสาธารณะ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ถนน/ทางสาธารณะ/ซอย
        </label>
    </div>
    <input type="text" class="form-control" id="textInput" placeholder="อื่น ๆ โปรดระบุ" require>
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
                        <input type="checkbox"  class="form-check-input" name="selected_hours[]" value="<?php echo $hour; ?>"><?php echo $label; ?>
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
                        <input type="checkbox" class="form-check-input" name="selected_hours[]" value="<?php echo $hour; ?>"><?php echo $label; ?>
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
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ต้องการให้ร่างกายแข็งแรง
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            เป็นงานต้องทำ/เป็นอาชีพ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ทำกิจกรรมร่วมกับเพื่อน/เพื่อนชวน
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            รักษา/บรรเทาอาการเจ็บป่วย
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ใช้เวลาว่างให้เป็นประโยชน์
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ต้องการรูปร่างที่ดี/หุ่นดี
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            กำลังเป็นที่นิยม/ตามกระแสนิยม
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ควบคุมน้ำหนัก/ลดน้ำหนัก
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            คลายเครียด/พักผ่อน
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ชอบในกีฬานั้นๆ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ชอบออกกำลังกาย
        </label>
    </div>
    <input type="text" class="form-control" id="textInput" placeholder="อื่น ๆ โปรดระบุ" require>
</div>
<!-- end reason1 form -->

<!-- reason2 form -->
<div class="form-control mb-3">
    <p>เพราะเหตุผลใดคุณจึงไม่ออกกำลังกายหรือเล่นกีฬา (ตอบได้มากกว่า 1 ข้อ) </p>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ขี้เกียจ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่มีเวลา
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่มีเวลา
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่ชอบการออกกำลังกาย
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่มีความรู้
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            น่าเบื่อหน่าย
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            พิการ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่มีสถานที่
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ไม่จำเป็นต่อตนเอง
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            ขาดแรงจูงใจ
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
            สถานการณ์โรคอุบัติใหม่/ สถานการณ์วิกฤต
        </label>
    </div>
    <input type="text" class="form-control" id="textInput" placeholder="อื่น ๆ โปรดระบุ" require>
</div>
<!-- end reason2 form -->

<!-- motivation form -->
<div class="form-control mb-3">
    <p>คุณคิดว่าอะไรที่จูงใจให้คุณ และครอบครัว หรือคนรอบข้างคุณ มาออกกำลังกายหรือเล่นกีฬา (ตอบเพียงคำตอบเดียว)</p>
    <select class="form-select mb-3" id="motiOptions" onchange="showInputField('motiOptions','motiField','motiInput')">
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
        <input type="text" id="motiInput" class="form-control" required>
    </div>
</div>
<!-- end motivation form -->

<!-- exercise type form -->
<div class="form-control mb-3">
    <p>12. รายการตัวเลือก ประเภทการออกกำลังกายเพื่อสุขภาพ (ตอบได้มากกว่า 1 ข้อ) </p>
    <div class="row">
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เดิน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    วิ่ง
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    โยคะ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ฟุตซอล
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ปั่นจักรยาน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    กระโดยเชือก
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ฟุตบอล
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    แบดมินตัน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เต้นแอโรบิค
                </label>
            </div>
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    บาสเกตบอล
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เพาะกายและฟิตเนส
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เซปักตะกร้อ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เปตอง
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    รำมวยจีน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ว่ายน้ำ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ลีลาศ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    มวยไทย
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เทนนิส
                </label>
            </div>
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    กอล์ฟ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    ไทเก็ก
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    เทควันโด
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    สนุ๊กเกอร์
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault">
                <label class="form-check-label" for="flexRadioDefault">
                    มวยสากล
                </label>
            </div>

        </div>

    </div>
    <input type="text" class="form-control" id="textInput" placeholder="อื่น ๆ โปรดระบุ" require>
</div>
<!-- end exercise type form -->

<!-- pulse after exercise form -->
<div class="form-control mb-3">
    <p>ชีพจรหลังการออกกำลังกาย (หากท่านทราบข้อมูล)* </p>
    <input name="pulse" type="text" id="pulse" class="form-control">
</div>
<!-- end pulse after exercise form -->

<!-- days of exercise form -->
<div class="form-control mb-3">
    <p>จำนวนวันที่ออกกำลังกายต่อสัปดาห์ </p>
    <input name="pulse" type="number" id="pulse" class="form-control" required>
</div>
<!-- end days of exercise form -->

<!-- exercise intensity form -->
<div class="form-control mb-3">
    <p>ความหนักของการออกกำลังกาย</p>
    <input name="pulse" type="number" id="pulse" class="form-control" required>
</div>
<!-- end exercise intensity form -->

<!-- duration of exercise form -->
<div class="form-control mb-3">
    <p>ระยะเวลาการออกกำลังกาย</p>
    <input name="pulse" type="number" id="pulse" class="form-control" required>
</div>
<!-- end duration of exercise form -->