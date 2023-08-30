<!DOCTYPE html>
<html lang="en">
<?php session_start();
include 'assets/php/generateHead.php';
include 'condb.php';
if (!$_SESSION["username"] && $_SESSION["username"] != 'ADMIN') {  //check session
    Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}
?>

<?php generateHead("AdminPage", "assets/img/favicon.png"); ?>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>หน้าหลัก</span></a></li>
                <li><a href="#login" class="nav-link scrollto"><i class="bi bi-card-list"></i> <span>ข้อมูลรายชื่อผู้ใช้</span></a></li>
                <li><a href="#list" class="nav-link scrollto"><i class="bi bi-newspaper"></i><span>ข้อมูลแบบสอบถาม</span></a></li>
                <li><a href="actions/logout.php" class="nav-link scrollto bg-danger active" onclick="return confirm('ต้องการออกจากระบบหรือไม่')"><i class="bi bi-door-closed"></i> <span>ออกจากระบบ</span></a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center" style="background: rgb(0 147 255);">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <h2>ยินต้อนรับคุณ <?php echo $_SESSION["name"] . " " . $_SESSION["surname"]; ?> </h2>
            <h2>Username <?php echo $_SESSION["username"]; ?> </h2>
            <p>เข้าสู่ระบบในสถานะ <span class="typed" data-typed-items="<?php echo $_SESSION["level"]; ?>"></span></p>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- Login Section -->
        <section id="login">
            <div class="container form-control table-responsive">
                <h1>ข้อมูลรายชื่อผู้ใช้</h1>
                <p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Singup">
                        เพิ่มสมาชิก
                    </button>
                </p>
                <!-- Modal -->
                <div class="modal fade" id="Singup" tabindex="-1" aria-labelledby="SingupLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="SingupLabel">เพิ่มสมาชิก</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form name="formRegister" method="post" action="actions/createUser.php">
                                    <h1>เพิ่มสมาชิก</h1>
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
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">ประเภทผู้ใช้</span>
                                        <select class="form-control" name="level">
                                            <option value="Interested-Individual">Interested-Individual</option>
                                            <option value="Trainers">Trainers</option>
                                            <option value="Sport-professionals">Sport-professionals</option>
                                            <option value="Volunteer">Volunteer</option>
                                            <option value="Personnel/Support-Staff">Personnel/Support-Staff</option>
                                            <option value="Suppliers/Partners">Suppliers/Partners</option>
                                            <option value="Community">Community</option>
                                            <option value="ADMIN">ADMIN</option>
                                        </select>
                                    </div>
                                    <p>
                                        <input type="submit" name="Submit" value="สมัครสมาชิก" class="btn btn-primary">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table  table-bordered table-responsive-sm" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>แก้ไข ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_login = " SELECT * FROM work_login ";
                        $query_login = mysqli_query($con, $sql_login);
                        while ($fetch_login = mysqli_fetch_assoc($query_login)) { ?>
                            <tr>
                                <td> <?php echo $fetch_login['ID'] ?> </td>
                                <td> <?php echo $fetch_login['name'] . ' ' . $fetch_login['surname'] ?> </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#listLogin<?php echo $fetch_login['ID'] ?>">
                                        ดูข้อมูล
                                    </button>
                                    <a href='actions/deleteUser.php?user_id=<?php echo $fetch_login['username'] ?>' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a>
                                </td>

                                <form method="post" action="actions/updateUserLogin.php">
                                    <!-- Modal -->
                                    <div class="modal fade" id="listLogin<?php echo $fetch_login['ID'] ?>" tabindex="-1" aria-labelledby="listLoginLabel<?php echo $fetch_login['ID'] ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="listLoginLabel<?php echo $fetch_login['ID'] ?>">ข้อมูลของ <?php echo $fetch_login['name'] . ' ' . $fetch_login['surname'] ?> </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    displayValueWithFormControl('ชื่อผู้ใช้', $fetch_login['username'], 'user');
                                                    displayValueWithFormControl('รหัสผ่าน', $fetch_login['password'], 'pass');
                                                    displayValueWithFormControl('ชื่อ', $fetch_login['name'], 'name');
                                                    displayValueWithFormControl('นามสกุล', $fetch_login['surname'], 'surname');
                                                    displayValueWithFormControl('วัน/เดือน/ปีเกิด', $fetch_login['bday'], 'bday');
                                                    ?>
                                                    <div class="form-control">
                                                        <label>ระดับ</label>
                                                        <select class="form-control" name="level">
                                                            <option value="Interested-Individual" <?php if ($fetch_login['level'] == "Interested-Individual") echo "selected"; ?>>Interested-Individual</option>
                                                            <option value="Trainers" <?php if ($fetch_login['level'] == "Trainers") echo "selected"; ?>>Trainers</option>
                                                            <option value="Sport-professionals" <?php if ($fetch_login['level'] == "Sport-professionals") echo "selected"; ?>>Sport-professionals</option>
                                                            <option value="Volunteer" <?php if ($fetch_login['level'] == "Volunteer") echo "selected"; ?>>Volunteer</option>
                                                            <option value="Personnel/Support-Staff" <?php if ($fetch_login['level'] == "Personnel/Support-Staff") echo "selected"; ?>>Personnel/Support-Staff</option>
                                                            <option value="Suppliers/Partners" <?php if ($fetch_login['level'] == "Suppliers/Partners") echo "selected"; ?>>Suppliers/Partners</option>
                                                            <option value="Community" <?php if ($fetch_login['level'] == "Community") echo "selected"; ?>>Community</option>
                                                            <option value="ADMIN" <?php if ($fetch_login['level'] == "ADMIN") echo "selected"; ?>>ADMIN</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-control">
                                                        <label>สถานะ</label>
                                                        <select class="form-control" name="status">
                                                            <option value="1" <?php if ($fetch_login['status'] == "1") echo "selected"; ?>>เปิดการใช้งาน</option>
                                                            <option value="0" <?php if ($fetch_login['status'] == "0") echo "selected"; ?>>ปิดการใช้งาน</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-warning mt-3" onclick="return confirm('ต้องการแก้ไขข้อมูลของ <?php echo $fetch_login['name'] . ' ' . $fetch_login['surname'] ?> หรือไม่')">แก้ไข</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </tr>

                        <?php }  ?>
                    </tbody>
                </table>
                <!-- Your content for the "login" section -->
            </div>
        </section>

        <!-- list Section -->
        <section id="list">
            <div class="container mt-5 form-control table-responsive">
                <h1>ข้อมูลแบบสอบถาม</h1>
                <table class="table table-bordered" style="text-align:center;">
                    <thead>

                        <tr>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>จัดการข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        function displayValueWithFormControl($label, $value, $name)
                        {
                            echo '<div class="form-group form-control">';
                            echo '<label>' . $label . '</label>';
                            echo '<input type="text" class="form-control mt-1" name="' . $name . '" value="' . $value . '" >';
                            echo '</div>';
                        }
                        $sql_Que_Personal = " SELECT * FROM question ";
                        $query_Que_Personal = mysqli_query($con, $sql_Que_Personal);
                        while ($fetch_Que_Personal = mysqli_fetch_assoc($query_Que_Personal)) { ?>

                            <tr>
                                <td><?php echo $fetch_Que_Personal['name'] ?></td>
                                <td><?php echo $fetch_Que_Personal['surname'] ?></td>

                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $fetch_Que_Personal['qid'] ?>">
                                        ดูข้อมูล
                                    </button> 
                                    <a href='actions/deleteUserQuestions.php?user_id=<?php echo $fetch_Que_Personal['username'] ?>' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a>

                                </td>
                                <form method="post" action="actions/updateUserQuestion.php">
                                    <?php include 'modal/modalQueUser.php'; ?>
                                </form>
                            </tr>

                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">

            <div class="copyright">
                &copy; Copyright <strong><span>work</span></strong>. All Rights Reserved
            </div>

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>
<?php include 'assets/js/tagScript.php'; ?>

</html>