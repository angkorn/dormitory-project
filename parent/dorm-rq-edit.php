<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><span class="badge text-bg-danger">แก้ไขข้อมูล</span>
        นักเรียนเข้า-ออกหอพัก</h1>
</div>

<!-- Content Row -->


<!-- Content Row -->

<div class="row">

    <div class="row">
        <?php

        $in = 3;
        $ins = 1;
        if (isset($_GET['id'])) {
            $std_p1 = $conn->prepare("SELECT * FROM dorm_out1 WHERE id=:id ");
            $std_p1->bindParam(":id", $_GET['id']);
            $std_p1->execute();
            $num = $std_p1->rowCount();
            $std_list = $std_p1->fetch(PDO::FETCH_ASSOC);
            if ($num != 0) {
        ?>
                <!-- Content Row -->
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->

                    <!-- Content Row -->


                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="alert alert-warning" role="alert">
                            <b>ชื่อนักเรียน : </b><?php
                                                    $std_p = $conn->prepare("SELECT * FROM student WHERE id=:id ");
                                                    $std_p->bindParam(":id", $std_list['id_s']);
                                                    $std_p->execute();
                                                    $rss = $std_p->fetch(PDO::FETCH_ASSOC);
                                                    $prefix = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                                                    $prefix->bindParam(":id", $rss['prefix']);
                                                    $prefix->execute();
                                                    $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                                                    echo $rpf['prefix'] . $rss['name'] . ' ' . $rss['surname']; ?><br>
                            <b>หอพัก : </b> <?php echo 'หอพัก ' . $rss['dorm'] ?><br>
                            <b>ชั้น/ปีก : </b> <?php echo $rss['floor'] . '/' . $rss['side'] ?><br>
                            <b>ระดับชั้น : </b> <?php echo $rss['grade'] . '/' . $rss['class'] ?>

                        </div>
                        <!-- Page Heading -->
                        <form method="POST" action="action.php?id=2&rqid=<?php echo $std_list['id']?>">
                            <input type="text" id="dorm" name="dorm" class="form-control" value="<?php echo $std_list['dorm'] ?>" hidden>
                            <input type="text" id="id_s" name="id_s" class="form-control" value="<?php echo $std_list['id_s'] ?>" hidden>
                            <input type="text" id="id_p" name="id_p" class="form-control" value="<?php echo $std_list['id_p'] ?>" hidden>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">สาเหตุ</label>
                                    <select class="form-select" name="reason" id="select_box" required>
                                        <option value="" selected>โปรดเลือกสาเหตุ</option>
                                        <?php
                                        $pSQL = $conn->prepare("SELECT*FROM reason ORDER BY 'id' ASC");
                                        $pSQL->execute();

                                        while ($rowP = $pSQL->fetch(PDO::FETCH_ASSOC)) {
if($std_list['reason']==$rowP['id']){
                                        ?>

                                            <option value="<?php echo $rowP['id'] ?>" selected><?php echo $rowP['reason'];?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $rowP['id'] ?>"><?php echo $rowP['reason']; ?></option>
                                            <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">วันที่ออกจากหอพัก <i>รูปแบบ ดด/วว/ปปปป(ค.ศ.)</i></label>
                                    <input type="date" id="date_out" name="date_out" class="form-control" value="<?php echo $std_list['date_out'] ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">เวลาออกจากหอพัก <i>เช่น 16.30 น. = 04.30 PM</i></label>
                                    <input type="time" id="time_out" name="time_out" class="form-control" min="09:00" max="17:30" value="<?php echo $std_list['time_out'] ?>" required />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">วันที่จะเข้าหอพัก <i>รูปแบบ ดด/วว/ปปปป(ค.ศ.)</i></label>
                                    <input type="date" id="date_in" name="date_in" class="form-control" value="<?php echo $std_list['date_in'] ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">เวลาเข้าหอพัก <i>เช่น 09.30 น. = 09.30 AM</i></label>
                                    <input type="time" id="time_in" name="time_in" class="form-control" min="09:00" max="17:30" value="<?php echo $std_list['time_in'] ?>" required />
                                    <div></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="?page=dorm-process" class="btn btn-warning btn-icon-split"><span class="icon text-black-50">
                                <i class="fa-solid fa-backward"></i>
                                    </span>
                                    <span class="text text-black-50">ย้อนกลับ</span></a>
                                <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-50">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                    </span>
                                    <span class="text">บันทึก</span></button>
                            </div>
                    </div>
                    </form>
            <?php }
        } ?>
                </div>
    </div>
</div>