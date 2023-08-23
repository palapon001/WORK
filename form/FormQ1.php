<h1>ข้อมูลส่วนตัว</h1>
<!-- name surname form -->
<div>
  <div class="input-group mb-3">
    <input type="hidden" name="user" value="<?php echo $_SESSION["username"]; ?>">
    <input type="hidden" name="level" value="<?php echo $_SESSION["level"]; ?>">
    <span class="input-group-text">ชื่อ </span>
    <input name="name" type="text" id="name" value="<?php echo $_SESSION["name"]; ?>" class="form-control" required>
    <span class="input-group-text">นามสกุล</span>
    <input name="surname" type="text" id="surname" value="<?php echo $_SESSION["surname"]; ?>" class="form-control" required>
  </div>
  <div class="alert alert-danger mb-3" style="display: none;" id="emptyAlert-name-surname">
    กรุณากรอกข้อมูล ชื่อ - นามสกุล ให้ครบถ้วน
  </div>
</div>
<!-- end name surname form -->

<!-- sex form -->
<div class="form-control mb-3">
  <p>เพศ</p>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="sex" value="ชาย" id="sex" required <?php if ($foundUser == 1 && $sex == "ชาย") echo "checked"; ?>>
    <label class="form-check-label" for="flexRadioDefault">
      ชาย
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="sex" value="หญิง" id="sex" required <?php if ($foundUser == 1 && $sex == "หญิง") echo "checked"; ?>>
    <label class="form-check-label" for="flexRadioDefault">
      หญิง
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="sex" value="อื่น ๆ" id="sex" required <?php if ($foundUser == 1 && $sex == "อื่น ๆ") echo "checked"; ?>>
    <label class="form-check-label" for="flexRadioDefault">
      อื่น ๆ
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="sex" value="ไม่ต้องการระบุ" id="sex" required <?php if ($foundUser == 1 && $sex == "ไม่ต้องการระบุ") echo "checked"; ?>>
    <label class="form-check-label" for="flexRadioDefault">
      ไม่ต้องการระบุ
    </label>
  </div>
  <div class="alert alert-danger mt-3" id="emptyAlert-sex">
    กรุณาระบุข้อมูลให้ครบถ้วน
  </div>
</div>

<!-- end sex form -->

