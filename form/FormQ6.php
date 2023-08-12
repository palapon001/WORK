<h1>ข้อมูลประสบการณ์การอบรม</h1>
<!-- train_exper_exer form -->
<div class="mb-3">
    <p>ประสบการณ์การอบรมทางด้านการออกกำลังกายเพื่อสุขภาพ</p>
    <div class="input-group ">
        <input name="train_exper_exer" type="text" id="train_exper_exer" class="form-control" required>
    </div>
</div>
<!-- end train_exper_exer form -->

<!-- train_exper -->
<?php if ($_SESSION["level"] == 'Trainers') { ?>
    <input name="train_exper" type="hidden" id="train_exper" value="---" >
<?php } else { ?>
<div class="mb-3">
    <p>ประสบการณ์การอบรมในสาขาความเชี่ยวชาญ</p>
    <div class="input-group">
        <input name="train_exper" type="text" id="train_exper" class="form-control" required>
    </div>
</div>
<?php } ?>
<!-- end train_exper form -->