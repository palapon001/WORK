<!DOCTYPE html>
<html lang="en">
<?php session_start();
include 'tag_head.php';
include 'condb.php';
if (!$_SESSION["username"]) {  //check session
  Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}
$q_user = $_SESSION["username"];
$sql_ques = " SELECT * FROM question where username = $q_user ";
$queryQues = mysqli_query($con, $sql_ques);
$foundUser = 0;
while ($fetch = mysqli_fetch_assoc($queryQues)) {
  $foundUser++;
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
        <!-- <?php echo $foundUser;  ?> -->
        <?php if ($foundUser == 1) { ?>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>หน้าหลัก</span></a></li>
          <?php switch ($_SESSION["level"]) {
            case "Interested-Individual":
          ?>
              <li><a href="#personal" class="nav-link scrollto"><i class="bx bx-user"></i> <span>ข้อมูลส่วนตัว</span></a></li>
              <li><a href="#health" class="nav-link scrollto"><i class="bi bi-file-medical"></i> <span>ข้อมูลสุขภาพ</span></a></li>
              <li><a href="#exercise" class="nav-link scrollto"><i class="bi bi-universal-access"></i><span>ข้อมูลการออกกำลังกาย</span></a></li>
            <?php
              break;

            case "Trainers":
            ?>
              <li><a href="#personal" class="nav-link scrollto"><i class="bx bx-user"></i> <span>ข้อมูลส่วนตัว</span></a></li>
              <li><a href="#health" class="nav-link scrollto"><i class="bi bi-file-medical"></i> <span>ข้อมูลสุขภาพ</span></a></li>
              <li><a href="#exercise" class="nav-link scrollto"><i class="bi bi-universal-access"></i><span>ข้อมูลการออกกำลังกาย</span></a></li>
              <li><a href="#agency" class="nav-link scrollto"><i class="bi bi-hexagon"></i><span>ข้อมูลหน่วยงาน</span></a></li>
              <li><a href="#exper_info" class="nav-link scrollto"><i class="bi bi-journal-text"></i> <span>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</span></a></li>
              <li><a href="#train_exper" class="nav-link scrollto"><i class="bi bi-person-vcard"></i> <span>ข้อมูลประสบการณ์การอบรม</span></a></li>
            <?php
              break;

            case "Sport-professionals":
            ?>
              <li><a href="#personal" class="nav-link scrollto"><i class="bx bx-user"></i> <span>ข้อมูลส่วนตัว</span></a></li>
              <li><a href="#health" class="nav-link scrollto"><i class="bi bi-file-medical"></i> <span>ข้อมูลสุขภาพ</span></a></li>
              <li><a href="#exercise" class="nav-link scrollto"><i class="bi bi-universal-access"></i><span>ข้อมูลการออกกำลังกาย</span></a></li>
              <li><a href="#agency" class="nav-link scrollto"><i class="bi bi-hexagon"></i><span>ข้อมูลหน่วยงาน</span></a></li>
              <li><a href="#exper_info" class="nav-link scrollto"><i class="bi bi-journal-text"></i> <span>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</span></a></li>
              <li><a href="#train_exper" class="nav-link scrollto"><i class="bi bi-person-vcard"></i> <span>ข้อมูลประสบการณ์การอบรม</span></a></li>
            <?php
              break;

            case "Volunteer":
            ?>
              <li><a href="#personal" class="nav-link scrollto"><i class="bx bx-user"></i> <span>ข้อมูลส่วนตัว</span></a></li>
              <li><a href="#health" class="nav-link scrollto"><i class="bi bi-file-medical"></i> <span>ข้อมูลสุขภาพ</span></a></li>
              <li><a href="#exercise" class="nav-link scrollto"><i class="bi bi-universal-access"></i><span>ข้อมูลการออกกำลังกาย</span></a></li>
              <li><a href="#vol_expe" class="nav-link scrollto"><i class="bi bi-people"></i><span>ข้อมูลประสบการณ์การเป็นอาสาสม้คร</span></a></li>
            <?php
              break;

            case "Personnel/Support-Staff":
            ?>
              <li><a href="#personal" class="nav-link scrollto"><i class="bx bx-user"></i> <span>ข้อมูลส่วนตัว</span></a></li>
              <li><a href="#health" class="nav-link scrollto"><i class="bi bi-file-medical"></i> <span>ข้อมูลสุขภาพ</span></a></li>
              <li><a href="#exercise" class="nav-link scrollto"><i class="bi bi-universal-access"></i><span>ข้อมูลการออกกำลังกาย</span></a></li>
              <li><a href="#agency" class="nav-link scrollto"><i class="bi bi-hexagon"></i><span>ข้อมูลหน่วยงาน</span></a></li>
              <li><a href="#Info_exper" class="nav-link scrollto"><i class="bi bi-activity"></i> <span>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</span></a></li>
              <li><a href="#exper_info" class="nav-link scrollto"><i class="bi bi-journal-text"></i> <span>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</span></a></li>

            <?php
              break;

            case "Suppliers/Partners":
            ?>
              <li><a href="#agency" class="nav-link scrollto"><i class="bi bi-hexagon"></i><span>ข้อมูลหน่วยงาน</span></a></li>
              <li><a href="#Info_exper" class="nav-link scrollto"><i class="bi bi-activity"></i> <span>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</span></a></li>
            <?php
              break;

            case "Community":
            ?>
              <li><a href="#agency" class="nav-link scrollto"><i class="bi bi-hexagon"></i><span>ข้อมูลหน่วยงาน</span></a></li>
              <li><a href="#Info_exper" class="nav-link scrollto"><i class="bi bi-activity"></i> <span>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</span></a></li>
            <?php
              break;

            default:
            ?>
              <li><a href="#personal" class="nav-link scrollto"><i class="bx bx-user"></i> <span>ข้อมูลส่วนตัว</span></a></li>
              <li><a href="#health" class="nav-link scrollto"><i class="bi bi-file-medical"></i> <span>ข้อมูลสุขภาพ</span></a></li>
              <li><a href="#exercise" class="nav-link scrollto"><i class="bi bi-universal-access"></i><span>ข้อมูลการออกกำลังกาย</span></a></li>
              <li><a href="#agency" class="nav-link scrollto"><i class="bi bi-hexagon"></i><span>ข้อมูลหน่วยงาน</span></a></li>
              <li><a href="#exper_info" class="nav-link scrollto"><i class="bi bi-journal-text"></i> <span>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</span></a></li>
              <li><a href="#train_exper" class="nav-link scrollto"><i class="bi bi-person-vcard"></i> <span>ข้อมูลประสบการณ์การอบรม</span></a></li>
              <li><a href="#vol_expe" class="nav-link scrollto"><i class="bi bi-people"></i><span>ข้อมูลประสบการณ์การเป็นอาสาสม้คร</span></a></li>
              <li><a href="#Info_exper" class="nav-link scrollto"><i class="bi bi-activity"></i> <span>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</span></a></li>
          <?php
          }
          ?>
        <?php } ?>
        <li><a href="logout.php " class="nav-link scrollto bg-danger active" onclick="return confirm('ต้องการออกจากระบบหรือไม่')"><i class="bi bi-door-closed"></i> <span>ออกจากระบบ</span></a></li>
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

  <?php if ($foundUser == 1) {
    $q_user = $_SESSION["username"];
    $sql_ques1 = " SELECT * FROM question where username = $q_user ";
    $queryQues1 = mysqli_query($con, $sql_ques1);
    while ($fetch = mysqli_fetch_assoc($queryQues1)) {
      $provin = $fetch['province_id'];
      $sql_provin = " SELECT * FROM provinces where id = $provin ";
      $queryProvin = mysqli_query($con, $sql_provin);
      $amphure = $fetch['amphure_id'];
      $sql_amphure = " SELECT * FROM amphures where id = $amphure ";
      $queryAmphure = mysqli_query($con, $sql_amphure);
  ?>
      <main id="main">
        <?php switch ($_SESSION["level"]) {
          case "Interested-Individual":
            include 'section/section1.php';
            include 'section/section2.php';
            include 'section/section3.php';
            break;

          case "Trainers":
            include 'section/section1.php';
            include 'section/section2.php';
            include 'section/section3.php';
            include 'section/section4Switch.php';
            include 'section/section5Switch.php';
            include 'section/section6.php';
            break;

          case "Sport-professionals":
            include 'section/section1.php';
            include 'section/section2.php';
            include 'section/section3.php';
            include 'section/section4Switch.php';
            include 'section/section5Switch.php';
            include 'section/section6.php';
            break;

          case "Volunteer":
            include 'section/section1.php';
            include 'section/section2.php';
            include 'section/section3.php';
            include 'section/section7.php';
            break;

          case "Personnel/Support-Staff":
            include 'section/section1.php';
            include 'section/section2.php';
            include 'section/section3.php';
            include 'section/section4Switch.php';
            include 'section/section8Switch.php';
            include 'section/section5Switch.php';
            break;

          case "Suppliers/Partners":
            include 'section/section4Switch.php';
            include 'section/section8Switch.php';
            break;

          case "Community":
            include 'section/section4Switch.php';
            include 'section/section8Switch.php';
            break;

          default:
            include 'section/section1.php';
            include 'section/section2.php';
            include 'section/section3.php';
            include 'section/section4Switch.php';
            include 'section/section5Switch.php';
            include 'section/section6.php';
            include 'section/section7.php';
            include 'section/section8Switch.php';
        }
        ?>

      <?php
    }
      ?>

      </main><!-- End #main -->
    <?php } ?>

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