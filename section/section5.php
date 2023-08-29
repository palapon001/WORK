<section id="exper_info" class="resume">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</h2>
        </div>

        <div class="form-control bg-primary mb-3">
            <div class="mb-3 form-control">
                <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพของตนเอง</p>
                <div class="form-control overflow-auto" style="height: 10rem;">
                    <?php
                    $exSportText = $fetch['exper_sports'];
                    $exSportItems = displayCustomList($exSportText);
                    displayCustomItems($exSportItems);
                    ?>
                </div>
            </div>

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
                <div id="exSportS5" class="form-control overflow-auto" style="height: 15rem;"></div>
            </div>
        </div>

        <div class="form-control bg-info mb-3">

            <div class="form-control mb-3">
                <p>งานวิจัย </p>
                <div class="form-control overflow-auto" style="height: 10rem;">
                    <?php
                    $resText = $fetch['res'];
                    $resItems = displayCustomList($resText);
                    displayCustomItems($resItems);
                    ?>
                </div>
            </div>

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
                <div id="resS5" class="form-control overflow-auto" style="height: 15rem;"></div>
            </div>

        </div>

        <div class="form-control bg-warning">

            <div class="form-control mb-3">
                <p>การเผยแพร่ผลงานวิจัย</p>
                <div class="form-control overflow-auto" style="height: 10rem;">
                    <?php
                    $pubResText = $fetch['pub_res'];
                    $pubResItems = displayCustomList($pubResText);
                    displayCustomItems($pubResItems);
                    ?>
                </div>
            </div>

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
                <div id="pubresS5" class="form-control overflow-auto" style="height: 15rem;"></div>
            </div>
        </div>

    </div>
</section>

<script>
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
                    exSportObject.append($('<div class="alert alert-secondary" role="alert"></div>').html('<center>' + '-' + resItem + '</center>'));
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
                    ResObject.append($('<div class="alert alert-secondary" role="alert"></div>').html('<center>' + '-' + resItem + '</center>'));
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
                    pubResObject.append($('<div class="alert alert-secondary" role="alert"></div>').html('<center>' + '-' + resItem + '</center>'));
                });

            }).fail(function() {
                pubResObject.empty();
                pubResObject.append($('<div></div>').text('เกิดข้อผิดพลาดในการดึงข้อมูล'));
            });
        });

    });
</script>