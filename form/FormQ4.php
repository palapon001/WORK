<h1>ข้อมูลหน่วยงาน</h1>
<!-- agency_name1 form -->
<div class="input-group mb-3">
    <span class="input-group-text">ชื่อหน่วยงาน
    </span>
    <input name="agency_name1" type="text" id="agency_name1" class="form-control" required>
</div>
<!-- end agency_name form -->

<!-- agency_name2 form -->
<div class="input-group mb-3">
    <span class="input-group-text">ชื่อหน่วยงานต้นสังกัด
    </span>
    <input name="agency_name2" type="text" id="agency_name2" class="form-control" required>
</div>
<!-- end agency_name2 form -->

<!-- community form -->
<?php if ($_SESSION["level"] == 'Trainers') { ?>
    <input name="community" type="hidden" id="community" value="---">
<?php } else { ?>
    <div class="input-group mb-3">
        <span class="input-group-text">ชื่อชุมชน (ถ้ามี)
        </span>
        <input name="community" type="text" id="community" class="form-control">
    </div>
<?php } ?>
<!-- end community form -->

<!-- loc_agency form -->
<div class="input-group mb-3">
    <span class="input-group-text">ที่ตั้งของหน่วยงาน
    </span>
    <input name="loc_agency" type="text" id="loc_agency" class="form-control" required>
</div>
<!-- end loc_agency form -->

<!-- business form -->
<?php if ($_SESSION["level"] == 'Trainers') { ?>
    <input name="business" type="hidden" id="business" value="---">
<?php } else { ?>

    <div class="mb-3">
        <p>บริบทการดำเนินธุรกิจ (สำหรับองค์กรธุรกิจ)</p>
        <div class="input-group ">
            <input name="business" type="text" id="business" class="form-control">
        </div>
    </div>
<?php } ?>
<!-- end business form -->