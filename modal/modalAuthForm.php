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
                        <?php include "form/FormLogin.php"; ?>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <?php include "form/FormRegister.php"; ?>
                    </div>
                </div>
            </div> 
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
                document.getElementById("typeSelect").value = buttonText.replace(/\s/g, '');
            });
        });
    });
</script>