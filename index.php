<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'condb.php'; ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>index</title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
  <link rel="stylesheet" href="assets/css/homeCSS.css">
</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="gtco-testimonials">
    <div class="card align-self-center mt-3 mb-3">
      <h2 class="btn">Welcome</h2>
      <center>
        <h4 class="mt-3 mb-3">A Digital Ecosystem Prototype of Sport and Exercise for Health Information Management</h4>
      </center>
    </div>
    <div class="card align-self-center mt-3 ">
      <h2 class="mt-5 mb-5">Who Are You ?</h2>
    </div>
    <!-- <img class="rounded mx-auto d-block mb-3" src="./assets/img/logo_200x200.png" alt="logo"> -->


    <div class="owl-carousel owl-carousel1 owl-theme">
      <?php include 'assets/php/generateCardFunction.php'; ?>
      <!-- ใช้งานฟังก์ชัน generateCard สำหรับการ์ดแต่ละประเภท -->
      <?php echo generateCard("assets/img/indexIcon/indexIconF1.png", "Interested-Individual", "Interested-Individual"); ?>
      <?php echo generateCard("assets/img/indexIcon/indexIconF2.png", "Trainers", "Trainers"); ?>
      <?php echo generateCard("assets/img/indexIcon/indexIconF3.png", "Sport-professionals", "Sport-professionals"); ?>
      <?php echo generateCard("assets/img/indexIcon/indexIconF4.png", "Volunteer", "Volunteer"); ?>
      <?php echo generateCard("assets/img/indexIcon/indexIconF5.png", "Personnel/Support-Staff", "Personnel/Support-Staff"); ?>
      <?php echo generateCard("assets/img/indexIcon/indexIconF6.png", "Suppliers/Partners", "Suppliers/Partners"); ?>
      <?php echo generateCard("assets/img/indexIcon/indexIconF7.png", "Community", "Community"); ?>
    </div>
  </div>
  <center>
    <?php include "modal/modalAuthForm.php" ?>
  </center>

  <!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
  <script src="assets/js/homeJS.js"></script>

</body>

</html>