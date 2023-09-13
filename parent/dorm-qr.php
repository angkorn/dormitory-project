<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">นักเรียนเข้า-ออกหอพัก</h1>
</div>

<!-- Content Row -->


<!-- Content Row -->

<div class="row">
    <?php
    function DateThai($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    function DateThai2($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
    }
    if ($_GET['act'] == 1) {

        $std_o = $conn->prepare("SELECT * FROM dorm_out1 WHERE id=:id AND type='1'");
        $std_o->bindParam(":id", $_GET['id']);
        $std_o->execute();
        $in = 3;
        $ins = 1;
        $id=$_GET['id'];
        $std_out = $std_o->fetch(PDO::FETCH_ASSOC);

    ?>
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">

            <!-- Card Body -->
            <div class="">
                <div class="alert alert-warning" role="alert">
                    <h1 style="font-family: 'Anuphan';font-style: bold;"><i class="fa-solid fa-qrcode"></i> QR CODE INDENTIFIER
                    </h1>
                </div>
                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo 'STDO-'.$std_out['dorm'].'-'.$std_out['type'].'-'.$std_out['status'].'-'.$id ?>&choe=UTF-8"
                 class="rounded mx-auto d-block" title="ออกหอพัก" />
                </br>
                <div class="alert alert-warning" role="alert">
                    <i class="fa-solid fa-qrcode"></i> แสดงรหัส QR นี้ต่อครูปกครองหอพักเพื่อยืนยันตัวตน ก่อนรับนักเรียน เมื่อดำเนินการเรียบร้อยกดปุ่มเสร็จสิ้น
                </div>
            </div>
            <a href="?page=dorm-process" class="btn btn-warning btn-icon-split"><span class="icon text-black-50">
                    <i class="fa-solid fa-backward"></i>
                </span>
                <span class="text text-black-50">ย้อนกลับ</span></a>
            <a href="?page=dorm-process" class="btn btn-success btn-icon-split"><span class="icon text-white">
                    <i class="fa-solid fa-check"></i>
                </span>
                <span class="text text-white">เสร็จสิ้น</span></a>
                

        <?php
        ++$in;
    }
    if ($_GET['act'] == 2) {

        $std_o = $conn->prepare("SELECT * FROM dorm_out1 WHERE id=:id AND type='1'");
        $std_o->bindParam(":id", $_GET['id']);
        $std_o->execute();
        $in = 3;
        $ins = 1;
        $id=$_GET['id'];
        $std_out = $std_o->fetch(PDO::FETCH_ASSOC);

        ?>
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">

                <!-- Card Body -->
                <div class="">
                    <div class="alert alert-info" role="alert">
                        <h1 style="font-family: 'Anuphan';font-style: bold;"><i class="fa-solid fa-qrcode"></i> QR CODE INDENTIFIER
                        </h1>
                    </div>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo 'STDO-'.$std_out['dorm'].'-'.$std_out['type'].'-'.$std_out['status'].'-'.$id ?>&choe=UTF-8" class="rounded mx-auto d-block" title="เข้าหอพัก" />
                    </br>
                    <div class="alert alert-info" role="alert">
                        <i class="fa-solid fa-qrcode"></i> แสดงรหัส QR นี้ต่อครูปกครองหอพักเพื่อยืนยันตัวตน ก่อนส่งนักเรียนเข้าหอพัก เมื่อดำเนินการเรียบร้อยกดปุ่มเสร็จสิ้น
                    </div>
                </div>
                <a href="?page=dorm-process" class="btn btn-warning btn-icon-split"><span class="icon text-black-50">
                        <i class="fa-solid fa-backward"></i>
                    </span>
                    <span class="text text-black-50">ย้อนกลับ</span></a>
                <a href="?page=dorm-process" class="btn btn-success btn-icon-split"><span class="icon text-white">
                        <i class="fa-solid fa-check"></i>
                    </span>
                    <span class="text text-white">เสร็จสิ้น</span></a>
                    

            <?php
            ++$in;
        } ?>


            </div>
            <?php

            ?>
        </div>
</div>