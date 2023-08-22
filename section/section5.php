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
            <input name="res" type="text" class="form-control" value="" disabled>
        </div>

        <div class=" mb-3">
            <p>สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพของผู้เชี่ยวชาญทั้งหมด แยกตามจังหวัด</p>
            <input name="res" type="text" class="form-control" value="" disabled>
        </div>

        <div class=" mb-3">
            <p>งานวิจัย </p>
            <input name="pub_res" type="text" class="form-control" value="<?php echo $fetch['res']; ?>" disabled>
        </div>

        <div class=" mb-3">
            <p>งานวิจัยทั้งหมด</p>
            <input name="pub_res" type="text" class="form-control" value="---" disabled>
        </div>

        <div class=" mb-3">
            <div class="form-row">
                <div class="form-group">
                    <p>งานวิจัยทั้งหมดแยกจังหวัด</p>
                    <select name="province_id" id="provinceResS5" class="form-control mb-3" required>
                        <option value="">เลือกจังหวัด</option>
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
            <input name="pub_res" type="text" class="form-control" value="---" disabled>
        </div>

        <div class=" mb-3">
            <div class="form-row">
                <div class="form-group">
                    <p> การเผยแพร่ผลงานวิจัยรายจังหวัด</p>
                    <select name="province_id" id="provincePubresS5" class="form-control mb-3" required>
                        <option value="">เลือกจังหวัด</option>
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
        var provinceObject = $('#provinceResS5');
        var pubResObject = $('#pubresS5');

        // on change province for research results
        provinceObject.on('change', function() {
            var provinceId = $(this).val();

            // Clear existing content in pubResObject
            pubResObject.empty();

            var url = 'get_Que_Provin.php?province_id=%27' + provinceId + '%27';

            $.get(url, function(data) {
                var result = JSON.parse(data);
                var itemCount = 0;

                // Count the number of items and show each valid item in the result
                $.each(result, function(index, item) {
                    if (item.pub_res !== "---,---" && item.pub_res.trim() !== "") {
                        itemCount++;

                        // Check for comma and add line break
                        var pubResText = item.pub_res;
                        if (pubResText.includes(',')) {
                            pubResText = pubResText.replace(/,/g, '<br>');
                        }

                        pubResObject.append($('<div></div>').html('ได้แก่ ' + pubResText));
                    }
                });

                // Show the number of valid items found
                pubResObject.append($('<div></div>').text('พบ = ' + itemCount + ' รายการ '));
            }).fail(function() {
                // Handle error case here
                pubResObject.empty();
                pubResObject.append($('<div></div>').text('เกิดข้อผิดพลาดในการดึงข้อมูล'));
            });
        });

        // on change province for publication results
        var provincePubresObject = $('#provincePubresS5');
        var pubResObject = $('#pubresS5');

        provincePubresObject.on('change', function() {
            var provinceId = $(this).val();

            // Clear existing content in pubResObject
            pubResObject.empty();
            
            var url = 'get_Que_Provin.php?province_id=%27' + provinceId + '%27';

            $.get(url, function(data) {
                var result = JSON.parse(data);
                var itemCount = 0;

                // Count the number of items and show each valid item in the result
                $.each(result, function(index, item) {
                    if (item.pub_res !== "---,---" && item.pub_res.trim() !== "") {
                        itemCount++;

                        // Check for comma and add line break
                        var pubResText = item.pub_res;
                        if (pubResText.includes(',')) {
                            pubResText = pubResText.replace(/,/g, '<br>');
                        }

                        pubResObject.append($('<div></div>').html('ได้แก่ ' + pubResText));
                    }
                });

                // Show the number of valid items found
                pubResObject.append($('<div></div>').text('พบ = ' + itemCount + ' รายการ '));
            }).fail(function() {
                // Handle error case here
                pubResObject.empty();
                pubResObject.append($('<div></div>').text('เกิดข้อผิดพลาดในการดึงข้อมูล'));
            });
        });
    });
</script>