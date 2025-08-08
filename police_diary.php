<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Diary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-body-tertiary">

    <?php include('includes/navbar.php'); ?>

    <div class="container my-5">
        
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-primary fw-bold">บันทึกประจำวัน</h2>
                    <a href="add_diary.php" class="btn btn-primary">
                        <i class="bi bi-plus-circle-fill me-2"></i>ลงบันทึกประจำวัน
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead class="table-primary">
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
                                        ORDER BY police_diaries.pd_id DESC"; // เรียงจากล่าสุดไปเก่า
                                
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
                                    // จัดการกรณีไม่มีข้อมูล
                                    ?>
                                    <tr>
                                        <td colspan="7" class="text-center text-muted p-4">
                                            ยังไม่มีข้อมูลบันทึกประจำวัน
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