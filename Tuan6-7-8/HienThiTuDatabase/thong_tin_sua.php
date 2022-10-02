<?php
require_once './db.php';
require_once './phantrang.php';
$query = "SELECT tths.MaSua, tths.TenSua, hs.TenHS, ls.TenLoaiSua, tths.TrongLuong, tths.DonGia, tths.TPDD, tths.LoiIch, tths.HinhAnh FROM hang_sua as hs, thong_tin_sua as tths, loai_sua as ls Where hs.MaHS = tths.HangSua and ls.MaLoaiSua = tths.LoaiSua limit $start_from,$num_per_page";
$result = mysqli_query($conn, $query);
// 
require_once './header.php';
?>
<!-- content -->
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
                    <th>Thành phần dinh dưỡng</th>
                    <th>Lợi ích</th>
                    <th>Hình ảnh</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $style = array('even', 'odd');
                if ($result->num_rows > 0) {
                    $index = 1;
                    //load khach hang
                    while ($row = mysqli_fetch_assoc($result)) {
                        $hinh_anh = $row["HinhAnh"];
                        echo
                        "<tr class=" . $style[$index % 2] . ">
                                <td>" . $row['MaSua'] . "</td>
                                <td>" . $row['TenSua'] . "</td>
                                <td>" . $row['TenHS'] . "</td>
                                <td>" . $row['TenLoaiSua'] . "</td>
                                <td>" . $row['TrongLuong'] . "gr" . "</td>
                                <td>" . $row['DonGia'] . "đ" . "</td>
                                <td>" . $row['TPDD'] . "</td>
                                <td>" . $row['LoiIch'] . "</td>
                                <td>" . "<img src='uploads/$hinh_anh' alt='' width='100'' height='100'>" . "</td>
                            </tr>";
                        $index++;
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="container mt-3">
            <?php
            $pr_query = "SELECT tths.MaSua, tths.TenSua, hs.TenHS, ls.TenLoaiSua, tths.TrongLuong, tths.DonGia, tths.TPDD, tths.LoiIch, tths.HinhAnh FROM hang_sua as hs, thong_tin_sua as tths, loai_sua as ls Where hs.MaHS = tths.HangSua and ls.MaLoaiSua = tths.LoaiSua";
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
<?php require_once './footer.php'; ?>