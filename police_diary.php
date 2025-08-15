<!DOCTYPE html>
<html lang="th" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Diary - Modern Contrast</title>
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
            <div class="card-header p-3 d-flex justify-content-between align-items-center" style="background-color: #ff007f;">
                <h2 class="h4 mb-0 text-white fw-bold text-uppercase">
                    <i class="bi bi-journal-bookmark-fill me-2"></i>บันทึกประจำวัน
                </h2>
                <a href="add_diary.php" class="btn btn-outline-light rounded-pill btn-sm">
                    <i class="bi bi-plus-lg"></i> ลงบันทึก
                </a>
            </div>

            <!-- (ตกแต่งใหม่) Card Body ไม่มี padding -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <!-- (ตกแต่งใหม่) ใช้ table-striped-columns -->
                    <table class="table table-dark table-striped-columns table-hover align-middle mb-0">
                        <thead class="text-body-secondary small text-uppercase">
                            <tr>
                                <th scope="col" class="text-center" style="width: 5%;">ID</th>
                                <th scope="col" style="width: 15%;">ประเภทคดี</th>
                                <th scope="col">รายละเอียด</th>
                                <th scope="col" style="width: 10%;">วันที่</th>
                                <th scope="col" style="width: 15%;">ผู้แจ้งความ</th>
                                <th scope="col" style="width: 15%;">เจ้าหน้าที่</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('php/connect.php');

                                $sql = "SELECT *, sufferers.full_name as s_name, polices.full_name as p_name 
                                        FROM `police_diaries`
                                        JOIN polices ON police_diaries.pl_id = polices.pl_id 
                                        JOIN case_types ON police_diaries.cs_id = case_types.cs_id
                                        JOIN sufferers on police_diaries.c_id = sufferers.c_id
                                        ORDER BY police_diaries.pd_id DESC";
                                
                                $result = mysqli_query($connection, $sql) or die("Query failed: " . mysqli_error($connection));

                                if ($result && mysqli_num_rows($result) > 0) {
                                    foreach($result as $diary){
                                        ?>
                                            <tr>
                                                <th scope="row" class="text-center"><?= htmlspecialchars($diary['pd_id']) ?></th>
                                                <td><?= htmlspecialchars($diary['cs_name']) ?></td>
                                                <td><?= htmlspecialchars($diary['detail']) ?></td>
                                                <td><?= htmlspecialchars(date("d/m/Y", strtotime($diary['date']))) ?></td>
                                                <td><?= htmlspecialchars($diary['s_name']) ?></td>
                                                <td><?= htmlspecialchars($diary['p_name']) ?></td>
                                            </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            <div class="display-6 text-muted">
                                                <i class="bi bi-folder2-open"></i>
                                            </div>
                                            <p class="mt-2 text-muted">ไม่พบข้อมูลบันทึกประจำวัน</p>
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