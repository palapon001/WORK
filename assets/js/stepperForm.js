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



showStep(currentStep);