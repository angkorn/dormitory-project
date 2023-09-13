<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">นักเรียนออกหอพัก</h1>
</div>

<!-- Content Row -->


<!-- Content Row -->

<div class="row">
    <?php
    $std_p = $conn->prepare("SELECT * FROM student WHERE parent_1=:id OR parent_2=:id OR parent_3=:id OR parent_4=:id ");
    $std_p->bindParam(":id", $row['id']);
    $std_p->execute();
    $in = 3;
    $ins = 1;
    if (isset($_GET['id'])) {
        $std_p1 = $conn->prepare("SELECT * FROM student WHERE id=:id ");
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
                                                $prefix = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                                                $prefix->bindParam(":id", $std_list['prefix']);
                                                $prefix->execute();
                                                $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                                                echo $rpf['prefix'] . $std_list['name'] . ' ' . $std_list['surname']; ?><br>
                        <b>หอพัก : </b> <?php echo 'หอพัก ' . $std_list['dorm'] ?><br>
                        <b>ชั้น/ปีก : </b> <?php echo $std_list['floor'] . '/' . $std_list['side'] ?><br>
                        <b>ระดับชั้น : </b> <?php echo $std_list['grade'] . '/' . $std_list['class'] ?>

                    </div>
                    <!-- Page Heading -->
                    <form method="POST" action="action.php?id=1">
                        <input type="text" id="dorm" name="dorm" class="form-control" value="<?php echo $std_list['dorm'] ?>" hidden>
                        <input type="text" id="id_s" name="id_s" class="form-control" value="<?php echo $std_list['id'] ?>" hidden>
                        <input type="text" id="id_p" name="id_p" class="form-control" value="<?php echo $row['id'] ?>" hidden>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">สาเหตุ</label>
                                <select class="form-select" name="reason" id="select_box" required>
                                    <option value="" selected>โปรดเลือกสาเหตุ</option>
                                    <?php
                                    $pSQL = $conn->prepare("SELECT*FROM reason ORDER BY 'id' ASC");
                                    $pSQL->execute();

                                    while ($rowP = $pSQL->fetch(PDO::FETCH_ASSOC)) {

                                    ?>
                                        <option value="<?php echo $rowP['id'] ?>"><?php echo $rowP['reason']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">วันที่ออกจากหอพัก <i>รูปแบบ ดด/วว/ปปปป(ค.ศ.)</i></label>
                                <input type="date" id="date_out" name="date_out" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">เวลาออกจากหอพัก <i>เช่น 16.30 น. = 04.30 PM</i></label>
                                <input type="time" id="time_out" name="time_out" class="form-control" min="09:00" max="17:30" required />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">วันที่จะเข้าหอพัก <i>รูปแบบ ดด/วว/ปปปป(ค.ศ.)</i></label>
                                <input type="date" id="date_in" name="date_in" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">เวลาเข้าหอพัก <i>เช่น 09.30 น. = 09.30 AM</i></label>
                                <input type="time" id="time_in" name="time_in" class="form-control" min="09:00" max="17:30" required />
                                <div></div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-50">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                </span>
                                <span class="text">บันทึก</span></button>
                        </div>
                </div>
                </form>


            <?php } else {
            echo '
            
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="
 https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js
 "></script>
    <link href="
 https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css
 " rel="stylesheet">
            <script>
            Swal.fire({
            icon: "error",
            title: "ขออภัย",
            text: "กรุณาลองใหม่อีกครั้ง",
            confirmButtonText: "ตกลง",
            }).then((result) => {
            window.location = "index.php?page=dorm-require";
            })
            </script>
            ';
        }
    }
    if (!isset($_GET['id'])) {
            ?>
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">

                <!-- Card Body -->
                <div class="">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 20%">ชื่อ-สกุล</th>
                                <th>หอพัก</th>
                                <th>ระดับชั้น</th>
                                <th>โทรศัพท์</th>
                                <th style="width: 20%">การดำเนินการ</th>
                            </tr>
                        </thead>

                        <?php while ($std_list = $std_p->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tbody>

                                <tr>
                                    <?php
                                    $std_o = $conn->prepare("SELECT * FROM dorm_out1 WHERE id_s=:id AND status='2'");
                                    $std_o->bindParam(":id", $std_list['id']);
                                    $std_o->execute();
                                    $numr = $std_o->rowCount();
                                    if($numr!=1){
                                    ?>
                                    <td><?php
                                        $prefix = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                                        $prefix->bindParam(":id", $std_list['prefix']);
                                        $prefix->execute();
                                        $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                                        echo $rpf['prefix'] . $std_list['name'] . ' ' . $std_list['surname']; ?></td>
                                    <td><?php
                                        echo $std_list['dorm'] ?></td>
                                    <td><?php
                                        echo $std_list['grade'] . '/' . $std_list['class']; ?></td>
                                    <td><a href="tel:+66<?php echo $std_list['tel']; ?>"><?php
                                                                                            echo '<i class="fa-solid fa-phone"></i> : ' . $std_list['tel']; ?></a></td>
                                    <td><a href="?page=dorm-require&id=<?php
                                                                        echo $std_list['id'] ?>" class="btn btn-warning"><i class="fa-solid fa-right-from-bracket"></i> ออกหอ</a>
                                    </td>
                                    <?php } ?>
                                </tr>


                            <?php
                            ++$in;
                        } ?>
                            </tbody>
                    </table>


                </div>
            </div>
        <?php }

        ?>
            </div>
</div>