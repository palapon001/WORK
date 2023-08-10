<?php
session_start();
if (isset($_POST['username'])) {
  //connection
  include("condb.php");
  //รับค่า user & password
  $username = $_POST['username'];
  $password = $_POST['password'];
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
      echo "alert(' username รอการตรวจสอบ  !');";
      echo "window.location='index.php';";
      echo "</script>";
    } else {
      $row = mysqli_fetch_array($result);
      $_SESSION["username"] = $row["username"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["surname"] = $row["surname"];
      $_SESSION["level"] = $row["level"];
      Header("Location: page.php");
    }
  } else {
    echo "<script>";
    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {

  Header("Location: index.php"); //user & password incorrect back to login again

}
