<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลประเภทคดี</title>
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
                            <h1 class="h3 fw-bold text-primary">เพิ่มข้อมูลประเภทคดี</h1>
                            <p class="text-muted">กรุณากรอกชื่อประเภทคดีที่ต้องการ</p>
                        </div>

                        <form action="php/insert_case.php" method="post">

                            <!-- Input Group with Icon + Floating Label -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-briefcase-fill"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="cs_name" id="cs_name" placeholder="ชื่อประเภทคดี" required>
                                    <label for="cs_name">ชื่อประเภทคดี</label>
                                </div>
                            </div>
                            
                            <hr class="my-4">

                            <!-- Buttons -->
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-end">
                                <a href="case_type.php" class="btn btn-outline-secondary btn-lg px-4">
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