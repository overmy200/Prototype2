<div class="container-fluid sticky-top">
    <div class="row">
        <nav class="navbar navbar-dark bg-success">
            <button class="navbar-toggler ms-3" id="sidebar-btn">
                <span class="bi bi-list" id="hamburger"></span>
            </button>
        </nav>
        <!-- Start basic nav -->
        <nav class="sidebar shadow-lg" id="sidebar">
            <div class="d-flex flex-column mt-4">
                <h4 class="text-center">Member</h4>
                <hr>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="home.php" class="nav-link col-12 px-3"><i class="pe-1 bi bi-house"></i>หน้าหลัก</a></li>
                    <li class="nav-item"><a href="order_form.php" class="nav-link col-12 px-3"><i class="pe-1 bi bi-basket"></i>คำสั่งซื้อ</a></li>
                    <li class="nav-item"><a href="form_regis_res.php" class="nav-link col-12 px-3"><i class="pe-1 bi bi-shop"></i>สมัครเป็นร้านค้า</a></li>
                    <li class="nav-item"><button class="btn col-12 text-start" data-bs-toggle="collapse" data-bs-target="#setting-dropdown"><i class="bi bi-gear pe-1"></i>การตั้งค่า</button>
                    <div class="collapse" id="setting-dropdown">
                        <ul class="navbar-nav">
                            <li class="px-4 nav-item"><button class="btn col-12 text-start"><i class="bi bi-shield-shaded pe-1"></i>การป้องกัน</button></li>
                        </ul>
                        <li class="nav-item"><a href="profile.php" class="nav-link col-12 px-3"><i class="pe-1 bi bi-person-circle"></i>โปรไฟล์</a></li>
                            <li class="nav-item"><a href="#" class="nav-link col-12 px-3"><i class="pe-1 bi bi-info"></i>ข้อมูลฯ</a></li>
                        </div>
                    </li>
                </ul>
                <!-- End basic nav -->
                <div class="footer col-11">
                    <hr>
                    <ul class="navbar-nav">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 d-flex justify-content-center">
                                <form action="logout.php" method="POST">
                                    <li class="nav-item col-12"><button class="btn col-12" name="Logout"><i class="bi bi-box-arrow-left"></i><p>ออกจากระบบ</p></button></li>
                                </form>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<script src="script.js"></script>