<!-- provin form -->
<div class="form-control mb-3">
  <p>ภูมิลำเนา (อำเภอ และจังหวัด) </p>

  <?php
  include 'condb.php';
  $sqlProvin = "SELECT * FROM provinces";
  $queryProvin = mysqli_query($con, $sqlProvin);
  ?>
  <div class="form-row">
    <div class="form-group">
      <label for="province">จังหวัด</label>
      <select name="province_id" id="province" class="form-control" required>
        <option value="">เลือกจังหวัด</option>
        <?php while ($resultProvin = mysqli_fetch_assoc($queryProvin)) : ?>
          <option value="<?= $resultProvin['id'] ?>"><?= $resultProvin['name_th'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="amphure">อำเภอ</label>
      <select name="amphure_id" id="amphure" class="form-control" required>
        <option value="">เลือกอำเภอ</option>
      </select>
    </div>
    <!-- <div class="form-group col-md-4">
        <label for="district">ตำบล</label>
        <select name="district_id" id="district" class="form-control">
          <option value="">เลือกตำบล</option>
        </select>
      </div> -->
  </div>
  <div class="alert alert-danger mt-3" id="emptyAlert-provin">
    กรุณาระบุข้อมูลให้ครบถ้วน
  </div>
</div>
<!-- end provin form -->

<!-- age form -->
<div class="input-group mb-3">
  <?php
  $birthdate =  $_SESSION["bday"];
  $today = date("Y-m-d");
  // คำนวณอายุ
  $diff = date_diff(date_create($birthdate), date_create($today));
  $age = $diff->format("%y");
  ?>
  <span class="input-group-text">อายุ</span>

  <input name="age" type="number" id="age" class="form-control" min="0" max="120" value="<?php echo $age; ?>" required>
</div>
<div class="alert alert-danger mt-3" style="display: none;" id="emptyAlert-age">
  กรุณากรอกข้อมูล อายุ
</div>
<!-- end age form -->

<!-- edu form -->
<div class="form-control mb-3">
  <p>การศึกษา</p>
  <select class="form-select mb-3" id="eduOptions" name="eduOptions" onchange="showInputField('eduOptions','eduField','eduInput')" required>
    <option selected disabled>โปรดเลือก</option>
    <option value="ไม่เคยเรียน" <?php if ($foundUser == 1 && $eduOptions == "ไม่เคยเรียน") echo "selected"; ?>>ไม่เคยเรียน</option>
    <option value="ประถมศึกษา" <?php if ($foundUser == 1 && $eduOptions == "ประถมศึกษา") echo "selected"; ?>>ประถมศึกษา</option>
    <option value="มัธยมศึกษาตอนต้น" <?php if ($foundUser == 1 && $eduOptions == "มัธยมศึกษาตอนต้น") echo "selected"; ?>>มัธยมศึกษาตอนต้น</option>
    <option value="มัธยมศึกษาตอนปลาย/ ปวช" <?php if ($foundUser == 1 && $eduOptions == "มัธยมศึกษาตอนปลาย/ ปวช") echo "selected"; ?>>มัธยมศึกษาตอนปลาย/ ปวช</option>
    <option value="ปวส./ปวท./อนุปริญญา" <?php if ($foundUser == 1 && $eduOptions == "ปวส./ปวท./อนุปริญญา") echo "selected"; ?>>ปวส./ปวท./อนุปริญญา</option>
    <option value="ปริญญาตรี" <?php if ($foundUser == 1 && $eduOptions == "ปริญญาตรี") echo "selected"; ?>>ปริญญาตรี</option>
    <option value="สูงกว่าปริญญาตรี" <?php if ($foundUser == 1 && $eduOptions == "สูงกว่าปริญญาตรี") echo "selected"; ?>>สูงกว่าปริญญาตรี</option>
    <option value="other" <?php if ($foundUser == 1 && $eduOptions == "other") echo "selected"; ?>>อื่น ๆ</option>
  </select>
  <div id="eduField" style="display: none;">
    <label for="eduInput">โปรดระบุ:</label>
    <input type="text" id="eduInput" name="eduInput" class="form-control" value="<?php echo $foundUser == 1 ? $eduOptions : ''; ?>" required>
  </div>
  <div class="alert alert-danger mb-3" id="emptyAlert-edu">
    กรุณาระบุข้อมูล การศึกษา
  </div>
</div>

<!-- end edu form -->

<!-- occupation form -->
<div class="form-control mb-3">
  <p>อาชีพ</p>
  <select class="form-select mb-3" id="occOptions" name="occOptions" onchange="showInputField('occOptions','occField','occInput')">
    <option selected disabled>โปรดเลือก</option>
    <option value="รับราชการ/เจ้าหน้าที่ของรัฐ" <?php if ($foundUser == 1 && $occOptions == "รับราชการ/เจ้าหน้าที่ของรัฐ") echo "selected"; ?>>รับราชการ/เจ้าหน้าที่ของรัฐ</option>
    <option value="เจ้าหน้าที่รัฐวิสาหกิจ" <?php if ($foundUser == 1 && $occOptions == "เจ้าหน้าที่รัฐวิสาหกิจ") echo "selected"; ?>>เจ้าหน้าที่รัฐวิสาหกิจ</option>
    <option value="พนักงานบริษัท/ห้างร้าน" <?php if ($foundUser == 1 && $occOptions == "พนักงานบริษัท/ห้างร้าน") echo "selected"; ?>>พนักงานบริษัท/ห้างร้าน</option>
    <option value="มัธยมศึกษาตอนปลาย/ ปวช" <?php if ($foundUser == 1 && $occOptions == "มัธยมศึกษาตอนปลาย/ ปวช") echo "selected"; ?>>มัธยมศึกษาตอนปลาย/ ปวช</option>
    <option value="ประกอบธุรกิจส่วนตัว" <?php if ($foundUser == 1 && $occOptions == "ประกอบธุรกิจส่วนตัว") echo "selected"; ?>>ประกอบธุรกิจส่วนตัว</option>
    <option value="รับจ้างทั่วไป" <?php if ($foundUser == 1 && $occOptions == "รับจ้างทั่วไป") echo "selected"; ?>>รับจ้างทั่วไป</option>
    <option value="ค้าขาย" <?php if ($foundUser == 1 && $occOptions == "ค้าขาย") echo "selected"; ?>>ค้าขาย</option>
    <option value="ทำการเกษตร" <?php if ($foundUser == 1 && $occOptions == "ทำการเกษตร") echo "selected"; ?>>ทำการเกษตร</option>
    <option value="แม่บ้าน./พ่อบ้าน" <?php if ($foundUser == 1 && $occOptions == "แม่บ้าน./พ่อบ้าน") echo "selected"; ?>>แม่บ้าน./พ่อบ้าน</option>
    <option value="นักเรียน/นักศึกษา" <?php if ($foundUser == 1 && $occOptions == "นักเรียน/นักศึกษา") echo "selected"; ?>>นักเรียน/นักศึกษา</option>
    <option value="เกษียณ/ข้าราชการบำนาญ (เกษียณรวมภาคเอกชน)" <?php if ($foundUser == 1 && $occOptions == "เกษียณ/ข้าราชการบำนาญ (เกษียณรวมภาคเอกชน)") echo "selected"; ?>>เกษียณ/ข้าราชการบำนาญ (เกษียณรวมภาคเอกชน)</option>
    <option value="ชรา/ป่วย/พิการ จนไม่สามารถทำงานได้" <?php if ($foundUser == 1 && $occOptions == "ชรา/ป่วย/พิการ จนไม่สามารถทำงานได้") echo "selected"; ?>>ชรา/ป่วย/พิการ จนไม่สามารถทำงานได้</option>
    <option value="ไม่ทำงาน/ว่างงาน" <?php if ($foundUser == 1 && $occOptions == "ไม่ทำงาน/ว่างงาน") echo "selected"; ?>>ไม่ทำงาน/ว่างงาน</option>
    <option value="other" <?php if ($foundUser == 1 && $occOptions == "other") echo "selected"; ?>>อื่น ๆ</option>
  </select>
  <div id="occField" style="display: none;">
    <label for="occInput">โปรดระบุ:</label>
    <input type="text" id="occInput" name="occInput" class="form-control" value="<?php echo $foundUser == 1 ? $occOptions : ''; ?>" required>
  </div>
  <div class="alert alert-danger mb-3" id="emptyAlert-occ">
    กรุณาระบุข้อมูล อาชีพ
  </div>
</div>
<!-- end occupation form -->

<!-- marital status form -->
<div class="form-control mb-3">
  <p>สถานภาพ</p>
  <select class="form-select mb-3" id="maryOptions" name="maryOptions" onchange="showInputField('maryOptions','maryField','maryInput')">
    <option selected disabled>โปรดเลือก</option>
    <option value="โสด" <?php if ($foundUser == 1 && $maryOptions == "โสด") echo "selected"; ?>>โสด</option>
    <option value="สมรส" <?php if ($foundUser == 1 && $maryOptions == "สมรส") echo "selected"; ?>>สมรส</option>
    <option value="หม้าย/หย่า/แยกกันอยู่" <?php if ($foundUser == 1 && $maryOptions == "หม้าย/หย่า/แยกกันอยู่") echo "selected"; ?>>หม้าย/หย่า/แยกกันอยู่</option>
    <option value="other" <?php if ($foundUser == 1 && $maryOptions == "other") echo "selected"; ?>>อื่น ๆ</option>
  </select>
  <div id="maryField" style="display: none;">
    <label for="maryInput">โปรดระบุ:</label>
    <input type="text" id="maryInput" name="maryInput" class="form-control" value="<?php echo $foundUser == 1 ? $maryOptions : ''; ?>" required>
  </div>
  <div class="alert alert-danger mb-3" id="emptyAlert-mary">
    กรุณาระบุข้อมูล สถานภาพ
  </div>
</div>
<!-- end marital status form -->

<!-- nationality form -->
<div class="form-control mb-3">
  <p>สัญชาติ</p>
  <select class="form-select mb-3" id="nationOptions" name="nationOptions" onchange="showInputField('nationOptions','nationField','nationInput')">
    <option selected disabled>โปรดเลือก</option>
    <option value="ไทย" <?php if ($foundUser == 1 && $nationOptions == "ไทย") echo "selected"; ?>>ไทย</option>
    <option value="ไม่มีสัญชาติ" <?php if ($foundUser == 1 && $nationOptions == "ไม่มีสัญชาติ") echo "selected"; ?>>ไม่มีสัญชาติ</option>
    <option value="other" <?php if ($foundUser == 1 && $nationOptions == "other") echo "selected"; ?>>อื่น ๆ</option>
  </select>
  <div id="nationField" style="display: none;">
    <label for="nationInput">โปรดระบุ:</label>
    <input type="text" id="nationInput" name="nationInput" class="form-control" value="<?php echo $foundUser == 1 ? $nationOptions : ''; ?>" required>
  </div>
  <div class="alert alert-danger mb-3" id="emptyAlert-nation">
    กรุณาระบุข้อมูล สัญชาติ
  </div>
</div>
<!-- end nationality form -->

<script src="assets/js/script.js"></script>

<script>
  $(document).ready(function() {
    const inputIds = [
      "name", "surname", "province", "amphure", "age"
    ];

    const selectIds = [
      "eduOptions", "occOptions", "maryOptions", "nationOptions"
    ];

    const sexInput = $("input[name='sex']");

    inputIds.forEach(id => $(`#${id}`).on("input change", checkAndUpdate));
    selectIds.forEach(id => $(`#${id}`).on("change", checkAndUpdate));

    sexInput.change(function() {
      $("#emptyAlert-sex").hide();
      checkAndUpdate();
    });

    function checkAndUpdate() {
      const inputValues = inputIds.map(id => $(`#${id}`).val().trim());
      const selectValues = selectIds.map(id => $(`#${id}`).val());

      const isNameSurnameEmpty = inputValues[0] === "" || inputValues[1] === "";
      const isProvinceAmphureEmpty = inputValues[2] === "" || inputValues[3] === "";
      const isAgeEmpty = inputValues[4] === "";

      const isAnySelectEmpty = selectValues.some(value => value === null);

      const isSexEmpty = !sexInput.is(":checked");

      toggleAlert("#emptyAlert-name-surname", isNameSurnameEmpty);
      toggleAlert("#emptyAlert-provin", isProvinceAmphureEmpty);
      toggleAlert("#emptyAlert-age", isAgeEmpty);
      toggleAlert("#emptyAlert-edu", selectValues[0] === null);
      toggleAlert("#emptyAlert-occ", selectValues[1] === null);
      toggleAlert("#emptyAlert-mary", selectValues[2] === null);
      toggleAlert("#emptyAlert-nation", selectValues[3] === null);
      toggleAlert("#emptyAlert-sex", isSexEmpty);
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