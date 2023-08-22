<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            var level = '<?php echo $fetch['level']; ?>';
            resultObject1.empty();
            var passCount = 0;
            var notPassCount = 0;

            var url = 'get_provinAndLevelChart.php?province_id=%27' + provinceId + '%27&level=%27' + level + '%27';

            $.get(url, function(data) {
                var result = JSON.parse(data);

                if (result.length === 0) {
                    $('#myChartphp').show();
                    $('#myChart1').hide();
                    return;
                }

                $.each(result, function(index, item) {
                    var exerciseEvaluation = evaluateExercise(item.week, item.intensityOptions, item.duration);

                    if (exerciseEvaluation === "ผ่านเกณฑ์") {
                        passCount++;
                    } else {
                        notPassCount++;
                    }
                });

                resultObject1.append($('<div></div>').html('พบ = ' + result.length + ' รายการ '));
                resultObject1.append($('<div></div>').html('ผ่านเกณฑ์: ' + passCount + ' รายการ'));
                resultObject1.append($('<div></div>').html('ต่ำกว่าเกณฑ์: ' + notPassCount + ' รายการ'));

                $('#myChartphp').hide();
                $('#myChart1').show();

                createChart('myChart1', passCount, notPassCount);
            });
        });

        var provinceObject2 = $('#provinceCH2');
        var resultObject2 = $('#resultCH2');
        var myChart2 = null;

        provinceObject2.on('change', function() {
            var provinceId = $(this).val();
            resultObject2.empty();
            var passCount = 0;
            var notPassCount = 0;

            var url = 'get_Que_Provin.php?province_id=%27' + provinceId + '%27';

            $.get(url, function(data) {
                var result = JSON.parse(data);

                if (result.length === 0) {
                    $('#myChart2php').show();
                    $('#myChart2').hide();
                    return;
                }

                $.each(result, function(index, item) {
                    var exerciseEvaluation = evaluateExercise(item.week, item.intensityOptions, item.duration);

                    if (exerciseEvaluation === "ผ่านเกณฑ์") {
                        passCount++;
                    } else {
                        notPassCount++;
                    }
                });

                resultObject2.append($('<div></div>').html('พบ = ' + result.length + ' รายการ '));
                resultObject2.append($('<div></div>').html('ผ่านเกณฑ์: ' + passCount + ' รายการ'));
                resultObject2.append($('<div></div>').html('ต่ำกว่าเกณฑ์: ' + notPassCount + ' รายการ'));

                $('#myChart2php').hide();
                $('#myChart2').show();

                createChart('myChart2', passCount, notPassCount);
            });
        });
    });
