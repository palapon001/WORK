<?php
include 'assets/php/displayExperienceSection.php' ;
switch ($_SESSION["level"]) {
    case "Suppliers/Partners": ?>

        <section id="Info_exper" class="resume">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</h2>
                </div>

                <!-- ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ -->
                <div>
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
                <div>
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
                <div>
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
                <div>
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
                <div>
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
                <div>
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
        </section>

        <?php break; ?>
    <?php
    case "Community": ?>
        <section id="Info_exper" class="resume">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</h2>
                </div>


                <!-- ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ -->
                <div>
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
                <div class=" mb-3">
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
                <div>
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
                <div>
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
                <div>
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
                <div>
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
        </section>
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
                            if (item.org_heal !== "---" && item.org_heal.trim() !== "") {
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
        <?php break; ?>
    <?php
    default: ?>
        <?php include 'section8.php'; ?>
<?php } ?>