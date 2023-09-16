<!DOCTYPE html>
<html lang="en">
<?php session_start();
include 'assets/php/generateHead.php';
include 'condb.php';
include 'assets/php/evaluateExercise.php';
if (!isset($_SESSION["username"]) || ($_SESSION["level"] !== 'ADMIN')) {
    Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}
?>

<?php generateHead("AdminPage", "assets/img/favicon.png"); ?>
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                <li><a href="#report" class="nav-link scrollto"><i class="bi bi-file-bar-graph"></i><span>สรุปรายงานผล</span></a></li>
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

        <!-- Login Section -->
        <section id="login">
            <div class="container form-control table-responsive overflow-auto" style="height: 40rem;">
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
                            <th>ชื่อผู้ใช้</th>
                            <th>ประเภท</th>
                            <th>จัดการข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $levelCounts = array(
                            'Interested-Individual' => 0,
                            'Trainers' => 0,
                            'Sport-professionals' => 0,
                            'Volunteer' => 0,
                            'Personnel/Support-Staff' => 0,
                            'Suppliers/Partners' => 0,
                            'Community' => 0,
                        );
                        $countWorkLogin = 0;

                        $sql_login = "SELECT * FROM work_login ORDER BY level ASC";
                        $query_login = mysqli_query($con, $sql_login);

                        while ($fetch_login = mysqli_fetch_assoc($query_login)) {
                            $level = $fetch_login['level'];
                            if (array_key_exists($level, $levelCounts)) {
                                $levelCounts[$level]++;
                            }
                            $countWorkLogin++;
                        ?>

                            <tr>
                                <td> <?php echo $fetch_login['name'] . ' ' . $fetch_login['surname'] ?> </td>
                                <td> <?php echo $fetch_login['level'] ?> </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#listLogin<?php echo $fetch_login['ID'] ?>">
                                        ดูข้อมูล
                                    </button>
                                    <a href='actions/deleteUser.php?user_id=<?php echo $fetch_login['username'] ?>' class="btn btn-danger mt-3" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a>
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
            <div class="container mt-5 form-control table-responsive overflow-auto" style="height: 20rem;">
                <h1>ข้อมูลแบบสอบถาม</h1>
                <table class="table table-bordered" style="text-align:center;">
                    <thead>

                        <tr>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>ประเภท</th>
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

                        $levelQueCounts = array(
                            'Interested-Individual' => 0,
                            'Trainers' => 0,
                            'Sport-professionals' => 0,
                            'Volunteer' => 0,
                            'Personnel/Support-Staff' => 0,
                            'Suppliers/Partners' => 0,
                            'Community' => 0,
                        );
                        $countQueList = 0;
                        $sql_Que_Personal = " SELECT * FROM question ORDER BY level ASC";
                        $query_Que_Personal = mysqli_query($con, $sql_Que_Personal);
                        while ($fetch_Que_Personal = mysqli_fetch_assoc($query_Que_Personal)) {
                            $level = $fetch_Que_Personal['level'];
                            if (array_key_exists($level, $levelQueCounts)) {
                                $levelQueCounts[$level]++;
                            }
                            $countQueList++;
                        ?>
                            <tr>
                                <td><?php echo $fetch_Que_Personal['name'] ?></td>
                                <td><?php echo $fetch_Que_Personal['surname'] ?></td>
                                <td> <?php echo $fetch_Que_Personal['level'] ?> </td>

                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $fetch_Que_Personal['qid'] ?>">
                                        ดูข้อมูล
                                    </button>
                                    <a href='actions/deleteUserQuestions.php?user_id=<?php echo $fetch_Que_Personal['username'] ?>' class="btn btn-danger mt-3" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a>

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

        <!-- report Section -->
        <section id="report">
            <div class="form-control  overflow-auto">
                <h1>สรุปรายงานผล</h1>
                <div class="container text-center">

                    <div class="row mt-3 d-flex justify-content-center">
                        <?php
                        function echoLevelCounts($levelArray)
                        {
                            $labels = array_map(function ($level) {
                                return "'$level'";
                            }, array_keys($levelArray));
                            echo implode(",", $labels);
                        }

                        function echoCounts($levelArray, $countWorkLogin)
                        {
                            $percentages = array_map(function ($count) use ($countWorkLogin) {
                                return number_format(($count * 100) / $countWorkLogin, 2);
                            }, $levelArray);

                            echo implode(",", $percentages);
                        }

                        ?>

                        <div class="col-lg-5">
                            <div class="card">
                                <h5>จำนวนประเภทผู้ใช้ทั้งหมด : (<?php echo $countWorkLogin; ?>)</h5>
                                <img class="" src="https://quickchart.io/chart?c={type:'pie',data:{labels:[<?php echoLevelCounts($levelCounts) ?>], datasets:[{data:[<?php echoCounts($levelCounts, $countWorkLogin) ?>] }], }, options: { plugins: { datalabels: { display: true, align: 'bottom', backgroundColor: 'white', borderRadius: 3, font: { size: 10, }, }, }, }, }" alt="">
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="card">
                                <h5>จำนวนแบบสอบถามจากผู้ใช้ทั้งหมด : (<?php echo $countQueList; ?>)</h5>
                                <img class="" src="https://quickchart.io/chart?c={type:'pie',data:{labels:[<?php echoLevelCounts($levelQueCounts) ?>], datasets:[{data:[<?php echoCounts($levelQueCounts, $countQueList) ?>] }], }, options: { plugins: { datalabels: { display: true, align: 'bottom', backgroundColor: 'white', borderRadius: 3, font: { size: 10, }, }, }, }, }" alt="">
                            </div>
                        </div>


                    </div>

                    <div class="row mt-3 d-flex justify-content-center">

                        <div class="col-lg-5">
                            <canvas class="form-control" id="loginUser"></canvas>
                            <script>
                                const levelCounts = <?php echo json_encode($levelCounts); ?>;
                                const countWorkLogin = <?php echo $countWorkLogin; ?>;

                                const dataUser = Object.values(levelCounts).map(count => ((count * 100) / countWorkLogin).toFixed(2));
                                const labelsUser = Object.keys(levelCounts).map(key => `${key} (${dataUser[Object.keys(levelCounts).indexOf(key)]}%)`);


                                const loginUserID = document.getElementById('loginUser').getContext('2d');
                                const loginUser = new Chart(loginUserID, {
                                    type: 'doughnut',
                                    data: {
                                        labels: labelsUser,
                                        datasets: [{
                                            data: dataUser,
                                            borderWidth: 1,
                                        }],
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: true,
                                            },
                                            title: {
                                                display: true,
                                                text: 'จำนวนประเภทผู้ใช้ทั้งหมด : (<?php echo $countWorkLogin; ?>)',
                                                font: {
                                                    family: 'Kanit', // ชื่อฟอนต์ Kanit
                                                    size: 16, // ปรับขนาดตัวอักษร
                                                    weight: 'bold', // ตัวหนา (ถ้าต้องการ)
                                                },
                                            },
                                        },
                                        cutout: '40%', // สร้าง Donut Chart
                                    },
                                });
                            </script>

                        </div>
                        <div class="col-lg-5">
                            <canvas class="form-control" id="queUser"></canvas>
                            <script>
                                const levelQueCounts = <?php echo json_encode($levelQueCounts); ?>;
                                const countQueList = <?php echo $countQueList; ?>;

                                const dataQue = Object.values(levelQueCounts).map(count => ((count * 100) / countQueList).toFixed(2));
                                const labelsQue = Object.keys(levelQueCounts).map(key => `${key} (${dataQue[Object.keys(levelQueCounts).indexOf(key)]}%)`);

                                const queUserID = document.getElementById('queUser').getContext('2d');
                                const queUser = new Chart(queUserID, {
                                    type: 'doughnut',
                                    data: {
                                        labels: labelsQue,
                                        datasets: [{
                                            data: dataQue,
                                            borderWidth: 1,
                                        }],
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: true,
                                            },
                                            title: {
                                                display: true,
                                                text: 'จำนวนแบบสอบถามจากผู้ใช้ทั้งหมด : (<?php echo $countQueList; ?>)',
                                                font: {
                                                    family: 'Kanit', // ชื่อฟอนต์ Kanit
                                                    size: 16, // ปรับขนาดตัวอักษร
                                                    weight: 'bold', // ตัวหนา (ถ้าต้องการ)
                                                },
                                            },
                                        },
                                        cutout: '40%', // สร้าง Donut Chart
                                    },
                                });
                            </script>

                        </div>
                    </div>

                    <div class="row mt-3 d-flex justify-content-center">
                        <div class="col-lg-5">
                            <canvas class="form-control" id="myChartphp"></canvas>
                            <script>
                                <?php
                                $passChart = 0;
                                $not_passChart = 0;

                                $sql_quesChart = " SELECT * FROM question ";
                                $queryQuesChart = mysqli_query($con, $sql_quesChart);
                                while ($fetchChart = mysqli_fetch_assoc($queryQuesChart)) {
                                    $evaluationResult = evaluateExercise($fetchChart['week'], $fetchChart['intensityOptions'], $fetchChart['duration']);
                                    if ($evaluationResult == 'ผ่านเกณฑ์') {
                                        $passChart++;
                                    } else {
                                        $not_passChart++;
                                    }
                                }
                                $passChartPercent = round(($passChart * 100) / ($passChart + $not_passChart), 2);
                                $notPassChartPercent = round(($not_passChart * 100) / ($passChart + $not_passChart), 2);
                                ?>

                                const ctx = document.getElementById('myChartphp').getContext('2d');
                                const myChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['ผ่าน ' + <?php echo $passChart ?> + ' คน (' + <?php echo $passChartPercent ?> + '%)', 'ไม่ผ่าน ' + <?php echo $not_passChart ?> + ' คน (' + <?php echo $notPassChartPercent ?> + '%)'],
                                        datasets: [{
                                            data: [<?php echo $passChart ?>, <?php echo $not_passChart ?>],
                                            borderWidth: 1,
                                        }],
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: true,
                                            },
                                            title: {
                                                display: true,
                                                text: 'ผลการประเมินของคำถามจากผู้ใช้ทั้งหมด : (<?php echo $countQueList; ?>)',
                                                font: {
                                                    family: 'Kanit', // ชื่อฟอนต์ Kanit
                                                    size: 16, // ปรับขนาดตัวอักษร
                                                    weight: 'bold', // ตัวหนา (ถ้าต้องการ)
                                                },
                                            },
                                        },
                                        cutout: '50%',
                                    },
                                });
                            </script>
                        </div>
                        <div class="col-lg-5 overflow-auto" style="height: 35rem;">
                            <div class="form-control">
                                <p>ผลการประเมินการออกกำลังกาย รายจังหวัด</p>
                                <?php
                                $sqlProvinCH = "SELECT * FROM provinces";
                                $queryProvinCH = mysqli_query($con, $sqlProvinCH);
                                ?>
                                <div class="form-row">
                                    <div class="form-group">
                                        <select name="province_id" id="provinceCH" class="form-control" required>
                                            <option value="<?php echo $fetch['province_id']; ?>">เลือกจังหวัด</option>
                                            <?php while ($resultProvinCH = mysqli_fetch_assoc($queryProvinCH)) : ?>
                                                <option value="<?= $resultProvinCH['id'] ?>"><?= $resultProvinCH['name_th'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2" id="resultCH"></div>
                                <canvas class="" id="myChart1"></canvas>
                            </div>

                            <script>
                                function evaluateExercise(daysPerWeek, intensity, duration) {
                                    if (daysPerWeek >= 3 && (intensity >= 'ระดับปานกลาง' && intensity <= 'ระดับหนัก') && duration >= 20) {
                                        return "ผ่านเกณฑ์";
                                    } else {
                                        return "ต่ำกว่าเกณฑ์";
                                    }
                                }

                                function createChart(chartId, passCount, notPassCount) {
                                    var existingChart = Chart.getChart(chartId);
                                    if (existingChart) {
                                        existingChart.destroy();
                                    }
                                    var total = passCount + notPassCount;
                                    var passPercent = ((passCount / total) * 100).toFixed(2);
                                    var notPassPercent = ((notPassCount / total) * 100).toFixed(2);

                                    const ctx = document.getElementById(chartId);
                                    new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['ผ่าน ' + passCount + ' คน (' + passPercent + '%)', 'ไม่ผ่าน ' + notPassCount + ' คน (' + notPassPercent + '%)'],
                                            datasets: [{
                                                label: '',
                                                data: [passCount, notPassCount],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                }

                                $(function() {
                                    var provinceObject1 = $('#provinceCH');
                                    var resultObject1 = $('#resultCH');

                                    provinceObject1.on('change', function() {
                                        var provinceId = $(this).val();
                                        var level = '';
                                        resultObject1.empty();
                                        var passCount = 0;
                                        var notPassCount = 0;
                                        var getNameTH = '';

                                        var url = 'assets/ajax/getQuestionsByProvince.php?province_id=' + provinceId;

                                        $.get(url, function(data) {
                                            var result = JSON.parse(data);

                                            if (result.length === 0) {
                                                $('#myChart1').hide();
                                                resultObject1.append($('<div></div>').html('พบ = ' + result.length + ' รายการ '));
                                                return;
                                            }

                                            $.each(result, function(index, item) {
                                                var exerciseEvaluation = evaluateExercise(item.week, item.intensityOptions, item.duration);

                                                if (exerciseEvaluation === "ผ่านเกณฑ์") {
                                                    passCount++;
                                                } else {
                                                    notPassCount++;
                                                }

                                                getNameTH = item.name_th;
                                            });

                                            resultObject1.append($('<div></div>').html('จังหวัด = ' + getNameTH + ' รายการ '));
                                            resultObject1.append($('<div></div>').html('พบ = ' + result.length + ' รายการ '));
                                            resultObject1.append($('<div></div>').html('ผ่านเกณฑ์: ' + passCount + ' รายการ'));
                                            resultObject1.append($('<div></div>').html('ต่ำกว่าเกณฑ์: ' + notPassCount + ' รายการ'));

                                            $('#myChart1').show();

                                            createChart('myChart1', passCount, notPassCount);
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>


                    <script>
                        <?php
                        function displayCustomList($text, $items = [])
                        {
                            if ($text !== "---,---" && trim($text) !== "") {
                                if (strpos($text, ',') !== false) {
                                    $itemList = explode(',', $text);
                                    $items = array_merge($items, $itemList);
                                } else {
                                    $items[] = $text;
                                }
                            }

                            return $items;
                        }

                        function displayCustomItems($items = [])
                        {
                            foreach ($items as $item) {
                                echo '<div class="alert alert-secondary" role="alert">';
                                echo '<span>- ' . $item . '</span>';
                                echo '</div>';
                            }
                        }
                        ?>
                        $(function() {
                            var provinceExSportObject = $('#provinceEXsportS5');
                            var exSportObject = $('#exSportS5');

                            exSportObject.hide();

                            provinceExSportObject.on('change', function() {
                                exSportObject.show();
                                var provinceId = $(this).val();
                                exSportObject.empty();

                                var url = 'assets/ajax/getQuestionsByProvince.php?province_id=' + provinceId;

                                $.get(url, function(data) {
                                    var result = JSON.parse(data);
                                    var itemCount = 0;
                                    var resArray = [];

                                    $.each(result, function(index, item) {
                                        if (item.exper_sports !== "---,---" && item.exper_sports.trim() !== "") {
                                            itemCount++;
                                            var resText = item.exper_sports;

                                            if (resText.includes(',')) {
                                                var resItems = resText.split(',');
                                                resArray = resArray.concat(resItems);
                                            } else {
                                                resArray.push(resText);
                                            }
                                        }
                                    });

                                    exSportObject.append($('<div class="btn btn-primary mb-3 mt-3"></div>').text('ผลลัพธ์ = ' + resArray.length + ' รายการ '));
                                    exSportObject.append($('<br>'));
                                    $.each(resArray, function(index, resItem) {
                                        exSportObject.append($('<div class="alert alert-secondary" role="alert"></div>').html('<span>' + '-' + resItem + '</span>'));
                                    });


                                }).fail(function() {
                                    exSportObject.empty();
                                    exSportObject.append($('<div></div>').text('เกิดข้อผิดพลาดในการดึงข้อมูล'));
                                });
                            });



                            var provinceObject = $('#provinceResS5');
                            var ResObject = $('#resS5');

                            ResObject.hide();

                            provinceObject.on('change', function() {
                                ResObject.show();
                                var provinceId = $(this).val();
                                ResObject.empty();

                                var url = 'assets/ajax/getQuestionsByProvince.php?province_id=' + provinceId;

                                $.get(url, function(data) {
                                    var result = JSON.parse(data);
                                    var itemCount = 0;
                                    var resArray = []; // เพิ่มตัวแปรเพื่อเก็บค่า item.pub_res ที่มี comma

                                    $.each(result, function(index, item) {
                                        if (item.res !== "---,---" && item.res.trim() !== "") {
                                            itemCount++;
                                            var resText = item.res;

                                            if (resText.includes(',')) {
                                                var resItems = resText.split(','); // แยกข้อมูลด้วย comma เพื่อสร้าง Array
                                                resArray = resArray.concat(resItems); // เพิ่มข้อมูลใน Array
                                            } else {
                                                resArray.push(resText);
                                            }
                                        }
                                    });

                                    ResObject.append($('<div class="btn btn-primary mb-3 mt-3"></div>').text('ผลลัพธ์ = ' + resArray.length + ' รายการ '));
                                    ResObject.append($('<br>'));
                                    $.each(resArray, function(index, resItem) {
                                        ResObject.append($('<div class="alert alert-secondary" role="alert"></div>').html('<span>' + '-' + resItem + '</span>'));
                                    });

                                }).fail(function() {
                                    ResObject.empty();
                                    ResObject.append($('<div></div>').text('เกิดข้อผิดพลาดในการดึงข้อมูล'));
                                });
                            });


                            // on change province for publication results
                            var provincePubresObject = $('#provincePubresS5');
                            var pubResObject = $('#pubresS5');

                            pubResObject.hide();

                            provincePubresObject.on('change', function() {
                                var provinceId = $(this).val();
                                pubResObject.empty();

                                pubResObject.show();

                                var url = 'assets/ajax/getQuestionsByProvince.php?province_id=' + provinceId;

                                $.get(url, function(data) {
                                    var result = JSON.parse(data);
                                    var itemCount = 0;
                                    var resArray = [];

                                    $.each(result, function(index, item) {
                                        if (item.pub_res !== "---,---" && item.pub_res.trim() !== "") {
                                            itemCount++;
                                            var resText = item.pub_res;

                                            if (resText.includes(',')) {
                                                var resItems = resText.split(',');
                                                resArray = resArray.concat(resItems);
                                            } else {
                                                resArray.push(resText);
                                            }
                                        }
                                    });

                                    pubResObject.append($('<div class="btn btn-primary mb-3 mt-3"></div>').text('ผลลัพธ์ = ' + resArray.length + ' รายการ '));
                                    pubResObject.append($('<br>'));
                                    $.each(resArray, function(index, resItem) {
                                        pubResObject.append($('<div class="alert alert-secondary" role="alert"></div>').html('<span>' + '-' + resItem + '</span>'));
                                    });

                                }).fail(function() {
                                    pubResObject.empty();
                                    pubResObject.append($('<div></div>').text('เกิดข้อผิดพลาดในการดึงข้อมูล'));
                                });
                            });


                            var provinceVolExperObject = $('#provinceVolExper');
                            var volExperObject = $('#volExper');

                            volExperObject.hide();

                            provinceVolExperObject.on('change', function() {
                                var provinceId = $(this).val();
                                volExperObject.empty();

                                volExperObject.show();

                                var url = 'assets/ajax/getQuestionsByProvince.php?province_id=' + provinceId;

                                $.get(url, function(data) {
                                    var result = JSON.parse(data);
                                    var itemCount = 0;
                                    var resArray = [];

                                    $.each(result, function(index, item) {
                                        if (item.vol_exper !== "---" && item.vol_exper.trim() !== "") {
                                            itemCount++;
                                            var resText = item.vol_exper;

                                            if (resText.includes(',')) {
                                                var resItems = resText.split(',');
                                                resArray = resArray.concat(resItems);
                                            } else {
                                                resArray.push(resText);
                                            }
                                        }
                                    });

                                    volExperObject.append($('<div class="btn btn-primary mb-3 mt-3"></div>').text('ผลลัพธ์ = ' + resArray.length + ' รายการ '));
                                    volExperObject.append($('<br>'));
                                    $.each(resArray, function(index, resItem) {
                                        volExperObject.append($('<div class="alert alert-secondary" role="alert"></div>').html('<span>' + '-' + resItem + '</span>'));
                                    });

                                }).fail(function() {
                                    volExperObject.empty();
                                    volExperObject.append($('<div></div>').text('เกิดข้อผิดพลาดในการดึงข้อมูล'));
                                });
                            });


                        });
                    </script>
                    <div class="row mt-3 d-flex justify-content-center">
                        <div class="col-lg-5">
                            <div class="form-control mb-3">
                                <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพของผู้เชี่ยวชาญทั้งหมด</p>
                                <div class="form-control overflow-auto" style="height: 15rem;">
                                    <?php
                                    $exSportArray = array(); // สร้างอาเรย์เปล่าไว้ก่อน
                                    $sqlALLexSport = "SELECT * FROM question";
                                    $queryALLexSport = mysqli_query($con, $sqlALLexSport);
                                    while ($resultALLexSport = mysqli_fetch_assoc($queryALLexSport)) : ?>
                                        <?php
                                        $exSportText = $resultALLexSport['exper_sports'];
                                        $exSportArray = displayCustomList($exSportText, $exSportArray);
                                        ?>
                                    <?php endwhile; ?>
                                    <div class="btn btn-primary mb-3 mt-3"> <?php echo 'ผลลัพธ์ = ' . count($exSportArray) . ' รายการ'; ?></div> <br>
                                    <?php displayCustomItems($exSportArray) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 overflow-auto" style="height: 19rem;">
                            <div class="form-control mb-3">
                                <p> สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพของผู้เชี่ยวชาญทั้งหมด แยกตามจังหวัด</p>
                                <select name="province_id" id="provinceEXsportS5" class="form-control mb-3" required>
                                    <option value="<?php echo $fetch['province_id']; ?>">เลือกจังหวัด</option>
                                    <?php
                                    $sqlProvinceEXsportS5 = "SELECT * FROM provinces";
                                    $queryProvinceEXsportS5 = mysqli_query($con, $sqlProvinceEXsportS5);
                                    while ($resultProvinceEXsportS5 = mysqli_fetch_assoc($queryProvinceEXsportS5)) : ?>
                                        <option value="<?= $resultProvinceEXsportS5['id'] ?>"><?= $resultProvinceEXsportS5['name_th'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <div id="exSportS5" class="form-control"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 d-flex justify-content-center">
                        <div class="col-lg-5">
                            <div class="form-control mb-3">
                                <p>งานวิจัยทั้งหมด</p>
                                <div class="form-control overflow-auto" style="height: 15rem;">
                                    <?php
                                    $resArray = array(); // สร้างอาเรย์เปล่าไว้ก่อน
                                    $sqlALLRes = "SELECT * FROM question";
                                    $queryALLRes = mysqli_query($con, $sqlALLRes);
                                    while ($resultALLRes = mysqli_fetch_assoc($queryALLRes)) : ?>
                                        <?php
                                        $resText = $resultALLRes['res'];
                                        $resArray = displayCustomList($resText, $resArray);
                                        ?>
                                    <?php endwhile; ?>
                                    <div class="btn btn-primary mb-3 mt-3"> <?php echo 'ผลลัพธ์ = ' . count($resArray) . ' รายการ'; ?></div> <br>
                                    <?php displayCustomItems($resArray) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 overflow-auto" style="height: 19rem;">
                            <div class="form-control mb-3">
                                <p>งานวิจัยทั้งหมดแยกจังหวัด</p>
                                <select name="province_id" id="provinceResS5" class="form-control mb-3" required>
                                    <option value="<?php echo $fetch['province_id']; ?>">เลือกจังหวัด</option>
                                    <?php
                                    $sqlProvinResS5 = "SELECT * FROM provinces";
                                    $queryProvinResS5  = mysqli_query($con, $sqlProvinResS5);
                                    while ($resultProvinResS5 = mysqli_fetch_assoc($queryProvinResS5)) : ?>
                                        <option value="<?= $resultProvinResS5['id'] ?>"><?= $resultProvinResS5['name_th'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <div id="resS5" class="form-control"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 d-flex justify-content-center">
                        <div class="col-lg-5">
                            <div class="form-control mb-3">
                                <p>การเผยแพร่ผลงานวิจัยทั้งหมด</p>
                                <div class="form-control overflow-auto" style="height: 15rem;">
                                    <?php
                                    $pubResArray = array(); // สร้างอาเรย์เปล่าไว้ก่อน
                                    $sqlALLPubresS5 = "SELECT * FROM question";
                                    $queryALLPubresS5 = mysqli_query($con, $sqlALLPubresS5);
                                    while ($resultALLPubresS5 = mysqli_fetch_assoc($queryALLPubresS5)) : ?>
                                        <?php
                                        $pubResText = $resultALLPubresS5['pub_res'];
                                        $pubResArray = displayCustomList($pubResText, $pubResArray);
                                        ?>
                                    <?php endwhile; ?>
                                    <div class="btn btn-primary mb-3 mt-3"> <?php echo 'ผลลัพธ์ = ' . count($pubResArray) . ' รายการ'; ?></div> <br>
                                    <?php displayCustomItems($pubResArray) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 overflow-auto" style="height: 19rem;">
                            <div class="form-control mb-3">
                                <p> การเผยแพร่ผลงานวิจัยรายจังหวัด</p>
                                <select name="province_id" id="provincePubresS5" class="form-control mb-3" required>
                                    <option value="<?php echo $fetch['province_id']; ?>">เลือกจังหวัด</option>
                                    <?php
                                    $sqlProvinPubresS5 = "SELECT * FROM provinces";
                                    $queryProvinPubresS5 = mysqli_query($con, $sqlProvinPubresS5);
                                    while ($resultProvinPubresS5 = mysqli_fetch_assoc($queryProvinPubresS5)) : ?>
                                        <option value="<?= $resultProvinPubresS5['id'] ?>"><?= $resultProvinPubresS5['name_th'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <div id="pubresS5" class="form-control"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 d-flex justify-content-center">
                        <div class="col-lg-5">
                            <div class="form-control mb-3">
                                <p>อาสาสมัครทั้งหมด</p>
                                <div class="form-control overflow-auto" style="height: 15rem;">
                                    <?php
                                    $volExperArray = array();
                                    $sqlALLVolExper = "SELECT * FROM question";
                                    $queryALLVolExper = mysqli_query($con, $sqlALLVolExper);
                                    while ($resultALLVolExper = mysqli_fetch_assoc($queryALLVolExper)) : ?>
                                        <?php
                                        if ($resultALLVolExper['vol_exper'] !== '---') {
                                            $volExperText = $resultALLVolExper['vol_exper'];
                                            $volExperArray = displayCustomList($volExperText, $volExperArray);
                                        }
                                        ?>
                                    <?php endwhile; ?>
                                    <div class="btn btn-primary mb-3 mt-3"> <?php echo 'ผลลัพธ์ = ' . count($volExperArray) . ' รายการ'; ?></div> <br>
                                    <?php displayCustomItems($volExperArray) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 overflow-auto" style="height: 19rem;">
                            <div class="form-control mb-3">
                                <p> อาสาสมัครแยกตามจังหวัด</p>
                                <select name="province_id" id="provinceVolExper" class="form-control mb-3" required>
                                    <option value="<?php echo $fetch['province_id']; ?>">เลือกจังหวัด</option>
                                    <?php
                                    $sqlProvinVolExper = "SELECT * FROM provinces";
                                    $queryProvinVolExper = mysqli_query($con, $sqlProvinVolExper);
                                    while ($resultProvinVolExper = mysqli_fetch_assoc($queryProvinVolExper)) : ?>
                                        <option value="<?= $resultProvinVolExper['id'] ?>"><?= $resultProvinVolExper['name_th'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <div id="volExper" class="form-control"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 d-flex justify-content-center">
                        <?php include 'assets/php/displayExperienceSection.php'; ?>
                        <div class="section-title ">
                            <h2>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ Suppliers/Partners</h2>
                        </div>

                        <!-- ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlOrg = "SELECT * FROM question";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colOrg = "org_heal";
                            // หัวเรื่อง
                            $titleOrg = "ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlOrg, $colOrg, $titleOrg);
                            ?>
                        </div>

                        <!-- ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพของ Suppliers/Partners แยกตามกิจกรรม -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlOrgLevel = "SELECT * FROM question where level = 'Suppliers/Partners' ";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colOrgLevel = "org_heal";
                            // หัวเรื่อง
                            $titleOrgLevel = "ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพของ Suppliers/Partners แยกตามกิจกรรม";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlOrgLevel, $colOrgLevel, $titleOrgLevel);
                            ?>
                        </div>

                        <!-- โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlProOrg  = "SELECT * FROM question ";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colProOrg = "pro_org_exer";
                            // หัวเรื่อง
                            $titleProOrg  = "โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlProOrg, $colProOrg, $titleProOrg);
                            ?>
                        </div>

                        <!-- โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ แยกตาม Suppliers/Partners -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlProOrgLevel  = "SELECT * FROM question where level = 'Suppliers/Partners' ";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colProOrgLevel = "pro_org_exer";
                            // หัวเรื่อง
                            $titleProOrgLevel  = "โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ แยกตาม Suppliers/Partners";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlProOrgLevel, $colProOrgLevel, $titleProOrgLevel);
                            ?>
                        </div>

                        <!-- กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlActivity  = "SELECT * FROM question ";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colActivity = "activity";
                            // หัวเรื่อง
                            $titleActivity = "กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlActivity, $colActivity, $titleActivity);
                            ?>
                        </div>

                        <!-- กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม แยกตาม Suppliers/Partners	 -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlActivityLevel  = "SELECT * FROM question where level = 'Suppliers/Partners' ";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colActivityLevel  = "activity";
                            // หัวเรื่อง
                            $titleActivityLevel  = "กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม แยกตาม Suppliers/Partners";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlActivityLevel, $colActivityLevel, $titleActivityLevel);
                            ?>
                        </div>


                    </div>

                    <div class="row mt-3 d-flex justify-content-center">

                        <div class="section-title">
                            <h2>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ Community</h2>
                        </div>


                        <!-- ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlOrg = "SELECT * FROM question";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colOrg = "org_heal";
                            // หัวเรื่อง
                            $titleOrg = "ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlOrg, $colOrg, $titleOrg);
                            ?>
                        </div>

                        <!-- ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพของ Community แยกตามจังหวัด -->
                        <div class="col-lg-5 card mb-3">
                            <p>ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพของ Community แยกตามจังหวัด</p>
                            <select name="province_id" id="provinceOrgS5" class="form-control mb-3" required>
                                <option value="<?php echo $fetch['province_id']; ?>">เลือกจังหวัด</option>
                                <?php
                                $sqlProvinceEXsportS5 = "SELECT * FROM provinces";
                                $queryProvinceEXsportS5 = mysqli_query($con, $sqlProvinceEXsportS5);
                                while ($resultProvinceEXsportS5 = mysqli_fetch_assoc($queryProvinceEXsportS5)) : ?>
                                    <option value="<?= $resultProvinceEXsportS5['id'] ?>"><?= $resultProvinceEXsportS5['name_th'] ?></option>
                                <?php endwhile; ?>
                            </select>
                            <div id="orgS5" class="form-control overflow-auto" style="height: 15rem;"></div>
                        </div>

                        <!-- โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlProOrg  = "SELECT * FROM question ";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colProOrg = "pro_org_exer";
                            // หัวเรื่อง
                            $titleProOrg  = "โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlProOrg, $colProOrg, $titleProOrg);
                            ?>
                        </div>

                        <!-- โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ แยกตาม Suppliers/Partners -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlProOrgLevel  = "SELECT * FROM question where level = 'Suppliers/Partners' ";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colProOrgLevel = "pro_org_exer";
                            // หัวเรื่อง
                            $titleProOrgLevel  = "โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ แยกตาม Suppliers/Partners";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlProOrgLevel, $colProOrgLevel, $titleProOrgLevel);
                            ?>
                        </div>

                        <!-- กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlActivity  = "SELECT * FROM question ";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colActivity = "activity";
                            // หัวเรื่อง
                            $titleActivity = "กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlActivity, $colActivity, $titleActivity);
                            ?>
                        </div>

                        <!-- กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม แยกตาม Suppliers/Partners	 -->
                        <div class="col-lg-5">
                            <?php
                            // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                            $sqlActivityLevel  = "SELECT * FROM question where level = 'Suppliers/Partners' ";
                            // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                            $colActivityLevel  = "activity";
                            // หัวเรื่อง
                            $titleActivityLevel  = "กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม แยกตาม Suppliers/Partners";

                            // เรียกใช้ฟังก์ชันเพื่อแสดงส่วนของประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ
                            displayExperienceSection($con, $sqlActivityLevel, $colActivityLevel, $titleActivityLevel);
                            ?>
                        </div>

                        <script>
                            $(function() {
                                var provinceOrgObject = $('#provinceOrgS5');
                                var orgObject = $('#orgS5');

                                orgObject.hide();

                                provinceOrgObject.on('change', function() {
                                    orgObject.show();
                                    var provinceId = $(this).val();
                                    orgObject.empty();

                                    var url = 'assets/ajax/getQuestionsByProvince.php?province_id=' + provinceId;

                                    $.get(url, function(data) {
                                        var result = JSON.parse(data);
                                        var itemCount = 0;
                                        var resArray = [];

                                        $.each(result, function(index, item) {
                                            if (item.org_heal.trim() !== "---" && item.org_heal.trim() !== "" && item.org_heal.trim() !== "มี" && item.org_heal.trim() !== "ไม่มี" && item.org_heal.trim() !== "---,---") {
                                                itemCount++;
                                                var resText = item.org_heal;

                                                if (resText.includes(',')) {
                                                    var resItems = resText.split(',');
                                                    resArray = resArray.concat(resItems);
                                                } else {
                                                    resArray.push(resText);
                                                }
                                            }
                                        });

                                        orgObject.append($('<div class="btn btn-primary mb-3 mt-3"></div>').text('ผลลัพธ์ = ' + resArray.length + ' รายการ '));
                                        orgObject.append($('<br>'));
                                        $.each(resArray, function(index, resItem) {
                                            orgObject.append($('<div class="alert alert-secondary" role="alert"></div>').html('<center>' + '-' + resItem + '</center>'));
                                        });


                                    }).fail(function() {
                                        orgObject.empty();
                                        orgObject.append($('<div></div>').text('เกิดข้อผิดพลาดในการดึงข้อมูล'));
                                    });
                                });
                            });
                        </script>
                    </div>

                </div>
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