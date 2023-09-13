<!-- Page Heading -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php
                                        $id = $_GET['id'];
                                        if ($id == 2) {
                                            echo 'ข้อมูลนักเรียนออกหอพัก <span class="d-none d-print-block">(หอพัก ' . $rdorm['dorm'] . ')</span></p>';
                                        } elseif ($id == 3) {
                                            echo '<p>ข้อมูลสรุปรวมหอพัก <span class="d-none d-print-block">(หอพัก ' . $rdorm['dorm'] . ')</span></p>';
                                        }
                                        ?></h1>
    <p><a href="?page=student-statistic" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm d-print-none"><i class="fa-solid fa-left-long"></i> ย้อนกลับ</a>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm d-print-none" onclick="window.print()"><i class="fa-solid fa-print"></i> พิมพ์</a>
    </p>
</div>
<?php
$std_o = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2'");
$std_o->bindParam(":id", $rdorm['dorm']);
$std_o->execute();
$numr = $std_o->rowCount();
$std = $conn->prepare("SELECT * FROM student WHERE dorm=:id");
$std->bindParam(":id", $rdorm['dorm']);
$std->execute();
$numrs = $std->rowCount();
$date1 = date("Y-m-d");
?>
<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->


    <!-- Content Row -->
    <?php if ($id == 2) {
    ?>

        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1" style="font-family: 'Anuphan';">
                                นักเรียนออกหอพัก</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numr ?> คน</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-people-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

</div>
<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-success text-uppercase mb-1" style="font-family: 'Anuphan';">
                                กลับบ้าน</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $std_o1 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND reason='1'");
                $std_o1->bindParam(":id", $rdorm['dorm']);
                $std_o1->execute();
                $r1=$std_o1->rowCount();
                echo $r1;?>
                 คน</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-house fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-danger text-uppercase mb-1" style="font-family: 'Anuphan';">
                                พบแพทย์</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $std_o2 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND reason='2'");
                $std_o2->bindParam(":id", $rdorm['dorm']);
                $std_o2->execute();
                $r2=$std_o2->rowCount();
                echo $r2;?>
                 คน</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user-doctor fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1" style="font-family: 'Anuphan';">
                                ลากิจ</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $std_o3 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND reason='3'");
                $std_o3->bindParam(":id", $rdorm['dorm']);
                $std_o3->execute();
                $r3=$std_o3->rowCount();
                echo $r3;?>
                 คน</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-briefcase fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1" style="font-family: 'Anuphan';">
                                ลาป่วย</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $std_o4 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND reason='4'");
                $std_o4->bindParam(":id", $rdorm['dorm']);
                $std_o4->execute();
                $r4=$std_o4->rowCount();
                echo $r4;?>
                 คน</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-house-chimney-medical fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="col-md">
    <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 2/1</p>
    <table class="table table-bordered" style="width:100%">
        <thead>

            <tr>
                <th style="width:10%">ที่</th>
                <th style="width:50%">ชื่อ-สกุล</th>
                <th style="width:20%">ระดับชั้น</th>
                <th style="width:10%">สาเหตุ</th>
                <th style="width:10%">หมายเหตุ</th>            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $dorm = $rdorm['dorm'];
            $student21 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='2' AND side='1' order by grade ASC");
            $student21->bindParam(":d", $dorm);
            $student21->execute();
            while ($student_list21 = $student21->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <?php $std_o21 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND date_in>='$date1'");
                $std_o21->bindParam(":id", $rdorm['dorm']);
                $std_o21->execute();
                $std_l21 = $std_o21->fetch(PDO::FETCH_ASSOC); ?>
                <tr>
                    <?php if ($std_l21['id_s'] == $student_list21['id']) { ?>
                        <td><?php echo ++$i; ?></td>
                        <td><?php
                            $prefix21 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                            $prefix21->bindParam(":id", $student_list21['prefix']);
                            $prefix21->execute();
                            $rpf21 = $prefix21->fetch(PDO::FETCH_ASSOC);
                            echo $rpf21['prefix'] . $student_list21['name'] . ' ' . $student_list21['surname']; ?></td>
                        <td><?php
                            echo $student_list21['grade'] . '/' . $student_list21['class']; ?></td>
<td><?php $rs21 = $conn->prepare("SELECT * FROM reason WHERE id=:id ");
                                                        $rs21->bindParam(":id", $std_l21['reason']);
                                                        $rs21->execute();
                                                        $rs_display21 = $rs21->fetch(PDO::FETCH_ASSOC);
                                                        echo $rs_display21['reason']; ?></td>
                        <td><?php $std_l21 = $std_o21->fetch(PDO::FETCH_ASSOC);
                            if (!isset($std_l21['type'])) {
                                echo '-';
                            } else {
                                if ($std_l21['type'] == 2) {
                                    echo 'มอบฉันทะ';
                                }
                            }
                            ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 2/2</p>
    <table class="table table-bordered" style="width:100%">
        <thead>

            <tr>
                <th style="width:10%">ที่</th>
                <th style="width:50%">ชื่อ-สกุล</th>
                <th style="width:20%">ระดับชั้น</th>
                <th style="width:10%">สาเหตุ</th>
                <th style="width:10%">หมายเหตุ</th>            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $dorm = $rdorm['dorm'];
            $student22 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='2' AND side='2' order by grade ASC");
            $student22->bindParam(":d", $dorm);
            $student22->execute();
            while ($student_list22 = $student22->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <?php $std_o22 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND date_in>='$date1'");
                $std_o22->bindParam(":id", $rdorm['dorm']);
                $std_o22->execute();
                $std_l22 = $std_o22->fetch(PDO::FETCH_ASSOC); ?>
                <tr>
                    <?php if ($std_l22['id_s'] == $student_list22['id']) { ?>
                        <td><?php echo ++$i; ?></td>
                        <td><?php
                            $prefix22 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                            $prefix22->bindParam(":id", $student_list22['prefix']);
                            $prefix22->execute();
                            $rpf22 = $prefix22->fetch(PDO::FETCH_ASSOC);
                            echo $rpf22['prefix'] . $student_list22['name'] . ' ' . $student_list22['surname']; ?></td>
                        <td><?php
                            echo $student_list22['grade'] . '/' . $student_list22['class']; ?></td>
<td><?php $rs22 = $conn->prepare("SELECT * FROM reason WHERE id=:id ");
                                                        $rs22->bindParam(":id", $std_l22['reason']);
                                                        $rs22->execute();
                                                        $rs_display22 = $rs22->fetch(PDO::FETCH_ASSOC);
                                                        echo $rs_display22['reason']; ?></td>
                        <td><?php $std_l22 = $std_o22->fetch(PDO::FETCH_ASSOC);
                            if (!isset($std_l22['type'])) {
                                echo '-';
                            } else {
                                if ($std_l22['type'] == 2) {
                                    echo 'มอบฉันทะ';
                                }
                            }
                            ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 3/1</p>
    <table class="table table-bordered" style="width:100%">
        <thead>

            <tr>
                <th style="width:10%">ที่</th>
                <th style="width:50%">ชื่อ-สกุล</th>
                <th style="width:20%">ระดับชั้น</th>
                <th style="width:10%">สาเหตุ</th>
                <th style="width:10%">หมายเหตุ</th>            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $dorm = $rdorm['dorm'];
            $student31 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='3' AND side='1' order by grade ASC");
            $student31->bindParam(":d", $dorm);
            $student31->execute();
            while ($student_list31 = $student31->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <?php $std_o31 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND date_in>='$date1'");
                $std_o31->bindParam(":id", $rdorm['dorm']);
                $std_o31->execute();
                $std_l31 = $std_o31->fetch(PDO::FETCH_ASSOC); ?>
                <tr>
                    <?php if ($std_l31['id_s'] == $student_list31['id']) { ?>
                        <td><?php echo ++$i; ?></td>
                        <td><?php
                            $prefix31 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                            $prefix31->bindParam(":id", $student_list31['prefix']);
                            $prefix31->execute();
                            $rpf31 = $prefix31->fetch(PDO::FETCH_ASSOC);
                            echo $rpf31['prefix'] . $student_list31['name'] . ' ' . $student_list31['surname']; ?></td>
                        <td><?php
                            echo $student_list31['grade'] . '/' . $student_list31['class']; ?></td>
<td><?php $rs31 = $conn->prepare("SELECT * FROM reason WHERE id=:id ");
                                                        $rs31->bindParam(":id", $std_l31['reason']);
                                                        $rs31->execute();
                                                        $rs_display31 = $rs31->fetch(PDO::FETCH_ASSOC);
                                                        echo $rs_display31['reason']; ?></td>
                        <td><?php $std_l31 = $std_o31->fetch(PDO::FETCH_ASSOC);
                            if (!isset($std_l31['type'])) {
                                echo '-';
                            } else {
                                if ($std_l31['type'] == 2) {
                                    echo 'มอบฉันทะ';
                                }
                            }
                            ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 3/2</p>
    <table class="table table-bordered" style="width:100%">
        <thead>

            <tr>
                <th style="width:10%">ที่</th>
                <th style="width:50%">ชื่อ-สกุล</th>
                <th style="width:20%">ระดับชั้น</th>
                <th style="width:10%">สาเหตุ</th>
                <th style="width:10%">หมายเหตุ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $dorm = $rdorm['dorm'];
            $student32 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='3' AND side='2' order by grade ASC");
            $student32->BindParam(":d", $dorm);
            $student32->execute();
            while ($student_list32 = $student32->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <?php $std_o32 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND date_in>='$date1'");
                $std_o32->bindParam(":id", $rdorm['dorm']);
                $std_o32->execute();
                $std_l32 = $std_o32->fetch(PDO::FETCH_ASSOC); ?>
                <tr>
                    <?php if ($std_l32['id_s'] == $student_list32['id']) { ?>
                        <td><?php echo ++$i; ?></td>
                        <td><?php
                            $prefix32 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                            $prefix32->bindParam(":id", $student_list32['prefix']);
                            $prefix32->execute();
                            $rpf32 = $prefix32->fetch(PDO::FETCH_ASSOC);
                            echo $rpf32['prefix'] . $student_list32['name'] . ' ' . $student_list32['surname']; ?></td>
                        <td><?php
                            echo $student_list32['grade'] . '/' . $student_list32['class']; ?></td>
<td><?php $rs32 = $conn->prepare("SELECT * FROM reason WHERE id=:id ");
                                                        $rs32->bindParam(":id", $std_l32['reason']);
                                                        $rs32->execute();
                                                        $rs_display32 = $rs32->fetch(PDO::FETCH_ASSOC);
                                                        echo $rs_display32['reason']; ?></td>
                        <td><?php $std_l32 = $std_o32->fetch(PDO::FETCH_ASSOC);
                            if (!isset($std_l32['type'])) {
                                echo '-';
                            } else {
                                if ($std_l32['type'] == 2) {
                                    echo 'มอบฉันทะ';
                                }
                            }
                            ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 4/1</p>
    <table class="table table-bordered" style="width:100%">
        <thead>

            <tr>
                <th style="width:10%">ที่</th>
                <th style="width:50%">ชื่อ-สกุล</th>
                <th style="width:20%">ระดับชั้น</th>
                <th style="width:10%">สาเหตุ</th>
                <th style="width:10%">หมายเหตุ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $dorm = $rdorm['dorm'];
            $student41 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='4' AND side='1' order by grade ASC");
            $student41->BindParam(":d", $dorm);
            $student41->execute();
            while ($student_list41 = $student41->fetch(PDO::FETCH_ASSOC)) {
            ?><?php $std_o41 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND date_in>='$date1'");
                    $std_o41->bindParam(":id", $rdorm['dorm']);
                    $std_o41->execute();
                    $std_l41 = $std_o41->fetch(PDO::FETCH_ASSOC); ?>
            <tr>
                <?php if ($std_l41['id_s'] == $student_list41['id']) { ?>
                    <td><?php echo ++$i; ?></td>
                    <td><?php
                        $prefix41 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                        $prefix41->bindParam(":id", $student_list41['prefix']);
                        $prefix41->execute();
                        $rpf41 = $prefix41->fetch(PDO::FETCH_ASSOC);
                        echo $rpf41['prefix'] . $student_list41['name'] . ' ' . $student_list41['surname']; ?></td>
                    <td><?php
                        echo $student_list41['grade'] . '/' . $student_list41['class']; ?></td>
<td><?php $rs41 = $conn->prepare("SELECT * FROM reason WHERE id=:id ");
                                                        $rs41->bindParam(":id", $std_l41['reason']);
                                                        $rs41->execute();
                                                        $rs_display41 = $rs41->fetch(PDO::FETCH_ASSOC);
                                                        echo $rs_display41['reason']; ?></td>
                    <td><?php $std_l41 = $std_o41->fetch(PDO::FETCH_ASSOC);
                        if (!isset($std_l41['type'])) {
                            echo '-';
                        } else {
                            if ($std_l41['type'] == 2) {
                                echo 'มอบฉันทะ';
                            }
                        }
                        ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 4/2</p>
    <table class="table table-bordered" style="width:100%">
        <thead>

            <tr>
                <th style="width:10%">ที่</th>
                <th style="width:50%">ชื่อ-สกุล</th>
                <th style="width:20%">ระดับชั้น</th>
                <th style="width:10%">สาเหตุ</th>
                <th style="width:10%">หมายเหตุ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $dorm = $rdorm['dorm'];
            $student42 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='4' AND side='2' order by grade ASC");
            $student42->BindParam(":d", $dorm);
            $student42->execute();
            while ($student_list42 = $student42->fetch(PDO::FETCH_ASSOC)) {
            ?><?php $std_o42 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND date_in>='$date1'");
            $std_o42->bindParam(":id", $rdorm['dorm']);
            $std_o42->execute();
            $std_l42 = $std_o42->fetch(PDO::FETCH_ASSOC); ?>
    <tr>
        <?php if ($std_l42['id_s'] == $student_list42['id']) { ?>
            <td><?php echo ++$i; ?></td>
            <td><?php
                $prefix42 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                $prefix42->bindParam(":id", $student_list42['prefix']);
                $prefix42->execute();
                $rpf42 = $prefix42->fetch(PDO::FETCH_ASSOC);
                echo $rpf42['prefix'] . $student_list42['name'] . ' ' . $student_list42['surname']; ?></td>
            <td><?php
                echo $student_list42['grade'] . '/' . $student_list42['class']; ?></td>
<td><?php $rs42 = $conn->prepare("SELECT * FROM reason WHERE id=:id ");
                                                        $rs42->bindParam(":id", $std_l42['reason']);
                                                        $rs42->execute();
                                                        $rs_display42 = $rs42->fetch(PDO::FETCH_ASSOC);
                                                        echo $rs_display42['reason']; ?></td>
            <td><?php $std_l42 = $std_o42->fetch(PDO::FETCH_ASSOC);
                if (!isset($std_l42['type'])) {
                    echo '-';
                } else {
                    if ($std_l42['type'] == 2) {
                        echo 'มอบฉันทะ';
                    }
                }
                ?></td>
        <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php  } elseif ($id == 3) { ?>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary text-uppercase mb-1" style="font-family: 'Anuphan';">
                            นักเรียนออกหอพัก</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numr ?> คน</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-people-group fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-success text-uppercase mb-1" style="font-family: 'Anuphan';">
                            นักเรียนอยู่หอพัก</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numrs - $numr ?> คน</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    <div class="col-md">
        <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 2/1</p>
        <table class="table table-bordered" style="width:100%">
            <thead>

                <tr>
                    <th style="width:10%">ที่</th>
                    <th style="width:50%">ชื่อ-สกุล</th>
                    <th style="width:20%">ระดับชั้น</th>
                    <th style="width:20%">สถานะ</th>
                    <th style="width:10%">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $dorm = $rdorm['dorm'];
                $student21 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='2' AND side='1' order by grade ASC");
                $student21->bindParam(":d", $dorm);
                $student21->execute();
                while ($student_list21 = $student21->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php
                            $prefix21 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                            $prefix21->bindParam(":id", $student_list21['prefix']);
                            $prefix21->execute();
                            $rpf21 = $prefix21->fetch(PDO::FETCH_ASSOC);
                            echo $rpf21['prefix'] . $student_list21['name'] . ' ' . $student_list21['surname']; ?></td>
                        <td><?php
                            echo $student_list21['grade'] . '/' . $student_list21['class']; ?></td>
                        <td><?php $std_o21 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND id_s=:ids");
                            $std_o21->bindParam(":id", $rdorm['dorm']);
                            $std_o21->bindParam(":ids", $student_list21['id']);

                            $std_o21->execute();
                            $numr21 = $std_o21->rowCount(); ?><?php if ($numr21 == 1) {
                                echo '<i class="text-danger">ออกหอ</i>';
                            } else {
                                                                    echo 'อยู่หอ';
                                                                } ?></td>

                        <td><?php $std_l21 = $std_o21->fetch(PDO::FETCH_ASSOC);
                            if (!isset($std_l21['type'])) {
                                echo '-';
                            } else {
                                if ($std_l21['type'] == 1) {
                                    echo '-';
                                }
                                elseif ($std_l21['type'] == 2) {
                                    echo 'มอบฉันทะ';
                                }
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 2/2</p>
        <table class="table table-bordered" style="width:100%">
            <thead>

                <tr>
                    <th style="width:10%">ที่</th>
                    <th style="width:50%">ชื่อ-สกุล</th>
                    <th style="width:20%">ระดับชั้น</th>
                    <th style="width:20%">สถานะ</th>
                    <th style="width:10%">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $dorm = $rdorm['dorm'];
                $student22 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='2' AND side='2' order by grade ASC");
                $student22->bindParam(":d", $dorm);
                $student22->execute();
                while ($student_list22 = $student22->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php
                            $prefix22 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                            $prefix22->bindParam(":id", $student_list22['prefix']);
                            $prefix22->execute();
                            $rpf22 = $prefix22->fetch(PDO::FETCH_ASSOC);
                            echo $rpf22['prefix'] . $student_list22['name'] . ' ' . $student_list22['surname']; ?></td>
                        <td><?php
                            echo $student_list22['grade'] . '/' . $student_list22['class']; ?></td>
                        <td><?php $std_o22 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND id_s=:ids");
                            $std_o22->bindParam(":id", $rdorm['dorm']);
                            $std_o22->bindParam(":ids", $student_list22['id']);

                            $std_o22->execute();
                            $numr22 = $std_o22->rowCount(); ?><?php if ($numr22 == 1) {
                                echo '<i class="text-danger">ออกหอ</i>';
                            } else {
                                                                    echo 'อยู่หอ';
                                                                } ?></td>

                        <td><?php $std_l22 = $std_o22->fetch(PDO::FETCH_ASSOC);
                            if (!isset($std_l22['type'])) {
                                echo '-';
                            } else {
                                if ($std_l22['type'] == 1) {
                                    echo '-';
                                }
                                elseif ($std_l22['type'] == 2) {
                                    echo 'มอบฉันทะ';
                                }
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 3/1</p>
        <table class="table table-bordered" style="width:100%">
            <thead>

                <tr>
                    <th style="width:10%">ที่</th>
                    <th style="width:50%">ชื่อ-สกุล</th>
                    <th style="width:20%">ระดับชั้น</th>
                    <th style="width:20%">สถานะ</th>
                    <th style="width:10%">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $dorm = $rdorm['dorm'];
                $student31 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='3' AND side='1' order by grade ASC");
                $student31->bindParam(":d", $dorm);
                $student31->execute();
                while ($student_list31 = $student31->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php
                            $prefix31 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                            $prefix31->bindParam(":id", $student_list31['prefix']);
                            $prefix31->execute();
                            $rpf31 = $prefix31->fetch(PDO::FETCH_ASSOC);
                            echo $rpf31['prefix'] . $student_list31['name'] . ' ' . $student_list31['surname']; ?></td>
                        <td><?php
                            echo $student_list31['grade'] . '/' . $student_list31['class']; ?></td>
                        <td><?php $std_o31 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND id_s=:ids");
                            $std_o31->bindParam(":id", $rdorm['dorm']);
                            $std_o31->bindParam(":ids", $student_list31['id']);
                            $std_o31->execute();
                            $numr31 = $std_o31->rowCount(); ?><?php if ($numr31 == 1) {
                                echo '<i class="text-danger">ออกหอ</i>';
                            } else {
                                                                    echo 'อยู่หอ';
                                                                } ?></td>

                        <td><?php $std_l31 = $std_o31->fetch(PDO::FETCH_ASSOC);
                            if (!isset($std_l31['type'])) {
                                echo '-';
                            } else {
                                if ($std_l31['type'] == 1) {
                                    echo '-';
                                }
                                elseif ($std_l31['type'] == 2) {
                                    echo 'มอบฉันทะ';
                                }
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 3/2</p>
        <table class="table table-bordered" style="width:100%">
            <thead>

                <tr>
                    <th style="width:10%">ที่</th>
                    <th style="width:50%">ชื่อ-สกุล</th>
                    <th style="width:20%">ระดับชั้น</th>
                    <th style="width:20%">สถานะ</th>
                    <th style="width:10%">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $dorm = $rdorm['dorm'];
                $student32 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='3' AND side='2' order by grade ASC");
                $student32->BindParam(":d", $dorm);
                $student32->execute();
                while ($student_list32 = $student32->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php
                            $prefix32 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                            $prefix32->bindParam(":id", $student_list32['prefix']);
                            $prefix32->execute();
                            $rpf32 = $prefix32->fetch(PDO::FETCH_ASSOC);
                            echo $rpf32['prefix'] . $student_list32['name'] . ' ' . $student_list32['surname']; ?></td>
                        <td><?php
                            echo $student_list32['grade'] . '/' . $student_list32['class']; ?></td>
                        <td><?php $std_o32 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND id_s=:ids");
                            $std_o32->bindParam(":id", $rdorm['dorm']);
                            $std_o32->bindParam(":ids", $student_list32['id']);

                            $std_o32->execute();
                            $numr32 = $std_o32->rowCount(); ?><?php if ($numr32 == 1) {
                                echo '<i class="text-danger">ออกหอ</i>';
                            } else {
                                                                    echo 'อยู่หอ';
                                                                } ?></td>

                        <td><?php $std_l32 = $std_o32->fetch(PDO::FETCH_ASSOC);
                            if (!isset($std_l32['type'])) {
                                echo '-';
                            } else {
                                if ($std_l32['type'] == 1) {
                                    echo '-';
                                }
                                elseif ($std_l32['type'] == 2) {
                                    echo 'มอบฉันทะ';
                                }
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 4/1</p>
        <table class="table table-bordered" style="width:100%">
            <thead>

                <tr>
                    <th style="width:10%">ที่</th>
                    <th style="width:50%">ชื่อ-สกุล</th>
                    <th style="width:20%">ระดับชั้น</th>
                    <th style="width:20%">สถานะ</th>
                    <th style="width:10%">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $dorm = $rdorm['dorm'];
                $student41 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='4' AND side='1' order by grade ASC");
                $student41->BindParam(":d", $dorm);
                $student41->execute();
                while ($student_list41 = $student41->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php
                            $prefix41 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                            $prefix41->bindParam(":id", $student_list41['prefix']);
                            $prefix41->execute();
                            $rpf41 = $prefix41->fetch(PDO::FETCH_ASSOC);
                            echo $rpf41['prefix'] . $student_list41['name'] . ' ' . $student_list41['surname']; ?></td>
                        <td><?php
                            echo $student_list41['grade'] . '/' . $student_list41['class']; ?></td>
                        <td><?php $std_o41 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND id_s=:ids");
                            $std_o41->bindParam(":id", $rdorm['dorm']);
                            $std_o41->bindParam(":ids", $student_list41['id']);

                            $std_o41->execute();
                            $numr41 = $std_o41->rowCount(); ?><?php if ($numr41 == 1) {
                                                                    echo '<i class="text-danger">ออกหอ</i>';
                                                                } else {
                                                                    echo 'อยู่หอ';
                                                                } ?></td>

                        <td><?php $std_l41 = $std_o41->fetch(PDO::FETCH_ASSOC);
                            if (!isset($std_l41['type'])) {
                                echo '-';
                            } else {
                                if ($std_l41['type'] == 1) {
                                    echo '-';
                                }
                                elseif ($std_l41['type'] == 2) {
                                    echo 'มอบฉันทะ';
                                }
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="h5 mb-0 font-weight-bold text-gray-800">ชั้น 4/2</p>
        <table class="table table-bordered" style="width:100%">
            <thead>

                <tr>
                    <th style="width:10%">ที่</th>
                    <th style="width:50%">ชื่อ-สกุล</th>
                    <th style="width:20%">ระดับชั้น</th>
                    <th style="width:20%">สถานะ</th>
                    <th style="width:10%">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $dorm = $rdorm['dorm'];
                $student42 = $conn->prepare("SELECT * FROM student WHERE dorm=:d AND floor='4' AND side='2' order by grade ASC");
                $student42->BindParam(":d", $dorm);
                $student42->execute();
                while ($student_list42 = $student42->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php
                            $prefix42 = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                            $prefix42->bindParam(":id", $student_list42['prefix']);
                            $prefix42->execute();
                            $rpf42 = $prefix42->fetch(PDO::FETCH_ASSOC);
                            echo $rpf42['prefix'] . $student_list42['name'] . ' ' . $student_list42['surname']; ?></td>
                        <td><?php
                            echo $student_list42['grade'] . '/' . $student_list42['class']; ?></td>
                        <td><?php $std_o42 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND status='2' AND id_s=:ids");
                            $std_o42->bindParam(":id", $rdorm['dorm']);
                            $std_o42->bindParam(":ids", $student_list42['id']);

                            $std_o42->execute();
                            $numr42 = $std_o42->rowCount(); ?><?php if ($numr42 == 1) {
                                echo '<i class="text-danger">ออกหอ</i>';
                            } else {
                                                                    echo 'อยู่หอ';
                                                                } ?></td>

                        <td><?php $std_l42 = $std_o42->fetch(PDO::FETCH_ASSOC);
                            if (!isset($std_l42['type'])) {
                                echo '-';
                            } else {
                                if ($std_l42['type'] == 1) {
                                    echo '-';
                                }
                                elseif ($std_l42['type'] == 2) {
                                    echo 'มอบฉันทะ';
                                }
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php } ?>