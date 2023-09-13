<!-- Page Heading -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">การเข้าออกหอพัก ด้วยวิธีการยืนยันตัวตนผ่านรหัส QR</h1>

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
      function date_time(id)
{
        date = new Date;
        year = date.getFullYear()+543;
        month = date.getMonth();
        months = new Array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
        d = date.getDate();
        day = date.getDay();
        days = new Array('วันอาทิตย์', 'วันจันทร์', 'วันอังคาร', 'วันพุธ', 'วันพฤหัสบดี', 'วันศุกร์', 'วันเสาร์');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+'ที่ '+d+' '+months[month]+' '+year+'<br><h1> เวลา '+h+':'+m+':'+s+' น.</h1>';
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}
 

    </script>
    <!-- DataTales Example -->
    <div class="row">
      <div class="col-md-6">
<video id="preview" width="100%" class="rounded mx-auto d-block"></video>
      </div>
      <div class="col-md-6">
      <div class="alert alert-success" role="alert">
                    <i class="fa-solid fa-qrcode"></i> กรุณาแสดงรหัส QR นี้ต่อครูปกครองหอพักเพื่อยืนยันตัวตน
                    <br><span id="date_time" class="h4" style="font-family: 'Anuphan';font-style: bold;"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
                </div>
                <form action="?page=dorm-qr-check" name="qr" id="qr"method="post">
        <input type="text" name="text" id="text" class="form-control" readonly hidden>
        <input type="text" name="dorm" id="dorm" class="form-control" readonly value="<?php echo $rdorm['dorm'];?>" hidden>

                </form>
                <img src="https://scan-do.com/wp-content/uploads/2016/09/qrcode-300x300.png" class="rounded mx-auto d-block" height="250px">
      </div>
    </div>
    <script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
        //window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
    });
    scanner.addListener('scan',function(c){
      document.getElementById('text').value=c;
      document.getElementById('qr').submit();
    })
</script>

    
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>