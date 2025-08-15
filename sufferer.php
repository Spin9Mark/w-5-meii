<!DOCTYPE html>
<html lang="th" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sufferer Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<!-- (ตกแต่งใหม่) ใช้ bg-black เพื่อพื้นหลังที่ดำสนิทยิ่งขึ้น -->
<body class="bg-dark">

    <?php include('includes/navbar.php'); ?>

    <div class="container my-5">
        
        <!-- (ตกแต่งใหม่) เปลี่ยนโครงสร้าง Card ให้มี Header ที่โดดเด่น -->
        <div class="card bg-dark border border-secondary shadow-lg rounded-4">
            <!-- Card Header จะเป็นแถบสีชมพู ควบคุมหัวข้อและปุ่ม -->
            <div class="card-header p-3 d-flex justify-content-between align-items-center" style="background-color: #ff007f;">
                <h2 class="h4 mb-0 text-white fw-bold text-uppercase">
                    <i class="bi bi-people-fill me-2"></i>ข้อมูลผู้แจ้งความ
                </h2>
                <a href="add_sufferer.php" class="btn btn-outline-light rounded-pill btn-sm">
                    <i class="bi bi-plus-lg"></i> เพิ่มข้อมูล
                </a>
            </div>

            <!-- (ตกแต่งใหม่) Card Body ไม่มี padding เพื่อให้ตารางชิดขอบ -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <!-- 
                        (ตกแต่งใหม่)
                        - table-striped-columns: เปลี่ยนจากการสลับสีตามแถวเป็นการสลับสีตามคอลัมน์
                        - border-light: ใช้เส้นขอบสีอ่อนๆ แทนเส้นขอบปกติ
                    -->
                    <table class="table table-dark table-striped-columns table-hover align-middle mb-0">
                        <thead class="text-body-secondary small text-uppercase">
                            <tr>
                                <th scope="col" class="ps-3" style="width: 20%;">รหัสบัตรประชาชน</th>
                                <th scope="col">ชื่อ-นามสกุล</th>
                                <th scope="col">เบอร์ติดต่อ</th>
                                <th scope="col">ที่อยู่</th>
                                <th scope="col" class="text-center" style="width: 15%;">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('php/connect.php');
                                $sql = "SELECT * FROM sufferers";
                                $result = mysqli_query($connection, $sql) or die("Query failed: " . mysqli_error($connection));

                                if ($result && mysqli_num_rows($result) > 0) {
                                    foreach($result as $sufferer){
                                        ?>
                                            <tr>
                                                <th scope="row" class="ps-3"><?= htmlspecialchars($sufferer['c_id']) ?></th>
                                                <td><?= htmlspecialchars($sufferer['full_name']) ?></td>
                                                <td><?= htmlspecialchars($sufferer['tel']) ?></td>
                                                <td><?= htmlspecialchars($sufferer['address']) ?></td>
                                                <td class="text-center">
                                                    <!-- (ตกแต่งใหม่) ใช้ปุ่ม outline ใน btn-group -->
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="edit_sufferer.php?c_id=<?= htmlspecialchars($sufferer['c_id']) ?>" class="btn btn-outline-warning px-3">
                                                            <i class="bi bi-pencil-fill"></i>
                                                        </a>
                                                        <a href="php/delete_sufferer.php?c_id=<?= htmlspecialchars($sufferer['c_id']) ?>" class="btn btn-outline-danger px-3">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center p-5">
                                            <div class="display-6 text-muted">
                                                <i class="bi bi-folder2-open"></i>
                                            </div>
                                            <p class="mt-2 text-muted">ไม่พบข้อมูลผู้แจ้งความ</p>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>