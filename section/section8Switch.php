<?php switch ($_SESSION["level"]) {
    case "Suppliers/Partners": ?>

        <section id="Info_exper" class="resume">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</h2>
                </div>


                <div class=" mb-3">
                    <p>ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ</p>
                    <div class="input-group ">
                        <input name="org_heal" type="text" id="org_heal" class="form-control" value="<?php echo $fetch['org_heal']; ?>" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพของ Suppliers/Partners แยกตามกิจกรรม </p>
                    <div class="input-group ">
                        <input name="activity" type="text" id="activity" class="form-control" value="---" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ</p>
                    <div class="input-group ">
                        <input name="pro_org_exer" type="text" id="pro_org_exer" class="form-control" value="<?php echo $fetch['pro_org_exer']; ?>" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ แยกตาม Suppliers/Partners </p>
                    <div class="input-group ">
                        <input name="activity" type="text" id="activity" class="form-control" value="---" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม </p>
                    <div class="input-group ">
                        <input name="activity" type="text" id="activity" class="form-control" value="<?php echo $fetch['activity']; ?>" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ แยกตาม Suppliers/Partners </p>
                    <div class="input-group ">
                        <input name="activity" type="text" id="activity" class="form-control" value="---" disabled>
                    </div>
                </div>


            </div>
        </section>

        <?php break; ?>
    <?php
    case "Community": ?>
        <section id="Info_exper" class="resume">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</h2>
                </div>


                <div class=" mb-3">
                    <p>ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ</p>
                    <div class="input-group ">
                        <input name="org_heal" type="text" id="org_heal" class="form-control" value="<?php echo $fetch['org_heal']; ?>" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพของ Community แยกตามจังหวัด</p>
                    <div class="input-group ">
                        <input name="activity" type="text" id="activity" class="form-control" value="---" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ</p>
                    <div class="input-group ">
                        <input name="pro_org_exer" type="text" id="pro_org_exer" class="form-control" value="<?php echo $fetch['pro_org_exer']; ?>" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ แยกตาม Community </p>
                    <div class="input-group ">
                        <input name="activity" type="text" id="activity" class="form-control" value="---" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม </p>
                    <div class="input-group ">
                        <input name="activity" type="text" id="activity" class="form-control" value="<?php echo $fetch['activity']; ?>" disabled>
                    </div>
                </div>

                <div class=" mb-3">
                    <p>กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม แยกตาม Community	 </p>
                    <div class="input-group ">
                        <input name="activity" type="text" id="activity" class="form-control" value="---" disabled>
                    </div>
                </div>


            </div>
        </section>
        <?php break; ?>
    <?php
    default: ?>
        <?php include 'section8.php'; ?>
<?php } ?>