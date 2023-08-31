  <!-- ======= Info_exper Section ======= -->
  <section id="Info_exper" class="resume">
      <div class="container" data-aos="fade-up">

          <div class="section-title">
              <h2>ข้อมูลประสบการณ์การจัดกิจกรรม/โครงการการออกกำลังกายเพื่อสุขภาพ</h2>
          </div>

          <!-- pro_org_exer form -->
          <div class=" mb-3">
              <p>ประสบการณ์การจัดกิจกรรมทางด้านการออกกำลังกายเพื่อสุขภาพ</p>
              <div class="input-group ">
                  <input name="org_heal" type="text" id="org_heal" class="form-control" value="<?php echo $fetch['org_heal']; ?>" disabled>
              </div>
          </div>
          <!-- end pro_org_exer form -->

          <!-- pro_org_exer form -->
          <div class=" mb-3">
              <p>โครงการการจัดกิจกรรมการออกกำลังกายเพื่อสุขภาพ</p>
              <div class="input-group ">
                  <input name="pro_org_exer" type="text" id="pro_org_exer" class="form-control" value="<?php echo $fetch['pro_org_exer']; ?>" disabled>
              </div>
          </div>
          <!-- end pro_org_exer form -->

          <!-- activity form -->
          <div class=" mb-3">
              <p>กิจกรรม/โครงการที่สนับสนุนการจัดกิจกรรม </p>
              <div class="input-group ">
                  <input name="activity" type="text" id="activity" class="form-control" value="<?php echo $fetch['activity']; ?>" disabled>
              </div>
          </div>
          <!-- end activity form -->

      </div>
  </section><!-- End Info_exper Section -->