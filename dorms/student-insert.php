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
    <p class="mb-4">ผู้ดูแลหอพักสามารถเพิ่มข้อมูลนักเรียนได้ <i>ทั้งนี้ต้องได้รับความยินยอมและการอนุญาตจากผู้ปกครองแล้วเท่านั้น</i></p>

    <form method="POST" action="action.php?id=4">
      <div class="row">
        <div class="col-md-2 mb-3">
          <label for="exampleInputEmail1" class="form-label">รหัสนักเรียน</label>
          <input type="text" name="std_id" class="form-control" id="exampleInputEmail1" value="" placeholder="กรอกรหัสนักเรียน" required>
        </div>
        <div class="col-md-2 mb-3">
          <label for="exampleInputEmail1" class="form-label">คำนำหน้า</label>
          <select class="form-select" name="prefix" required>
            <option selected value="">-เลือกคำนำหน้า-</option>
            <?php
            $prefixes = $conn->prepare("SELECT * FROM std_prefixes ORDER BY id ASC");
            $prefixes->execute();

            while ($rowPrefix = $prefixes->fetch(PDO::FETCH_ASSOC)) {

            ?>
              <option value="<?php echo $rowPrefix['id'] ?>"><?php echo $rowPrefix['prefix'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label for="exampleInputEmail1" class="form-label">ชื่อ</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="" placeholder="กรอกชื่อจริง" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="exampleInputPassword1" class="form-label">สกุล</label>
          <input type="text" name="surname" class="form-control" id="exampleInputPassword1" placeholder="กรอกนามสกุล" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-1 mb-3">
          <label for="exampleInputPassword1" class="form-label">หอพัก</label>
          <input type="text" name="dorm" class="form-control" id="exampleInputPassword1" value="<?php echo $rdorm['dorm']; ?>" >
        </div>
        <div class="col-md-2 mb-3">
          <label for="exampleInputPassword1" class="form-label">ชั้น</label>
          <select class="form-select" name="floor" id="select_boxa" required>
            <option selected value="">-ชั้น-</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </div>
        <div class="col-md-2 mb-3">
          <label for="exampleInputPassword1" class="form-label">ปีก</label>
          <select class="form-select" name="side" id="select_boxb" required>
            <option selected value="">-ปีก-</option>
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
        </div>
        <div class="col-md-2 mb-3">
          <label for="exampleInputPassword1" class="form-label">ระดับชั้น</label>
          <select class="form-select" name="grade" id="select_boxc" required>
            <option selected value="">-ระดับชั้น-</option>
            <option value="ม.1">ม.1</option>
            <option value="ม.2">ม.2</option>
            <option value="ม.3">ม.3</option>
            <option value="ม.4">ม.4</option>
            <option value="ม.5">ม.5</option>
            <option value="ม.6">ม.6</option>

          </select>
        </div>
        <div class="col-md-2 mb-3">
          <label for="exampleInputPassword1" class="form-label">ห้อง</label>
          <select class="form-select" name="class" id="select_boxd" required>
            <option selected value="">-ห้อง-</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>

          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">อีเมล</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="กรอกที่อยู่อีเมล xxx@gmail.com" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="exampleInputPassword1" class="form-label">โทรศัพท์</label>
          <input type="text" name="tel" class="form-control" id="exampleInputPassword1" placeholder="กรอกเบอร์โทร 0XXXXXXXXX" required>
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">ที่อยู่</label>
        <textarea name="address" class="form-control" id="exampleInputPassword1" placeholder="กรอกที่อยู่ปัจจุบัน" required></textarea>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">ผู้ปกครองคนที่ 1 (จำเป็น)</label>
          <select class="form-select" name="parent_1" id="select_box" required>
            <option value="" selected>โปรดเลือกผู้ปกครองคนที่ 1</option>
            <?php
            $pSQL = $conn->prepare("SELECT*FROM user WHERE status='1' ORDER BY 'name' ASC");
            $pSQL->execute();

            while ($rowP = $pSQL->fetch(PDO::FETCH_ASSOC)) {
              $prefix = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
              $prefix->bindParam(":id", $rowP['prefix']);
              $prefix->execute();
              $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
            ?>
              <option value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">ผู้ปกครองคนที่ 2</label>
          <select class="form-select" name="parent_2" id="select_box2" disa>
            <option value="" selected>เลือกผู้ปกครองคนที่ 2</option>
            <?php
            $pSQL = $conn->prepare("SELECT*FROM user WHERE status='1' ORDER BY 'name' ASC");
            $pSQL->execute();

            while ($rowP = $pSQL->fetch(PDO::FETCH_ASSOC)) {
              $prefix = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
              $prefix->bindParam(":id", $rowP['prefix']);
              $prefix->execute();
              $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
            ?>
              <option value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
            <?php } ?>
          </select>        </div>
        <div class="col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">ผู้ปกครองคนที่ 3
          </label>
          <select class="form-select" name="parent_3" id="select_box3">
            <option value="" selected>เลือกผู้ปกครองคนที่ 3</option>
            <?php
            $pSQL = $conn->prepare("SELECT*FROM user WHERE status='1' ORDER BY 'name' ASC");
            $pSQL->execute();

            while ($rowP = $pSQL->fetch(PDO::FETCH_ASSOC)) {
              $prefix = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
              $prefix->bindParam(":id", $rowP['prefix']);
              $prefix->execute();
              $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
            ?>
              <option value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
            <?php } ?>
          </select>                </div>
        <div class="col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">ผู้ปกครองคนที่ 4</label>
          <select class="form-select" name="parent_4" id="select_box4">
            <option value="" selected>เลือกผู้ปกครองคนที่ 4</option>
            <?php
            $pSQL = $conn->prepare("SELECT*FROM user WHERE status='1' ORDER BY 'name' ASC");
            $pSQL->execute();

            while ($rowP = $pSQL->fetch(PDO::FETCH_ASSOC)) {
              $prefix = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
              $prefix->bindParam(":id", $rowP['prefix']);
              $prefix->execute();
              $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
            ?>
              <option value="<?php echo $rowP['id'] ?>"><?php echo $rpf['prefix'] . $rowP['name'] . ' ' . $rowP['surname']; ?></option>
            <?php } ?>
          </select>        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script><script>

   var select_box_element = document.querySelector('#select_box');
 dselect(select_box_element,{
    search: true
 });
 var select_box_element = document.querySelector('#select_box2');
 dselect(select_box_element,{
    search: true
 });
 var select_box_element = document.querySelector('#select_box3');
 dselect(select_box_element,{
    search: true
 });
 var select_box_element = document.querySelector('#select_box4');
 dselect(select_box_element,{
    search: true
 });
</script>