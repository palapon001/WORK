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
                    function evaluateExercise(daysPerWeek, intensity, duration) {
                        if (daysPerWeek >= 3 && (intensity >= 'ระดับปานกลาง' && intensity <= 'ระดับหนัก') && duration >= 20) {
                            return "ผ่านเกณฑ์";
                        } else {
                            return "ต่ำกว่าเกณฑ์";
                        }
                    }

                    $(function() {
                        var provinceObject = $('#provinceCH');
                        var resultObject = $('#resultCH');
                        var passCount = 0;
                        var notPassCount = 0;
                        var myChart1 = null;

                        provinceObject.on('change', function() {
                            var provinceId = $(this).val();
                            var level = '<?php echo $fetch['level']; ?>';

                            resultObject.empty();
                            passCount = 0;
                            notPassCount = 0;
                            

                            var url = 'get_provinChart.php?province_id=%27' + provinceId + '%27&level=%27' + level + '%27';

                            $.get(url, function(data) {
                                var result = JSON.parse(data);

                                $.each(result, function(index, item) {
                                    var exerciseEvaluation = evaluateExercise(item.week, item.intensityOptions, item.duration);

                                    if (exerciseEvaluation === "ผ่านเกณฑ์") {
                                        passCount++;
                                    } else {
                                        notPassCount++;
                                    }
                                });

                                resultObject.append(
                                    $('<div></div>').html('พบ = ' + result.length + ' รายการ ')
                                );

                                // Show the counts
                                resultObject.append(
                                    $('<div></div>').html('ผ่านเกณฑ์: ' + passCount + ' รายการ')
                                );
                                resultObject.append(
                                    $('<div></div>').html('ต่ำกว่าเกณฑ์: ' + notPassCount + ' รายการ')
                                );

                                // Destroy the previous chart instance if it exists
                            if (myChart1) {
                                myChart1.destroy();
                            }

                                var passPercent = parseFloat((passCount * 100 / (passCount + notPassCount)));
                                var notPassPercent = parseFloat((passCount * 100 / (passCount + notPassCount)));

                                // Create the doughnut chart
                                const ctx1 = document.getElementById('myChart1');
                                new Chart(ctx1, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['ผ่าน' + passCount + 'คน (' + passPercent + '% )', 'ไม่ผ่าน' + notPassCount + 'คน (' + notPassPercent + '% )'],
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
                    </center>
                </div>

            </div>

            <div class="col-lg-3">

                <div>
                    <center>
                        <canvas id="myChart2"></canvas>
                        <p>ผลการประเมินการออกกำลังกาย รายจังหวัด ของทุกกลุ่ม</p>
                    </center>
                </div>
            </div>



        </div>

    </div>
</section><!-- End exercise Section -->