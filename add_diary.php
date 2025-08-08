<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงบันทึกประจำวัน</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
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
                            <h1 class="h3 fw-bold text-primary">ลงบันทึกประจำวัน</h1>
                            <p class="text-muted">กรุณากรอกข้อมูลเหตุการณ์ให้ครบถ้วน</p>
                        </div>

                        <form action="php/insert_diary.php" method="post">
                            
                            <!-- Detail -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                <div class="form-floating">
                                    <textarea class="form-control" name="detail" id="detail" placeholder="รายละเอียดเหตุการณ์" style="height: 120px" required></textarea>
                                    <label for="detail">รายละเอียดเหตุการณ์</label>
                                </div>
                            </div>
                            
                            <!-- Date -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-calendar-event-fill"></i></span>
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="date" id="date" placeholder="วันที่เกิดเหตุ" required>
                                    <label for="date">วันที่เกิดเหตุ</label>
                                </div>
                            </div>
                            
                            <!-- Case Type -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-briefcase-fill"></i></span>
                                <div class="form-floating">
                                    <select name="cs_id" id="cs_id" class="form-select" required>
                                        <option value="" disabled selected>กรุณาเลือก...</option>
                                        <?php
                                            include_once('php/connect.php');
                                            $case_sql = "SELECT * FROM case_types ORDER BY cs_name";
                                            $case_types = mysqli_query($connection, $case_sql);
                                            while($type = mysqli_fetch_assoc($case_types)){
                                                echo "<option value='{$type['cs_id']}'>{$type['cs_name']}</option>";
                                            }
                                        ?>
                                    </select>
                                    <label for="cs_id">ประเภทคดี</label>
                                </div>
                            </div>
                            
                            <!-- Sufferer -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <div class="form-floating">
                                    <select name="c_id" id="c_id" class="form-select" required>
                                        <option value="" disabled selected>กรุณาเลือก...</option>
                                        <?php
                                            $suff_sql = "SELECT * FROM sufferers ORDER BY full_name";
                                            $sufferers = mysqli_query($connection, $suff_sql);
                                            while($sufferer = mysqli_fetch_assoc($sufferers)){
                                                echo "<option value='{$sufferer['c_id']}'>{$sufferer['full_name']}</option>";
                                            }
                                        ?>
                                    </select>
                                    <label for="c_id">ผู้แจ้งความ</label>
                                </div>
                            </div>

                            <!-- Police -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                <div class="form-floating">
                                    <select name="pl_id" id="pl_id" class="form-select" required>
                                        <option value="" disabled selected>กรุณาเลือก...</option>
                                        <?php
                                            $pol_sql = "SELECT * FROM polices ORDER BY full_name";
                                            $polices = mysqli_query($connection, $pol_sql);
                                            while($police = mysqli_fetch_assoc($polices)){
                                                echo "<option value='{$police['pl_id']}'>{$police['full_name']}</option>";
                                            }
                                        ?>
                                    </select>
                                    <label for="pl_id">เจ้าหน้าที่ผู้รับผิดชอบ</label>
                                </div>
                            </div>
                            
                            <hr class="my-4">

                            <!-- Buttons -->
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-end">
                                <a href="police_diary.php" class="btn btn-outline-secondary btn-lg px-4">
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

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>