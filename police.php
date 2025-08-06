<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลเจ้าหน้าที่</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    
    <?php include('includes/navbar.php'); ?>

    <div class="container mt-5">
        <?php
            include('php/connect.php');

            $sql = "SELECT * FROM polices";
            $result = mysqli_query($connection, $sql);
        ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            
            <h2>ข้อมูลเจ้าหน้าที่ตำรวจ</h2>

            <a href="add_police.php" class="btn btn-success">
                <i class="bi bi-plus-circle-fill"></i> เพิ่มข้อมูลเจ้าหน้าที่
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">ยศ</th>
                        <th scope="col">เบอร์โทรศัพท์</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $police){
                            ?>
                                <tr>
                                    <th scope="row"><?= htmlspecialchars($police['pl_id']) ?></th>
                                    <td><?= htmlspecialchars($police['full_name']) ?></td>
                                    <td><?= htmlspecialchars($police['rank']) ?></td>
                                    <td><?= htmlspecialchars($police['tel']) ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>