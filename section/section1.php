   <!-- ======= personal Section ======= -->
   <section id="personal" class="about">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>ข้อมูลส่วนตัว</h2>
       </div>

       <div class="row">
         <!-- <div class="col-lg-4">
            <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
          </div> -->
         <div class="col-lg-8 pt-4 pt-lg-0 content">
           <h3> ชื่อ <?php echo $_SESSION["name"] . " " . $_SESSION["surname"]; ?> </h3>
           <div class="row">
             <div class="col-lg-6">
               <ul>
                 <li><i class="bi bi-chevron-right"></i> <strong>เพศ:</strong> <span> <?php echo $fetch['sex']; ?> </span></li>
                 <li><i class="bi bi-chevron-right"></i> <strong>ภูมิลำเนา:</strong> <span>
                     <?php while ($fetchProvin = mysqli_fetch_assoc($queryProvin)) { ?>
                       <?php echo $fetchProvin['name_th']; ?>
                     <?php } ?>
                     <?php while ($fetchAmphure = mysqli_fetch_assoc($queryAmphure)) { ?>
                       <?php echo $fetchAmphure['name_th']; ?>
                     <?php } ?>
                   </span></li>
                 <li><i class="bi bi-chevron-right"></i> <strong>อายุ:</strong> <?php echo $fetch['age']; ?> <span></span></li>
                 <li><i class="bi bi-chevron-right"></i> <strong>การศึกษา:</strong> <span><?php echo $fetch['eduOptions']; ?></span></li>
               </ul>
             </div>
             <div class="col-lg-6">
               <ul>
                 <li><i class="bi bi-chevron-right"></i> <strong>อาชีพ:</strong> <span><?php echo $fetch['occOptions']; ?></span></li>
                 <li><i class="bi bi-chevron-right"></i> <strong>สัญชาติ:</strong> <span><?php echo $fetch['nationOptions']; ?></span></li>
                 <li><i class="bi bi-chevron-right"></i> <strong>สถานภาพ:</strong> <span><?php echo $fetch['maryOptions']; ?></span></li>
               </ul>
             </div>
           </div>
         </div>
       </div>

     </div>
   </section><!-- End personal Section -->