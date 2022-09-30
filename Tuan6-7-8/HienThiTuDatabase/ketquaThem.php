<?php
require_once './db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSua = $_POST["MaSua"];
    $TenSua = $_POST["TenSua"];
    $HangSua = $_POST["HangSua"];
    $getHangSua = "";
    switch ($HangSua) {
        case 'Nutifood':
            $getHangSua = "NTF";
            break;
        case 'Vinamilk':
            $getHangSua = "VNM";
            break;
        case 'Daisy':
            $getHangSua = "DS";
            break;
    }
    $LoaiSua = $_POST["LoaiSua"];
    $getLoaiSua = "";
    switch ($LoaiSua) {
        case 'SuaChua':
            $getLoaiSua = "SC";
            break;
        case 'SuaKhongDuong':
            $getLoaiSua = "SKD";
            break;
        case 'SuaTuoi':
            $getLoaiSua = "ST";
            break;
        case 'SuaTietTrung':
            $getLoaiSua = "STT";
            break;
    }
    $TrongLuong = $_POST["TrongLuong"];
    $DonGia = $_POST["DonGia"];
    $TPDD = $_POST["TPDD"];
    $LoiIch = $_POST["LoiIch"];
    $hinh_anh = $_FILES['HinhAnh']['name'];
    // // Lưu tên file
    // $name = $_FILES["file"]["name"];

    // // Lưu đuôi file
    // $type = $_FILES["file"]["type"];

    // // Lưu kích thước
    // $size = $_FILES["file"]["size"];
    $file = $_FILES['HinhAnh']['tmp_name'];
    $path = "uploads/" . $hinh_anh;
    move_uploaded_file($file, $path);

    $query = "INSERT INTO thong_tin_sua(MaSua, TenSua, HangSua, LoaiSua, TrongLuong, DonGia, TPDD, LoiIch, HinhAnh) VALUES ('$MaSua', '$TenSua', '$getHangSua', '$getLoaiSua', '$TrongLuong', '$DonGia', '$TPDD', '$LoiIch', '$hinh_anh')";
    // $result = mysqli_query($conn, $query);
    if (mysqli_query($conn, $query)) {
        echo "<script> alert('Thêm sữa thành công!'); </script>";
        // echo "<script> Swal.fire('Thành công', 'Thêm sữa thành công!', 'success') </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    // echo "<script> location.href='thong_tin_sua.php'; </script>";
    //<button class="btn btn-success" onclick="showSuccessAlert()">Success</button>
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sữa vừa thêm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-10 bg-danger text-white text-center"><?php echo "$TenSua - $HangSua"; ?></div>
            <div class="col-3 bg-warning text-dark"><img src="<?php echo $path ?>" alt="" width="100%" height="100%"></div>
            <div class="col-7 bg-primary text-white">
                <p><strong>Thành phần dinh dưỡng:</strong><br /><?php echo $TPDD ?></p>
                <p><strong>Lợi ích:</strong><br /><?php echo $LoiIch ?></p>
                <p><strong>Trọng lượng:</strong> <mark><?php echo $TrongLuong ?>gr</mark> <strong>Đơn giá:</strong> <mark><?php echo $DonGia ?>VNĐ</mark> </p>
            </div>
        </div>
    </div>
</body>

</html>