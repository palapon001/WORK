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