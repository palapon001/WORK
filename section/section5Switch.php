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

<?php switch ($_SESSION["level"]) {
    case "Trainers": ?>

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
            });
        </script>
        <?php break; ?>
    <?php
    default: ?>
        <?php include 'section5.php'; ?>
<?php } ?>