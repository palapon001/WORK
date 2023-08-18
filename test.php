<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<h1>ข้อมูลหน่วยงาน</h1>
<div class="input-group mb-3">
    <span class="input-group-text">ชื่อหน่วยงาน</span>
    <input name="agency_name1" type="text" class="form-control" placeholder="กรอกชื่อหน่วยงาน" required="1" value="">
</div>
<div class="alert alert-danger mb-3" id="emptyAlert-agency_name1" style="display: none;">
    กรุณากรอกชื่อหน่วยงาน
</div>
<div class="input-group mb-3">
    <span class="input-group-text">ชื่อหน่วยงานต้นสังกัด</span>
    <input name="agency_name2" type="text" class="form-control" placeholder="กรอกชื่อหน่วยงานต้นสังกัด" required="1" value="">
</div>
<div class="alert alert-danger mb-3" id="emptyAlert-agency_name2" style="display: none;">
    กรุณากรอกชื่อหน่วยงานต้นสังกัด
</div>
<div class="input-group mb-3">
    <span class="input-group-text">ชื่อชุมชน (ถ้ามี)</span>
    <input name="community" type="text" class="form-control" placeholder="" required="" value="">
</div>
<div class="alert alert-danger mb-3" id="emptyAlert-community" style="display: none;">
    กรุณากรอกชื่อชุมชน (ถ้ามี)
</div>
<input name="loc_community" type="hidden" value="---">
<div class="input-group mb-3">
    <span class="input-group-text">ที่ตั้งของหน่วยงาน</span>
    <input name="loc_agency" type="text" class="form-control" placeholder="กรอกที่ตั้งของหน่วยงาน" required="1" value="">
</div>
<div class="alert alert-danger mb-3" id="emptyAlert-loc_agency" style="display: none;">
    กรุณากรอกที่ตั้งของหน่วยงาน
</div>
<div class="mb-3">
    <p>บริบทการดำเนินธุรกิจ (สำหรับองค์กรธุรกิจ)</p>
    <div class="input-group mb-3">
        <span class="input-group-text"></span>
        <input name="business" type="text" class="form-control" placeholder="กรอกบริบทการดำเนินธุรกิจ" required="" value="">
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-business" style="display: none;">
        กรุณากรอกบริบทการดำเนินธุรกิจ
    </div>
</div>

<div class="mb-3">
    <p>$label</p>
    <div class="input-group ">
        <input name="business" type="text" id="business" class="form-control" required>
    </div>
    <div class="alert alert-danger mb-3" id="emptyAlert-business" style="display: none;">
        กรุณากรอกบริบทการดำเนินธุรกิจ
    </div>
</div>

<script>
    $(document).ready(function() {
        const inputIds = [
            "agency_name1", "agency_name2", "community", "loc_agency", "business"
        ];

        const nextButton = $("#next2");

        inputIds.forEach(id => $(`[name="${id}"]`).on("input change", checkAndUpdate));

        function checkAndUpdate() {
            const isDisabled = inputIds.some(id => $(`[name="${id}"]`).val().trim() === "");

            nextButton.prop('disabled', isDisabled);

            inputIds.forEach(id => toggleAlert(`#emptyAlert-${id}`, $(`[name="${id}"]`).val().trim() === ""));
        }

        function toggleAlert(alertId, show) {
            if (show) {
                $(alertId).show();
            } else {
                $(alertId).hide();
            }
        }

        // Initial update to set the initial state
        checkAndUpdate();
    });
</script>
