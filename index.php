<!DOCTYPE html>
<html>

<head>
    <?php
    include 'bootstrap.php';
    include 'condb.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body style="background: linear-gradient(90deg, #C7C5F4, #776BCC);	">
    <div class="mt-5 h-75 d-flex align-items-center justify-content-center">
        <div class="">
            <div class="card-body">
                <center>
                    <div class="card" style="width: 25rem;">
                        <!-- <img src="assets/img/apple-touch-icon.png" class="card-img-top" alt="img"> -->
                        <div class="card-body">
                            <h5 class="card-title">Welcome</h5>
                            <p class="card-text">Who Are You ?</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <button type="button" class="zzz btn btn-light list-group-item" id="Interested-Individual" data-bs-toggle="modal" data-bs-target="#Modal">
                                <h5>Interested-Individual</h5>
                            </button>
                            <button type="button" class="zzz btn btn-light list-group-item" id="Trainers" data-bs-toggle="modal" data-bs-target="#Modal">
                                <h5>Trainers</h5>
                            </button>
                            <button type="button" class="zzz btn btn-light list-group-item" id="Sport-professionals" data-bs-toggle="modal" data-bs-target="#Modal">
                                <h5>Sport-professionals</h5>
                            </button>
                            <button type="button" class="zzz btn btn-light list-group-item" id="Volunteer" data-bs-toggle="modal" data-bs-target="#Modal">
                                <h5>Volunteer</h5>
                            </button>
                            <button type="button" class="zzz btn btn-light list-group-item" id="Personnel-Support-Staff" data-bs-toggle="modal" data-bs-target="#Modal">
                                <h5>Personnel/Support-Staff</h5>
                            </button>
                            <button type="button" class="zzz btn btn-light list-group-item" id="Suppliers/Partners" data-bs-toggle="modal" data-bs-target="#Modal">
                                <h5>Suppliers/Partners</h5>
                            </button>
                            <button type="button" class="zzz btn btn-light list-group-item" id="Community" data-bs-toggle="modal" data-bs-target="#Modal">
                                <h5>Community</h5>
                            </button>
                        </ul>
                    </div>
                    <?php include "tapSelect.php" ?>
                </center>
            </div>
        </div>
    </div>
</body>

</html>