<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">นักเรียนเข้า-ออกหอพัก</h1>
</div>

<!-- Content Row -->

<p class="mb-4">ระบบจะแสดงเฉพาะนักเรียนในปกครองของท่าน ที่มีคำร้องออกหอพักและยังไม่เข้าหอพัก</p>

<!-- Content Row -->

<div class="row">
    <?php
    function DateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strHour= date("H",strtotime($strDate));
        $strMinute= date("i",strtotime($strDate));
        $strSeconds= date("s",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    function DateThai2($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	}

    $std_o = $conn->prepare("SELECT * FROM dorm_out1 WHERE id_p=:id AND type='1'");
    $std_o->bindParam(":id", $row['id']);
    $std_o->execute();
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
                                <th style="width: 20%">ประทับเวลา</th>
                                <th style="width: 20%">ชื่อ-สกุล</th>
                                <th>กำหนดออกหอพัก</th>
                                <th>กำหนดเข้าหอพัก</th>
                                <th>สถานะ</th>
                                <th style="width: 20%">การดำเนินการ</th>
                            </tr>
                        </thead>

                        <?php  ?>
                            <tbody>

                                <tr>
                                    <?php 
                                    
                                    $numr = $std_o->rowCount();
                                    if($numr==0){
                                        echo '<td colspan="6"><p class="text-center">ไม่มีรายการ</p></td>';
                                    }else{
                                        while ($std_out = $std_o->fetch(PDO::FETCH_ASSOC)) { 
                        
                                            if($std_out['status']!=3){
                                    ?>
                                    <td><?php
                                        echo DateThai2($std_out['timestamp']) ?></td>
                                    <td><?php
                                        $std_p1 = $conn->prepare("SELECT * FROM student WHERE id=:id ");
                                        $std_p1->bindParam(":id", $std_out['id_s']);
                                        $std_p1->execute();
                                        $std_list = $std_p1->fetch(PDO::FETCH_ASSOC);
                                        $prefix = $conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
                                        $prefix->bindParam(":id", $std_list['prefix']);
                                        $prefix->execute();
                                        $rpf = $prefix->fetch(PDO::FETCH_ASSOC);
                                        echo $rpf['prefix'] . $std_list['name'] . ' ' . $std_list['surname'].' (หอพัก '.$std_list['dorm'].')'; ?><br>
                                        <a href="tel:+66<?php echo $std_list['tel']; ?>"><?php echo '<i class="fa-solid fa-phone"></i> : ' . $std_list['tel']; ?></a>
                                        <br><?php 
                                        $rs = $conn->prepare("SELECT * FROM reason WHERE id=:id ");
                                        $rs->bindParam(":id", $std_out['reason']);
                                        $rs->execute();
                                        $rs_display = $rs->fetch(PDO::FETCH_ASSOC);
                                        echo 'สาเหตุ : '. $rs_display['reason']?>
                                    </td>
                                    <td><?php
                                    
                                        echo DateThai($std_out['date_out']) . '<br> เวลา ' . $std_out['time_out'] . ' น.'; ?></td>
                                    <td><?php
                                        echo DateThai($std_out['date_in']) . '<br> เวลา ' . $std_out['time_in'] . ' น.'; ?></td>
                                    <td><?php
                                    if($std_out['status']==1){
                                        echo '<span class="badge rounded-pill text-bg-warning">ส่งคำขอแล้ว</span>
                                        ';
                                    } if($std_out['status']==2){
                                        echo '<span class="badge rounded-pill text-bg-primary">ออกหอแล้ว</span>
                                        ';
                                    }
                                         ?></td>
                                    <td><?php if($std_out['status']==1){
                                        echo '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="?page=dorm-qr&act=1&id='.$std_out['id'].'" class="btn btn-warning"><i class="fa-solid fa-right-from-bracket"></i></a>';
                                        echo '<a href="?page=dorm-rq-edit&id='.$std_out['id'].'" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a><button type="button" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal'.$in.'"><i class="fa-solid fa-trash-can"></i></button></div>';
                                    }if($std_out['status']==2){
                                        echo '<a href="?page=dorm-qr&act=2&id='.$std_out['id'].'" class="btn btn-primary"><i class="fa-solid fa-square-check"></i> เข้าหอ</a>';
                                                                        
                                    }
                                     ?>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <div class="modal fade" id="deleteModal<?php echo $in ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel"><i class="fa-solid fa-trash" style="color:crimson"></i> ลบข้อมูล </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-dark">
                    ท่านต้องการลบข้อมูลคำร้องออกจากหอพักของ <?php echo $rpf['prefix'] . $std_list['name'] . ' ' . $std_list['surname'] ?> ใช่หรือไม่?
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-secondary btn-icon-split" data-bs-dismiss="modal">
                      <span class="icon text-white-50">
                        <i class="fa-solid fa-right-from-bracket"></i>
                      </span>
                      <span class="text">ปิด</span>
                    </a>
                    <a href="action.php?id=3&sid=<?php echo $std_out['id'] ?>" class="btn btn-danger btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fa-solid fa-trash"></i>
                      </span>
                      <span class="text">ลบข้อมูล</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

                            <?php
                            ++$in;
                        } }?>
                            </tbody>
                    </table>


                </div>
            </div>
        <?php 

        ?>
            </div>
</div>