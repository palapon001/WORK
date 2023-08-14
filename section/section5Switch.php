<?php switch ($_SESSION["level"]) {
    case "Trainers": ?>

        <section id="exper_info" class="resume">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</h2>
                </div>

                <div class="mb-3">
                    <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพ</p>
                    <div class="input-group ">
                        <input name="exper_sports" type="text" id="exper_sports" class="form-control" value="<?php echo $fetch['exper_sports']; ?>" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพของผู้ฝึกสอนทั้งหมด </p>
                    <input name="res" type="text" class="form-control" value="---" disabled>
                </div>

                <div class=" mb-3">
                    <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพของผู้ฝึกสอนทั้งหมด แยกตามจังหวัด </p>
                    <input name="pub_res" type="text" class="form-control" value="---" disabled>
                </div>

            </div>
        </section>

        <?php break; ?>
    <?php
    default: ?>
        <?php include 'section5.php'; ?>
<?php } ?>