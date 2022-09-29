<?php
require_once './db.php';

require_once './phantrang.php';
$query = "SELECT * FROM khach_hang limit $start_from,$num_per_page";
$result = mysqli_query($conn, $query);
// INSERT INTO `khach_hang`(`MaKH`, `TenKH`, `GioiTinh`, `DiaChi`, `DienThoai`) VALUES ('','','','','')
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
            <h1 class="text-center">Thông tin khách hàng</h1>
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
                    if ($result->num_rows > 0) {
                        $index = 1;
                        //load khach hang
                        while ($row = mysqli_fetch_assoc($result)) {
                            $gender = '';
                            if ($row['GioiTinh'] == 0) {
                                $gender =  "<img src='img/48x48Male.png' />";
                            } else {
                                $gender =  "<img src='img/48x48Female.png' />";
                            }
                            echo
                            "<tr class=" . $style[$index % 2] . ">
                                <td>" . $row['MaKH'] . "</td>
                                <td>" . $row['TenKH'] . "</td>
                                <td>" . $gender . "</td>
                                <td>" . $row['DiaChi'] . "</td>
                                <td>" . $row['DienThoai'] . "</td>
                            </tr>";
                            $index++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="container mt-3">
                <?php
                $pr_query = "SELECT * FROM khach_hang";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_page = ceil($total_record / $num_per_page);

                if ($page > 1) {
                    echo "<a href='khach_hang.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous</a>";
                }


                for ($i = 1; $i < $total_page; $i++) {
                    echo "<a href='khach_hang.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
                }

                if ($i > $page) {
                    echo "<a href='khach_hang.php?page=" . ($page + 1) . "' class='btn btn-danger'>Next</a>";
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>