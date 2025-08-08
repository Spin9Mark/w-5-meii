<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sufferer Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-body-tertiary">

    <?php include('includes/navbar.php'); ?>

    <div class="container mt-5">
        
        <!-- ใช้ Card ของ Bootstrap เพื่อจัดกลุ่มเนื้อหา -->
        <div class="card shadow-sm">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-primary">ข้อมูลผู้แจ้งความ</h2>
                    <a href="add_sufferer.php" class="btn btn-primary">
                        <i class="bi bi-plus-circle-fill"></i> แจ้งความ
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">รหัสบัตรประชาชน</th>
                                <th scope="col">ชื่อ-นามสกุล</th>
                                <th scope="col">เบอร์ติดต่อ</th>
                                <th scope="col">ที่อยู่</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('php/connect.php'); // เชื่อมต่อฐานข้อมูล

                                $sql = "SELECT * FROM sufferers";
                                // สั่ง query พร้อมตรวจสอบ error
                                $result = mysqli_query($connection, $sql) or die("Query failed: " . mysqli_error($connection));

                                // ตรวจสอบว่า query สำเร็จและมีข้อมูลอย่างน้อย 1 แถว
                                if ($result && mysqli_num_rows($result) > 0) {
                                    foreach($result as $sufferer){
                                        ?>
                                            <tr>
                                                <th scope="row"><?= htmlspecialchars($sufferer['c_id']) ?></th>
                                                <td><?= htmlspecialchars($sufferer['full_name']) ?></td>
                                                <td><?= htmlspecialchars($sufferer['tel']) ?></td>
                                                <td><?= htmlspecialchars($sufferer['address']) ?></td>
                                            </tr>
                                        <?php
                                    }
                                } else {
                                    // ถ้าไม่มีข้อมูล
                                    ?>
                                    <tr>
                                        <td colspan="4" class="text-center p-3">ยังไม่มีข้อมูลผู้แจ้งความ</td>
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