<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Diary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>

    <?php include('includes/navbar.php'); ?>

    <div class="container mt-5">
        <?php
            include('php/connect.php');

            $sql = "SELECT *, sufferers.full_name as s_name, polices.full_name as p_name FROM `police_diaries`
                    JOIN polices ON police_diaries.pl_id = polices.pl_id 
                    JOIN case_types ON police_diaries.cs_id = case_types.cs_id
                    JOIN sufferers on police_diaries.c_id = sufferers.c_id
                    ORDER BY police_diaries.pd_id ASC; ";
            $result = mysqli_query($connection, $sql);
        ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            
            <h2>บันทึกประจำวัน</h2>

            <a href="add_diary.php" class="btn btn-success">
                <i class="bi bi-plus-circle-fill"></i> ลงบันทึกประจำวัน
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ประเภทคดี</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">วันที่</th>
                        <th scope="col">ผู้แจ้งความ</th>
                        <th scope="col">เจ้าหน้าที่ผู้รับผิดชอบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $police_diary){
                            ?>
                                <tr>
                                    <th scope="row"><?= htmlspecialchars($police_diary['pd_id']) ?></th>
                                    <td><?= htmlspecialchars($police_diary['cs_name']) ?></td>
                                    <td><?= htmlspecialchars($police_diary['detail']) ?></td>
                                    <td><?= htmlspecialchars($police_diary['date']) ?></td>
                                    <td><?= htmlspecialchars($police_diary['s_name']) ?></td>
                                    <td><?= htmlspecialchars($police_diary['p_name']) ?></td>
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