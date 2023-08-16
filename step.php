<!DOCTYPE html>
<html>

<head>
    <title>Form Stepper</title>
    <style>
        .step {
            display: none;
        }

        .step.active {
            display: block;
        }
    </style>
    <?php include 'tag_head.php'; ?>
</head>

<body>
    <?php switch ($_SESSION["level"]) {
        case "Interested-Individual": ?>
            <!-- case Interested-Individual form -->
            <form name="formQ" method="post" action="check_question.php">
                <div class="step active" id="step1">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ1.php'; ?>
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(2)">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" id="step2">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ2.php'; ?>
                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(1)">ก่อนหน้า</button>
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(3)">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" id="step3">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ3.php'; ?>
                                <!-- ข้อมูลหน่วยงาน -->
                                <input name="agency_name1" type="hidden" id="agency_name1" value="---">
                                <input name="agency_name2" type="hidden" id="agency_name2" value="---">
                                <input name="community" type="hidden" id="community" value="---">
                                <input name="loc_community" type="hidden" id="loc_community" value="---">
                                <input name="loc_agency" type="hidden" id="loc_agency" value="---">
                                <input name="business" type="hidden" id="business" value="---">

                                <!-- ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน -->
                                <input name="exper_sports[]" type="hidden" id="exper_sports" value="---">
                                <input name="exper_sports_input" type="hidden" id="exper_sports" value="---">
                                <input name="res[]" type="hidden" id="res" value="---">
                                <input name="resInput" type="hidden" id="res" value="---">
                                <input name="pub_res[]" type="hidden" id="pub_res" value="---">
                                <input name="pub_res_input" type="hidden" id="pub_res" value="---">

                                <!-- ข้อมูลประสบการณ์การอบรม -->
                                <input name="train_exper_exer" type="hidden" id="train_exper_exer" value="---">
                                <input name="train_exper" type="hidden" id="train_exper" value="---">

                                <!-- ข้อมูลประสบการณ์การเป็นอาสาสม้คร -->
                                <input name="vol_exper" type="hidden" value="---">

                                <!-- ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำล้งกายเพื่อสุขภาพ -->
                                <input name="org_heal" type="hidden" value="---">
                                <input name="pro_org_exer" type="hidden" value="---">
                                <input name="activity" type="hidden" value="---">

                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(2)">ก่อนหน้า</button>
                                <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php break; ?>
            <!-- end case Interested-Individual form -->
        <?php
        case "Trainers": ?>
            <!-- case Trainers form -->
            <form name="formQ" method="post" action="check_question.php">
                <div class="step active" id="step1">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ1.php'; ?>
                                <?php include 'form/FormQ2.php'; ?>
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(2)">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" id="step2">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ3.php'; ?>
                                <?php include 'form/FormQ4Switch.php'; ?>
                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(1)">ก่อนหน้า</button>
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(3)">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" id="step3">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ5Switch.php'; ?>
                                <?php include 'form/FormQ6.php'; ?>

                                <!-- ข้อมูลประสบการณ์การเป็นอาสาสม้คร -->
                                <input name="vol_exper" type="hidden" value="---">

                                <!-- ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำล้งกายเพื่อสุขภาพ -->
                                <input name="org_heal" type="hidden" value="---">
                                <input name="pro_org_exer" type="hidden" value="---">
                                <input name="activity" type="hidden" value="---">

                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(2)">ก่อนหน้า</button>
                                <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php break; ?>
            <!-- end case Trainers form -->
        <?php
        case "Sport-professionals": ?>
            <!-- case Sport-professionals form -->
            <form name="formQ" method="post" action="check_question.php">
                <div class="step active" id="step1">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ1.php'; ?>
                                <?php include 'form/FormQ2.php'; ?>
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(2)">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" id="step2">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ3.php'; ?>
                                <?php include 'form/FormQ4Switch.php'; ?>
                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(1)">ก่อนหน้า</button>
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(3)">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" id="step3">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ5Switch.php'; ?>
                                <?php include 'form/FormQ6.php'; ?>
                                <!-- ข้อมูลประสบการณ์การเป็นอาสาสม้คร -->
                                <input name="vol_exper" type="hidden" value="---">

                                <!-- ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำล้งกายเพื่อสุขภาพ -->
                                <input name="org_heal" type="hidden" value="---">
                                <input name="pro_org_exer" type="hidden" value="---">
                                <input name="activity" type="hidden" value="---">

                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(2)">ก่อนหน้า</button>
                                <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php break; ?>
            <!-- end case Sport-professionals form -->
        <?php
        case "Volunteer": ?>
            <!-- case Volunteer form -->
            <form name="formQ" method="post" action="check_question.php">
                <div class="step active" id="step1">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ1.php'; ?>
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(2)">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" id="step2">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ2.php'; ?>
                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(1)">ก่อนหน้า</button>
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(3)">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" id="step3">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ3.php'; ?>
                                <?php include 'form/FormQ7.php'; ?>
                                <!-- ข้อมูลหน่วยงาน -->
                                <input name="agency_name1" type="hidden" id="agency_name1" value="---">
                                <input name="agency_name2" type="hidden" id="agency_name2" value="---">
                                <input name="community" type="hidden" id="community" value="---">
                                <input name="loc_community" type="hidden" id="loc_community" value="---">
                                <input name="loc_agency" type="hidden" id="loc_agency" value="---">
                                <input name="business" type="hidden" id="business" value="---">

                                <!-- ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน -->
                                <input name="exper_sports" type="hidden" id="exper_sports" value="---">
                                <input name="res" type="hidden" id="res" value="---">
                                <input name="pub_res" type="hidden" id="pub_res" value="---">

                                <!-- ข้อมูลประสบการณ์การอบรม -->
                                <input name="train_exper_exer" type="hidden" id="train_exper_exer" value="---">
                                <input name="train_exper" type="hidden" id="train_exper" value="---">

                                <!-- ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำล้งกายเพื่อสุขภาพ -->
                                <input name="org_heal" type="hidden" value="---">
                                <input name="pro_org_exer" type="hidden" value="---">
                                <input name="activity" type="hidden" value="---">

                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(2)">ก่อนหน้า</button>
                                <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php break; ?>
            <!-- end case Volunteer form -->
        <?php
        case "Personnel/Support-Staff": ?>
            <!-- case Personnel/Support Staff form -->
            <form name="formQ" method="post" action="check_question.php">
                <div class="step active" id="step1">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ1.php'; ?>
                                <?php include 'form/FormQ2.php'; ?>
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(2)">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" id="step2">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ3.php'; ?>
                                <?php include 'form/FormQ4Switch.php'; ?>
                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(1)">ก่อนหน้า</button>
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(3)">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" id="step3">
                    <div class="container mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php include 'form/FormQ8.php'; ?>

                                <!-- ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน -->
                                <input name="exper_sports" type="hidden" id="exper_sports" value="---">
                                <input name="res" type="hidden" id="res" value="---">
                                <input name="pub_res" type="hidden" id="pub_res" value="---">

                                <!-- ข้อมูลประสบการณ์การอบรม -->
                                <input name="train_exper_exer" type="hidden" id="train_exper_exer" value="---">
                                <input name="train_exper" type="hidden" id="train_exper" value="---">

                                <!-- ข้อมูลประสบการณ์การเป็นอาสาสม้คร -->
                                <input name="vol_exper" type="hidden" value="---">


                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(2)">ก่อนหน้า</button>
                                <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php break; ?>
            <!-- end case Personnel/Support Staff form -->
        <?php
        case "Suppliers/Partners": ?>
            <!-- case Suppliers/Partners form -->
            <form name="formQ" method="post" action="check_question.php">
                <div class="container mt-3">
                    <div class="card">
                        <div class="card-body">
                            <?php include 'form/FormQ4Switch.php'; ?>
                            <?php include 'form/FormQ8.php'; ?>

                            <!-- ข้อมูลส่วนตัว -->
                            <input type="hidden" name="user" value="<?php echo $_SESSION["username"]; ?>">
                            <input type="hidden" name="name" value="<?php echo $_SESSION["name"]; ?>">
                            <input type="hidden" name="surname" value="<?php echo $_SESSION["surname"]; ?>">
                            <input type="hidden" name="sex" value="---">
                            <input type="hidden" name="province_id" value="---">
                            <input type="hidden" name="amphure_id" value="---">
                            <input type="hidden" name="age" value="---">
                            <input type="hidden" name="eduOptions" value="---">
                            <input type="hidden" name="occOptions" value="---">
                            <input type="hidden" name="maryOptions" value="---">
                            <input type="hidden" name="nationOptions" value="---">
                            <input type="hidden" name="eduInput" value="---">
                            <input type="hidden" name="occInput" value="---">
                            <input type="hidden" name="maryInput" value="---">
                            <input type="hidden" name="nationInput" value="---">

                            <!-- ข้อมูลสุขภาพ -->
                            <input type="hidden" name="height" value="---">
                            <input type="hidden" name="weight" value="---">
                            <input type="hidden" name="pressure" value="---">
                            <input type="hidden" name="pulse" value="---">
                            <input type="hidden" name="congenOptions" value="---">
                            <input type="hidden" name="congenInput" value="---">

                            <!-- ข้อมูลการออกกำลังกาย -->
                            <input type="hidden" name="locationInput" value="---">
                            <input type="hidden" name="selected_hours[]" value="---">
                            <input type="hidden" name="reason1Input" value="--">
                            <input type="hidden" name="reason2Input" value="---">
                            <input type="hidden" name="motiOptions" value="---">
                            <input type="hidden" name="motiInput" value="---">
                            <input type="hidden" name="exerInput" value="---">
                            <input type="hidden" name="pulseAfter" value="---">
                            <input type="hidden" name="week" value="---">
                            <input type="hidden" name="intensityOptions" value="---">
                            <input type="hidden" name="duration" value="---">

                            <!-- ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน -->
                            <input name="exper_sports" type="hidden" value="---">
                            <input name="res" type="hidden" value="---">
                            <input name="pub_res" type="hidden" value="---">

                            <!-- ข้อมูลประสบการณ์การอบรม -->
                            <input name="train_exper_exer" type="hidden" value="---">
                            <input name="train_exper" type="hidden" value="---">

                            <!-- ข้อมูลประสบการณ์การเป็นอาสาสม้คร -->
                            <input name="vol_exper" type="hidden" value="---">

                            <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php break; ?>
            <!-- end case Suppliers/Partners form -->
        <?php
        case "Community": ?>
            <!-- case Community form -->
            <form name="formQ" method="post" action="check_question.php">
                <div class="container mt-3">
                    <div class="card">
                        <div class="card-body">
                            <?php include 'form/FormQ4Switch.php'; ?>
                            <?php include 'form/FormQ8.php'; ?>

                            <!-- ข้อมูลส่วนตัว -->
                            <input type="hidden" name="user" value="<?php echo $_SESSION["username"]; ?>">
                            <input type="hidden" name="name" value="<?php echo $_SESSION["name"]; ?>">
                            <input type="hidden" name="surname" value="<?php echo $_SESSION["surname"]; ?>">
                            <input type="hidden" name="sex" value="---">
                            <input type="hidden" name="province_id" value="---">
                            <input type="hidden" name="amphure_id" value="---">
                            <input type="hidden" name="age" value="---">
                            <input type="hidden" name="eduOptions" value="---">
                            <input type="hidden" name="occOptions" value="---">
                            <input type="hidden" name="maryOptions" value="---">
                            <input type="hidden" name="nationOptions" value="---">
                            <input type="hidden" name="eduInput" value="---">
                            <input type="hidden" name="occInput" value="---">
                            <input type="hidden" name="maryInput" value="---">
                            <input type="hidden" name="nationInput" value="---">

                            <!-- ข้อมูลสุขภาพ -->
                            <input type="hidden" name="height" value="---">
                            <input type="hidden" name="weight" value="---">
                            <input type="hidden" name="pressure" value="---">
                            <input type="hidden" name="pulse" value="---">
                            <input type="hidden" name="congenOptions" value="---">
                            <input type="hidden" name="congenInput" value="---">

                            <!-- ข้อมูลการออกกำลังกาย -->
                            <input type="hidden" name="locationInput" value="---">
                            <input type="hidden" name="selected_hours[]" value="---">
                            <input type="hidden" name="reason1Input" value="--">
                            <input type="hidden" name="reason2Input" value="---">
                            <input type="hidden" name="motiOptions" value="---">
                            <input type="hidden" name="motiInput" value="---">
                            <input type="hidden" name="exerInput" value="---">
                            <input type="hidden" name="pulseAfter" value="---">
                            <input type="hidden" name="week" value="---">
                            <input type="hidden" name="intensityOptions" value="---">
                            <input type="hidden" name="duration" value="---">


                            <!-- ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน -->
                            <input name="exper_sports" type="hidden" value="---">
                            <input name="res" type="hidden" value="---">
                            <input name="pub_res" type="hidden" value="---">

                            <!-- ข้อมูลประสบการณ์การอบรม -->
                            <input name="train_exper_exer" type="hidden" value="---">
                            <input name="train_exper" type="hidden" value="---">

                            <!-- ข้อมูลประสบการณ์การเป็นอาสาสม้คร -->
                            <input name="vol_exper" type="hidden" value="---">

                            <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php break; ?>
            <!-- end case Community form -->
    <?php } ?>

    <script src="assets/js/showInputField.js"></script>
    <script src="assets/js/stepperForm.js"></script>



</body>

</html>