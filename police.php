<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลเจ้าหน้าที่</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-body-tertiary">
    
    <?php include('includes/navbar.php'); ?>

    <div class="container my-5">

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-primary fw-bold">ข้อมูลเจ้าหน้าที่ตำรวจ</h2>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" class="text-center" style="width: 5%;">ID</th>
                                <th scope="col">ชื่อ-นามสกุล</th>
                                <th scope="col">ยศ</th>
                                <th scope="col">เบอร์โทรศัพท์</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('php/connect.php');
                                $sql = "SELECT * FROM polices ORDER BY pl_id";
                                $result = mysqli_query($connection, $sql) or die("Query failed: " . mysqli_error($connection));

                                if ($result && mysqli_num_rows($result) > 0) {
                                    foreach($result as $police){
                                        ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= htmlspecialchars($police['pl_id']) ?></th>
                                            <td><?= htmlspecialchars($police['full_name']) ?></td>
                                            <td><?= htmlspecialchars($police['rank']) ?></td>
                                            <td><?= htmlspecialchars($police['tel']) ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    // กรณีไม่มีข้อมูล
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted p-4">ยังไม่มีข้อมูลเจ้าหน้าที่</td>
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