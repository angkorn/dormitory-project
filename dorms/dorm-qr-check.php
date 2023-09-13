<!-- Page Heading -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">การเข้าออกหอพัก</h1>

</div>

<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->

    <!-- Content Row -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script>
            function date_time(id) {
                date = new Date;
                year = date.getFullYear() + 543;
                month = date.getMonth();
                months = new Array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
                d = date.getDate();
                day = date.getDay();
                days = new Array('วันอาทิตย์', 'วันจันทร์', 'วันอังคาร', 'วันพุธ', 'วันพฤหัสบดี', 'วันศุกร์', 'วันเสาร์');
                h = date.getHours();
                if (h < 10) {
                    h = "0" + h;
                }
                m = date.getMinutes();
                if (m < 10) {
                    m = "0" + m;
                }
                s = date.getSeconds();
                if (s < 10) {
                    s = "0" + s;
                }
                result = '' + days[day] + 'ที่ ' + d + ' ' + months[month] + ' ' + year + '<br> เวลา ' + h + ':' + m + ':' + s + ' น.';
                document.getElementById(id).innerHTML = result;
                setTimeout('date_time("' + id + '");', '1000');
                return true;
            }
        </script>
        <!-- DataTales Example -->
        <div class="row">
            <?php
            if (isset($_POST['text'])) {
                $qr = $_POST['text'];
                $qr_read = explode("-", $qr);
                if ($qr_read[0] == 'STDO') {
                    //หอ
                    if ($qr_read[1] == $_POST['dorm']) {
                        //ปกติ
                        if ($qr_read[2] == 1) {
                            //ออกหอ
                            if ($qr_read[3] == 1) {
                                $QR = $qr_read[4];
            ?>
                                
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

                                            $std_o = $conn->prepare("SELECT * FROM dorm_out1 WHERE id=:id");
                                            $std_o->bindParam(":id", $QR);
                                            $std_o->execute();
                                            $std_out = $std_o->fetch(PDO::FETCH_ASSOC);
                                            $par  = $conn->prepare("SELECT * FROM user WHERE id=:id");
                                            $par->bindParam(":id", $std_out['id_p']);
                                            $par->execute();
                                            $parent = $par->fetch(PDO::FETCH_ASSOC);
                                            $prefix = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                                            $prefix->bindParam(":id", $parent['prefix']);
                                            $prefix->execute();
                                            $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                                            $st  = $conn->prepare("SELECT * FROM student WHERE id=:id");
                                            $st->bindParam(":id", $std_out['id_s']);
                                            $st->execute();
                                            $student = $st->fetch(PDO::FETCH_ASSOC);
                                            $sprefix = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                                            $sprefix->bindParam(":id", $student['prefix']);
                                            $sprefix->execute();
                                            $rpfs = $sprefix->fetch(PDO::FETCH_ASSOC);
                                            if ($std_out['status'] == $qr_read[3]) {
                                            ?>
                                            <div class="col-md-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary" style="font-family: 'Anuphan';"><i class="fa-solid fa-address-card"></i> บัตรผู้ปกครอง
                </h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="./image/<?php echo $parent['image'] ?>" class="rounded mx-auto d-block" alt="<?php echo $rpf['prefix'] . $parent['name'] . ' ' . $parent['surname']; ?>" height="200px">

                                                    </div>
                                                    <div class="col-md-8">
                                                        <p class="text-primary text-right"><b>เลขที่ : </b>ECard-<?php echo $parent['id']; ?>-2565</p>
                                                        <p class="h5"><b>ชื่อ-สกุล :</b> <?php echo $rpf['prefix'] . $parent['name'] . ' ' . $parent['surname']; ?></p>
                                                        <p class="h5"><b>รหัสผู้ปกครอง :</b> <?php echo $parent['username']; ?></p>
                                                        <p class="h6"><b>โทรศัพท์ :</b> <?php echo $parent['tel']; ?></p>
                                                        <p class="h6"><b>อีเมล :</b> <?php echo $parent['email']; ?></p>

                                                    </div>
                                                </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="alert alert-warning" role="alert">
                                        <span id="date_time" class="h5" style="font-family: 'Anuphan';font-style: bold;"></span>
                                        <script type="text/javascript">
                                            window.onload = date_time('date_time');
                                        </script>
                                    </div>
                                    <p class="text-primary h5" style="font-family : 'Anuphan';"><b>รูปแบบ :</b> ออกจากหอพัก</p>
                                    <p class="text-dark"><b>ชื่อนักเรียน :</b> <?php echo $rpfs['prefix'] . $student['name'] . ' ' . $student['surname'] . ' (หอพัก ' . $student['dorm'] . ')'; ?><br>
                                        <b>ชั้น/ปีก :</b> <?php echo $student['floor'] . '/' . $student['side']; ?> <b>ชั้น :</b> <?php echo $student['grade'] . '/' . $student['class']; ?><br>
                                        <b>สาเหตุ :</b> <?php $rs = $conn->prepare("SELECT * FROM reason WHERE id=:id ");
                                                        $rs->bindParam(":id", $std_out['reason']);
                                                        $rs->execute();
                                                        $rs_display = $rs->fetch(PDO::FETCH_ASSOC);
                                                        echo $rs_display['reason']; ?><br>
                                        <b class="text-primary" style="font-family : 'Anuphan';">กำหนดออกหอพัก</b><br>
                                        <?php

                                                echo '<b>วันที่ : </b>' . DateThai($std_out['date_out']) . '<b> เวลา </b>' . $std_out['time_out'] . ' น.'; ?><br>
                                        <b class="text-primary" style="font-family : 'Anuphan';">กำหนดเข้าหอพัก</b><br>
                                        <?php

                                                echo '<b>วันที่ : </b>' . DateThai($std_out['date_in']) . '<b> เวลา </b>' . $std_out['time_in'] . ' น.'; ?>

                                    </p>
                                    <?php
                                                $_SESSION['type'] = $qr_read[3];
                                                $_SESSION['D'] = $QR;
                                    ?>
                                    <a href="action.php?id=6" class="btn btn-success btn-icon-split"><span class="icon text-white">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <span class="text text-white">เสร็จสิ้น</span></a>
                                </div>

        </div>
    <?php
                                            } else {
                                                echo '
                                                <script>
                                                alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง!");
                                                window.location = "index.php?page=dorm-qr";
                                                </script>
                                    ';
                                            }
                                        } //เข้าหอ
                                        elseif ($qr_read[3] == 2) {
                                            $QR = $qr_read[4];
    ?>
    
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

                                            $std_o = $conn->prepare("SELECT * FROM dorm_out1 WHERE id=:id");
                                            $std_o->bindParam(":id", $QR);
                                            $std_o->execute();
                                            $std_out = $std_o->fetch(PDO::FETCH_ASSOC);
                                            $par  = $conn->prepare("SELECT * FROM user WHERE id=:id");
                                            $par->bindParam(":id", $std_out['id_p']);
                                            $par->execute();
                                            $parent = $par->fetch(PDO::FETCH_ASSOC);
                                            $prefix = $conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                                            $prefix->bindParam(":id", $parent['prefix']);
                                            $prefix->execute();
                                            $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                                            $st  = $conn->prepare("SELECT * FROM student WHERE id=:id");
                                            $st->bindParam(":id", $std_out['id_s']);
                                            $st->execute();
                                            $student = $st->fetch(PDO::FETCH_ASSOC);
                                            $sprefix = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                                            $sprefix->bindParam(":id", $student['prefix']);
                                            $sprefix->execute();
                                            $rpfs = $sprefix->fetch(PDO::FETCH_ASSOC);
                                            if ($std_out['status'] == $qr_read[3]) {
                ?>
                <div class="col-md-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary" style="font-family: 'Anuphan';"><i class="fa-solid fa-address-card"></i> บัตรผู้ปกครอง
                </h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="./image/<?php echo $parent['image'] ?>" class="rounded mx-auto d-block" alt="<?php echo $rpf['prefix'] . $parent['name'] . ' ' . $parent['surname']; ?>">

                        </div>
                        <div class="col-md-8">
                            <p class="text-primary text-right"><b>เลขที่ : </b>ECard-<?php echo $parent['id']; ?>-2565</p>
                            <p class="h5"><b>ชื่อ-สกุล :</b> <?php echo $rpf['prefix'] . $parent['name'] . ' ' . $parent['surname']; ?></p>
                            <p class="h5"><b>รหัสผู้ปกครอง :</b> <?php echo $parent['username']; ?></p>
                            <p class="h6"><b>โทรศัพท์ :</b> <?php echo $parent['tel']; ?></p>
                            <p class="h6"><b>อีเมล :</b> <?php echo $parent['email']; ?></p>

                        </div>
                    </div>
            </div>
        </div>


    </div>
    <div class="col-md-6">
        <div class="alert alert-warning" role="alert">
            <span id="date_time" class="h5" style="font-family: 'Anuphan';font-style: bold;"></span>
            <script type="text/javascript">
                window.onload = date_time('date_time');
            </script>
        </div>
        <p class="text-success h5" style="font-family : 'Anuphan';"><b>รูปแบบ :</b> เข้าหอพัก</p>
        <p class="text-dark"><b>ชื่อนักเรียน :</b> <?php echo $rpfs['prefix'] . $student['name'] . ' ' . $student['surname'] . ' (หอพัก ' . $student['dorm'] . ')'; ?><br>
            <b>ชั้น/ปีก :</b> <?php echo $student['floor'] . '/' . $student['side']; ?> <b>ชั้น :</b> <?php echo $student['grade'] . '/' . $student['class']; ?><br>
            <b>สาเหตุ :</b> <?php $rs = $conn->prepare("SELECT * FROM reason WHERE id=:id ");
                                                $rs->bindParam(":id", $std_out['reason']);
                                                $rs->execute();
                                                $rs_display = $rs->fetch(PDO::FETCH_ASSOC);
                                                echo $rs_display['reason']; ?><br>
            <b class="text-success" style="font-family : 'Anuphan';">กำหนดออกหอพัก</b><br>
            <?php

                                                echo '<b>วันที่ : </b>' . DateThai($std_out['date_out']) . '<b> เวลา </b>' . $std_out['time_out'] . ' น.'; ?><br>
            <b class="text-success" style="font-family : 'Anuphan';">กำหนดเข้าหอพัก</b><br>
            <?php

                                                echo '<b>วันที่ : </b>' . DateThai($std_out['date_in']) . '<b> เวลา </b>' . $std_out['time_in'] . ' น.'; ?>

        </p>
        <?php
                                                $_SESSION['type'] = $qr_read[3];
                                                $_SESSION['D'] = $QR;
        ?>
        <a href="action.php?id=6" class="btn btn-success btn-icon-split"><span class="icon text-white">
                <i class="fa-solid fa-check"></i>
            </span>
            <span class="text text-white">เสร็จสิ้น</span></a>
    </div>

    </div>
<?php } else {
                                                echo '
                                                <script>
                                              alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง!");
                                              window.location = "index.php?page=dorm-qr";
                                              </script>
                                    ';
                                            }
                                        } else {
                                            echo '
                                            <script>
                                            alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง!");
                                            window.location = "index.php?page=dorm-qr";
                                            </script>
                                    ';
                                        }
                                    }
                                    //มอบฉันทะ
                                    elseif ($qr_read[2] == 2) {
                                    } else {
                                        echo '<script>
                                        alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง!");
                                        window.location = "index.php?page=dorm-qr";
                                        </script>';
                                    }
                                } else {
                                    echo '<script>
                                    alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง!");
                                    window.location = "index.php?page=dorm-qr";
                                    </script>';
                                }
                            } else {
                                echo '<script>
                                alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง!");
                                window.location = "index.php?page=dorm-qr";
                                </script>';
                            }
                        }
?>




</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="preconnect" href="https://fonts.googleapis.com">
 
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css
" rel="stylesheet">