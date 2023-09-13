<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion d-print-none" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ">
                <i class="fa-solid fa-building-shield "></i>                </div>
                <div class="sidebar-brand-text mx-3">ระบบรับส่งนักเรียนหอพัก</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="?page=home">
                <i class='fa fa-home'></i>

                    <span>หน้าหลัก</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading ">
                การเข้าออกหอพัก
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-school"></i>
                    <span>นักเรียนเข้าออกหอพัก</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ตัวเลือก</h6>
                        <a class="collapse-item" href="?page=dorm-out-require">คำร้องออกหอพัก</a>
                        <a class="collapse-item" href="?page=dorm-qr">QR Code Scanner</a>
                        <a class="collapse-item" href="?page=student-statistic">สถิตินักเรียนนออกหอพัก</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
            <a class="nav-link collapsed disabled"  href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-person-chalkboard"></i>
            <span >การมอบฉันทะ<br><i class="text-white-50 text-center">(กำลังพัฒนา)</i></span> 
        </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ตัวเลือก</h6>
                        <a class="collapse-item" href="?page=proxy-require">คำร้องขอมอบฉันทะ</a>
                        <a class="collapse-item" href="?page=proxy-list">รายการมอบฉันทะ</a>
                        <a class="collapse-item" href="?page=emergency">กรณีฉุกเฉิน</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                นักเรียนหอพัก
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>รายชื่อนักเรียน</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ตัวเลือก</h6>
                        <a class="collapse-item" href="?page=student-data">จัดการข้อมูลนักเรียน</a>
                        <a class="collapse-item" href="?page=student-insert">เพิ่มข้อมูลนักเรียน</a>
                        <a class="collapse-item" href="?page=student-report">รายงานข้อมูลแยกชั้นปีก</a>
                    </div>
                </div>
            </li>
            
            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                    aria-expanded="true" aria-controls="collapsePages2">
                    <i class="fa-solid fa-people-roof"></i>
                    <span>ผู้ปกครอง</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ตัวเลือก</h6>
                        <a class="collapse-item" href="?page=parent">จัดการข้อมูลผู้ปกครอง</a>
                        <a class="collapse-item" href="?page=parent-insert">เพิ่มข้อมูลผู้ปกครอง</a>
                    </div>
                </div>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>