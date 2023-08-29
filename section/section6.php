<!-- ======= train_exper Section ======= -->
<section id="train_exper" class="resume">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>ข้อมูลประสบการณ์การอบรม</h2>
        </div>

        <!-- train_exper_exer form -->
        <div class="form-control">
            <div class="form-control mb-3">
                <p>ประสบการณ์การอบรมทางด้านการออกกำลังกายเพื่อสุขภาพ</p>
                <div class="form-control overflow-auto" style="height: 10rem;">
                    <?php
                    $trainExperExerText = $fetch['train_exper_exer'];
                    $trainExperExerItems = displayCustomList($trainExperExerText);
                    displayCustomItems($trainExperExerItems);
                    ?>
                </div>
            </div>
            <!-- end train_exper_exer form -->

            <!-- train_exper -->
            <div class="form-control mb-3">
                <p>ประสบการณ์การอบรมในสาขาความเชี่ยวชาญ</p>
                <div class="form-control overflow-auto" style="height: 10rem;">
                    <?php
                    $trainExperText = $fetch['train_exper'];
                    $trainExperItems = displayCustomList($trainExperText);
                    displayCustomItems($trainExperItems);
                    ?>
                </div>
            </div>
            <!-- end train_exper form -->

        </div>
</section><!-- End train_exper Section -->