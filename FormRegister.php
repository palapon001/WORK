<form name="formRegister" method="post" action="check_regis.php">
    <h1>สมัครสมาชิก</h1>
    <div class="input-group mb-3">
        <span class="input-group-text">ชื่อ</span>
        <input name="name" type="text" id="name" class="form-control" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">นามสกุล</span>
        <input name="surname" type="text" id="surname" class="form-control" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">วันเกิด</span>
        <input name="bday" type="date" id="bday" class="form-control" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Username</span>
        <input name="user" type="text" id="user" class="form-control" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Password</span>
        <input name="pass" type="password" id="pass" class="form-control" required>
    </div>
    <p>
        <input type="hidden" id="typeSelect" value="" name="level" class="form-control">
    </p>
    <p>
        <input type="submit" name="Submit" value="สมัครสมาชิก" class="btn btn-primary">
    </p>
</form>