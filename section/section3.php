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

                <?php
                include 'assets/php/evaluateExercise.php';
                $week = $fetch['week'];
                $intensity = $fetch['intensityOptions'];
                $duration = $fetch['duration'];

                $result = evaluateExercise($week, $intensity, $duration);

                ?>
                <input type="text" class="form-control bg-info" value="<?php echo $result; ?>" disabled>
            </div>

            </p>
        </div>

        <div class="row skills-content">

            <div class="col-lg-3">
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    $(function() {
                        var provinceObject = $('#provinceCH');
                        var resultObject = $('#resultCH');

                        // on change province
                        provinceObject.on('change', function() {
                            var provinceId = $(this).val();
                            var level = '<?php echo $fetch['level']; ?>';

                            resultObject.empty();

                            var url = 'get_provinChart.php?province_id=%27' + provinceId + '%27&level=%27' + level + '%27';

                            $.get(url, function(data) {
                                var result = JSON.parse(data);

                                $.each(result, function(index, item) {
                                    var exerciseEvaluation = item.week + item.intensityOptions + item.duration;

                                    $.get('get_evaluate_exercise.php', {
                                        daysPerWeek: item.week,
                                        intensity: item.intensityOptions,
                                        duration: item.duration
                                    }, function(response) {
                                        resultObject.append(
                                            $('<div></div>').html('พบ = ' + result.length + ' รายการ ' + exerciseEvaluation + ' ' + response)
                                        );
                                    });

                                    // return false;
                                });
                            });
                        });

                    });
                </script>
                <div>
                    <center>
                        <canvas id="myChart1"></canvas>
                        <p>ผลการประเมินการออกกำลังกาย รายจังหวัด เฉพาะกลุ่มที่ถูกจัดอยู่</p>
                        <div class="form-control mb-3">
                            <p>เลือกจังหวัด</p>

                            <?php
                            $sqlProvinCH = "SELECT * FROM provinces";
                            $queryProvinCH = mysqli_query($con, $sqlProvinCH);
                            ?>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="province">จังหวัด</label>
                                    <select name="province_id" id="provinceCH" class="form-control" required>
                                        <option value="">เลือกจังหวัด</option>
                                        <?php while ($resultProvinCH = mysqli_fetch_assoc($queryProvinCH)) : ?>
                                            <option value="<?= $resultProvinCH['id'] ?>"><?= $resultProvinCH['name_th'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="resultCH">test</div>

                        <?php
                        function countQexer($q)
                        {
                            $no = 0;
                            $pass = 0;
                            $not_pass = 0;
                        ?>
                        <?php
                            while ($fetchQuser = mysqli_fetch_assoc($q)) {
                                $no++;
                                $resultExer = evaluateExercise($fetchQuser['week'], $fetchQuser['intensityOptions'], $fetchQuser['duration']);
                                if ($resultExer == 'ผ่านเกณฑ์') {
                                    $pass++;
                                } else {
                                    $not_pass++;
                                }
                            }
                            return $result = array($pass, $not_pass);
                        }
                        $sql_quser = " SELECT * FROM question  ";
                        $queryQuser = mysqli_query($con, $sql_quser);
                        list($res1, $res2) = countQexer($queryQuser);
                        ?>
                    </center>
                </div>
                <script>
                    const ctx1 = document.getElementById('myChart1');

                    new Chart(ctx1, {
                        type: 'doughnut',
                        data: {
                            labels: ['ผ่าน <?php echo $res1; ?> คน (<?php echo round($res1 * 100 / ($res1 + $res2), 2); ?> %)', 'ไม่ผ่าน<?php echo $res2; ?> คน (<?php echo round($res2 * 100 / ($res1 + $res2), 2); ?> %)'],
                            datasets: [{
                                label: '',
                                data: [<?php echo $res1; ?>, <?php echo $res2; ?>],
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
            </div>

            <div class="col-lg-3">

                <div>
                    <center>
                        <canvas id="myChart2"></canvas>
                        <p>ผลการประเมินการออกกำลังกาย รายจังหวัด ของทุกกลุ่ม</p>
                        <?php
                        $sql_qusername = " SELECT * FROM question where username = '1' ";
                        $queryQusername = mysqli_query($con, $sql_qusername);
                        list($resU1, $resU2) = countQexer($queryQusername);
                        ?>
                    </center>
                </div>
                <script>
                    const ctx2 = document.getElementById('myChart2');

                    new Chart(ctx2, {
                        type: 'doughnut',
                        data: {
                            labels: ['ผ่าน <?php echo $resU1; ?>', 'ไม่ผ่าน<?php echo $resU2; ?>'],
                            datasets: [{
                                label: '',
                                data: [<?php echo $resU1; ?>, <?php echo $resU2; ?>],
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
            </div>



        </div>

    </div>
</section><!-- End exercise Section -->