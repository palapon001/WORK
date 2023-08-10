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
    <form id="stepperForm">
        <div class="step active" id="step1">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <?php include 'FormQ1.php'; ?>
                        <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(2)">ถัดไป</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="step" id="step2">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <?php include 'FormQ2.php'; ?>
                        <button type="button" class="btn btn-primary btn-lg" onclick="prevStep(1)">ก่อนหน้า</button>
                        <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(3)">ถัดไป</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="step" id="step3">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                    <?php include 'FormQ3.php'; ?>
                        <button type="button" class="btn btn-primary btn-lg" onclick="prevStep(2)">ก่อนหน้า</button>
                        <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        let currentStep = 1;
        const form = document.getElementById('stepperForm');
        const steps = document.querySelectorAll('.step');

        function showStep(stepNumber) {
            steps.forEach(step => step.classList.remove('active'));
            steps[stepNumber - 1].classList.add('active');
            currentStep = stepNumber;
        }

        function nextStep(nextStepNumber) {
            if (nextStepNumber > currentStep && nextStepNumber <= steps.length) {
                showStep(nextStepNumber);
            }
        }

        function prevStep(prevStepNumber) {
            if (prevStepNumber < currentStep && prevStepNumber >= 1) {
                showStep(prevStepNumber);
            }
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Form submitted!');
        });

        showStep(currentStep);
    </script>
</body>

</html>