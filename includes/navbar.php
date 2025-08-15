<?php
  // การกำหนดตัวแปร $current_page ควรทำก่อน include navbar
  $current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- (เปลี่ยนแปลง) เปลี่ยนคลาสเป็น navbar-dark bg-dark เพื่อให้เป็นธีมมืด -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <!-- (เปลี่ยนแปลง) เปลี่ยนสี brand เป็นสีชมพู และปรับสไตล์ hover -->
        <a class="navbar-brand fw-bold" href="index.php" style="color: #ff007f;">Police Station</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <!-- (เปลี่ยนแปลง) ลิงก์ active จะเป็นสีขาวตามค่าเริ่มต้นของ navbar-dark ซึ่งอ่านง่าย -->
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
                <!-- 
                  (เปลี่ยนแปลง) เปลี่ยนปุ่มเป็นแบบ outline สีชมพู
                  โดยใช้ CSS Variables ของ Bootstrap 5.3+ เพื่อให้ปรับแต่งได้ง่ายและมี hover effect ในตัว
                -->
                <button class="btn" style="--bs-btn-color: #ff007f; --bs-btn-border-color: #ff007f; --bs-btn-hover-color: #000; --bs-btn-hover-bg: #ff007f; --bs-btn-hover-border-color: #ff007f;" type="submit">
                    Search
                </button>
            </form>
        </div>
    </div>
</nav>