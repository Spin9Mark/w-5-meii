<?php
  // การกำหนดตัวแปร $current_page ควรทำก่อน include navbar
  $current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Navbar - แบบที่ 2: Minimal & Professional (ธีมสีขาว) -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container"> <!-- ใช้ container เพื่อให้มีขอบซ้าย-ขวา -->
        <a class="navbar-brand text-primary fw-bold" href="index.php">Police Station</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'sufferer.php') ? 'active fw-bold' : '' ?>" href="sufferer.php">ข้อมูลผู้แจ้งความ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'police_diary.php') ? 'active fw-bold' : '' ?>" href="police_diary.php">บันทึกประจำวัน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'police.php') ? 'active fw-bold' : '' ?>" href="police.php">ข้อมูลเจ้าหน้าที่</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'case_type.php') ? 'active fw-bold' : '' ?>" href="case_type.php">ประเภทคดี</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="ค้นหา..." aria-label="Search"/>
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>