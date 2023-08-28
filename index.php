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
    <div class="card">
      <h2>Welcome</h2>
      <img class="rounded mx-auto d-block mb-3" src="./assets/img/logo_200x200.png" alt="logo">
      <h2>Who Are You ?</h2>
    </div>

    <div class="owl-carousel owl-carousel1 owl-theme">

      <?php include 'assets/php/generateCardFunction.php'; ?>
      <!-- ใช้งานฟังก์ชัน generateCard สำหรับการ์ดแต่ละประเภท -->
      <?php echo generateCard("assets/img/logo_200x200.png", "Interested-Individual", "Interested-Individual"); ?>
      <?php echo generateCard("assets/img/logo_200x200.png", "Trainers", "Trainers"); ?>
      <?php echo generateCard("assets/img/logo_200x200.png", "Sport-professionals", "Sport-professionals"); ?>
      <?php echo generateCard("assets/img/logo_200x200.png", "Volunteer", "Volunteer"); ?>
      <?php echo generateCard("assets/img/logo_200x200.png", "Personnel/Support-Staff", "Personnel/Support-Staff"); ?>
      <?php echo generateCard("assets/img/logo_200x200.png", "Suppliers/Partners", "Suppliers/Partners"); ?>
      <?php echo generateCard("assets/img/logo_200x200.png", "Community", "Community"); ?>
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