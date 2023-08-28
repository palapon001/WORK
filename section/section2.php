  <!-- ======= health Section ======= -->
  <section id="health" class="facts">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>ข้อมูลสุขภาพ</h2>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
          <img src = "assets/img/height.svg" width="50px" height="50px" alt="height"/> 
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $fetch['height']; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>ส่วนสูง (ซม.)</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box"> 
          <img src = "assets/img/weight.svg" width="50px" height="50px" alt="weight"/> 
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $fetch['weight']; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>น้ำหนัก (กก.)</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
          <img src = "assets/img/bmi.svg" width="50px" height="50px" alt="bmi"/> 
            <?php
            $w = $fetch['weight'];
            $h = $fetch['height'];
            function calculateBMI($weight, $height)
            {
              // Convert height to meters
              $heightMeters = $height / 100;

              // Calculate BMI
              $bmi = $weight / ($heightMeters * $heightMeters);

              return round($bmi, 2);
            }
            $bmi = calculateBMI($w, $h);
            ?>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $bmi; ?>" data-purecounter-duration="1" data-purecounter-separator="true" data-purecounter-decimals="2" class="purecounter"></span>
            <p>BMI</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
          <img src = "assets/img/pressure.svg" width="50px" height="50px" alt="pressure"/> 
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $fetch['pressure']; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>ความดัน</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
          <img src = "assets/img/pulse.svg" width="50px" height="50px" alt="pulse"/> 
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $fetch['pulse']; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>ชีพจร</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
          <img src = "assets/img/electricalPulse.svg" width="50px" height="50px" alt="electricalPulse"/> 
            <span data-purecounter-start="0" data-purecounter-end="<?php echo 220 - $fetch['age']; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>ชีพจรสูงสุด</p>
          </div>
        </div>

        <div class="col-lg-8 pt-4 pt-lg-0 content">
          <div class="col-lg-6">
            <ul>
              <i class="bi bi-chevron-right"></i> <strong>โรคประจำตัว:</strong> <span><?php echo $fetch['congenOptions']; ?></span>
            </ul>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End health Section -->