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
                        <th style="width: 20%">ข้อมูล</th>
                    </tr>
                </thead>
                <div class="modal fade" id="exampleModal<?php echo $in ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-house" style="color:mediumseagreen"></i> รับ <?php echo $rpf['prefix'] . $std_list['name'] . ' ' . $std_list['surname']; ?> ออกจากหอพัก</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
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
                                            <label for="exampleInputEmail1" class="form-label">วันที่ออกจากหอพัก <i>รูปแบบ ดด/วว/ปปปป(ค.ศ.)</i></label>
                                            <input type="date" id="date_out" name="date_out" class="form-control">
                                            <label for="exampleInputEmail1" class="form-label">เวลาออกจากหอพัก <i>เช่น 16.30 น. = 04.30 PM</i></label>
                                            <input type="time" id="time_out" name="time_out" class="form-control" min="16:00" max="17:30" />
                                            <label for="exampleInputEmail1" class="form-label">วันที่จะเข้าหอพัก <i>รูปแบบ ดด/วว/ปปปป(ค.ศ.)</i></label>
                                            <input type="date" id="date_in" name="date_in" class="form-control">
                                            <label for="exampleInputEmail1" class="form-label">เวลาเข้าหอพัก <i>เช่น 09.30 น. = 09.30 AM</i></label>
                                            <input type="time" id="time_in" name="time_in" class="form-control" min="09:00" max="17:30" />
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php while ($std_list = $std_p->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tbody>

                        <tr>
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
                            <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $in ?>"><i class="fa-solid fa-right-from-bracket"></i> ออกหอ</button>
                            </td>
                        </tr>


                    <?php
                    ++$in;
                } ?>
                    </tbody>
            </table>


        </div>
    </div>
</div>
</div>