<?php
require_once './db.php';

$query = "SELECT * FROM hang_sua";
// gán truy vấn cho biến tạm để kiểm tra số dòng ảnh hưởng
$num = $conn->query($query);

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
                    if ($num->num_rows > 0) {
                        //load hang sua
                        while ($row = $num->fetch_assoc()) {
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
                    }
                    $conn->close(); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>