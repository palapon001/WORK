<?php switch ($_SESSION["level"]) {
    case "Trainers": ?>
        <!-- case Trainers form -->
        <h1>ข้อมูลหน่วยงาน</h1>
        <!-- agency_name1 form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ชื่อหน่วยงาน
            </span>
            <input name="agency_name1" type="text" id="agency_name1" class="form-control" required>
        </div>
        <!-- end agency_name form -->

        <!-- agency_name2 form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ชื่อหน่วยงานต้นสังกัด
            </span>
            <input name="agency_name2" type="text" id="agency_name2" class="form-control" required>
        </div>
        <!-- end agency_name2 form -->

        <!-- community form -->
        <input name="community" type="hidden" id="community" value="---">
        <!-- end community form -->

        <!-- loc_community form -->
        <input name="loc_community" type="hidden" id="loc_community" value="---">
        <!-- end loc_community form -->

        <!-- loc_agency form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ที่ตั้งของหน่วยงาน
            </span>
            <input name="loc_agency" type="text" id="loc_agency" class="form-control" required>
        </div>
        <!-- end loc_agency form -->

        <!-- business form -->
        <input name="business" type="hidden" id="business" value="---">
        <!-- end business form -->

        <?php break; ?>
        <!-- end case Sport-professionals form -->
    <?php
    case "Sport-professionals": ?>
        <!-- case Sport-professionals form -->
        <h1>ข้อมูลหน่วยงาน</h1>
        <!-- agency_name1 form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ชื่อหน่วยงาน
            </span>
            <input name="agency_name1" type="text" id="agency_name1" class="form-control" required>
        </div>
        <!-- end agency_name form -->

        <!-- agency_name2 form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ชื่อหน่วยงานต้นสังกัด
            </span>
            <input name="agency_name2" type="text" id="agency_name2" class="form-control" required>
        </div>
        <!-- end agency_name2 form -->

        <!-- community form -->
        <input name="community" type="hidden" id="community" value="---">
        <!-- end community form -->

        <!-- loc_community form -->
        <input name="loc_community" type="hidden" id="loc_community" value="---">
        <!-- end loc_community form -->

        <!-- loc_agency form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ที่ตั้งของหน่วยงาน
            </span>
            <input name="loc_agency" type="text" id="loc_agency" class="form-control" required>
        </div>
        <!-- end loc_agency form -->

        <!-- business form -->
        <input name="business" type="hidden" id="business" value="---">
        <!-- end business form -->

        <?php break; ?>
        <!-- end case Sport-professionals form -->
    <?php
    case "Suppliers/Partners": ?>
        <!-- case Suppliers/Partners form -->
        <h1>ข้อมูลหน่วยงาน</h1>
        <!-- agency_name1 form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ชื่อหน่วยงาน
            </span>
            <input name="agency_name1" type="text" id="agency_name1" class="form-control" required>
        </div>
        <!-- end agency_name form -->

        <!-- agency_name2 form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ชื่อหน่วยงานต้นสังกัด
            </span>
            <input name="agency_name2" type="text" id="agency_name2" class="form-control" required>
        </div>
        <!-- end agency_name2 form -->

        <!-- community form -->
        <input name="community" type="hidden" id="community" value="---">
        <!-- end community form -->

        <!-- loc_community form -->
        <input name="loc_community" type="hidden" id="loc_community" value="---">
        <!-- end loc_community form -->

        <!-- loc_agency form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ที่ตั้งของหน่วยงาน
            </span>
            <input name="loc_agency" type="text" id="loc_agency" class="form-control" required>
        </div>
        <!-- end loc_agency form -->

        <!-- business form -->

        <div class="mb-3">
            <p>บริบทการดำเนินธุรกิจ (สำหรับองค์กรธุรกิจ)</p>
            <div class="input-group ">
                <input name="business" type="text" id="business" class="form-control">
            </div>
        </div>
        <!-- end business form -->
        <?php break; ?>
        <!-- end case Suppliers/Partners form -->
    <?php
    case "Community": ?>
        <!-- case Community form -->
        <h1>ข้อมูลหน่วยงาน</h1>
        <!-- community form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ชื่อชุมชน
            </span>
            <input name="community" type="text" id="community" class="form-control" required>
        </div>
        <!-- end community form -->

        <!-- loc_community form -->
        <div class="input-group mb-3">
            <span class="input-group-text">ที่ตั้งของชุมชน
            </span>
            <input name="loc_community" type="text" id="loc_community" class="form-control" required>
        </div>
        <!-- end loc_community form -->

        <input name="agency_name1" type="hidden" id="agency_name1" value="---">
        <input name="agency_name2" type="hidden" id="agency_name2" value="---">
        <input name="loc_agency" type="hidden" id="loc_agency" value="---">
        <input name="business" type="hidden" id="business" value="---">

        <?php break; ?>
        <!-- end case Community form -->
    <?php
    default: ?>
        <?php include 'FormQ4Default.php'; ?>
<?php } ?>