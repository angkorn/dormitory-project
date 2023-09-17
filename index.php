<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="preconnect" href="https://fonts.googleapis.com">
 
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css
" rel="stylesheet">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบรับส่งนักเรียนหอพัก</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="img/pcshstrg.png">

</head>
<?php 
include('./cn/config.php') ;
session_start();
if(isset($_SESSION['parent'])){
  echo '
  <script>
            window.location.href="./parent/";
            </script>
  ';
}elseif(isset($_SESSION['dorm'])){
    echo '
    <script>
              window.location.href="./dorms/";
              </script>
    ';
}else{
?>
<body class="bg-gradient-primary">

    <div class="container col-lg-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        
                                <div class="p-5">
                                    <div class="text-center">
                                    <h1 class="text-dark"><i class="fa-solid fa-building-shield "></i></h1>
                                        <h1 class="h4 text-gray-900 mb-4">ระบบรับส่งนักเรียนหอพัก</h1>
                                    </div>
                                    <form action="index.php" method="POST">
  <!-- Email input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example1"><i class="fa-solid fa-address-card"></i> รหัสผู้ปกครอง</label>
    <input type="text" name="username" class="form-control" required />
    
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example2"><i class="fa-solid fa-key"></i> รหัสผ่าน</label>
    <input type="password" name="password" class="form-control" required />
    
  </div>

 

  <!-- Submit button -->
  <button type="submit" class="btn btn-success btn-block mb-4"><i class="fa-solid fa-right-to-bracket"></i> เข้าสู่ระบบ</button>

  
</form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container my-auto">
                    <div class="copyright text-center text-white my-auto">
                        <span>Copyright &copy; Princess Chulabhorn Science High School Trang 2023</span>
                        <span>ซอร์สโค้ดเผยแพร่ภายใต้สัญญาอนุญาต MIT</span>
                    </div>
                </div>

        </div>
    </div>
<?php }if(isset($_POST['username'])&&isset($_POST['password'])){
  $us=$_POST['username'];
  $pw=$_POST['password'];
  $check_data= $conn->prepare("SELECT * FROM user WHERE username = :us");
		$check_data->bindParam(":us",$us);
		$check_data->execute();
		$row=$check_data->fetch(PDO::FETCH_ASSOC);
		if ($check_data->rowCount()>0){
			if($us == $row['username']){
				if($pw==$row['password']){
                    if($row['status']=='1'){
                        $_SESSION['parent']=$row['id'];
						echo '
            <script>
            Swal.fire({
              icon: "success",
              title: "เข้าสู่ระบบสำเร็จ",
              text: "ท่านเข้าสู่ระบบในฐานะ ผู้ปกครอง",
              footer: "ระบบจะนำท่านไปยังหน้าหลัก",
            }).then((result) => {
                window.location = "./parent/";
            })
             </script>

            ';
                    }elseif($row['status']=='2'){
                        $_SESSION['dorm']=$row['id'];
                        echo '
                        <script>
                        Swal.fire({
                          icon: "success",
                          title: "เข้าสู่ระบบสำเร็จ",
                          text: "ท่านเข้าสู่ระบบในฐานะ ครูปกครองหอพัก",
                          footer: "ระบบจะนำท่านไปยังหน้าหลัก",
                        }).then((result) => {
                            window.location = "./dorms/";
                        })
                         </script>
            
                        '; 
                    }
					
					
}else{  echo'
    
    <script>
  Swal.fire({
    icon: "error",
    title: "เข้าสู่ระบบไม่ได้",
    text: "ท่านกรอกข้อมูลผิด กรุณาลองใหม่อีกครั้ง",
    footer: "หากเกิดปัญหา กรุณาติดต่อผู้ดูแลระบบ",
  });

  
    </script>
  
    ';
  }
  
 } }else{
    echo'
    <script>
    Swal.fire({
      icon: "error",
      title: "เข้าสู่ระบบไม่ได้",
      text: "ท่านกรอกข้อมูลผิด กรุณาลองใหม่อีกครั้ง",
      footer: "หากเกิดปัญหา กรุณาติดต่อผู้ดูแลระบบ",
    });
  
    </script>
  
    ';}} ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>