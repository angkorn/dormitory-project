<!-- Page Heading -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">รายชื่อนักเรียน <p class="d-none d-print-block">หอพัก <?php echo $rdorm['dorm']?></p></h1>
  <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm d-print-none" onclick="window.print()"><i class="fa-solid fa-print"></i> พิมพ์</a>


</div>

<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->

  <!-- Content Row -->


  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4 d-print-none">ระบบจะแสดงรายชื่อนักเรียนหอพักของท่าน ทั้งหมดที่มีในระบบ </p>

    <!-- DataTales Example -->
    <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 2/1</p>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 5%">ลำดับที่</th>
            <th style="width: 20%">ชื่อ-สกุล</th>
            <th style="width: 10%">ชั้น/ปีก</th>
            <th style="width: 10%">ระดับชั้น</th>
            <th style="width: 20%">โทรศัพท์</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 0;
          $dorm = $rdorm['dorm'];
          $student = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='2' AND side='1' order by grade ASC");
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
             <?php } ?>
        </tbody>
      </table>
      <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 2/2</p>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 5%">ลำดับที่</th>
            <th style="width: 20%">ชื่อ-สกุล</th>
            <th style="width: 10%">ชั้น/ปีก</th>
            <th style="width: 10%">ระดับชั้น</th>
            <th style="width: 20%">โทรศัพท์</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 0;
          $dorm = $rdorm['dorm'];
          $student = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='2' AND side='2' order by grade ASC");
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
             <?php } ?>
        </tbody>
      </table>
      <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 3/1</p>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 5%">ลำดับที่</th>
            <th style="width: 20%">ชื่อ-สกุล</th>
            <th style="width: 10%">ชั้น/ปีก</th>
            <th style="width: 10%">ระดับชั้น</th>
            <th style="width: 20%">โทรศัพท์</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 0;
          $dorm = $rdorm['dorm'];
          $student = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='3' AND side='1' order by grade ASC");
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
             <?php } ?>
        </tbody>
      </table>
      <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 3/2</p>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 5%">ลำดับที่</th>
            <th style="width: 20%">ชื่อ-สกุล</th>
            <th style="width: 10%">ชั้น/ปีก</th>
            <th style="width: 10%">ระดับชั้น</th>
            <th style="width: 20%">โทรศัพท์</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 0;
          $dorm = $rdorm['dorm'];
          $student = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='3' AND side='2' order by grade ASC");
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
             <?php } ?>
        </tbody>
      </table>
      <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 4/1</p>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 5%">ลำดับที่</th>
            <th style="width: 20%">ชื่อ-สกุล</th>
            <th style="width: 10%">ชั้น/ปีก</th>
            <th style="width: 10%">ระดับชั้น</th>
            <th style="width: 20%">โทรศัพท์</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 0;
          $dorm = $rdorm['dorm'];
          $student = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='4' AND side='1' order by grade ASC");
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
             <?php } ?>
        </tbody>
      </table>
      <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 4/2</p>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 5%">ลำดับที่</th>
            <th style="width: 20%">ชื่อ-สกุล</th>
            <th style="width: 10%">ชั้น/ปีก</th>
            <th style="width: 10%">ระดับชั้น</th>
            <th style="width: 20%">โทรศัพท์</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 0;
          $dorm = $rdorm['dorm'];
          $student = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='4' AND side='2' order by grade ASC");
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
             <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>