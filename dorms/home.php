<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">หน้าหลัก</h1>
                        <a href="?page=student-statistic" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-chart-simple"></i> รายละเอียดสถิติ</a>
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
?>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1" style="font-family: 'Anuphan';">
                                                นักเรียนออกหอพัก</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numr?> คน</div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numrs-$numr?> คน</div>
                                        </div>
                                        <div class="col-auto">
                                           <i class="fa-solid fa-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

 
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow ">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="font-family: 'Anuphan';">
                                    <h6 class="m-0 font-weight-bold text-primary">ประกาศงานหอพัก</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <p class="font-weight-bold" style="font-family: 'Anuphan';">แนะนำการใช้งานระบบเข้าออกหอพัก</p>
                                <p>สำหรับครูหอพักสามารถใช้งานในส่วนการเข้าออกหอพักของนักเรียน* ด้วยการสแกนรหัส QR ที่ผู้ปกครองแสดง การจัดการการมอบฉันทะและการเพิ่มลบแก้ไขข้อมูลนักเรียน*และผู้ปกครอง </p>
                                <p>ระบบสแกนรหัส QR รองรับเบราเซอร์ Microsoft Edge , Google Chrome ฯลฯ ที่รองรับการใช้กล้อง Web Cam รวมถึงรองรับภาษา HTML , PHP , CSS , Javascript <i class="text-danger">รองรับในคอมพิวเตอร์เท่านั้น</i></p>
                                <p class="text-primary text-right">*นักเรียนหอพักที่อยู่ในความปกครองของท่าน คือ อยู่ในหอพักของท่านเท่านั้น</p>

                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"  style="font-family: 'Anuphan';">
                                    <h6 class="m-0 font-weight-bold text-primary">แบบรายงานปัญหา</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="../img/1.png" width="150px">
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <a href="https://forms.gle/A5dUFPME87cJUUkC6" class="btn btn-info"><i class="fa-solid fa-bullhorn"></i> แจ้งเรื่องในแบบรายงานปัญหา</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>