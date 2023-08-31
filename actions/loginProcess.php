<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>loginProcess</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
</head>

<body>
  <?php
  session_start();
  if (isset($_POST['username'])) {
    //connection
    include("../condb.php");
    //รับค่า user & password
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    //query 
    $sql = "SELECT * FROM work_login Where username='" . $username . "' and password='" . $password . "' ";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
      $check = "select * from work_login  where username = '$username' and status = 0 ";
      $result1 = mysqli_query($con, $check) or die("$check");
      $num = mysqli_num_rows($result1);
      if ($num > 0) {
        //ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
        echo "<script>";
        echo "Swal.fire({
                title: 'รอการตรวจสอบ',
                text: 'Username รอการตรวจสอบ',
                icon: 'info',
                timer: 5000  // 5 วินาที
            }).then(() => {
                window.history.back();
            });";
        echo "</script>";
      } else {
        $row = mysqli_fetch_array($result);
        $_SESSION["username"] = $row["username"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["surname"] = $row["surname"];
        $_SESSION["level"] = $row["level"];
        $_SESSION["bday"] = $row["bday"];
        if (strtoupper($row["level"]) == 'ADMIN') {
          Header("Location: ../adminPage.php");
        } else {
          Header("Location: ../home.php");
        }
      }
    } else {
      echo "<script>";
      echo "Swal.fire({
        title: 'ผิดพลาด',
        text: 'Username หรือ Password ไม่ถูกต้อง',
        icon: 'error',
        timer: 5000  // 5 วินาที
    }).then(() => {
        window.history.back();
    });";
      echo "</script>";
    }
  } else {

    Header("Location: ../index.php"); //user & password incorrect back to login again

  }
  ?>
</body>

</html>