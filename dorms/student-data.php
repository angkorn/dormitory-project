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
    <p class="mb-4">ระบบจะแสดงรายชื่อนักเรียนหอพักของท่าน ทั้งหมดที่มีในระบบ ครูปกครองหอพักสามารถแก้ไขข้อมูลผู้ปกครองนักเรียนในหอพักของท่านได้ <br><i>ทั้งนี้ต้องได้รับความยินยอมและการอนุญาตจากผู้ปกครองแล้วเท่านั้น</i></p>

    <!-- DataTales Example -->

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 100px">ลำดับที่</th>
            <th style="width: 20%">ชื่อ-สกุล</th>
            <th>ชั้น/ปีก</th>
            <th>ระดับชั้น</th>
            <th>โทรศัพท์</th>
            <th style="width: 20%">ข้อมูล</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 0;
          $dorm = $rdorm['dorm'];
          $student = $conn->prepare("SELECT * FROM student WHERE dorm=:d order by grade ASC");
          $student->bindParam(":d", $dorm);
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
                  echo $student_list['floor'] . '/' . $student_list['side']; ?></td>
              <td><?php
                  echo $student_list['grade'] . '/' . $student_list['class']; ?></td>
              <td><?php
                  echo $student_list['tel']; ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $in ?>"><i class="fa-solid fa-circle-info"></i></button>
                  <button type="button" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $in ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                  <button type="button" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $in ?>"><i class="fa-solid fa-trash-can"></i></button>
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

            <div class="modal fade" id="deleteModal<?php echo $in ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel"><i class="fa-solid fa-trash" style="color:crimson"></i> ลบข้อมูล </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-dark">
                    ท่านต้องการลบข้อมูลของ <?php echo $rpf['prefix'] . $student_list['name'] . ' ' . $student_list['surname']; ?> ใช่หรือไม่?
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-secondary btn-icon-split" data-bs-dismiss="modal">
                      <span class="icon text-white-50">
                        <i class="fa-solid fa-right-from-bracket"></i>
                      </span>
                      <span class="text">ปิด</span>
                    </a>
                    <a href="action.php?id=5&list=<?php echo $student_list['id'] ?>" class="btn btn-danger btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fa-solid fa-trash"></i>
                      </span>
                      <span class="text">ลบข้อมูล</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal -->

            </tr>
            <div class="modal fade" id="editModal<?php echo $in ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square" style="color:darkorange"></i> แก้ไขข้อมูล <?php echo $rpf['prefix'] . $student_list['name'] . ' ' . $student_list['surname']; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-dark">

                    <form method="POST" action="action.php?id=4">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputEmail1" class="form-label">รหัสนักเรียน</label>
                          <input type="text" name="std_id" class="form-control" id="exampleInputEmail1" value="<?php echo $student_list['student_id']; ?>" placeholder="กรอกรหัสนักเรียน" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputEmail1" class="form-label">คำนำหน้า</label>
                          <select class="form-select" name="prefix" required>
                            <option selected value="">-เลือกคำนำหน้า-</option>
                            <?php
                            $prefixes = $conn->prepare("SELECT * FROM std_prefixes ORDER BY id ASC");
                            $prefixes->execute();

                            while ($rowPrefix = $prefixes->fetch(PDO::FETCH_ASSOC)) {

                              if ($rowPrefix['id'] == $student_list['prefix']) {
                            ?>
                                <option selected value="<?php echo $rowPrefix['id'] ?>"><?php echo $rowPrefix['prefix'] ?></option>
                              <?php } else { ?>
                                <option value="<?php echo $rowPrefix['id'] ?>"><?php echo $rowPrefix['prefix'] ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputEmail1" class="form-label">ชื่อ</label>
                          <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $student_list['name'] ?>" placeholder="กรอกชื่อจริง" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputPassword1" class="form-label">สกุล</label>
                          <input type="text" name="surname" class="form-control" id="exampleInputPassword1" value="<?php echo $student_list['surname'] ?>" placeholder="กรอกนามสกุล" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2 mb-3">
                          <label for="exampleInputPassword1" class="form-label">หอพัก</label>
                          <input type="text" name="dorm" class="form-control" id="exampleInputPassword1" value="<?php echo $rdorm['dorm']; ?>">
                        </div>
                        <div class="col-md-2 mb-3">
                          <label for="exampleInputPassword1" class="form-label">ชั้น</label>
                          <select class="form-select" name="floor" id="select_boxa" required>
                            <option value="">-ชั้น-</option>
                            <?php $n = 2;
                            while ($n <= 4) {
                              if ($n == $student_list['floor']) {
                            ?>
                                <option selected value="<?php echo $n ?>"><?php echo $n ?></option>
                              <?php  } else {
                              ?>
                                <option value="<?php echo $n ?>"><?php echo $n ?></option>

                            <?php }
                              $n++;
                            } ?>
                          </select>
                        </div>
                        <div class="col-md-2 mb-3">
                          <label for="exampleInputPassword1" class="form-label">ปีก</label>
                          <select class="form-select" name="side" id="select_boxb" required>
                            <option value="">-ปีก-</option>
                            <?php $a = 1;
                            while ($a <= 2) {
                              if ($a == $student_list['side']) {
                            ?>
                                <option selected value="<?php echo $a ?>"><?php echo $a ?></option>
                              <?php  } else {
                              ?>
                                <option value="<?php echo $a ?>"><?php echo $a ?></option>

                            <?php }
                              $a++;
                            } ?>
                          </select>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="exampleInputPassword1" class="form-label">ระดับชั้น</label>
                          <select class="form-select" name="grade" id="select_boxc" required>
                            <option selected value="">-ระดับชั้น-</option>
                            <?php $g = 1;
                            while ($g <= 6) {
                              $gr = 'ม.' . $g;
                              if ($gr == $student_list['grade']) {
                            ?>
                                <option selected value="<?php echo $gr ?>"><?php echo $gr ?></option>
                              <?php  } else {
                              ?>
                                <option value="<?php echo $gr ?>"><?php echo $gr ?></option>

                            <?php }
                              $g++;
                            } ?>

                          </select>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="exampleInputPassword1" class="form-label">ห้อง</label>
                          <select class="form-select" name="class" id="select_boxd" required>
                            <option value="">-ห้อง-</option>
                            <?php $c = 1;
                            while ($c <= 6) {
                              if ($c == $student_list['class']) {
                            ?>
                                <option selected value="<?php echo $c ?>"><?php echo $c ?></option>
                              <?php  } else {
                              ?>
                                <option value="<?php echo $c ?>"><?php echo $c ?></option>

                            <?php }
                              $c++;
                            } ?>

                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputEmail1" class="form-label">อีเมล</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $student_list['email']; ?>" placeholder="กรอกที่อยู่อีเมล xxx@gmail.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputPassword1" class="form-label">โทรศัพท์</label>
                          <input type="text" name="tel" class="form-control" id="exampleInputPassword1" value="<?php echo $student_list['tel']; ?>" placeholder="กรอกเบอร์โทร 0XXXXXXXXX" required>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ที่อยู่</label>
                        <textarea name="address" class="form-control" id="exampleInputPassword1" placeholder="กรอกที่อยู่ปัจจุบัน" required><?php echo $student_list['address']; ?></textarea>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputEmail1" class="form-label">ผู้ปกครองคนที่ 1 (จำเป็น)</label>
                          <select class="form-select" name="parent_1" id="select_box_<?php echo $ins?>" required>
                            <option value="" selected>โปรดเลือกผู้ปกครองคนที่ 1</option>
                            <?php
                            $pSQL = $conn->prepare("SELECT*FROM user WHERE status='1' ORDER BY 'name' ASC");
                            $pSQL->execute();

                            while ($rowP = $pSQL->fetch(PDO::FETCH_ASSOC)) {
                              $prefix = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                              $prefix->bindParam(":id", $rowP['prefix']);
                              $prefix->execute();
                              $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                              if ($student_list['parent_1'] == $rowP['id']) {
                            ?>
                                <option selected value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
                              <?php  } else {
                              ?>
                                <option value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputEmail1" class="form-label">ผู้ปกครองคนที่ 2</label>
                          <select class="form-select" name="parent_2" id="select_box2_<?php echo $ins?>" disa>
                            <option value="" selected>เลือกผู้ปกครองคนที่ 2</option>
                            <?php
                            $pSQL = $conn->prepare("SELECT*FROM user WHERE status='1' ORDER BY 'name' ASC");
                            $pSQL->execute();

                            while ($rowP = $pSQL->fetch(PDO::FETCH_ASSOC)) {
                              $prefix = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                              $prefix->bindParam(":id", $rowP['prefix']);
                              $prefix->execute();
                              $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                              if ($student_list['parent_2'] == $rowP['id']) {
                            ?>
                                <option selected value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
                              <?php  } else {
                              ?>
                                <option value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputEmail1" class="form-label">ผู้ปกครองคนที่ 3
                          </label>
                          <select class="form-select" name="parent_3" id="select_box3_<?php echo $ins?>">
                            <option value="" selected>เลือกผู้ปกครองคนที่ 3</option>
                            <?php
                            $pSQL = $conn->prepare("SELECT*FROM user WHERE status='1' ORDER BY 'name' ASC");
                            $pSQL->execute();

                            while ($rowP = $pSQL->fetch(PDO::FETCH_ASSOC)) {
                              $prefix = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                              $prefix->bindParam(":id", $rowP['prefix']);
                              $prefix->execute();
                              $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                              if ($student_list['parent_3'] == $rowP['id']) {
                            ?>
                                <option selected value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
                              <?php  } else {
                              ?>
                                <option value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputEmail1" class="form-label">ผู้ปกครองคนที่ 4</label>
                          <select class="form-select" name="parent_4" id="select_box4_<?php echo $ins?>">
                            <option value="" selected>เลือกผู้ปกครองคนที่ 4</option>
                            <?php
                            $pSQL = $conn->prepare("SELECT*FROM user WHERE status='1' ORDER BY 'name' ASC");
                            $pSQL->execute();

                            while ($rowP = $pSQL->fetch(PDO::FETCH_ASSOC)) {
                              $prefix = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                              $prefix->bindParam(":id", $rowP['prefix']);
                              $prefix->execute();
                              $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                              if ($student_list['parent_4'] == $rowP['id']) {
                            ?>
                                <option selected value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
                              <?php  } else {
                              ?>
                                <option value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>

                  </div>
                  <div class="modal-footer">

                    <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-50">
                        <i class="fa-solid fa-floppy-disk"></i>
                      </span>
                      <span class="text">บันทึก</span></button>
                  </div>
                  </form>
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