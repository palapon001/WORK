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
                                <input name="loc_agency" type="hidden" id="loc_agency" value="---">
                                <input name="business" type="hidden" id="business" value="---">

                                <!-- ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน -->
                                <input name="exper_sports" type="hidden" id="exper_sports" value="---">
                                <input name="res" type="hidden" id="res" value="---">
                                <input name="pub_res" type="hidden" id="pub_res" value="---">

                                <!-- ข้อมูลประสบการณ์การอบรม -->
                                <input name="train_exper_exer" type="hidden" id="train_exper_exer" value="---">
                                <input name="train_exper" type="hidden" id="train_exper" value="---" >

                                <!-- ข้อมูลประสบการณ์การเป็นอาสาสม้คร -->
                                <input name="vol_exper" type="hidden" value="---">

                                <!-- ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำล้งกายเพื่อสุขภาพ -->
                                <input name="org_heal" type="hidden" value="---">
                                <input name="pro_org_exer" type="hidden"  value="---">
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
                                <?php include 'form/FormQ4.php'; ?>
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
                                <?php include 'form/FormQ5.php'; ?>
                                <?php include 'form/FormQ6.php'; ?>
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
                                <?php include 'form/FormQ4.php'; ?>
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
                                <?php include 'form/FormQ5.php'; ?>
                                <?php include 'form/FormQ6.php'; ?>
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
                                <?php include 'form/FormQ4.php'; ?>
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
                                <?php include 'form/FormQ5.php'; ?>
                                <?php include 'form/FormQ6.php'; ?>
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
                                <?php include 'form/FormQ4.php'; ?>
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
                                <?php include 'form/FormQ5.php'; ?>
                                <?php include 'form/FormQ6.php'; ?>
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
                                <?php include 'form/FormQ4.php'; ?>
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
                                <?php include 'form/FormQ5.php'; ?>
                                <?php include 'form/FormQ6.php'; ?>
                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(2)">ก่อนหน้า</button>
                                <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
                            </div>
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
                                <?php include 'form/FormQ4.php'; ?>
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
                                <?php include 'form/FormQ5.php'; ?>
                                <?php include 'form/FormQ6.php'; ?>
                                <button type="button" class="btn btn-warning btn-lg" onclick="prevStep(2)">ก่อนหน้า</button>
                                <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
                            </div>
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