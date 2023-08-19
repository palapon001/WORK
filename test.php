<h1>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</h1>
<!-- exper_sports form -->
<div class="form-control mb-3">
    <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพ</p>
    <div class="input-group">
        <input name="exper_sports_input" type="text" id="exper_sports_input" class="form-control" required>
    </div>
    <div class="form-group mb-3 mt-3" id="exper_sports_FormContainer">
        <button type="button" class="btn btn-primary mb-1" id="add_exper_sports_input" onclick="createInputForm('ชื่อสาขา','exper_sports','exper_sports_FormContainer');" disabled>เพิ่มข้อมูลสาขา</button>
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-exper_sports_input" style="display: none;">
        กรุณากรอกสาขาความเชี่ยวชาญ
    </div>
</div>
<!-- end exper_sports form -->

<!-- res form -->
<div class="form-control mb-3">
    <div class="input-group mb-3">
        <span class="input-group-text">งานวิจัย</span>
        <input name="resInput" type="text" id="resInput" class="form-control" required>
    </div>
    <div class="form-group mb-3" id="resFormContainer">
        <button type="button" class="btn btn-primary mb-1" id="add_resInput" onclick="createInputForm('งานวิจัย','res','resFormContainer');" disabled>เพิ่มข้อมูลงานวิจัย</button>
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-resInput" style="display: none;">
        กรุณากรอกงานวิจัย
    </div>
</div>
<!-- end res form -->

<!-- pub_res form -->
<div class="form-control mb-3">
    <div class="input-group mb-3">
        <span class="input-group-text">การเผยแพร่ผลงานวิจัย</span>
        <input name="pub_res_input" type="text" id="pub_res_input" class="form-control" required>
    </div>
    <div class="form-group mb-3" id="pub_res_FormContainer">
        <button type="button" class="btn btn-primary mb-1" id="add_pub_resInput" onclick="createInputForm('การเผยแพร่ผลงานวิจัย','pub_res','pub_res_FormContainer');" disabled>เพิ่มข้อมูลการเผยแพร่ผลงานวิจัย</button>
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-pub_res_input" style="display: none;">
        กรุณากรอกการเผยแพร่ผลงานวิจัย
    </div>
</div>
<!-- end pub_res form -->

<script>
    // Function to create input form
    function createInputForm(labelText, inputId, formContainerId) {
        const inputValue = document.getElementById(inputId).value;
        const formContainer = document.getElementById(formContainerId);

        if (inputValue.trim() === "") {
            // Show error message
            const emptyAlert = document.querySelector(`#emptyAlert-${inputId}`);
            emptyAlert.style.display = "block";

            // Disable the button
            toggleButtonState(inputId, true);

            return;
        }

        // Create a new input field
        const newInput = document.createElement("input");
        newInput.type = "text";
        newInput.value = inputValue;
        newInput.readOnly = true; // Make it read-only
        newInput.classList.add("form-control", "mb-2");

        // Append the input field to the form container
        formContainer.appendChild(newInput);

        // Clear the input field
        document.getElementById(inputId).value = "";

        // Hide the error message
        const emptyAlert = document.querySelector(`#emptyAlert-${inputId}`);
        emptyAlert.style.display = "none";

        // Enable the button
        toggleButtonState(inputId, false);
    }

    // Enable/disable buttons
    function toggleButtonState(buttonId, disable) {
        const button = document.getElementById(buttonId`#add_${buttonId}`);
        button.disabled = disable;
    }
</script>