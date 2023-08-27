<section id="exper_info" class="resume">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน</h2>
        </div>

        <div class="mb-3">
            <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพของตนเอง</p>
            <div class="input-group ">
                <input name="exper_sports" type="text" id="exper_sports" class="form-control" value="<?php echo $fetch['exper_sports']; ?>" disabled>
            </div>
        </div>

        <div class=" mb-3">
            <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพของผู้เชี่ยวชาญทั้งหมด</p>
            <div class="form-control overflow-auto" rows="3">
                <?php
                $exSportArray = array(); // สร้างอาเรย์เปล่าไว้ก่อน
                $sqlALLexSport = "SELECT * FROM question";
                $queryALLexSport = mysqli_query($con, $sqlALLexSport);
                while ($resultALLexSport = mysqli_fetch_assoc($queryALLexSport)) : ?>
                    <?php
                    if ($resultALLexSport['exper_sports'] !== "---,---" && trim($resultALLexSport['exper_sports']) !== "") {
                        $exSportText = $resultALLexSport['exper_sports'];

                        if (strpos($exSportText, ',') !== false) {
                            $exSportItems = explode(',', $exSportText);
                            $exSportArray = array_merge($exSportArray, $exSportItems);
                        } else {
                            $exSportArray[] = $exSportText;
                        }
                    }
                    ?>
                <?php endwhile; ?>
                <?php
                foreach ($exSportArray as $item) {
                    echo 'การเผยแพร่ผลงานวิจัย : ' . $item . '<br>';
                }
                echo 'ผลลัพธ์ : ' . count($exSportArray) . '<br>';
                ?>
            </div>
        </div>

        <div class=" mb-3">
            <div class="form-row">
                <div class="form-group">
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
                </div>
            </div>
            <div id="exSportS5" class="form-control"></div>
        </div>

        <div class=" mb-3">
            <p>งานวิจัย </p>
            <input name="pub_res" type="text" class="form-control" value="<?php echo $fetch['res']; ?>" disabled>
        </div>

        <div class=" mb-3">
            <p>งานวิจัยทั้งหมด</p>
            <div class="form-control overflow-auto" rows="3">
                <?php
                $resArray = array(); // สร้างอาเรย์เปล่าไว้ก่อน
                $sqlALLRes = "SELECT * FROM question";
                $queryALLRes = mysqli_query($con, $sqlALLRes);
                while ($resultALLRes = mysqli_fetch_assoc($queryALLRes)) : ?>
                    <?php
                    if ($resultALLRes['res'] !== "---,---" && trim($resultALLRes['res']) !== "") {
                        $ResText = $resultALLRes['res'];

                        if (strpos($ResText, ',') !== false) {
                            $ResItems = explode(',', $ResText);
                            $resArray = array_merge($resArray, $ResItems);
                        } else {
                            $resArray[] = $ResText;
                        }
                    }
                    ?>
                <?php endwhile; ?>
                <?php
                foreach ($resArray as $item) {
                    echo 'การเผยแพร่ผลงานวิจัย : ' . $item . '<br>';
                }
                echo 'ผลลัพธ์ : ' . count($resArray) . '<br>';
                ?>
            </div>
        </div>

        <div class=" mb-3">
            <div class="form-row">
                <div class="form-group">
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
                </div>
            </div>
            <div id="resS5" class="form-control"></div>
        </div>

        <div class=" mb-3">
            <p>การเผยแพร่ผลงานวิจัย</p>
            <input name="pub_res" type="text" class="form-control" value="<?php echo $fetch['pub_res']; ?>" disabled>
        </div>

        <div class=" mb-3">
            <p>การเผยแพร่ผลงานวิจัยทั้งหมด</p>
            <div class="form-control overflow-auto" rows="3">
                <?php
                $pubResArray = array(); // สร้างอาเรย์เปล่าไว้ก่อน
                $sqlALLPubresS5 = "SELECT * FROM question";
                $queryALLPubresS5 = mysqli_query($con, $sqlALLPubresS5);
                while ($resultALLPubresS5 = mysqli_fetch_assoc($queryALLPubresS5)) : ?>
                    <?php
                    if ($resultALLPubresS5['pub_res'] !== "---,---" && trim($resultALLPubresS5['pub_res']) !== "") {
                        $pubResText = $resultALLPubresS5['pub_res'];

                        if (strpos($pubResText, ',') !== false) {
                            $pubResItems = explode(',', $pubResText);
                            $pubResArray = array_merge($pubResArray, $pubResItems);
                        } else {
                            $pubResArray[] = $pubResText;
                        }
                    }
                    ?>
                <?php endwhile; ?>
                <?php
                foreach ($pubResArray as $item) {
                    echo 'การเผยแพร่ผลงานวิจัย : ' . $item . '<br>';
                }
                echo 'ผลลัพธ์ : ' . count($pubResArray) . '<br>';
                ?>
            </div>
        </div>

        <div class=" mb-3">
            <div class="form-row">
                <div class="form-group">
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
                </div>
            </div>
            <div id="pubresS5" class="form-control"></div>
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

                $.each(resArray, function(index, resItem) {
                    exSportObject.append($('<div></div>').html('สาขาความเชี่ยวชาญ : ' + resItem));
                });

                exSportObject.append($('<div></div>').text('พบ = ' + resArray.length + ' รายการ '));
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

                // วนลูปเพื่อแทรกข้อมูลใน Array เข้าใน ResObject
                $.each(resArray, function(index, resItem) {
                    ResObject.append($('<div></div>').html('งานวิจัย : ' + resItem));
                });

                ResObject.append($('<div></div>').text('พบ = ' + (resArray.length) + ' รายการ '));
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

                $.each(resArray, function(index, resItem) {
                    pubResObject.append($('<div></div>').html('การเผยแพร่ผลงานวิจัย : ' + resItem));
                });

                pubResObject.append($('<div></div>').text('พบ = ' + resArray.length + ' รายการ '));
            }).fail(function() {
                pubResObject.empty();
                pubResObject.append($('<div></div>').text('เกิดข้อผิดพลาดในการดึงข้อมูล'));
            });
        });

    });
</script>