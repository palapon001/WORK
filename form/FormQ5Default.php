<h1>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</h1>
<!-- exper_sports form -->
<div class="form-control mb-3">
    <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพ</p>
    <div class="input-group ">
        <input name="exper_sports_input" type="text" id="exper_sports_input" class="form-control" required>
    </div>

    <div class="form-group mb-3 mt-3" id="exper_sports_FormContainer">
        <a href="#" class="btn btn-primary mb-1" onclick="createInputForm('ชื่อสาขา','exper_sports','exper_sports_FormContainer');">เพิ่มข้อมูลสาขา</a>
    </div>
</div>
<!-- end exper_sports form -->

<!-- res form -->
<div class="form-control mb-3">
    <div class="input-group mb-3">
        <span class="input-group-text">งานวิจัย
        </span>
        <input name="resInput" type="text" id="resInput" class="form-control" required>
    </div>

    <div class="form-group mb-3" id="resFormContainer">
        <a href="#" class="btn btn-primary mb-1" onclick="createInputForm('งานวิจัย','res','resFormContainer');">เพิ่มข้อมูลงานวิจัย</a>
    </div>
</div>
<!-- end res form -->

<!-- pub_res form -->
<div class="form-control mb-3">
    <div class="input-group mb-3">
        <span class="input-group-text">การเผยแพร่ผลงานวิจัย
        </span>
        <input name="pub_res_input" type="text" id="pub_res_input" class="form-control" required>
    </div>

    <div class="form-group mb-3" id="pub_res_FormContainer">
        <a href="#" class="btn btn-primary mb-1" onclick="createInputForm('การเผยแพร่ผลงานวิจัย','pub_res','pub_res_FormContainer');">เพิ่มข้อมูลการเผยแพร่ผลงานวิจัย</a>
    </div>
</div>
        <!-- end pub_res form -->

        <script src="assets/js/createInputForm.js"></script>