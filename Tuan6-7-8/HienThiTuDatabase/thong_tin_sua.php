<?php
require_once './db.php';

require_once './phantrang.php';
$query = "SELECT tths.ID, tths.TenSua, hs.TenHS, tths.LoaiSua, tths.TrongLuong, tths.DonGia FROM hang_sua as hs, thong_tin_sua as tths WHERE hs.MaHS = tths.HangSua";
$num = $conn->query($query);

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
                    if ($num->num_rows > 0) {
                        $index = 1;
                        //load khach hang
                        // INSERT INTO `khach_hang`(`MaKH`, `TenKH`, `GioiTinh`, `DiaChi`, `DienThoai`) VALUES ('','','','','')
                        while ($row = $num->fetch_assoc()) {
                            echo
                            "<tr class=" . $style[$index % 2] . ">
                                <td>" . $row['ID'] . "</td>
                                <td>" . $row['TenSua'] . "</td>
                                <td>" . $row['TenHS'] . "</td>
                                <td>" . $row['LoaiSua'] . "</td>
                                <td>" . $row['TrongLuong'] . "</td>
                                <td>" . $row['DonGia'] . "</td>
                            </tr>";
                            $index++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="container mt-3">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
<!-- 
SELECT tths.ID, tths.TenSua, hs.TenHS, tths.LoaiSua, tths.TrongLuong, tths.DonGia FROM hang_sua as hs, thong_tin_sua as tths WHERE hs.MaHS = tths.HangSua
INSERT INTO `thong_tin_sua`(`TenSua`, `HangSua`, `LoaiSua`, `TrongLuong`, `DonGia`) VALUES ('Cô gái hà lan', 'NTF', 'Sữa tươi', 100, 3000)
CREATE TABLE thong_tin_sua (
    ID INT AUTO_INCREMENT NOT NULL,
  	TenSua VARCHAR(100) NOT NULL,
  	 HangSua VARCHAR(100) NOT NULL,
 	LoaiSua VARCHAR(100) NOT NULL,
  	TrongLuong INT,
      DonGia INT,
      FOREIGN KEY (HangSua) REFERENCES hang_sua(MaHS),
  CONSTRAINT PK_HangSua PRIMARY KEY (ID, HangSua)
); -->