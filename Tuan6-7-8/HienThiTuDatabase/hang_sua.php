<?php
require_once './db.php';
require_once './phantrang.php';

$query = "SELECT * FROM hang_sua LIMIT $start_from,$num_per_page";
// gán truy vấn cho biến tạm để kiểm tra số dòng ảnh hưởng
$result = mysqli_query($conn, $query);
// INSERT INTO `hang_sua`(`MaHS`, `TenHS`, `DiaChi`, `DienThoai`, `Email`) VALUES ('','','','','')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin hãng sửa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <h1>Thông tin hãng sữa</h1>
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th>Mã HS</th>
                        <th>Tên hãng sữa</th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        //load hang sua
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                        <td>" . $row['MaHS'] . "</td>
                        <td>" . $row['TenHS'] . "</td>
                        <td>" . $row['DiaChi'] . "</td>
                        <td>" . $row['DienThoai'] . "</td>
                        <td>" . $row['Email'] . "</td>
                    </tr>";
                        }
                    } else {
                        echo "Không có dữ liệu để load";
                    } ?>
                </tbody>
            </table>
            <div class="container mt-3">
                <?php
                $pr_query = "SELECT * FROM hang_sua";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_page = ceil($total_record / $num_per_page);

                if ($page > 1) {
                    echo "<a href='hang_sua.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous</a>";
                }


                for ($i = 1; $i < $total_page; $i++) {
                    echo "<a href='hang_sua.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
                }

                if ($i > $page) {
                    echo "<a href='hang_sua.php?page=" . ($page + 1) . "' class='btn btn-danger'>Next</a>";
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>