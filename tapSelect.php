<?php $logo = "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/2560px-Bootstrap_logo.svg.png"; ?>
<!-- <img src="<?php echo $logo; ?>" class="w-50 h-50" alt=""> -->

<div class="container text-center mt-4 ">
    <h2>Who Are You ? </h2>
    <div class="row mt-4">
        <div class="col">
            <button type="button" class="zzz btn btn-light" id="Interested-Individual" data-bs-toggle="modal" data-bs-target="#Modal">
                <img src="https://cdn-icons-png.flaticon.com/512/3475/3475165.png" class="img-thumbnail rounded">
                <h5>Interested-Individual</h5>
            </button>
        </div>
        <div class="col">
            <button type="button" class="zzz btn btn-light" id="Trainers" data-bs-toggle="modal" data-bs-target="#Modal">
                <img src="https://cdn-icons-png.flaticon.com/512/3475/3475762.png" class="img-thumbnail rounded">
                <h5>Trainers</h5>
            </button>
        </div>
        <div class="col mt-4">
            <button type="button" class="zzz btn btn-light" id="Sport-professionals" data-bs-toggle="modal" data-bs-target="#Modal">
                <img src="https://cdn-icons-png.flaticon.com/512/3475/3475109.png" class="img-thumbnail rounded">
                <h5>Sport professionals</h5>
            </button>
        </div>
        <div class="col">
            <button type="button" class="zzz btn btn-light" id="Volunteer" data-bs-toggle="modal" data-bs-target="#Modal">
                <img src="https://cdn-icons-png.flaticon.com/512/3475/3475265.png" class="img-thumbnail rounded">
                <h5>Volunteer</h5>
            </button>
        </div>
        <div class="col mt-4">
            <button type="button" class="zzz btn btn-light" id="Personnel-Support-Staff" data-bs-toggle="modal" data-bs-target="#Modal">
                <img src="https://cdn-icons-png.flaticon.com/512/3475/3475144.png" class="img-thumbnail rounded">
                <h5>Personnel/ Support Staff</h5>
            </button>
        </div>
        <div class="col">
            <button type="button" class="zzz btn btn-light" id="Community" data-bs-toggle="modal" data-bs-target="#Modal">
                <img src="https://cdn-icons-png.flaticon.com/512/3475/3475360.png" class="img-thumbnail rounded">
                <h5>Community</h5>
            </button>
        </div>
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="result">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">เข้าสู่ระบบ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">สมัครสมาชิก</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <?php include "FormLogin.php"; ?>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <?php include "FormRegister.php"; ?>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">

            </div> -->

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll("button.zzz");
        const resultDiv = document.getElementById("result");

        buttons.forEach(button => {
            button.addEventListener("click", function() {
                const buttonText = button.textContent;
                resultDiv.textContent = ` ${buttonText}`;
                document.getElementById("typeSelect").value =  buttonText.replace(/\s/g, '');
            });
        });
    });
</script>