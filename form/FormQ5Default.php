<h1>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</h1>
<!-- exper_sports form -->
<div class="form-control mb-3">
    <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพ</p>
    <div class="input-group">
        <input name="exper_sports_input" type="text" id="exper_sports_input" class="form-control" value="<?php echo $defaultValueExper_sports ; ?>" required>
    </div>
    <button type="button" class="btn btn-primary mt-3" id="add-exper_sports_input" onclick="createInputForm('ชื่อสาขา','exper_sports','formContainer-exper_sports_input');" disabled>เพิ่มข้อมูลสาขา</button>
    <div class="form-group mt-3" id="formContainer-exper_sports_input">
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-exper_sports_input" style="display: none;">
        กรุณากรอกสาขาความเชี่ยวชาญ
    </div>
</div>
<!-- end exper_sports form -->

<!-- res form -->
<div class="form-control mb-3">
    <div class="input-group">
        <span class="input-group-text">งานวิจัย</span> 
        <input name="resInput" type="text" id="resInput" class="form-control" value="<?php echo $defaultValueRes ; ?>" required>
    </div>
    <button type="button" class="btn btn-primary mt-3" id="add-resInput" onclick="createInputForm('งานวิจัย','res','formContainer-resInput');" disabled>เพิ่มข้อมูลงานวิจัย</button>
    <div class="form-group mt-3" id="formContainer-resInput">
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-resInput" style="display: none;">
        กรุณากรอกงานวิจัย
    </div>
</div>
<!-- end res form -->

<!-- pub_res form -->
<div class="form-control mb-3">
    <div class="input-group">
        <span class="input-group-text">การเผยแพร่ผลงานวิจัย</span>
        <input name="pub_res_input" type="text" id="pub_res_input" class="form-control" value="<?php echo $defaultValuePub_res ; ?>" required>
    </div>
    <button type="button" class="btn btn-primary mt-3" id="add-pub_res_input" onclick="createInputForm('การเผยแพร่ผลงานวิจัย','pub_res','formContainer-pub_res_input');" disabled>เพิ่มข้อมูลการเผยแพร่ผลงานวิจัย</button>
    <div class="form-group mt-3" id="formContainer-pub_res_input">
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-pub_res_input" style="display: none;">
        กรุณากรอกการเผยแพร่ผลงานวิจัย
    </div>
</div>
<!-- end pub_res form -->