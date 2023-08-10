<div class="card">
  <div class="card-body">
    <form name="formQ1" method="post" action="check_regis.php">
      <h1>ข้อมูลส่วนตัว</h1>
      <!-- name surname form -->
      <div class="input-group mb-3">
        <span class="input-group-text">ชื่อ</span>
        <input name="surname" type="text" id="surname" class="form-control" required>
      </div>
      <!-- end name surname form -->

      <!-- sex form -->
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
          <!-- <div class="form-group col-md-4">
        <label for="district">ตำบล</label>
        <select name="district_id" id="district" class="form-control">
          <option value="">เลือกตำบล</option>
        </select>
      </div> -->
        </div>

      </div>
      <!-- end provin form -->

      <!-- age form -->
      <div class="input-group mb-3">
        <span class="input-group-text">อายุ</span>
        <input name="age" type="number" id="age" class="form-control" required>
      </div>
      <!-- end age form -->

      <!-- edu form -->
      <div class="form-control mb-3">
        <p>การศึกษา </p>
        <select class="form-select mb-3" id="selectInput">
          <option selected>โปรดเลือก</option>
          <option value="ไม่เคยเรียน">ไม่เคยเรียน</option>
          <option value="ประถมศึกษา">ประถมศึกษา</option>
          <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
          <option value="มัธยมศึกษาตอนปลาย/ ปวช">มัธยมศึกษาตอนปลาย/ ปวช</option>
          <option value="ปวส./ปวท./อนุปริญญา">ปวส./ปวท./อนุปริญญา </option>
          <option value="ปริญญาตรี">ปริญญาตรี</option>
          <option value="สูงกว่าปริญญาตรี">สูงกว่าปริญญาตรี</option>
        </select>
        <input type="text" class="form-control" id="textInput" placeholder="อื่น ๆ โปรดระบุ" require>
      </div>
      <!-- end edu form -->

      <!-- occupation form -->
      <div class="form-control mb-3">
        <p>อาชีพ</p>
        <select class="form-select mb-3" id="selectInput">
          <option selected>โปรดเลือก</option>
          <option value="รับราชการ/เจ้าหน้าที่ของรัฐ">รับราชการ/เจ้าหน้าที่ของรัฐ</option>
          <option value="เจ้าหน้าที่รัฐวิสาหกิจ">เจ้าหน้าที่รัฐวิสาหกิจ </option>
          <option value="พนักงานบริษัท/ห้างร้าน">พนักงานบริษัท/ห้างร้าน </option>
          <option value="มัธยมศึกษาตอนปลาย/ ปวช">มัธยมศึกษาตอนปลาย/ ปวช</option>
          <option value="ประกอบธุรกิจส่วนตัว	">ประกอบธุรกิจส่วนตัว</option>
          <option value="รับจ้างทั่วไป">รับจ้างทั่วไป</option>
          <option value="ค้าขาย">ค้าขาย</option>
          <option value="ทำการเกษตร">ทำการเกษตร</option>
          <option value="แม่บ้าน./พ่อบ้าน ">แม่บ้าน./พ่อบ้าน </option>
          <option value="นักเรียน/นักศึกษา">นักเรียน/นักศึกษา</option>
          <option value="เกษียณ/ข้าราชการบำนาญ (เกษียณรวมภาคเอกชน)">เกษียณ/ข้าราชการบำนาญ (เกษียณรวมภาคเอกชน)</option>
          <option value="ชรา/ป่วย/พิการ จนไม่สามารถทำงานได้">ชรา/ป่วย/พิการ จนไม่สามารถทำงานได้</option>
          <option value="ไม่ทำงาน/ว่างงาน">ไม่ทำงาน/ว่างงาน</option>
        </select>
        <input type="text" class="form-control" id="textInput" placeholder="อื่น ๆ โปรดระบุ" require>
      </div>
      <!-- end occupation form -->

      <!-- marital status form -->
      <div class="form-control mb-3">
        <p>สถานภาพ</p>
        <select class="form-select mb-3" id="selectInput">
          <option selected>โปรดเลือก</option>
          <option value="โสด">โสด</option>
          <option value="สมรส">สมรส</option>
          <option value="หม้าย/หย่า/แยกกันอยู่">หม้าย/หย่า/แยกกันอยู่ </option>
        </select>
        <input type="text" class="form-control" id="textInput" placeholder="อื่น ๆ โปรดระบุ" require>
      </div>
      <!-- end marital status form -->

      <!-- nationality form -->
      <div class="form-control mb-3">
        <p>สัญชาติ</p>
        <select class="form-select mb-3" id="selectInput">
          <option selected>โปรดเลือก</option>
          <option value="โสด">ไทย</option>
          <option value="สมรส">ไม่มีสัญชาติ</option>
        </select>
        <input type="text" class="form-control" id="textInput" placeholder="อื่น ๆ โปรดระบุ" require>
      </div>
      <!-- end nationality form -->

    </form>
  </div>
</div>

<script src="assets/js/script.js"></script>