<!-- Page Heading -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">นักเรียน</h1>

</div>

<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->

  <!-- Content Row -->


  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">ระบบจะแสดงรายชื่อนักเรียนในปกครองของท่าน</p>

    <!-- DataTales Example -->

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 10%">ลำดับที่</th>
            <th style="width: 40%">ชื่อ-สกุล</th>
            <th style="width: 10%">หอพัก</th>
            <th style="width: 10%">ชั้น/ปีก</th>
            <th style="width: 10%">ระดับชั้น</th>
            <th style="width: 20%">โทรศัพท์</th>
            <th style="width: 20%">ข้อมูล</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 0;
          $student = $conn->prepare("SELECT * FROM student WHERE parent_1=:d OR parent_2=:d OR parent_3=:d OR parent_4=:d order by grade ASC");
          $student->bindParam(":d", $row['id']);
          $student->execute();
          $in = 3;
          $ins= 1;
          while ($student_list = $student->fetch(PDO::FETCH_ASSOC)) {
          ?>

            <tr>
              <td><?php echo ++$i; ?></td>
              <td><?php
                  $prefix = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                  $prefix->bindParam(":id", $student_list['prefix']);
                  $prefix->execute();
                  $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                  echo $rpf['prefix'] . $student_list['name'] . ' ' . $student_list['surname']; ?></td>
                  <td><?php
                  echo $student_list['dorm'] ; ?></td>
              <td><?php
                  echo $student_list['floor'] . '/' . $student_list['side']; ?></td>
              <td><?php
                  echo $student_list['grade'] . '/' . $student_list['class']; ?></td>
              <td><?php
                  echo $student_list['tel']; ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $in ?>"><i class="fa-solid fa-circle-info"></i></button>
                  </div>


              </td>
              <!-- Modal -->

            </tr>
            <div class="modal fade" id="exampleModal<?php echo $in ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel"><i class="fa-solid fa-circle-info" style="color:mediumseagreen"></i> ข้อมูล <?php echo $rpf['prefix'] . $student_list['name'] . ' ' . $student_list['surname']; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-dark">
                    <b> รหัสนักเรียน :</b> <?php echo $student_list['student_id']; ?><br>
                    <b> ชื่อ-สกุล :</b> <?php echo $rpf['prefix'] . $student_list['name'] . ' ' . $student_list['surname']; ?><br>
                    <b> หอพัก :</b> หอพัก <?php echo $student_list['dorm']; ?><br>
                    <b> ชั้น/ปีก :</b> <?php
                                        echo $student_list['floor'] . '/' . $student_list['side']; ?><br>
                    <b> ระดับชั้น :</b> <?php
                                        echo $student_list['grade'] . '/' . $student_list['class']; ?><br>
                    <b> อีเมล :</b> <?php echo $student_list['email']; ?><br>
                    <b> โทรศัพท์ :</b> <?php echo $student_list['tel']; ?><br>
                    <b> ที่อยู่ :</b> <?php echo $student_list['address']; ?><br>
                    <b> ผู้ปกครองคนที่ 1 :</b> <?php $pl = $student_list['parent_1'];
                                                $parent1 = $conn->prepare("SELECT * FROM user WHERE id=$pl");
                                                $parent1->execute();
                                                $rp1 = $parent1->fetch(PDO::FETCH_ASSOC);
                                                $prefix1 = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                                                $prefix1->bindParam(":id", $rp1['prefix']);
                                                $prefix1->execute();
                                                $rpf1 = $prefix1->fetch(PDO::FETCH_ASSOC);
                                                echo $rpf1['prefix'] . $rp1['name'] . ' ' . $rp1['surname'];
                                                if ($student_list['parent_2'] != 0) {
                                                  $pl2 = $student_list['parent_2'];
                                                  $parent2 = $conn->prepare("SELECT * FROM user WHERE id=$pl2");
                                                  $parent2->execute();
                                                  $rp2 = $parent2->fetch(PDO::FETCH_ASSOC);
                                                  $prefix2 = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                                                  $prefix2->bindParam(":id", $rp2['prefix']);
                                                  $prefix2->execute();
                                                  $rpf2 = $prefix2->fetch(PDO::FETCH_ASSOC);
                                                  echo '<br><b> ผู้ปกครองคนที่ 2 :</b> ' . $rpf2['prefix'] . $rp2['name'] . ' ' . $rp2['surname'];
                                                }
                                                if ($student_list['parent_3'] != 0) {
                                                  $pl3 = $student_list['parent_3'];
                                                  $parent3 = $conn->prepare("SELECT * FROM user WHERE id=$pl3");
                                                  $parent3->execute();
                                                  $rp3 = $parent3->fetch(PDO::FETCH_ASSOC);
                                                  $prefix3 = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                                                  $prefix3->bindParam(":id", $rp3['prefix']);
                                                  $prefix3->execute();
                                                  $rpf3 = $prefix3->fetch(PDO::FETCH_ASSOC);
                                                  echo '<br><b> ผู้ปกครองคนที่ 3 :</b> ' . $rpf3['prefix'] . $rp3['name'] . ' ' . $rp3['surname'];
                                                }
                                                if ($student_list['parent_4'] != 0) {
                                                  $pl4 = $student_list['parent_4'];
                                                  $parent4 = $conn->prepare("SELECT * FROM user WHERE id=$pl4");
                                                  $parent4->execute();
                                                  $rp4 = $parent4->fetch(PDO::FETCH_ASSOC);
                                                  $prefix4 = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                                                  $prefix4->bindParam(":id", $rp4['prefix']);
                                                  $prefix4->execute();
                                                  $rpf4 = $prefix4->fetch(PDO::FETCH_ASSOC);
                                                  echo '<br><b> ผู้ปกครองคนที่ 4 :</b> ' . $rpf4['prefix'] . $rp4['name'] . ' ' . $rp4['surname'];
                                                }
                                                ?><br>

                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-danger btn-icon-split" data-bs-dismiss="modal">
                      <span class="icon text-white-50">
                        <i class="fa-solid fa-right-from-bracket"></i>
                      </span>
                      <span class="text">ปิด</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

           
                </div>
              </div>
            </div>
                                              </div>
            <script>

   var select_box_element = document.querySelector('#select_box_<?php echo $ins?>');
 dselect(select_box_element,{
    search: true
 });
 var select_box_element = document.querySelector('#select_box2_<?php echo $ins?>');
 dselect(select_box_element,{
    search: true
 });
 var select_box_element = document.querySelector('#select_box3_<?php echo $ins?>');
 dselect(select_box_element,{
    search: true
 });
 var select_box_element = document.querySelector('#select_box4_<?php echo $ins?>');
 dselect(select_box_element,{
    search: true
 });
</script>
          <?php ++$in; ++$ins;
          } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>