</script>
<?php
include 'assets/php/evaluateExercise.php';
$week = $fetch['week'];
$intensity = $fetch['intensityOptions'];
$duration = $fetch['duration'];
$result = evaluateExercise($week, $intensity, $duration);
?>
<!-- ======= exercise Section ======= -->
<section id="exercise" class="skills section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>ข้อมูลการออกกำลังกาย</h2>
            <p>
            <div class="form-group mb-3">
                <span class="input-group-text" id="basic-addon1">สถานที่ใดที่คุณใช้ออกกำลังกายหรือเล่นกีฬาเป็นประจำ</span>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $fetch['location']; ?></textarea>
            </div>
            <div class="form-group mb-3">
                <span class="input-group-text" id="basic-addon1"> ช่วงเวลาที่คุณออกกำลังกายหรือเล่นกีฬาเป็นประจำ </span>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $fetch['period']; ?></textarea>
            </div>
            <div class="form-group mb-3">
                <span class="input-group-text" id="basic-addon1">เพราะเหตุผลใดคุณจึงออกกำลังกายหรือเล่นกีฬา </span>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $fetch['reason1']; ?></textarea>
            </div>
            <div class="form-group mb-3">
                <span class="input-group-text" id="basic-addon1">คุณคิดว่าอะไรที่จูงใจให้คุณ และครอบครัว หรือคนรอบข้างคุณ มาออกกำลังกายหรือเล่นกีฬา (ตอบเพียงคำตอบเดียว)</span>
                <input type="text" class="form-control" value="<?php echo $fetch['motiOptions']; ?>" disabled>
            </div>
            <div class="form-group mb-3">
                <span class="input-group-text" id="basic-addon1">รายการตัวเลือก ประเภทการออกกำลังกายเพื่อสุขภาพ (ตอบได้มากกว่า 1 ข้อ)</span>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $fetch['exer']; ?></textarea>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ชีพจรหลังการออกกำลังกาย</span>
                <input type="text" class="form-control" value="<?php echo $fetch['pulseAfter']; ?>" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">จำนวนวันที่ออกกำลังกายต่อสัปดาห์ (กี่วัน/ส้ปดาห์)</span>
                <input type="text" class="form-control" value="<?php echo $fetch['week']; ?>" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ความหนักของการออกกำลังกาย</span>
                <input type="text" class="form-control" value="<?php echo $fetch['intensityOptions']; ?>" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                    ระยะเวลาการออกกำลังกาย (นาที)</span>
                <input type="text" class="form-control" value="<?php echo $fetch['duration']; ?>" disabled>
            </div>
            <div class="form-group mb-3">
                <span class="input-group-text"> ผลการประเมินการออกกำลังกาย</span>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    (พิจารณาจากจำนวนวัน 3 วันต่อสัปดาห์ ความหนักของการออกกำลังกาย ระดับปานกลางถึงระดับหนัก และระยะเวลาการออกกำล้งกาย 10-20 นาทีต่อเนื่อง) => ผ่านเกณฑ์ หรือต่ำกว่าเกณฑ์
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <input type="text" class="form-control bg-info" value="<?php echo $result; ?>" disabled>
            </div>

            </p>
        </div>
        <div class="row skills-content">
            <div class="col-lg-3">
                <div class="form-control ">
                    <center>
                        <div class="form-control mb-3">
                            <p>ผลการประเมินการออกกำลังกาย รายจังหวัด เฉพาะกลุ่มที่ถูกจัดอยู่</p>
                            <?php
                            $sqlProvinCH = "SELECT * FROM provinces";
                            $queryProvinCH = mysqli_query($con, $sqlProvinCH);
                            ?>
                            <div class="form-row">
                                <div class="form-group">
                                    <select name="province_id" id="provinceCH" class="form-control" required>
                                        <option value="">เลือกจังหวัด</option>
                                        <?php while ($resultProvinCH = mysqli_fetch_assoc($queryProvinCH)) : ?>
                                            <option value="<?= $resultProvinCH['id'] ?>"><?= $resultProvinCH['name_th'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <input type="text" class="form-control mt-3" value="<?php echo $fetch['level']; ?>" disabled>
                        </div>
                        <canvas id="myChartphp"></canvas>
                        <canvas id="myChart1"></canvas>
                        <div id="resultCH"></div>
                        <script>
                            <?php
                            $passChart = 0;
                            $not_passChart = 0;
                            $levelChart = $fetch['level'];
                            $provinChart = $fetch['province_id'];

                            $sql_quesChart = " SELECT * FROM question where province_id ='$provinChart' And level = '$levelChart'";
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
                            $('#myChart1').hide();
                            const ctx1 = document.getElementById('myChartphp');
                            new Chart(ctx1, {
                                type: 'doughnut',
                                data: {
                                    labels: ['ผ่าน ' + <?php echo $passChart ?> + ' คน (' + <?php echo $passChartPercent ?> + '%)', 'ไม่ผ่าน ' + <?php echo $not_passChart ?> + ' คน (' + <?php echo $notPassChartPercent ?> + '%)'],
                                    datasets: [{
                                        label: '',
                                        data: [<?php echo $passChart ?>, <?php echo $not_passChart ?>],
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
                        </script>
                    </center>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-control">
                    <center>
                        <div class="form-control mb-3" 4>
                            <p>ผลการประเมินการออกกำลังกาย รายจังหวัด ของทุกกลุ่ม</p>
                            <?php
                            $sqlProvinCH = "SELECT * FROM provinces";
                            $queryProvinCH = mysqli_query($con, $sqlProvinCH);
                            ?>
                            <div class="form-row">
                                <div class="form-group">
                                    <select name="province_id" id="provinceCH2" class="form-control" required>
                                        <option value="">เลือกจังหวัด</option>
                                        <?php while ($resultProvinCH = mysqli_fetch_assoc($queryProvinCH)) : ?>
                                            <option value="<?= $resultProvinCH['id'] ?>"><?= $resultProvinCH['name_th'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <input type="text" class="form-control mt-3" value="-----" disabled>

                        </div>
                        <canvas id="myChart2php"></canvas>
                        <canvas id="myChart2"></canvas>
                        <div id="resultCH2"></div>
                </div>
                <script>
                    <?php
                    $passChart2 = 0;
                    $not_passChart2 = 0;
                    $provinChart2 = $fetch['province_id'];

                    $sql_quesChart2 = " SELECT * FROM question where province_id ='$provinChart' ";
                    $queryQuesChart2 = mysqli_query($con, $sql_quesChart2);
                    while ($fetchChart2 = mysqli_fetch_assoc($queryQuesChart2)) {
                        $evaluationResult2 = evaluateExercise($fetchChart2['week'], $fetchChart2['intensityOptions'], $fetchChart2['duration']);
                        if ($evaluationResult == 'ผ่านเกณฑ์') {
                            $passChart2++;
                        } else {
                            $not_passChart2++;
                        }
                    }
                    $passChartPercent2 = round(($passChart2 * 100) / ($passChart2 + $not_passChart2), 2);
                    $notPassChartPercent2 = round(($not_passChart2 * 100) / ($passChart2 + $not_passChart2), 2);
                    ?>
                    $('#myChart2').hide();
                    const ctx2 = document.getElementById('myChart2php');
                    new Chart(ctx2, {
                        type: 'doughnut',
                        data: {
                            labels: ['ผ่าน ' + <?php echo $passChart ?> + ' คน (' + <?php echo $passChartPercent ?> + '%)', 'ไม่ผ่าน ' + <?php echo $not_passChart ?> + ' คน (' + <?php echo $notPassChartPercent ?> + '%)'],
                            datasets: [{
                                label: '',
                                data: [<?php echo $passChart ?>, <?php echo $not_passChart ?>],
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
                </script>
                </center>
            </div>
        </div>
    </div>
    </div>
</section><!-- End exercise Section -->