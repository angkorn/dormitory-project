<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">ผู้ปกครอง</h1>

</div>

<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->

    <!-- Content Row -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <p class="mb-4">ผู้ดูแลหอพักสามารถเพิ่มข้อมูลผู้ปกครองได้ <i>ทั้งนี้ต้องได้รับความยินยอมและการอนุญาตจากผู้ปกครองแล้วเท่านั้น</i></p>

        <form method="POST" action="action.php?id=3" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="exampleInputEmail1" class="form-label">คำนำหน้า</label>
                    <select class="form-select" name="prefix" id="select_box" required>
                        <option selected value="">-เลือกคำนำหน้า-</option>
                        <?php
                        $prefixes = $conn->prepare("SELECT * FROM prefixes ORDER BY id ASC");
                        $prefixes->execute();

                        while ($rowPrefix = $prefixes->fetch(PDO::FETCH_ASSOC)) {

                        ?>
                            <option value="<?php echo $rowPrefix['id'] ?>"><?php echo $rowPrefix['prefix'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="exampleInputEmail1" class="form-label">ชื่อ</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="" placeholder="กรอกชื่อจริง" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="exampleInputPassword1" class="form-label">สกุล</label>
                    <input type="text" name="surname" class="form-control" id="exampleInputPassword1" placeholder="กรอกนามสกุล" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="exampleInputPassword1" class="form-label">อาชีพ</label>
                    <input type="text" name="job" class="form-control" id="exampleInputPassword1" placeholder="กรอกอาชีพ" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="exampleInputPassword1" class="form-label">รหัสผู้ปกครอง</label>
                    <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="กรอกรหัสผู้ปกครอง ตัวอย่าง D500001-2566" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="exampleInputPassword1" class="form-label">รหัสผ่าน</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="กรอกรหัสผ่าน" required>

                </div>
                <div class="col-md-4 mb-3">
                    <label for="exampleInputPassword1" class="form-label">ยืนยันรหัสผ่าน</label>
                    <input type="password" name="repassword" class="form-control" id="exampleInputEmail1" placeholder="กรอกรหัสผ่านอีกครั้ง" required>

                </div>
            </div>
            <div class="row">
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
            <div class="mb-3">
                <label for="formFile" class="form-label">รูป</label>
                <input class="form-control" name="image" type="file" id="formFile" placeholder="เลือกไฟล์">
                ตั้งชื่อไฟล์เป็น ห้อง-เลขที่-ชื่อผู้ปกครอง เช่น 61-1-สมศักดิ์.png <i>รองรับไฟล์สกุล png, jpg, jpeg, gif เท่านั้น</i>
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