 <!-- Modal -->
 <div class="modal fade" id="exampleModal-<?php echo $fetch_Que_Personal['name'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลของ <?php echo $fetch_Que_Personal['name'] . $fetch_Que_Personal['surname'] ?></h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <p>
                     <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                         ข้อมูลส่วนตัว
                     </button>
                     <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                         ข้อมูลสุขภาพ
                     </button>
                     <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                         ข้อมูลการออกกำลังกาย
                     </button>
                     <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
                         ข้อมูลหน่วยงาน
                     </button>
                     <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample">
                         ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน
                     </button>
                     <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample6" aria-expanded="false" aria-controls="collapseExample">
                         ข้อมูลประสบการณ์การอบรม
                     </button>
                     <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample7" aria-expanded="false" aria-controls="collapseExample">
                         ข้อมูลประสบการณ์การเป็นอาสาสม้คร
                     </button>
                     <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample8" aria-expanded="false" aria-controls="collapseExample">
                         ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ
                     </button>

                 </p>
                 <form action="">
                     <div class="container">


                         <div class="collapse" id="collapseExample1">
                             <div class="card card-body">
                                 ข้อมูลส่วนตัว
                                 <?php
                                    displayValueWithFormControl('ชื่อ', $fetch_Que_Personal['name']);
                                    displayValueWithFormControl('นามสกุล', $fetch_Que_Personal['surname']);
                                    displayValueWithFormControl('เพศ', $fetch_Que_Personal['sex']);
                                    displayValueWithFormControl('ที่อยู่', $fetch_Que_Personal['province_id'] . $fetch_Que_Personal['amphure_id']);
                                    displayValueWithFormControl('อายุ', $fetch_Que_Personal['age']);
                                    displayValueWithFormControl('การศึกษา', $fetch_Que_Personal['eduOptions']);
                                    displayValueWithFormControl('อาชีพ', $fetch_Que_Personal['occOptions']);
                                    displayValueWithFormControl('สถานะภาพ', $fetch_Que_Personal['maryOptions']);
                                    displayValueWithFormControl('สัญชาติ', $fetch_Que_Personal['nationOptions']);
                                    ?>


                             </div>
                         </div>

                         <div class="collapse" id="collapseExample2">
                             <div class="card card-body">
                                 ข้อมูลสุขภาพ
                                 <?php
                                    displayValueWithFormControl('ส่วนสูง (ซม.)', $fetch_Que_Personal['height']);
                                    displayValueWithFormControl('น้ำหนัก (กก.)', $fetch_Que_Personal['weight']);
                                    displayValueWithFormControl('ความดัน', $fetch_Que_Personal['pressure']);
                                    displayValueWithFormControl('ชีพจร (ครั้ง/นาที)', $fetch_Que_Personal['pulse']);
                                    displayValueWithFormControl('โรคประจำตัว', $fetch_Que_Personal['congenOptions']);
                                    ?>
                             </div>
                         </div>

                         <div class="collapse" id="collapseExample3">
                             <div class="card card-body">
                                 ข้อมูลการออกกำลังกาย
                                 <?php
                                    displayValueWithFormControl('สถานที่ออกกำลังกาย', $fetch_Que_Personal['location']);
                                    displayValueWithFormControl('ช่วงเวลาออกกำลังกาย', $fetch_Que_Personal['period']);
                                    displayValueWithFormControl('เหตุผลที่ออกกำลังกาย', $fetch_Que_Personal['reason1']);
                                    displayValueWithFormControl('เหตุผลที่ไม่ออกกำลังกาย', $fetch_Que_Personal['reason2']);
                                    displayValueWithFormControl('จูงใจให้ออกกำลังกาย', $fetch_Que_Personal['motiOptions']);
                                    displayValueWithFormControl('ประเภทการออกกำลังกาย', $fetch_Que_Personal['exer']);
                                    displayValueWithFormControl('ชีพจรหลังการออกกำลังกาย', $fetch_Que_Personal['pulseAfter']);
                                    displayValueWithFormControl('จำนวนวันที่ออกกำลังกายต่อสัปดาห์', $fetch_Que_Personal['week']);
                                    displayValueWithFormControl('ความหนักของการออกกำลังกาย', $fetch_Que_Personal['intensityOptions']);
                                    displayValueWithFormControl('ระยะเวลาการออกกำลังกาย', $fetch_Que_Personal['duration']);
                                    ?>
                             </div>
                         </div>



                         <div class="collapse" id="collapseExample4">
                             <div class="card card-body">
                                 ข้อมูลหน่วยงาน
                                 <?php
                                    displayValueWithFormControl('ชื่อหน่วยงาน 1', $fetch_Que_Personal['agency_name1']);
                                    displayValueWithFormControl('ชื่อหน่วยงานต้นสังกัด', $fetch_Que_Personal['agency_name2']);
                                    displayValueWithFormControl('ชื่อชุมชน', $fetch_Que_Personal['community']);
                                    displayValueWithFormControl('ที่ตั้งชุมชน', $fetch_Que_Personal['loc_community']);

                                    displayValueWithFormControl('ที่ตั้งหน่วยงาน', $fetch_Que_Personal['loc_agency']);
                                    displayValueWithFormControl('บริบทการดำเนินธุรกิจ', $fetch_Que_Personal['business']);
                                    ?>
                             </div>
                         </div>

                         <div class="collapse" id="collapseExample5">
                             <div class="card card-body">
                                 ข้อมูลความเชี่ยวชาญ และการเผยแพร่ผลงาน
                                 <?php
                                    displayValueWithFormControl('สาขาความเชี่ยวชาญทางด้านวิทยาศาสตร์การกีฬาเพื่อสุขภาพ', $fetch_Que_Personal['exper_sports']);
                                    displayValueWithFormControl('งานวิจัย', $fetch_Que_Personal['res']);
                                    displayValueWithFormControl('การเผยแพร่ผลงานวิจัย', $fetch_Que_Personal['pub_res']);
                                    ?>
                             </div>
                         </div>

                         <div class="collapse" id="collapseExample6">
                             <div class="card card-body">
                                 ข้อมูลประสบการณ์การอบรม
                                 <?php
                                    displayValueWithFormControl('ประสบการณ์การอบรมทางด้านการออกกำลังกายเพื่อสุขภาพ', $fetch_Que_Personal['train_exper_exer']);
                                    displayValueWithFormControl('ประสบการณ์การอบรมในสาขาความเชี่ยวชาญ', $fetch_Que_Personal['train_exper']);
                                    ?>
                             </div>
                         </div>

                         <div class="collapse" id="collapseExample7">
                             <div class="card card-body">
                                 ข้อมูลประสบการณ์การเป็นอาสาสม้คร
                                 <?php
                                    displayValueWithFormControl('ประสบการณ์ในการเป็นอาสาสมัคร', $fetch_Que_Personal['vol_exper']);
                                    ?>
                             </div>
                         </div>

                         <div class="collapse" id="collapseExample8">
                             <div class="card card-body">
                                 ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ
                                 <?php
                                    displayValueWithFormControl('ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ', $fetch_Que_Personal['org_heal']);
                                    displayValueWithFormControl('โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ', $fetch_Que_Personal['pro_org_exer']);
                                    displayValueWithFormControl('กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม', $fetch_Que_Personal['activity']);
                                    ?>

                             </div>
                         </div>

                         <button type="submit" class="btn btn-success btn-lg mt-3">save</button>

                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>