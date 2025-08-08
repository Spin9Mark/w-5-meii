<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลเจ้าหน้าที่</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        /* CSS เล็กน้อยเพื่อแก้ไขปัญหาขอบของ Input Group กับ Floating Labels */
        .input-group .form-floating {
            flex: 1 1 auto;
        }
    </style>
</head>
<body class="bg-body-tertiary">

    <?php include('includes/navbar.php'); ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4 p-md-5">

                        <!-- Header แบบ Minimalist -->
                        <div class="text-center mb-4">
                            <h1 class="h3 fw-bold text-primary">เพิ่มข้อมูลเจ้าหน้าที่</h1>
                            <p class="text-muted">กรุณากรอกข้อมูลของเจ้าหน้าที่ให้ครบถ้วน</p>
                        </div>

                        <form action="php/insert_police.php" method="post">

                            <!-- Police ID -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pl_id" id="pl_id" placeholder="รหัสประจำตัว" required>
                                    <label for="pl_id">รหัสประจำตัว</label>
                                </div>
                            </div>

                            <!-- Full Name -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="ชื่อ-นามสกุล" required>
                                    <label for="full_name">ชื่อ-นามสกุล</label>
                                </div>
                            </div>

                            <!-- Rank -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-award-fill"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="rank" id="rank" placeholder="ยศ" required>
                                    <label for="rank">ยศ</label>
                                </div>
                            </div>

                            <!-- Telephone -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="tel" id="tel" placeholder="เบอร์ติดต่อ" required>
                                    <label for="tel">เบอร์ติดต่อ</label>
                                </div>
                            </div>
                            
                            <hr class="my-4">

                            <!-- Buttons -->
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-end">
                                <a href="police.php" class="btn btn-outline-secondary btn-lg px-4">
                                    <i class="bi bi-x-circle me-2"></i>ยกเลิก
                                </a>
                                <button type="submit" class="btn btn-success btn-lg px-4">
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