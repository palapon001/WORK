 <!-- report Section -->
 <section id="report">
     <div class="form-control  overflow-auto">
         <h1>สรุปรายงานผล</h1>
         <div class="container text-center">

             <!-- จำนวนประเภทผู้ใช้ทั้งหมด -->
             <div class="row mt-3 d-flex justify-content-center">
                 <div class="card mb-3" style="width: 55rem;">
                     <canvas class="" id="loginUser"></canvas>
                     <script>
                         const levelCounts = <?php echo json_encode($levelCounts); ?>;
                         const countWorkLogin = <?php echo $countWorkLogin; ?>;

                         const dataUser = Object.values(levelCounts).map(count => ((count * 100) / countWorkLogin).toFixed(2));
                         const labelsUser = Object.keys(levelCounts).map(key => `${key} (${dataUser[Object.keys(levelCounts).indexOf(key)]}%)`);


                         const loginUserID = document.getElementById('loginUser').getContext('2d');
                         const loginUser = new Chart(loginUserID, {
                             type: 'pie',
                             data: {
                                 labels: labelsUser,
                                 datasets: [{
                                     data: dataUser,
                                     borderWidth: 1,
                                 }],
                             },
                             options: {
                                 plugins: {
                                     labels: {
                                         render: (labelsUser) => {
                                             return labelsUser.label
                                         },
                                         fontSize: 13,
                                         fontColor: 'Black',
                                         fontFamily: 'Kanit'
                                     },
                                     legend: {
                                         display: true,
                                     },
                                     title: {
                                         display: true,
                                         text: 'จำนวนประเภทผู้ใช้ทั้งหมด : ( <?php echo $countWorkLogin; ?> คน )',
                                         font: {
                                             family: 'Kanit', // ชื่อฟอนต์ Kanit
                                             size: 16, // ปรับขนาดตัวอักษร
                                             weight: 'bold', // ตัวหนา (ถ้าต้องการ)
                                         },
                                     },
                                 },
                             },
                         });
                     </script>
                 </div>
                 <div class="card mb-3" style="width: 55rem;">
                     <canvas id="queUser"></canvas>
                     <script>
                         const levelQueCounts = <?php echo json_encode($levelQueCounts); ?>;
                         const countQueList = <?php echo $countQueList; ?>;

                         const dataQue = Object.values(levelQueCounts).map(count => ((count * 100) / countQueList).toFixed(2));
                         const labelsQue = Object.keys(levelQueCounts).map(key => `${key} (${dataQue[Object.keys(levelQueCounts).indexOf(key)]}%)`);

                         const queUserID = document.getElementById('queUser').getContext('2d');
                         const queUser = new Chart(queUserID, {
                             type: 'pie',
                             data: {
                                 labels: labelsQue,
                                 datasets: [{
                                     data: dataQue,
                                     borderWidth: 1,
                                 }],
                             },
                             options: {
                                 plugins: {
                                     labels: {
                                         render: (labelsUser) => {
                                             return labelsUser.label
                                         },
                                         fontSize: 13,
                                         fontColor: 'Black',
                                         fontFamily: 'Kanit'
                                     },
                                     legend: {
                                         display: true,
                                     },
                                     title: {
                                         display: true,
                                         text: 'จำนวนแบบสอบถามจากผู้ใช้ทั้งหมด : ( <?php echo $countQueList; ?> คน )',
                                         font: {
                                             family: 'Kanit', // ชื่อฟอนต์ Kanit
                                             size: 16, // ปรับขนาดตัวอักษร
                                             weight: 'bold', // ตัวหนา (ถ้าต้องการ)
                                         },
                                     },
                                 },
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
                         const resultChartPassAndNotPass = ['ผ่าน ' + <?php echo $passChart ?> + ' คน (' + <?php echo $passChartPercent ?> + '%)', 'ไม่ผ่าน ' + <?php echo $not_passChart ?> + ' คน (' + <?php echo $notPassChartPercent ?> + '%)'];
                         const ctx = document.getElementById('myChartphp').getContext('2d');
                         const myChart = new Chart(ctx, {
                             type: 'pie',
                             data: {
                                 labels: resultChartPassAndNotPass,
                                 datasets: [{
                                     data: [<?php echo $passChart ?>, <?php echo $not_passChart ?>],
                                     borderWidth: 1,
                                 }],
                             },
                             options: {
                                 plugins: {
                                     labels: {
                                         render: (resultChartPassAndNotPass) => {
                                             return resultChartPassAndNotPass.label
                                         },
                                         fontSize: 13,
                                         fontColor: 'Black',
                                         fontFamily: 'Kanit'
                                     },
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
                             var resultLabel = ['ผ่าน ' + passCount + ' คน (' + passPercent + '%)', 'ไม่ผ่าน ' + notPassCount + ' คน (' + notPassPercent + '%)'] ;

                             const ctx = document.getElementById(chartId);
                             new Chart(ctx, {
                                 type: 'pie',
                                 data: {
                                     labels: resultLabel,
                                     datasets: [{
                                         label: '',
                                         data: [passCount, notPassCount],
                                         borderWidth: 1
                                     }]
                                 },
                                 options: {
                                 plugins: {
                                     labels: {
                                         render: (resultLabel) => {
                                             return resultLabel.label
                                         },
                                         fontSize: 13,
                                         fontColor: 'Black',
                                         fontFamily: 'Kanit'
                                     },
                                     legend: {
                                         display: true,
                                     },
                                      
                                 },
                             },
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

                 <!-- โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ แยกตาม Community -->
                 <div class="col-lg-5">
                     <?php
                        // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                        $sqlProOrgLevel  = "SELECT * FROM question where level = 'Community' ";
                        // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                        $colProOrgLevel = "pro_org_exer";
                        // หัวเรื่อง
                        $titleProOrgLevel  = "โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ แยกตาม Community";

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

                 <!-- กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม แยกตาม Community	 -->
                 <div class="col-lg-5">
                     <?php
                        // สร้างคำสั่ง SQL ที่คุณต้องการแสดงข้อมูลจากตาราง
                        $sqlActivityLevel  = "SELECT * FROM question where level = 'Community' ";
                        // ชื่อคอลัมน์ที่ต้องการแสดงข้อมูล
                        $colActivityLevel  = "activity";
                        // หัวเรื่อง
                        $titleActivityLevel  = "กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม แยกตาม Community";

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

                             var url = 'assets/ajax/getQuestionsByProvinceAndLevel.php?province_id=%27' + provinceId + '%27&level=%27Community%27';

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