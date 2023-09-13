<!-- Page Heading -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ผู้ปกครอง</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->

                    <!-- Content Row -->

                    
                        <!-- Begin Page Content -->
                <div class="container-fluid">

<!-- Page Heading -->
<p class="mb-4">ระบบจะแสดงรายชื่อผู้ปกครองทั้งหมดที่มีในระบบ ครูปกครองหอพักสามารถแก้ไขข้อมูลผู้ปกครองนักเรียนในหอพักของท่านได้ <br><i>ทั้งนี้ต้องได้รับความยินยอมและการอนุญาตจากผู้ปกครองแล้วเท่านั้น</i></p>

<!-- DataTales Example -->

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th style="width: 100px">ลำดับที่</th>
                        <th style="width: 20%">ชื่อ-สกุล</th>
                        <th>รหัส</th>
                        <th style="width: 20%">ข้อมูล</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $i=0; $parent=$conn->prepare("SELECT * FROM user WHERE status='1' order by id ASC");
      $parent->execute(); 
      $in=3;
while ($parent_list=$parent->fetch(PDO::FETCH_ASSOC) ) {
      ?>
      
                    <tr>
                        <td><?php  echo ++$i; ?></td>
                        <td><?php  
                        $prefix=$conn->prepare("SELECT * FROM prefixes WHERE id=:id");
                        $prefix->bindParam(":id",$parent_list['prefix']); 
                        $prefix->execute(); 
                        $rpf=$prefix->fetch(PDO::FETCH_ASSOC);
                        echo $rpf['prefix'].$parent_list['name'].' '.$parent_list['surname']; ?></td>
                        <td><?php  
                        echo $parent_list['username']; ?></td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $in?>"><i class="fa-solid fa-circle-info"></i></button>
  <button type="button" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $in?>"><i class="fa-solid fa-pen-to-square"></i></button>
  <button type="button" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $in?>"><i class="fa-solid fa-trash-can"></i></button>
</div>
                            
                        
</td>
                        <!-- Modal -->

                    </tr>
                    <div class="modal fade" id="exampleModal<?php echo $in?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel"><i class="fa-solid fa-circle-info" style="color:mediumseagreen"></i> ข้อมูล <?php echo $rpf['prefix'].$parent_list['name'].' '.$parent_list['surname']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark">
      <img src="./image/<?php echo $parent_list['image']?>" class="rounded mx-auto d-block" style="width: 30%;" alt="<?php echo $rpf['prefix'].$parent_list['name'].' '.$parent_list['surname']; ?>">
      <b><i class="fa-solid fa-user"></i> ชื่อ-สกุล :</b> <?php echo $rpf['prefix'].$parent_list['name'].' '.$parent_list['surname']; ?><br>
      <b><i class="fa-solid fa-briefcase"></i> อาชีพ :</b> <?php echo $parent_list['job']; ?><br>
      <b><i class="fa-regular fa-id-card"></i> รหัสผู้ปกครอง :</b> <?php echo $parent_list['username']; ?><br>
      <b><i class="fa-solid fa-envelope"></i> อีเมล :</b> <?php echo $parent_list['email']; ?><br>
      <b><i class="fa-solid fa-phone"></i> โทรศัพท์ :</b> <?php echo $parent_list['tel']; ?><br>
      <b><i class="fa-solid fa-location-dot"></i> ที่อยู่ :</b> <?php echo $parent_list['address']; ?><br>
      <b><i class="fa-solid fa-people-roof"></i> ผู้ปกครองของ :</b> <br><ul><?php $std_p=$conn->prepare("SELECT * FROM student WHERE parent_1=:id OR parent_2=:id OR parent_3=:id OR parent_4=:id order by id ASC");
      $std_p->bindParam(":id",$parent_list['id']); 
      $std_p->execute(); 
     
while ($std_list=$std_p->fetch(PDO::FETCH_ASSOC) ) {
    ?>
    
  <li><?php 
  $sprefix=$conn->prepare("SELECT * FROM std_prefixes WHERE id=:id");
  $sprefix->bindParam(":id",$std_list['prefix']); 
  $sprefix->execute(); 
  $rspf=$sprefix->fetch(PDO::FETCH_ASSOC);
  echo $rspf['prefix'].$std_list['name'].' '.$std_list['surname']?></li>


    
<?php } ?></ul>
    </div>
      <div class="modal-footer">
      <a  class="btn btn-danger btn-icon-split" data-bs-dismiss="modal">
                                        <span class="icon text-white-50">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        </span>
                                        <span class="text">ปิด</span>
                                    </a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal<?php echo $in?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel"><i class="fa-solid fa-trash" style="color:crimson"></i> ลบข้อมูล </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark">
      ท่านต้องการลบข้อมูลของ <?php echo $rpf['prefix'].$parent_list['name'].' '.$parent_list['surname']; ?> ใช่หรือไม่?
    </div>
      <div class="modal-footer">
      <a  class="btn btn-secondary btn-icon-split" data-bs-dismiss="modal">
                                        <span class="icon text-white-50">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        </span>
                                        <span class="text">ปิด</span>
                                    </a>
                                    <a  href="action.php?id=2&list=<?php echo $parent_list['id']?>" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                        <i class="fa-solid fa-trash"></i>
                                        </span>
                                        <span class="text">ลบข้อมูล</span>
                                    </a>
      </div>
    </div>
  </div>
</div>

                        <!-- Modal -->

                        </tr>
                    <div class="modal fade" id="editModal<?php echo $in?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square" style="color:darkorange"></i> แก้ไขข้อมูล <?php echo $rpf['prefix'].$parent_list['name'].' '.$parent_list['surname']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark">
        
      <form method="POST" action="action.php?id=1">
        <div class="row">
  <div class="col-md-3 mb-3">
    <label for="exampleInputEmail1" class="form-label">คำนำหน้า</label>
    <select class="form-select" name="prefix" id="select_box" required>
                    <?php 
                    $prefixes=$conn->prepare("SELECT * FROM prefixes ORDER BY id ASC");
                    $prefixes->execute();
                   
                    while( $rowPrefix=$prefixes->fetch(PDO::FETCH_ASSOC)){
                      if($rowPrefix['id']==$parent_list['prefix']){
                    ?>
                        <option selected value="<?php echo $rowPrefix['id']?>"><?php echo $rowPrefix['prefix']?></option>
                    <?php } else{?>
                    <option value="<?php echo $rowPrefix['id']?>"><?php echo $rowPrefix['prefix']?></option>
                    <?php } }?>      </select>  </div>
  <div class="col-md-4 mb-3">
    <label for="exampleInputEmail1" class="form-label">ชื่อ</label>
    <input type="text" name="id" class="form-control" id="exampleInputEmail1" value="<?php echo $parent_list['id'];?>" hidden>
    <input type="text" name="password" class="form-control" id="exampleInputEmail1" value="<?php echo $parent_list['password'];?>" hidden>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $parent_list['name'];?>" required>
  </div>
  <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1" class="form-label">สกุล</label>
    <input type="text" name="surname" class="form-control" id="exampleInputPassword1" value="<?php echo $parent_list['surname'];?>" required>
  </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">รหัสผู้ปกครอง</label>
    <input type="text" name="username" class="form-control" id="exampleInputPassword1" value="<?php echo $parent_list['username'];?>" required>
  </div>
  <div class="row">
  <div class="col-md-6 mb-3">
    <label for="exampleInputEmail1" class="form-label">อีเมล</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $parent_list['email'];?>" required>
  </div>
  <div class="col-md-6 mb-3">
    <label for="exampleInputPassword1" class="form-label">โทรศัพท์</label>
    <input type="text" name="tel" class="form-control" id="exampleInputPassword1" value="<?php echo $parent_list['tel'];?>" required>
  </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ที่อยู่</label>
    <textarea name="address" class="form-control" id="exampleInputPassword1" required><?php echo $parent_list['address'];?></textarea>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">รูป</label>
  <input class="form-control" type="file" id="formFile">
</div>
      <div class="modal-footer">
      <a  class="btn btn-danger btn-icon-split" data-bs-dismiss="modal">
                                        <span class="icon text-white-50">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        </span>
                                        <span class="text">ปิด</span>
                                    </a>
                                    <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-50">
  <i class="fa-solid fa-floppy-disk"></i>
                                        </span>
                                        <span class="text">บันทึก</span></button>    
      </div>
      </form>
    </div>
  </div>
</div>
                    <?php ++$in; } ?>
                    
                </tbody>
            </table>
        </div>
    </div></div>