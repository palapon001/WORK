<!DOCTYPE html>
<html lang="en">
<?php session_start();
include 'tag_head.php';
include 'condb.php';
if (!$_SESSION["username"] || $_SESSION["username"] != 'ADMIN') {  //check session
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
                <!-- <?php echo $foundUser;  ?> -->
                <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>หน้าหลัก</span></a></li>
                <li><a href="#login" class="nav-link scrollto"><i class="bi bi-card-list"></i> <span>ข้อมูลรายชื่อผู้ใช้</span></a></li>
                <li><a href="#list" class="nav-link scrollto"><i class="bi bi-newspaper"></i><span>ข้อมูลแบบสอบถาม</span></a></li>
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
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- Login Section -->
        <section id="login">
            <div class="container form-control table-responsive">
                <h1>ข้อมูลรายชื่อผู้ใช้</h1>
                <table class="table table-info table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>รหัสผ่าน</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>วันเกิด</th>
                            <th>ระดับ</th> 
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_login = " SELECT * FROM work_login ";
                        $query_login = mysqli_query($con, $sql_login);
                        while ($fetch_login = mysqli_fetch_assoc($query_login)) { ?>

                            <tr>
                                <form method="post" action="check_edit_regis.php">
                                <td><input type="text" name="id" value="<?php echo $fetch_login['ID'] ?>" class="form-control"></td>
                                <td><input type="text" name="user" value="<?php echo $fetch_login['username'] ?>" class="form-control"></td>
                                <td><input type="text" name="pass" value="<?php echo $fetch_login['password'] ?>" class="form-control"></td>
                                <td><input type="text" name="name" value="<?php echo $fetch_login['name'] ?>" class="form-control"></td>
                                <td><input type="text" name="surname" value="<?php echo $fetch_login['surname'] ?>" class="form-control"></td>
                                <td><input type="text" name="bday" value="<?php echo $fetch_login['bday'] ?>" class="form-control"></td>
                                <td><input type="text" name="level" value="<?php echo $fetch_login['level'] ?>" class="form-control"></td>
                                <td><button type="submit" class="btn btn-warning">แก้ไข</button></td>
                                </form>
                                <td>
                                    <a href='check_del_login.php?user_id=<?php echo $fetch_login['username'] ?>' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a>
                                </td>
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
                        function displayValueWithFormControl($label, $value,$name)
                        {
                            echo '<div class="form-group form-control">';
                            echo '<label>' . $label . '</label>';
                            echo '<input type="text" class="form-control mt-1" name="'.$name.'" value="' . $value . '" >';
                            echo '</div>';
                        }
                        $sql_Que_Personal = " SELECT * FROM question ";
                        $query_Que_Personal = mysqli_query($con, $sql_Que_Personal);
                        while ($fetch_Que_Personal = mysqli_fetch_assoc($query_Que_Personal)) { ?>

                            <tr>
                                <td><?php echo $fetch_Que_Personal['name'] ?></td>
                                <td><?php echo $fetch_Que_Personal['surname'] ?></td>

                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $fetch_Que_Personal['name'] ?>">
                                        ดูข้อมูล
                                    </button>
                                    <a href='check_del_que.php?user_id=<?php echo $fetch_Que_Personal['username'] ?>' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a>

                                </td>
                                <form method="post" action="check_edit_que.php">
                                    <?php include 'modalQueUser.php'; ?>
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
<?php include 'tag_script.php'; ?>

</html>