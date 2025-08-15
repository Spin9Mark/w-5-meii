<!DOCTYPE html>
<html lang="th" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประเภทคดี - Modern Contrast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<!-- (ตกแต่งใหม่) ใช้ bg-black เพื่อพื้นหลังที่ดำสนิทยิ่งขึ้น -->
<body class="bg-dark">

    <?php include('includes/navbar.php'); ?>

    <div class="container my-5">
        
        <!-- (ตกแต่งใหม่) เปลี่ยนโครงสร้าง Card ให้มี Header ที่โดดเด่น -->
        <div class="card bg-dark border border-secondary shadow-lg rounded-4">
            <!-- Card Header จะเป็นแถบสีชมพู -->
            <div class="card-header p-3 text-center" style="background-color: #ff007f;">
                <h2 class="h4 mb-0 text-white fw-bold text-uppercase">
                    <i class="bi bi-briefcase-fill me-2"></i>ข้อมูลประเภทคดี
                </h2>
            </div>

            <!-- (ตกแต่งใหม่) Card Body ไม่มี padding -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <!-- (ตกแต่งใหม่) ใช้ table-striped-columns -->
                    <table class="table table-dark table-striped-columns table-hover align-middle mb-0">
                        <thead class="text-body-secondary small text-uppercase">
                            <tr>
                                <th scope="col" class="ps-3" style="width: 20%;">รหัสประเภทคดี</th>
                                <th scope="col">ชื่อประเภทคดี</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('php/connect.php');
                                $sql = "SELECT * FROM case_types ORDER BY cs_id";
                                $result = mysqli_query($connection, $sql) or die("Query failed: " . mysqli_error($connection));

                                if ($result && mysqli_num_rows($result) > 0) {
                                    foreach($result as $case){
                                        ?>
                                        <tr>
                                            <th scope="row" class="ps-3"><?= htmlspecialchars($case['cs_id']) ?></th>
                                            <td><?= htmlspecialchars($case['cs_name']) ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2" class="text-center p-5">
                                            <div class="display-6 text-muted">
                                                <i class="bi bi-folder2-open"></i>
                                            </div>
                                            <p class="mt-2 text-muted">ไม่พบข้อมูลประเภทคดี</p>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>