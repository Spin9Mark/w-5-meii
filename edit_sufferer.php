<!DOCTYPE html>
<!-- (เปลี่ยนแปลง) เพิ่ม data-bs-theme="dark" เพื่อเปิดใช้งาน Dark Mode -->
<html lang="th" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- (เปลี่ยนแปลง) เปลี่ยน title ให้ตรงกับการทำงานของหน้า -->
    <title>แก้ไขข้อมูลผู้แจ้งความ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        /* CSS เล็กน้อยเพื่อแก้ไขปัญหาขอบของ Input Group กับ Floating Labels */
        .input-group .form-floating {
            flex: 1 1 auto;
        }
    </style>
</head>
<!-- (เปลี่ยนแปลง) เปลี่ยนคลาสเป็น bg-dark -->
<body class="bg-dark">

    <?php 
        include('includes/navbar.php'); 
        include('php/connect.php');

        $cId = $_GET["c_id"];

        $sql = "SELECT * FROM sufferers WHERE c_id = '$cId' ";

        $result = mysqli_query($connection, $sql);

        $sufferer = mysqli_fetch_array($result);
    ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <!-- (เปลี่ยนแปลง) เพิ่มคลาส border และ border-secondary -->
                <div class="card shadow-lg border border-secondary">
                    <div class="card-body p-4 p-md-5">

                        <!-- Header -->
                        <div class="text-center mb-4">
                            <!-- (เปลี่ยนแปลง) เปลี่ยนหัวข้อและสีให้เข้ากับธีม -->
                            <h1 class="h3 fw-bold" style="color: #ff007f;">แก้ไขข้อมูลผู้แจ้งความ</h1>
                            <p class="text-muted">กรุณาตรวจสอบและแก้ไขข้อมูลให้ถูกต้อง</p>
                        </div>
                        
                        <form action="php/update_sufferer.php" method="post">

                            <!-- (หมายเหตุ) Input Group และ Floating Labels ของ Bootstrap 5.3 จะปรับเป็น Dark Mode อัตโนมัติ -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-person-vcard-fill"></i></span>
                                <div class="form-floating">
                                    <!-- (เปลี่ยนแปลง) เพิ่ม readonly เพื่อไม่ให้แก้ไขรหัสบัตรประชาชน ซึ่งเป็น Primary Key -->
                                    <input type="text" class="form-control" name="c_id" id="c_id" placeholder="รหัสบัตรประชาชน" value="<?= $sufferer["c_id"] ?>" readonly>
                                    <label for="c_id">รหัสบัตรประชาชน</label>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="ชื่อ-นามสกุล" value="<?= $sufferer["full_name"] ?>" required>
                                    <label for="full_name">ชื่อ-นามสกุล</label>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="tel" id="tel" placeholder="เบอร์ติดต่อ" value="<?= $sufferer["tel"] ?>" required>
                                    <label for="tel">เบอร์ติดต่อ</label>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                <div class="form-floating">
                                    <textarea class="form-control" name="address" id="address" placeholder="ที่อยู่" style="height: 100px" required><?= htmlspecialchars($sufferer['address']) ?></textarea>
                                    <label for="address">ที่อยู่</label>
                                </div>
                            </div>
                            
                            <hr class="my-4">

                            <!-- Buttons -->
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-end">
                                <a href="sufferer.php" class="btn btn-outline-secondary btn-lg px-4">
                                    <i class="bi bi-x-circle me-2"></i>ยกเลิก
                                </a>
                                <!-- (เปลี่ยนแปลง) เปลี่ยนปุ่มบันทึกเป็นสีชมพู -->
                                <button type="submit" class="btn btn-lg px-4 text-white fw-bold" style="background-color: #ff007f; border-color: #ff007f;">
                                    <i class="bi bi-save-fill me-2"></i>บันทึกข้อมูล
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>