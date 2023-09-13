<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link rel="icon" href="img/pcshstrg.png">

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
    <?php
    include('./cn/config.php');
    session_start();
    if (!isset($_GET['id'])) {
        header("location: ../index.php");
    } else {
        if ($_GET['id'] == '1') {
            $dorm = $_POST['dorm'];
            $id_p = $_POST['id_p'];
            $id_s = $_POST['id_s'];
            $date_out = $_POST['date_out'];
            $time_out = $_POST['time_out'];
            $date_in = $_POST['date_in'];
            $time_in = $_POST['time_in'];
            $reason = $_POST['reason'];
            $ins = $conn->prepare("INSERT INTO `dorm_out1`( `dorm`, `type`, `id_p`, `id_s`, `reason`, `date_out`, `time_out`, `date_in`, `time_in`, `status`) VALUES ('$dorm','1','$id_p','$id_s','$reason','$date_out','$time_out','$date_in','$time_in','1')");
            if($ins->execute()){
            echo '
            <script>
            Swal.fire({
              icon: "success",
              title: "บันทึกข้อมูลสำเร็จ",
              text: "กรุณานำหลักฐานไปยืนยันกับครูหอพัก เมื่อรับนักเรียน",
              confirmButtonText: "ตกลง",
            }).then((result) => {
                window.location = "index.php?page=dorm-process";
             })
            </script>
            ';
            }else{
                echo '
                <script>
                Swal.fire({
                  icon: "error",
                  title: "ขออภัย",
                  text: "ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง",
                  confirmButtonText: "ตกลง",
                }).then((result) => {
                    window.location = "index.php?page=dorm-require";
                 })
                </script>
                ';  
            }
        }
        if ($_GET['id'] == '2') {
            $id=$_GET['rqid'];
            $dorm = $_POST['dorm'];
            $id_p = $_POST['id_p'];
            $id_s = $_POST['id_s'];
            $date_out = $_POST['date_out'];
            $time_out = $_POST['time_out'];
            $date_in = $_POST['date_in'];
            $time_in = $_POST['time_in'];
            $reason = $_POST['reason'];
            $ins = $conn->prepare("UPDATE `dorm_out1` SET `reason`='$reason',`date_out`='$date_out',`time_out`='$time_out',`date_in`='$date_in',`time_in`='$time_in' WHERE `id`='$id' ");
            if($ins->execute()){
            echo '
            <script>
            Swal.fire({
              icon: "success",
              title: "บันทึกข้อมูลสำเร็จ",
              confirmButtonText: "ตกลง",
            }).then((result) => {
                window.location = "index.php?page=dorm-process";
             })
            </script>
            ';
            }else{
                echo '
                <script>
                Swal.fire({
                  icon: "error",
                  title: "ขออภัย",
                  text: "ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง",
                  confirmButtonText: "ตกลง",
                }).then((result) => {
                    window.location = "index.php?page=dorm-process";
                 })
                </script>
                ';  
            }
        }if ($_GET['id'] == '3') {
            $id=$_GET['sid'];
            $ins ="DELETE FROM `dorm_out1` WHERE id='$id'";
            if($conn->exec($ins)){
            echo '
            <script>
            Swal.fire({
                icon: "success",
                title: "ลบข้อมูลสำเร็จ",
                confirmButtonText: "ตกลง",
            }).then((result) => {
                window.location = "index.php?page=dorm-process";
             })
            </script>
            ';
            }else{
                echo '
                <script>
                Swal.fire({
                  icon: "error",
                  title: "ขออภัย",
                  text: "ไม่สามารถลบได้ กรุณาลองใหม่อีกครั้ง",
                  confirmButtonText: "ตกลง",
                }).then((result) => {
                    window.location = "index.php?page=dorm-process";
                 })
                </script>
                ';  
            }
        }if ($_GET['id'] == '4') {
            $id=$_POST['id'];
            $prefix = $_POST['prefix'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $job = $_POST['job'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $address = $_POST['address'];
            if ($password == $_POST['repassword']) {
                
                            $sqlInsert = $conn->prepare("UPDATE `user` SET `prefix`='$prefix',`name`='$name',`surname`='$surname',`job`='$job',`password`='$password',`email`='$email',`tel`='$tel',`address`='$address' WHERE `id`='$id'");
                            if ($sqlInsert->execute()) {
                                echo '
<script>
Swal.fire({
  icon: "success",
  title: "บันทึกข้อมูลสำเร็จ",
  confirmButtonText: "ตกลง",
}).then((result) => {
    window.location = "index.php?page=profile";
 })
</script>
';
                            } else {
                                echo '
<script>
Swal.fire({
  icon: "error",
  title: "ขออภัย",
  text: "ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง",
  confirmButtonText: "ตกลง",
}).then((result) => {
    window.location = "index.php?page=profile";
 })
</script>
';
                            }
                        } else {
                            
                echo '
                <script>
                Swal.fire({
                icon: "error",
                title: "ขออภัย",
                text: "ท่านกรอกรหัสผิด กรุณาลองใหม่อีกครั้ง",
                confirmButtonText: "ตกลง",
                }).then((result) => {
                window.location = "index.php?page=profile";
                })
                </script>
                ';
            }
        }if ($_GET['id'] == '5') {
            $id=$_POST['id'];
            $pas=$_POST['password'];
            $oldp=$_POST['old-password'];
            $newp=$_POST['new-password'];
            $renewp=$_POST['renew-password'];
            if($oldp==$pas){
                if($newp==$renewp){
                    $sqlInsert = $conn->prepare("UPDATE `user` SET `password`='$password' WHERE `id`='$id'");
                    if ($sqlInsert->execute()) {
                        echo '
<script>
Swal.fire({
icon: "success",
title: "บันทึกข้อมูลสำเร็จ",
confirmButtonText: "ตกลง",
}).then((result) => {
window.location = "index.php?page=profile";
})
</script>
';
                    } else {
                        echo '
<script>
Swal.fire({
icon: "error",
title: "ขออภัย",
text: "ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง",
confirmButtonText: "ตกลง",
}).then((result) => {
window.location = "index.php?page=profile";
})
</script>
';
                    }
                }else{
                    echo '
                <script>
                Swal.fire({
                icon: "error",
                title: "ขออภัย",
                text: "ท่านกรอกรหัสใหม่ 2 ครั้งไม่เหมือนกัน กรุณาลองใหม่อีกครั้ง",
                confirmButtonText: "ตกลง",
                }).then((result) => {
                window.location = "index.php?page=profile";
                })
                </script>
                ';
                }
            }else{
                echo '
                <script>
                Swal.fire({
                icon: "error",
                title: "ขออภัย",
                text: "ท่านกรอกรหัสผ่านเดิมผิด กรุณาลองใหม่อีกครั้ง",
                confirmButtonText: "ตกลง",
                }).then((result) => {
                window.location = "index.php?page=profile";
                })
                </script>
                ';
            }
        }
    }
    ?>