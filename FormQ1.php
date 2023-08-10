<form name="formQ1" method="post" action="check_regis.php">
  <h1>ข้อมูลส่วนตัว</h1>
  <div class="input-group mb-3">
    <span class="input-group-text">ชื่อ</span>
    <input name="surname" type="text" id="surname" class="form-control" required>
  </div>
  <div class="form-control mb-3">
    <p>เพศ</p>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault">
      <label class="form-check-label" for="flexRadioDefault">
        ชาย
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault">
      <label class="form-check-label" for="flexRadioDefault">
        หญิง
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault">
      <label class="form-check-label" for="flexRadioDefault">
        อื่น ๆ
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault">
      <label class="form-check-label" for="flexRadioDefault">
        ไม่ต้องการระบุ
      </label>
    </div>
  </div>

  <div class="form-control mb-3">
    <p>ภูมิลำเนา (อำเภอ และจังหวัด) </p>
   
    <?php
    include 'condb.php';
    $sqlProvin = "SELECT * FROM provinces";
    $queryProvin = mysqli_query($con, $sqlProvin);
    ?>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="province">จังหวัด</label>
        <select name="province_id" id="province" class="form-control">
          <option value="">เลือกจังหวัด</option>
          <?php while ($resultProvin = mysqli_fetch_assoc($queryProvin)) : ?>
            <option value="<?= $resultProvin['id'] ?>"><?= $resultProvin['name_th'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="amphure">อำเภอ</label>
        <select name="amphure_id" id="amphure" class="form-control">
          <option value="">เลือกอำเภอ</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="district">ตำบล</label>
        <select name="district_id" id="district" class="form-control">
          <option value="">เลือกตำบล</option>
        </select>
      </div>
    </div>

    </div>

  <div class="input-group mb-3">
    <span class="input-group-text">Username</span>
    <input name="user" type="text" id="user" class="form-control" required>
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">Password</span>
    <input name="pass" type="password" id="pass" class="form-control" required>
  </div>
  <p>
    <input type="text" id="typeSelect" value="" name="level" class="form-control">
  </p>
  <p>
    <input type="submit" name="Submit" value="สมัครสมาชิก" class="btn btn-primary">
  </p>
</form>

<script src="assets/js/script.js"></script>
