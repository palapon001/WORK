<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'bootstrap.php';
  include 'condb.php';
  ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Home</title>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
  <link rel="stylesheet" href="assets/css/homeCSS.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="gtco-testimonials">
    <h2>Welcome</h2>
    <h2>Who Are You ?</h2>
    <div class="owl-carousel owl-carousel1 owl-theme">
      <div>
        <div class="card text-center">
            <img class="card-img-top" src="assets/img/logo_200x200.png" alt="">
          <div class="card-body">
            <!-- <p class="card-text">" ... " </p> -->
            <button type="button" class="zzz btn btn-dark rounded-pill" id="Interested-Individual" data-bs-toggle="modal" data-bs-target="#Modal">
              <h5>Interested-Individual</h5>
            </button>
          </div>
        </div>
      </div>

      <div>
        <div class="card text-center"><img class="card-img-top" src="assets/img/logo_200x200.png" alt="">
          <div class="card-body">
            <!-- <p class="card-text">" ... " </p> -->
            <button type="button" class="zzz btn btn-dark rounded-pill" id="Trainers" data-bs-toggle="modal" data-bs-target="#Modal">
              <h5>Trainers</h5>
            </button>
          </div>
        </div>
      </div>

      <div>
        <div class="card text-center"><img class="card-img-top" src="assets/img/logo_200x200.png" alt="">
          <div class="card-body">
            <!-- <p class="card-text">" ... " </p> -->
            <button type="button" class="zzz btn btn-dark rounded-pill" id="Sport-professionals" data-bs-toggle="modal" data-bs-target="#Modal">
              <h5>Sport-professionals</h5>
            </button>
          </div>
        </div>
      </div>

      <div>
        <div class="card text-center"><img class="card-img-top" src="assets/img/logo_200x200.png" alt="">
          <div class="card-body">
            <!-- <p class="card-text">" ... " </p> -->
            <button type="button" class="zzz btn btn-dark rounded-pill" id="Volunteer" data-bs-toggle="modal" data-bs-target="#Modal">
              <h5>Volunteer</h5>
            </button>
          </div>
        </div>
      </div>

      <div>
        <div class="card text-center"><img class="card-img-top" src="assets/img/logo_200x200.png" alt="">
          <div class="card-body">
            <!-- <p class="card-text">" ... " </p> -->
            <button type="button" class="zzz btn btn-dark rounded-pill" id="Personnel/Support-Staff" data-bs-toggle="modal" data-bs-target="#Modal">
              <h5>Personnel/Support-Staff</h5>
            </button>
          </div>
        </div>
      </div>

      <div>
        <div class="card text-center"><img class="card-img-top" src="assets/img/logo_200x200.png" alt="">
          <div class="card-body">
            <!-- <p class="card-text">" ... " </p> -->
            <button type="button" class="zzz btn btn-dark rounded-pill" id="Suppliers/Partners" data-bs-toggle="modal" data-bs-target="#Modal">
              <h5>Suppliers/Partners</h5>
            </button>
          </div>
        </div>
      </div>

      <div>
        <div class="card text-center"><img class="card-img-top" src="assets/img/logo_200x200.png" alt="">
          <div class="card-body">
            <!-- <p class="card-text">" ... " </p> -->
            <button type="button" class="zzz btn btn-dark rounded-pill" id="Community" data-bs-toggle="modal" data-bs-target="#Modal">
              <h5>Community</h5>
            </button>
          </div>
        </div>
      </div>



    </div>
  </div>
  <center>
    <?php include "tapSelect.php" ?>
  </center>

  <!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
  <script src="assets/js/homeJS.js"></script>

</body>

</html>