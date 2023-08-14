<!DOCTYPE html>
<html lang="en">
<?php session_start();
include 'tag_head.php';
include 'condb.php';
if (!$_SESSION["username"]) {  //check session
  Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}
?>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>หน้าหลัก</span></a></li>
        <li><a href="#personal" class="nav-link scrollto"><i class="bx bx-user"></i> <span>ข้อมูลส่วนตัว</span></a></li>
        <li><a href="#health" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>ข้อมูลสุขภาพ</span></a></li>
        <li><a href="#exercise" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>ข้อมูลการออกกำลังกาย</span></a></li>
        <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
        <li><a href="logout.php " class="nav-link scrollto bg-danger" onclick="return confirm('ต้องการออกจากระบบหรือไม่')"><i class="bi bi-door-closed"></i> <span>ออกจากระบบ</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h2>ยินต้อนรับคุณ <?php echo $_SESSION["name"] . " " . $_SESSION["surname"]; ?> </h2>
      <h2>Username <?php echo $_SESSION["username"]; ?> </h2>
      <p>เข้าสู่ระบบในสถานะ <span class="typed" data-typed-items="<?php echo $_SESSION["level"]; ?>"></span></p>
      <p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
          แบบสอบถาม
        </button>
        <!-- <a href="step.php" class="btn btn-primary btn-lg">ทำแบบสอบถาม</a> -->
      </p>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= personal Section ======= -->
    <section id="personal" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>ข้อมูลส่วนตัว</h2>
        </div>

        <div class="row">
          <!-- <div class="col-lg-4">
            <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
          </div> -->
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3> ชื่อ <?php echo $_SESSION["name"] . " " . $_SESSION["surname"]; ?> </h3>
            <?php
            $q_user = $_SESSION["username"];
            $sql_ques = " SELECT * FROM question where username = $q_user ";
            $queryQues = mysqli_query($con, $sql_ques);
            while ($fetch = mysqli_fetch_assoc($queryQues)) {
              $provin = $fetch['province_id'];
              $sql_provin = " SELECT * FROM provinces where id = $provin ";
              $queryProvin = mysqli_query($con, $sql_provin);
              $amphure = $fetch['amphure_id'];
              $sql_amphure = " SELECT * FROM amphures where id = $amphure ";
              $queryAmphure = mysqli_query($con, $sql_amphure);

            ?>
              <div class="row">
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>เพศ:</strong> <span> <?php echo $fetch['sex']; ?> </span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>ภูมิลำเนา:</strong> <span>
                        <?php while ($fetchProvin = mysqli_fetch_assoc($queryProvin)) { ?>
                          <?php echo $fetchProvin['name_th']; ?>
                        <?php } ?>
                        <?php while ($fetchAmphure = mysqli_fetch_assoc($queryAmphure)) { ?>
                          <?php echo $fetchAmphure['name_th']; ?>
                        <?php } ?>
                      </span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>อายุ:</strong> <?php echo $fetch['age']; ?> <span></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>การศึกษา:</strong> <span><?php echo $fetch['eduOptions']; ?></span></li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>อาชีพ:</strong> <span><?php echo $fetch['occOptions']; ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>สัญชาติ:</strong> <span><?php echo $fetch['nationOptions']; ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>สถานภาพ:</strong> <span><?php echo $fetch['maryOptions']; ?></span></li>
                  </ul>
                </div>
              </div>
          </div>
        </div>

      </div>
    </section><!-- End personal Section -->

    <!-- ======= health Section ======= -->
    <section id="health" class="facts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>ข้อมูลสุขภาพ</h2>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $fetch['height']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>ส่วนสูง (ซม.)</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $fetch['weight']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>น้ำหนัก (กก.)</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-headset"></i>
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
              <i class="bi bi-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $fetch['pressure']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>ความดัน</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $fetch['pulse']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>ชีพจร</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-award"></i>
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

    <!-- ======= health Section ======= -->
    <section id="exercise" class="skills section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>ข้อมูลการออกกำลังกาย</h2>
          <p>
          <div class="form-group mb-3">
            <span class="input-group-text" id="basic-addon1">สถานที่ใดที่คุณใช้ออกกำลังกายหรือเล่นกีฬาเป็นประจำ</span>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $fetch['location']; ?></textarea>
          </div>
          <div class="form-group mb-3">
            <span class="input-group-text" id="basic-addon1"> ช่วงเวลาที่คุณออกกำลังกายหรือเล่นกีฬาเป็นประจำ </span>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $fetch['period']; ?></textarea>
          </div>
          <div class="form-group mb-3">
            <span class="input-group-text" id="basic-addon1">เพราะเหตุผลใดคุณจึงออกกำลังกายหรือเล่นกีฬา </span>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $fetch['reason1']; ?></textarea>
          </div>
          <div class="form-group mb-3">
            <span class="input-group-text" id="basic-addon1">คุณคิดว่าอะไรที่จูงใจให้คุณ และครอบครัว หรือคนรอบข้างคุณ มาออกกำลังกายหรือเล่นกีฬา (ตอบเพียงคำตอบเดียว)</span>
            <input type="text" class="form-control" value="<?php echo $fetch['motiOptions']; ?>" disabled>
          </div>
          <div class="form-group mb-3">
            <span class="input-group-text" id="basic-addon1">รายการตัวเลือก ประเภทการออกกำลังกายเพื่อสุขภาพ (ตอบได้มากกว่า 1 ข้อ)</span>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $fetch['exer']; ?></textarea>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">ชีพจรหลังการออกกำลังกาย</span>
            <input type="text" class="form-control" value="<?php echo $fetch['pulseAfter']; ?>" disabled>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">จำนวนวันที่ออกกำลังกายต่อสัปดาห์ (กี่วัน/ส้ปดาห์)</span>
            <input type="text" class="form-control" value="<?php echo $fetch['week']; ?>" disabled>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">ความหนักของการออกกำลังกาย</span>
            <input type="text" class="form-control" value="<?php echo $fetch['intensityOptions']; ?>" disabled>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
              ระยะเวลาการออกกำลังกาย (นาที)</span>
            <input type="text" class="form-control" value="<?php echo $fetch['duration']; ?>" disabled>
          </div>
          <div class="form-group mb-3">
            <span class="input-group-text"> ผลการประเมินการออกกำลังกาย</span>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              (พิจารณาจากจำนวนวัน 3 วันต่อสัปดาห์ ความหนักของการออกกำลังกาย ระดับปานกลางถึงระดับหนัก และระยะเวลาการออกกำล้งกาย 10-20 นาทีต่อเนื่อง) => ผ่านเกณฑ์ หรือต่ำกว่าเกณฑ์
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
              $week = $fetch['week'];
              $intensity = $fetch['intensityOptions'];
              $duration = $fetch['duration'];
              function evaluateExercise($daysPerWeek, $intensity, $duration)
              {
                if ($daysPerWeek >= 3 && ($intensity >= 'ระดับปานกลาง' && $intensity <= 'ระดับหนัก') && $duration >= 10 && $duration <= 20) {
                  return "ผ่านเกณฑ์";
                } else {
                  return "ต่ำกว่าเกณฑ์";
                }
              }
              $result = evaluateExercise($week, $intensity, $duration);

            ?>
            <input type="text" class="form-control bg-info" value="<?php echo $result; ?>" disabled>
          </div>

          </p>
        </div>

        <div class="row skills-content">

          <div class="col-lg-3">
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <div>
              <center>
                <canvas id="myChart1"></canvas>
                <p>ผลการประเมินการออกกำลังกาย รายจังหวัด เฉพาะกลุ่มที่ถูกจัดอยู่</p>
              </center>
            </div>
            <script>
              const ctx1 = document.getElementById('myChart1');

              new Chart(ctx1, {
                type: 'doughnut',
                data: {
                  labels: ['ผ่าน', 'ไม่ผ่าน'],
                  datasets: [{
                    label: '',
                    data: [50, 25, 25],
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            </script>
          </div>

          <div class="col-lg-3">

            <div>
              <center>
                <canvas id="myChart2"></canvas>
                <p>ผลการประเมินการออกกำลังกาย รายจังหวัด ของทุกกลุ่ม</p>
              </center>
            </div>
            <script>
              const ctx2 = document.getElementById('myChart2');

              new Chart(ctx2, {
                type: 'doughnut',
                data: {
                  labels: ['ผ่าน', 'ไม่ผ่าน'],
                  datasets: [{
                    label: '',
                    data: [50, 25, 25],
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            </script>
          </div>



        </div>

      </div>
    </section><!-- End health Section -->

    <!-- ======= exercise Section ======= -->
    <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Resume</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <h3 class="resume-title">Sumary</h3>
            <div class="resume-item pb-0">
              <h4>Brandon Johnson</h4>
              <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>
              <ul>
                <li>Portland par 127,Orlando, FL</li>
                <li>(123) 456-7891</li>
                <li>alice.barkley@example.com</li>
              </ul>
            </div>

            <h3 class="resume-title">Education</h3>
            <div class="resume-item">
              <h4>Master of Fine Arts &amp; Graphic Design</h4>
              <h5>2015 - 2016</h5>
              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
              <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
            </div>
            <div class="resume-item">
              <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
              <h5>2010 - 2014</h5>
              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
              <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
            </div>
          </div>
          <div class="col-lg-6">
            <h3 class="resume-title">Professional Experience</h3>
            <div class="resume-item">
              <h4>Senior graphic design specialist</h4>
              <h5>2019 - Present</h5>
              <p><em>Experion, New York, NY </em></p>
              <ul>
                <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
                <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
                <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
                <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
              </ul>
            </div>
            <div class="resume-item">
              <h4>Graphic design specialist</h4>
              <h5>2017 - 2018</h5>
              <p><em>Stepping Stone Advertising, New York, NY</em></p>
              <ul>
                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End exercise Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bx bxl-dribbble"></i>
              </div>
              <h4><a href="">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bx bx-file"></i>
              </div>
              <h4><a href="">Sed Perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-pink">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bx bx-tachometer"></i>
              </div>
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-yellow">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                </svg>
                <i class="bx bx-layer"></i>
              </div>
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-red">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                </svg>
                <i class="bx bx-slideshow"></i>
              </div>
              <h4><a href="">Dele Cardo</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-teal">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
                </svg>
                <i class="bx bx-arch"></i>
              </div>
              <h4><a href="">Divera Don</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

  <?php
            }
  ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">

      <div class="copyright">
        &copy; Copyright <strong><span>work</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">แบบสอบถาม</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php include 'step.php'; ?>
        </div>
      </div>
    </div>
  </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



</body>

<?php include 'tag_script.php'; ?>

</html>