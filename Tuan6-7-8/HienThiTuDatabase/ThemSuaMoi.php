<?php
require_once './db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSua = $_POST["MaSua"];
    $TenSua = $_POST["TenSua"];
    $HangSua = $_POST["HangSua"];
    $getHangSua = "";
    switch ($HangSua) {
        case 'NTF':
            $getHangSua = "NTF";
            break;
        case 'VNM':
            $getHangSua = "VNM";
            break;
        case 'DS':
            $getHangSua = "DS";
            break;
    }
    $LoaiSua = $_POST["LoaiSua"];
    $getLoaiSua = "";
    switch ($LoaiSua) {
        case 'SC':
            $getLoaiSua = "Sữa chua";
            break;
        case 'SKD':
            $getLoaiSua = "Sữa không đường";
            break;
        case 'ST':
            $getLoaiSua = "Sữa tươi";
            break;
        case 'STT':
            $getLoaiSua = "Sữa tiệt trùng";
            break;
    }
    $TrongLuong = $_POST["TrongLuong"];
    $DonGia = $_POST["DonGia"];
    $TPDD = $_POST["TPDD"];
    $LoiIch = $_POST["LoiIch"];
    $hinh_anh = $_FILES['HinhAnh']['name'];
    // echo $hinh_anh;

    // // Lưu tên file
    // $name = $_FILES["file"]["name"];

    // // Lưu đuôi file
    // $type = $_FILES["file"]["type"];

    // // Lưu kích thước
    // $size = $_FILES["file"]["size"];

    $query = "INSERT INTO thong_tin_sua(MaSua, TenSua, HangSua, LoaiSua, TrongLuong, DonGia, TPDD, LoiIch, HinhAnh) VALUES ('$MaSua', '$TenSua', '$getHangSua', '$getLoaiSua', '$TrongLuong', '$DonGia', '$TPDD', '$LoiIch', '$hinh_anh')";
    // $result = mysqli_query($conn, $query);
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    // if ($result) {
    //     echo "Thêm sữa thành công!";
    // } else {
    //     echo "ERROR: Không thể truy vấn -> $query. " . mysqli_error($conn);
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sữa mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class='container mt-5 text-bg-danger p-3'>
        <div class='row justify-content-center'>
            <h1 class="text-center">THÊM SỮA MỚI</h1>
            <form action="./ThemSuaMoi.php" method='POST' class="row g-3" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label class='form-label'>Mã sữa:</label>
                    <input type='text' class='form-control' id='' placeholder='NTF008' name='MaSua' require />
                </div>
                <div class="col-md-6">
                    <label class='form-label'>Tên sữa:</label>
                    <input type='text' class='form-control' id='' placeholder='Sunny Maman Chocolate' name='TenSua' require />
                </div>
                <div class="col-md-6">
                    <label class='form-label'>Hẵng sữa:</label>
                    <select class='form-select' name="HangSua" id=''>
                        <option value="NTF">Nutifood</option>
                        <option value="VNM">Vinamilk</option>
                        <option value="DS">Daisy</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class='form-label'>Loại sữa:</label>
                    <select class='form-select' name="LoaiSua" id=''>
                        <option value="SC">Sữa chua</option>
                        <option value="SKD">Sữa không đường</option>
                        <option value="ST">Sữa tươi</option>
                        <option value="STT">Sữa tiệt trùng</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class='form-label'>Trọng lượng:</label>
                    <input type='number' class='form-control' id='' placeholder='800gr' name='TrongLuong' require />
                </div>
                <div class="col-md-6">
                    <label class='form-label'>Đơn giá:</label>
                    <input type='number' class='form-control' id='' placeholder='166000đ' name='DonGia' require />
                </div>
                <div class="col-md-6">
                    <label class='form-label'>Thành phần dinh dưỡng:</label>
                    <textarea class='form-control' rows="3" id='' placeholder='Các vitamin, khoáng chất, canxi, folicacid, DHA...' name='TPDD'></textarea>
                </div>
                <div class="col-md-6">
                    <label class='form-label'>Lợi ích:</label>
                    <textarea class='form-control' rows="3" id='' placeholder='Bổ sung các chất dinh dưỡng dành cho phụ nữ có thai và cho con bú' name='LoiIch'></textarea>
                </div>
                <div class="col-12">
                    <label class='form-label'>Hình ảnh:</label>
                    <input type="file" class="form-control" name="HinhAnh" />
                </div>
                <div class="col-12 text-center">
                    <button type='submit' class='btn btn-primary'>Thêm mới</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>