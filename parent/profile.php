<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">โปรไฟล์</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow ">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="font-family: 'Anuphan';">
                                    <h6 class="m-0 font-weight-bold text-primary">บัญชีของท่าน</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <img src="../dorms/image/<?php echo $row['image'] ?>" class="rounded mx-auto d-block" alt="<?php echo $rprefix['prefix'] . $row['name'] . ' ' . $row['surname']; ?>" height="200px">

                                <p class="font-weight-bold" style="font-family: 'Anuphan';"><?php echo $rprefix['prefix'] . $row['name'] . ' ' . $row['surname']; ?></br>
                                <?php echo $row['username']; ?></p>

                                <p><b>อาชีพ :</b> <?php echo $row['job'] ?></br>
                                <b>อีเมล :</b> <?php echo $row['email'] ?></br>
                                <b>โทรศัพท์ :</b> <?php echo $row['tel'] ?></br>
                                <b>ที่อยู่ :</b> <?php echo $row['address'] ?></p>
                                <p class="text-primary text-right">แก้ไขรูปภาพให้ติดต่อครูหอพัก</p>

                                </div>
                                
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"  style="font-family: 'Anuphan';">
                                    <h6 class="m-0 font-weight-bold text-primary">แก้ไขบัญชี</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <form method="POST" action="action.php?id=4">
        <div class="row">
  <div class="col-md-3 mb-3">
    <label for="exampleInputEmail1" class="form-label">คำนำหน้า</label>
    <select class="form-select" name="prefix" id="select_box" required>
                    <?php 
                    $prefixes=$conn->prepare("SELECT * FROM prefixes ORDER BY id ASC");
                    $prefixes->execute();
                   
                    while( $rowPrefix=$prefixes->fetch(PDO::FETCH_ASSOC)){
                      if($rowPrefix['id']==$row['prefix']){
                    ?>
                        <option selected value="<?php echo $rowPrefix['id']?>"><?php echo $rowPrefix['prefix']?></option>
                    <?php } else{?>
                    <option value="<?php echo $rowPrefix['id']?>"><?php echo $rowPrefix['prefix']?></option>
                    <?php } }?>      </select>  </div>
  <div class="col-md-4 mb-3">
    <label for="exampleInputEmail1" class="form-label">ชื่อ</label>
    <input type="text" name="id" class="form-control" id="exampleInputEmail1" value="<?php echo $row['id'];?>" hidden>
    <input type="text" name="password" class="form-control" id="exampleInputEmail1" value="<?php echo $row['password'];?>" hidden>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $row['name'];?>" required>
  </div>
  <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1" class="form-label">สกุล</label>
    <input type="text" name="surname" class="form-control" id="exampleInputPassword1" value="<?php echo $row['surname'];?>" required>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6 mb-3">
    <label for="exampleInputPassword1" class="form-label">อาชีพ</label>
    <input type="text" name="job" class="form-control" id="exampleInputPassword1" value="<?php echo $row['job'];?>" required>
  </div>
  <div class="col-md-6 mb-3">
    <label for="exampleInputPassword1" class="form-label">รหัสผู้ปกครอง</label>
    <input type="text" name="username" class="form-control" id="exampleInputPassword1" value="<?php echo $row['username'];?>" readonly>
  </div>
  
  <div class="row">
  <div class="col-md-6 mb-3">
    <label for="exampleInputEmail1" class="form-label">อีเมล</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $row['email'];?>" required>
  </div>
  <div class="col-md-6 mb-3">
    <label for="exampleInputPassword1" class="form-label">โทรศัพท์</label>
    <input type="text" name="tel" class="form-control" id="exampleInputPassword1" value="<?php echo $row['tel'];?>" required>
  </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ที่อยู่</label>
    <textarea name="address" class="form-control" id="exampleInputPassword1" required><?php echo $row['address'];?></textarea>
  </div>
  <input type="password" name="password" class="form-control" id="exampleInputEmail1" value="<?php echo $row['password'];?>" hidden>
  <div class="col-md-6 mb-3">
    <label for="exampleInputPassword1" class="form-label">ยืนยันรหัสผ่าน</label>
    <input type="password" name="repassword" class="form-control" id="exampleInputEmail1" value="" required>
  </div></div>
      <div class="modal-footer">
      
                                    <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-50">
  <i class="fa-solid fa-floppy-disk"></i>
                                        </span>
                                        <span class="text">บันทึก</span></button>    
      </div>
      </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow ">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="font-family: 'Anuphan';">
                                    <h6 class="m-0 font-weight-bold text-primary">เปลี่ยนรหัสผ่าน</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form method="POST" action="action.php?id=5">
                                    <div class="row">
                                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" value="<?php echo $row['id'];?>" hidden>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" value="<?php echo $row['password'];?>" hidden>
                                <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1" class="form-label">รหัสผ่านเดิม</label>
    <input type="password" name="old-password" class="form-control" id="exampleInputEmail1" value="" required>
  </div>
  <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1" class="form-label">รหัสผ่านใหม่</label>
    <input type="password" name="new-password" class="form-control" id="exampleInputEmail1" value="" required>
  </div>
                                <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1" class="form-label">ยืนยันรหัสผ่านใหม่</label>
    <input type="password" name="renew-password" class="form-control" id="exampleInputEmail1" value="" required>
  </div>
                                    </div>
                                    <div class="modal-footer">
      
      <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-50">
<i class="fa-solid fa-floppy-disk"></i>
          </span>
          <span class="text">บันทึก</span></button>    
</div>
</form>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    

                </div>