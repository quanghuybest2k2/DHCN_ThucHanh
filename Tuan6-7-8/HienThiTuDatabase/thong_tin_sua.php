<?php
require_once './db.php';

require_once './phantrang.php';

$query = "SELECT tths.ID, tths.TenSua, hs.TenHS, ls.TenLoaiSua, tths.TrongLuong, tths.DonGia, tths.TPDD, tths.LoiIch, tths.HinhAnh FROM hang_sua as hs, thong_tin_sua as tths, loai_sua as ls Where hs.MaHS = tths.HangSua and ls.MaLoaiSua = tths.LoaiSua limit $start_from,$num_per_page";
$result = mysqli_query($conn, $query);
// 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sữa</title>
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
            <h1 class="text-center">Thông tin sữa</h1>
            <!-- table-striped -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Số TT</th>
                        <th>Tên sữa</th>
                        <th>Hẵng sữa</th>
                        <th>Loại sữa</th>
                        <th>Trọng lượng</th>
                        <th>Đơn giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $style = array('even', 'odd');
                    if ($result->num_rows > 0) {
                        $index = 1;
                        //load khach hang
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo
                            "<tr class=" . $style[$index % 2] . ">
                                <td>" . $row['ID'] . "</td>
                                <td>" . $row['TenSua'] . "</td>
                                <td>" . $row['TenHS'] . "</td>
                                <td>" . $row['TenLoaiSua'] . "</td>
                                <td>" . $row['TrongLuong'] . "</td>
                                <td>" . $row['DonGia'] . "</td>
                                <td>" . $row['TPDD'] . "</td>
                                <td>" . $row['LoiIch'] . "</td>
                                <td>" . $row['HinhAnh'] . "</td>
                            </tr>";
                            $index++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="container mt-3">
                <?php
                $pr_query = "SELECT tths.ID, tths.TenSua, hs.TenHS, ls.TenLoaiSua, tths.TrongLuong, tths.DonGia, tths.TPDD, tths.LoiIch, tths.HinhAnh FROM hang_sua as hs, thong_tin_sua as tths, loai_sua as ls Where hs.MaHS = tths.HangSua and ls.MaLoaiSua = tths.LoaiSua";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_page = ceil($total_record / $num_per_page);

                if ($page > 1) {
                    echo "<a href='thong_tin_sua.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous</a>";
                }


                for ($i = 1; $i < $total_page; $i++) {
                    echo "<a href='thong_tin_sua.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
                }

                if ($i > $page) {
                    echo "<a href='thong_tin_sua.php?page=" . ($page + 1) . "' class='btn btn-danger'>Next</a>";
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>