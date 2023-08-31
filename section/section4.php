 <!-- ======= agency Section ======= -->
 <section id="agency" class="resume">
     <div class="container" data-aos="fade-up">

         <div class="section-title">
             <h2>ข้อมูลหน่วยงาน</h2>
         </div>

         <div class="input-group mb-3">
             <span class="input-group-text" id="basic-addon1">ชื่อหน่วยงาน </span>
             <input class="form-control" value="<?php echo $fetch['agency_name1']; ?>" disabled>
         </div>

         <div class="input-group mb-3">
             <span class="input-group-text" id="basic-addon1">ชื่อหน่วยงานต้นสังกัด </span>
             <input class="form-control" value="<?php echo $fetch['agency_name2']; ?>" disabled>
         </div>

         <div class="input-group mb-3">
             <span class="input-group-text" id="basic-addon1">ชื่อชุมชน (ถ้ามี) </span>
             <input class="form-control" value="<?php echo $fetch['community']; ?>" disabled>
         </div>

         <div class="input-group mb-3">
             <span class="input-group-text" id="basic-addon1">ที่ตั้งของหน่วยงาน </span>
             <input class="form-control" value="<?php echo $fetch['loc_agency']; ?>" disabled>
         </div>

         <div class="input-group mb-3">
             <span class="input-group-text" id="basic-addon1">บริบทการดำเนินธุรกิจ (สำหรับองค์กรธุรกิจ) </span>
             <input class="form-control" value="<?php echo $fetch['business']; ?>" disabled>
         </div>


     </div>
 </section><!-- End agency Section -->