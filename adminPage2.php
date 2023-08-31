<!DOCTYPE html>
<html lang="en">
<?php session_start();
include 'assets/php/generateHead.php';
include 'condb.php';
// if (!$_SESSION["username"] && $_SESSION["username"] != 'ADMIN') {  //check session
//     Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
// }
?>

<?php generateHead("AdminPage", "assets/img/favicon.png"); ?>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>หน้าหลัก</span></a></li>
                <li><a href="#login" class="nav-link scrollto"><i class="bi bi-card-list"></i> <span>ข้อมูลรายชื่อผู้ใช้</span></a></li>
                <li><a href="#list" class="nav-link scrollto"><i class="bi bi-newspaper"></i><span>ข้อมูลแบบสอบถาม</span></a></li>
                <li><a href="#logout" class="nav-link scrollto bg-danger active" onclick="return showLogoutConfirmation();"><i class="bi bi-door-closed"></i> <span>ออกจากระบบ</span></a></li>
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

</main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>
<?php include 'assets/js/tagScript.php'; ?>

</html>