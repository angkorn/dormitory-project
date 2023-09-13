<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">สถิตินักเรียนหอพัก</h1>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numrs - $numr ;
                        $deltastd=$numrs - $numr;?> คน</div>
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
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary" style="font-family: Anuphan;">รายงานนักเรียนหอพัก</h6>
               
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="">
                    <a href="?page=report&id=2" class="btn card bg-success text-white shadow">
                    <div class="card-body">
                    <i class="fa-solid fa-star"></i> ข้อมูลสรุปรวมนักเรียนออกหอพัก
                </div>
                </a>

                
<a href="?page=report&id=3" class="btn card bg-danger text-white shadow">
                    <div class="card-body">
                    <i class="fa-solid fa-cloud"></i> ข้อมูลรวม
                    <div class="text-white small">สรุปรวม นักเรียนอยู่หอพัก-ออกหอพัก</div>
                    </div>
</a>          
                       </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary" style="font-family: Anuphan;">สัดส่วนสาเหตุนักเรียนออกหอพัก</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie text-center">
                    <?php
                    $rs = $conn->prepare("SELECT * FROM reason ");
                    $rs->bindParam(":id", $rdorm['dorm']);
                    $rs->execute();
                    ?>
                    
                    <canvas id="myChart"></canvas>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                    const ctx = document.getElementById('myChart');
                    Chart.defaults.font.size = 12;
                    Chart.defaults.font.family = 'Chulabhornlikittext';

                    new Chart(ctx, {
                        type: 'pie',

                        data: {
                            labels: [<?php while ($reason = $rs->fetch(PDO::FETCH_ASSOC)) {
                                            if ($reason['id'] != 4) {
                                                echo "'" . $reason['reason'] . "',";
                                            } else {
                                                echo "'" . $reason['reason'] . "','อยู่หอพัก'";
                                            }
                                        } ?>],
                            datasets: [{
                                label: 'จำนวน',
                                data: [<?php 
                                    $std_o1 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND reason='1' AND status='2'");
                                    $std_o1->bindParam(":id", $rdorm['dorm']);
                                    $std_o1->execute();
                                    $rsc = $std_o1->rowCount();
                                    echo $rsc;
                    
                                      ?>,
                                      <?php 
                                    $std_o2 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND reason='2' AND status='2'");
                                    $std_o2->bindParam(":id", $rdorm['dorm']);
                                    $std_o2->execute();
                                    $rsc2 = $std_o2->rowCount();
                                    echo $rsc2;
                    
                                      ?>,<?php 
                                      $std_o3 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND reason='3' AND status='2'");
                                      $std_o3->bindParam(":id", $rdorm['dorm']);
                                      $std_o3->execute();
                                      $rsc3 = $std_o3->rowCount();
                                      echo $rsc3;
                      
                                        ?>,<?php 
                                        $std_o4 = $conn->prepare("SELECT * FROM dorm_out1 WHERE dorm=:id AND reason='4' AND status='2'");
                                        $std_o4->bindParam(":id", $rdorm['dorm']);
                                        $std_o4->execute();
                                        $rsc4 = $std_o4->rowCount();
                                        echo $rsc4;
                        
                                          ?>,<?php echo $deltastd?>],
                                borderWidth: 1
                            }]
                        },
                        options: {

                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>


</div>