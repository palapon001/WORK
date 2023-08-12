<h1>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</h1>
<!-- exper_sports form -->
<div class="mb-3">
    <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพ</p>
    <div class="input-group ">
        <input name="exper_sports" type="text" id="exper_sports" class="form-control" required>
    </div>
</div>
<!-- end exper_sports form -->

<!-- res form -->
<?php if ($_SESSION["level"] == 'Trainers') { ?>
    <input name="res" type="hidden" id="res" value="---">
<?php } else { ?>
<div class="input-group mb-3">
    <span class="input-group-text">งานวิจัย
    </span>
    <input name="res" type="text" id="res" class="form-control" required>
</div>
<?php } ?>
<!-- end res form -->

<!-- pub_res form -->
<?php if ($_SESSION["level"] == 'Trainers') { ?>
    <input name="pub_res" type="hidden" id="pub_res" value="---" >
<?php } else { ?>
<div class="input-group mb-3">
    <span class="input-group-text">การเผยแพร่ผลงานวิจัย
    </span>
    <input name="pub_res" type="text" id="pub_res" class="form-control" required>
</div>
<?php } ?>
<!-- end pub_res form -->