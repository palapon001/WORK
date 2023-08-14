<?php switch ($_SESSION["level"]) {
    case "Trainers": ?>
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
        <input name="res" type="hidden" id="res" value="---">
        <!-- end res form -->

        <!-- pub_res form -->
        <input name="pub_res" type="hidden" id="pub_res" value="---">
        <!-- end pub_res form -->
        <?php break; ?>
    <?php
    default: ?>
        <?php include 'FormQ5Default.php'; ?>
<?php } ?>