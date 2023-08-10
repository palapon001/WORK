<h1>ข้อมูลสุขภาพ</h1>
<!-- height form -->
<div class="input-group mb-3">
    <span class="input-group-text">ส่วนสูง</span>
    <input name="height" type="text" id="height" class="form-control" required>
</div>
<!-- end height form -->

<!-- weight form -->
<div class="input-group mb-3">
    <span class="input-group-text">น้ำหนัก</span>
    <input name="weight" type="text" id="weight" class="form-control" required>
</div>
<!-- end weight form -->

<!-- pressure form -->
<div class="input-group mb-3">
    <span class="input-group-text">ความดัน</span>
    <input name="pressure" type="text" id="pressure" class="form-control" required>
</div>
<!-- end pressure form -->

<!-- pulse form -->
<div class="input-group mb-3">
    <span class="input-group-text">ชีพจร (ครั้ง/นาที)
    </span>
    <input name="pulse" type="text" id="pulse" class="form-control" required>
</div>
<!-- end pulse form -->

<!-- congenital disease form -->
<div class="form-control mb-3">
    <p>โรคประจำตัว</p>
    <select class="form-select mb-3" id="selectInput">
        <option selected>โปรดเลือก</option>
        <option value="มี">มี</option>
        <option value="ไม่มี">ไม่มี</option>
    </select>
    <input type="text" class="form-control" id="textInput" placeholder="อื่น ๆ โปรดระบุ" require>
</div>
<!-- end congenital disease form -->