<?php
require_once './db.php';

$query = "SELECT * FROM khach_hang";
$num = $conn->query($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khách hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .even {
            background-color: #FFB85F !important;
        }

        .odd {
            background-color: #66CCFF !important;
        }
    </style>
</head>

<body>
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <!-- table-striped -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã KH</th>
                        <th>Tên khách hàng</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $style = array('even', 'odd');
                    if ($num->num_rows > 0) {
                        $index = 1;
                        //load khach hang
                        // INSERT INTO `khach_hang`(`MaKH`, `TenKH`, `GioiTinh`, `DiaChi`, `DienThoai`) VALUES ('','','','','')
                        while ($row = $num->fetch_assoc()) {
                            echo
                            "<tr class=" . $style[$index % 2] . ">
                                <td>" . $row['MaKH'] . "</td>
                                <td>" . $row['TenKH'] . "</td>
                                <td>" . $row['GioiTinh'] . "</td>
                                <td>" . $row['DiaChi'] . "</td>
                                <td>" . $row['DienThoai'] . "</td>
                            </tr>";
                            $index++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>