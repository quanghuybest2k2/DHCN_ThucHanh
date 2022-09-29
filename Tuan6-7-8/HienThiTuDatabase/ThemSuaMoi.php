<?php
require_once './db.php';
$query = "";
// $result = mysqli_query($conn, $query);
// INSERT INTO `thong_tin_sua` (`TenSua`, `HangSua`, `LoaiSua`, `TrongLuong`, `DonGia`) VALUES ('Sữa chua Plus', 'VNM', 'ST', 180, 3600)
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
</head>

<body>
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-12 col-md-8 col-lg-6 col-xl-5'>
                <h1 class="text-center">THÊM SỮA MỚI</h1>
                <form action='./ThemSuaMoi.php' method='POST'>
                    <div class='mb-3 mt-3'>
                        <label class='form-label'>Mã sữa:</label>
                        <input type='text' class='form-control' id='' placeholder='NTF008' name='MaSua'>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Tên sữa:</label>
                        <input type='text' class='form-control' id='' placeholder='Sunny Maman Chocolate' name='TenSua'>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Hẵng sữa:</label>
                        <select class='form-select' name="HangSua" id=''>
                            <option value="NTF">Nutifood</option>
                            <option value="VNM">Vinamilk</option>
                            <option value="DS">Daisy</option>
                        </select>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Loại sữa:</label>
                        <select class='form-select' name="LoaiSua" id=''>
                            <option value="NTF">Nutifood</option>
                            <option value="VNM">Vinamilk</option>
                            <option value="DS">Daisy</option>
                        </select>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Trọng lượng:</label>
                        <input type='number' class='form-control' id='' placeholder='800' name='TrongLuong'>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Đơn giá:</label>
                        <input type='number' class='form-control' id='' placeholder='166000' name='DonGia'>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Thành phần dinh dưỡng:</label>
                        <textarea class='form-control' rows="3" id='' placeholder='Các vitamin, khoáng chất, canxi, folicacid, DHA...' name='TPDD'></textarea>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Lợi ích:</label>
                        <textarea class='form-control' rows="3" id='' placeholder='Bổ sung các chất dinh dưỡng dành cho phụ nữ có thai và cho con bú' name='LoiIch'></textarea>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Hình ảnh:</label>
                        <input type='file' class='form-control' id='' name='HinhAnh'>
                    </div>
                    <button type='submit' class='btn btn-primary'>Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>