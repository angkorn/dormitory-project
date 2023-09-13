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
            $id = $_POST['id'];
            $prefix = $_POST['prefix'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $id = $_POST['id'];
            $ins = $conn->prepare("INSERT INTO `user`(`id`, `prefix`, `name`, `surname`, `username`, `image`, `password`, `email`, `tel`, `address`, `status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')");
        }
        if ($_GET['id'] == '2') {
            $id = $_GET['list'];
            $sql2 = "DELETE FROM `user` WHERE `id`=$id";

            // use exec() because no results are returned
            $conn->exec($sql2);
            echo '
    <script>
    Swal.fire({
      icon: "success",
      title: "ลบข้อมูลสำเร็จ",
      confirmButtonText: "ตกลง",
    }).then((result) => {
        window.location = "index.php?page=parent";
     })
    </script>
    ';
        }
        if ($_GET['id'] == '3') {
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
                if (!empty($_FILES['image']['name'])) {
                    $filename = basename($_FILES['image']['name']);
                    $targetFilePath = './image/' . $filename;
                    $filetype = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    $allowtypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
                    if (in_array($filetype, $allowtypes)) {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                            $sqlInsert = $conn->prepare("INSERT INTO `user`(`id`, `prefix`, `name`, `surname`, `job`,`username`, `image`, `password`, `email`, `tel`, `address`, `status`) VALUES ('','$prefix','$name','$surname','$job','$username','$filename','$password','$email','$tel','$address','1')");
                            if ($sqlInsert->execute()) {
                                echo '
<script>
Swal.fire({
  icon: "success",
  title: "บันทึกข้อมูลสำเร็จ",
  confirmButtonText: "ตกลง",
}).then((result) => {
    window.location = "index.php?page=parent";
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
    window.location = "index.php?page=parent-insert";
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
text: "ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง",
confirmButtonText: "ตกลง",
}).then((result) => {
window.location = "index.php?page=parent-insert";
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
text: "รูปแบบไฟล์ไม่ตรงตามที่กำหนด กรุณาลองใหม่อีกครั้ง",
confirmButtonText: "ตกลง",
}).then((result) => {
window.location = "index.php?page=parent-insert";
})
</script>
';
                    }
                }
            } else {
                echo '
                <script>
                Swal.fire({
                icon: "error",
                title: "ขออภัย",
                text: "ท่านกรอกรหัส 2 ครั้งไม่เหมือนกัน กรุณาลองใหม่อีกครั้ง",
                confirmButtonText: "ตกลง",
                }).then((result) => {
                window.location = "index.php?page=parent-insert";
                })
                </script>
                ';
            }
        }
        if ($_GET['id'] == '4') {
            $std_id = $_POST['std_id'];
            $prefix = $_POST['prefix'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $dorm = $_POST['dorm'];
            $floor = $_POST['floor'];
            $side = $_POST['side'];
            $grade = $_POST['grade'];
            $class = $_POST['class'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $address = $_POST['address'];
            $parent_1 = $_POST['parent_1'];
            $parent_2 = $_POST['parent_2'];
            $parent_3 = $_POST['parent_3'];
            $parent_4 = $_POST['parent_4'];
            $data = [
                'student_id' => $std_id,
                'prefix' => $prefix,
                'name1' => $name,
                'surname' => $surname,
                'dorm' => $dorm,
                'floor' => $floor,
                'side' => $side,
                'grade' => $grade,
                'class' => $class,
                'email' => $email,
                'tel' => $tel,
                'address1' => $address,
                'parent_1' => $parent_1,
                'parent_2' => $parent_2,
                'parent_3' => $parent_3,
                'parent_4' => $parent_4,
            ];
            $sqlInsert2 = $conn->prepare("INSERT INTO `student`
            (`id`, 
            `student_id`, 
            `prefix`, 
            `name`, 
            `surname`, 
            `dorm`, 
            `floor`, 
            `side`, 
            `grade`, 
            `class`, 
            `email`, 
            `tel`, 
            `address`, 
            `parent_1`, 
            `parent_2`, 
            `parent_3`, 
            `parent_4`) 
            VALUES ('',
            :student_id, 
            :prefix, 
            :name1, 
            :surname, 
            :dorm, 
            :floor, 
            :side, 
            :grade, 
            :class, 
            :email, 
            :tel, 
            :address1, 
            :parent_1, 
            :parent_2, 
            :parent_3, 
            :parent_4)");
            if ($sqlInsert2->execute($data)) {
                echo '
<script>
Swal.fire({
icon: "success",
title: "บันทึกข้อมูลสำเร็จ",
confirmButtonText: "ตกลง",
}).then((result) => {
window.location = "index.php?page=student-data";
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
window.location = "index.php?page=student-insert";
})
</script>
';
            }
        }
        if ($_GET['id'] == '5') {
            $id = $_GET['list'];
            $sql3 = "DELETE FROM `student` WHERE `id`=$id";

            // use exec() because no results are returned
            $conn->exec($sql3);
            echo '
    <script>
    Swal.fire({
      icon: "success",
      title: "ลบข้อมูลสำเร็จ",
      confirmButtonText: "ตกลง",
    }).then((result) => {
        window.location = "index.php?page=student-data";
     })
    </script>
    ';
        }
        if ($_GET['id'] == '6') {
            if (isset($_SESSION['type']) and isset($_SESSION['D'])) {
                $type = $_SESSION['type'];
                $d = $_SESSION['D'];
                if ($type == 1) {
                    $ins = $conn->prepare("UPDATE `dorm_out1` SET `status`='2' WHERE `id`='$d' ");
                    if ($ins->execute()) {
                        unset($_SESSION['type']);
                        unset($_SESSION['D']);
                        echo '
                    <script>
                    Swal.fire({
                      icon: "success",
                      title: "ออกหอสำเร็จ",
                      confirmButtonText: "ตกลง",
                    }).then((result) => {
                        window.location = "index.php?page=dorm-qr";
                     })
                    </script>
                    ';
                    } else {
                        unset($_SESSION['type']);
                        unset($_SESSION['D']);
                        echo '
                        <script>
                        Swal.fire({
                          icon: "error",
                          title: "ขออภัย",
                          text: "ไม่สามารถดำเนินการได้ กรุณาลองใหม่อีกครั้ง",
                          confirmButtonText: "ตกลง",
                        }).then((result) => {
                            window.location = "index.php?page=dorm-qr";
                         })
                        </script>
                        ';
                    }
                } elseif ($type == 2) {
                    $ins = $conn->prepare("UPDATE `dorm_out1` SET `status`='3' WHERE `id`='$d' ");
                    if ($ins->execute()) {
                        unset($_SESSION['type']);
                        unset($_SESSION['D']);
                        echo '
                    <script>
                    Swal.fire({
                      icon: "success",
                      title: "เข้าหอสำเร็จ",
                      confirmButtonText: "ตกลง",
                    }).then((result) => {
                        window.location = "index.php?page=dorm-qr";
                     })
                    </script>
                    ';
                    } else {
                        unset($_SESSION['type']);
                        unset($_SESSION['D']);
                        echo '
                        <script>
                        Swal.fire({
                          icon: "error",
                          title: "ขออภัย",
                          text: "ไม่สามารถดำเนินการได้ กรุณาลองใหม่อีกครั้ง",
                          confirmButtonText: "ตกลง",
                        }).then((result) => {
                            window.location = "index.php?page=dorm-qr";
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
                  text: "เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง",
                  confirmButtonText: "ตกลง",
                }).then((result) => {
                    window.location = "index.php?page=dorm-qr";
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
                                      text: "เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง",
                                      confirmButtonText: "ตกลง",
                                    }).then((result) => {
                                        window.location = "index.php?page=dorm-qr";
                                     })
                                    </script>
                                    ';
            }
        }if ($_GET['id'] == '7') {
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
                window.location = "index.php?page=dorm-out-require";
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
                    window.location = "index.php?page=dorm-out-require";
                 })
                </script>
                ';  
            }
        }if ($_GET['id'] == '8') {
            $id=$_GET['listid'];
            $ins ="DELETE FROM `dorm_out1` WHERE id='$id'";
            if($conn->exec($ins)){
            echo '
            <script>
            Swal.fire({
                icon: "success",
                title: "ลบข้อมูลสำเร็จ",
                confirmButtonText: "ตกลง",
            }).then((result) => {
                window.location = "index.php?page=dorm-out-require";
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
                    window.location = "index.php?page=dorm-out-require";
                 })
                </script>
                ';  
            }
        }if ($_GET['id'] == '9') {
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
        }if ($_GET['id'] == '10') {
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